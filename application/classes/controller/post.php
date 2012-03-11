<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Post extends Controller_Temp
{
    const INDEX_PAGE = '/post';
    public $mobileDevice = null;

    public function action_index()
    {
        $postItems = ORM::factory('post')->find_all(); // load all post object from table
        
        //detect device
        $browser = Request::user_agent('mobile');
        //http://kohanaframework.org/3.0/guide/api/Request - UserAgent Detection Here

        //If $browser is not null then device is mobile
        if ($browser != null) {
            $mobileDevice = "This is a mobile device";
        } else {
            $mobileDevice = "This is not a mobile device";
        }
        
        $aTitle = 'Software, Electronics, Music and all-round Geekery';
        $this->template->title = View::bind_global('title', $aTitle);
        $this->template->content = View::factory('post/index');
        $this->template->postItems = View::bind_global('postItems',$postItems);
    }

    // loads the new article form
    public function action_new()
    {
        $post = new Model_Post();
        
        $aTitle = 'Edit or Post something new!';
        $this->template->title = View::bind_global('title', $aTitle);
        $this->template->content = View::factory('post/edit');
        $this->template->post = View::bind_global('post',$post);
    }

    // save the article
    public function action_post()
    {
        $post_id = $this->request->param('id');
        $post = new Model_Post($post_id);
        $post->values($_POST); // populate $post object from $_POST array
        $post->save(); // saves post to database

        $this->request->redirect('/post'); // redirects to post page after saving
    }

    // edit the post items
    public function action_edit()
    {
        $post_id = $this->request->param('id');
        $post = new Model_Post($post_id);
        $aTitle = 'Edit that post!';
        $this->template->title = View::bind_global('title', $aTitle);
        $this->template->content = View::factory('post/edit');
        $this->template->post = View::bind_global('post',$post);
    }

    // delete the post item
    public function action_delete()
    {
        $post_id = $this->request->param('id');
        $post = new Model_Post($post_id);

        $post->delete(); // delete in database
        $this->request->redirect(self::INDEX_PAGE);
    }
} // End Post