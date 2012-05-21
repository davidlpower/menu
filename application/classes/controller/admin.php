<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Admin extends Controller_Temp {

    const INDEX_PAGE = '/admin';

    public $mobileDevice = null;

    public function action_index() {

        $is_logged_in = Auth::instance()->logged_in();

        if ($is_logged_in)
        {
            // load all admin object from table
            $postItems = DB::select()->from('posts')->order_by('posts.id', 'DESC')->execute();

            //detect device
            $browser = Request::user_agent('mobile');

            if ($browser != null)
            {
                $mobileDevice = "Mobile Mode";
            }
            else
            {
                $mobileDevice = "Desktop Mode";
            }

            $aTitle = 'Software, Electronics, Music and all-round Geekery';
            View::bind_global('title', $aTitle);
            $this->template->content = View::factory('admin/index');
            $this->template->content->postItems = $postItems;
        }
        else
        {
            //redirect user
            $this->request->redirect('/login');
        }
    }

    // loads the new article form
    public function action_new() {

        $post = new Model_post();
        $categories = $post->all_categories();

        $aTitle = 'Edit or Post something new!';
        View::bind_global('title', $aTitle);
        $this->template->content = View::factory('admin/edit');
        $this->template->content->post = $post;
        $this->template->content->category = $categories;
    }

    // save the article
    public function action_post() {

        $post_id = $this->request->param('id');
        $post = new Model_post($post_id);
        $post->values($_POST); // populate $post object from $_post array
        $post->save(); // saves post to database

        $this->request->redirect('/admin'); // redirects to admin page after saving
    }

    // edit the admin items
    public function action_edit() {

        $post_id = $this->request->param('id');
        $post = new Model_post($post_id);
        $aTitle = 'Edit that post!';
        View::bind_global('title', $aTitle);
        $this->template->content = View::factory('admin/edit');
        $this->template->content->post = $post;
        $result = $post->all_categories();
        $type = $post->get_type($this->request->param('id'));

        $this->template->content->category = $result;
        $this->template->content->current_type = $type;
    }

    // delete the post item
    public function action_delete() {

        $post_id = $this->request->param('id');
        $post = new Model_post($post_id);

        $post->delete(); // delete in database
        $this->request->redirect(self::INDEX_PAGE);
    }

    // Display shell script
    public function action_display_shell() {

        $output = exec('/home/david/server/server_check.sh');

        if ($output == 'down"')
        {
            $status = 'down';
        }
        else
        {
            $status = 'up';
        }

        echo 'The server is ' . $status;
    }

}

// End post