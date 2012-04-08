<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Admin extends Controller_Temp {

    const INDEX_PAGE = '/admin';

    public $mobileDevice = null;

    public function action_index() {
        $postItems = ORM::factory('post')->find_all(); // load all admin object from table
        //detect device
        $browser = Request::user_agent('mobile');
        //http://kohanaframework.org/3.0/guide/api/Request - UserAgent Detection Here
        //If $browser is not null then device is mobile
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

    // loads the new article form
    public function action_new() {
        $post = new Model_post();

        $results = DB::select()->from('posts')->as_object()->execute();
        foreach ($results as $post) {
            
            echo '> ';
            print_r($post);
            echo '<br />';
        }
        die;
        
        $array = array('Software', 'Electronics', 'Cooking');

        $aTitle = 'Edit or Post something new!';
        View::bind_global('title', $aTitle);
        $this->template->content = View::factory('admin/edit');
        $this->template->content->post = $post;
        $this->template->content->category = $array;
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
    }

    // delete the post item
    public function action_delete() {
        $post_id = $this->request->param('id');
        $post = new Model_post($post_id);

        $post->delete(); // delete in database
        $this->request->redirect(self::INDEX_PAGE);
    }

}

// End post