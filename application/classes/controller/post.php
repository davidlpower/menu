<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Post extends Controller_Temp {

    const INDEX_PAGE = '/';

    public $mobileDevice = null;

    //Load the softeware posts 0
    public function action_index() {

        // load all post object from table that are software related
        $postItems = DB::select()->from('posts')->order_by('posts.id', 'DESC')->limit('5')->execute();

        //$postItems = DB::query(Database::SELECT, 'SELECT * FROM  `posts` ORDER BY  `posts`.`id` DESC LIMIT 2');
        //Check the device type
        $mobileDevice = $this->detect_device();

        //If the site loaded something then
        if ($postItems->count() > 0)
        {
            
            View::bind_global('site_title', $mobileDevice);

            $this->template->content = View::factory('post/index');

            $this->template->content->postItems = $postItems;
        }

        //If no posts then display message
        else
        {
            

            View::bind_global('site_title', $mobileDevice);
            $this->template->content = "<center>Nothing to see here.</center>";
        }
    }

    //Load the electronics posts
    public function action_software() {
        // load all post object from table that are electronic related
        $postItems = DB::select()->from('posts')->where('type','=','1')->order_by('posts.id', 'DESC')->execute();

        //Check the device type
        $mobileDevice = $this->detect_device();


        //If the site loaded something then
        if ($postItems->count() > 0)
        {
            
            View::bind_global('site_title', $mobileDevice);

            $this->template->content = View::factory('post/index');

            $this->template->content->postItems = $postItems;
        }

        //If no posts then display message
        else
        {
            
            

            
            View::bind_global('site_title', $mobileDevice);
            $this->template->content = "<center>Nothing to see here.</center>";
        }
    }

    //Load the electronics posts 1
    public function action_electronics() {

        // load all post object from table that are electronic related
        $postItems = DB::select()->from('posts')->where('type','=','2')->order_by('posts.id', 'DESC')->execute();

        //Check the device type
        $mobileDevice = $this->detect_device();


        //If the site loaded something then
        if ($postItems->count() > 0)
        {
            
            View::bind_global('site_title', $mobileDevice);
            $this->template->content = View::factory('post/index');

            $this->template->content->postItems = $postItems;
        }

        //If no posts then display message
        else
        {
            
            
            View::bind_global('site_title', $mobileDevice);
            $this->template->content = "<center>Nothing to see here.</center>";
        }
    }

//Load the music posts 3
    public function action_music() {
        //load all post object from table that are electronic related
        $postItems = DB::select()->from('posts')->where('type','=','3')->order_by('posts.id', 'DESC')->execute();
        //Check the device type
        $mobileDevice = $this->detect_device();


        //If the site loaded something then
        if ($postItems->count() > 0)
        {
            
            View::bind_global('site_title', $mobileDevice);

            $this->template->content = View::factory('post/index');

            $this->template->content->postItems = $postItems;
        }

        //If no posts then display message
        else
        {
            
            
            View::bind_global('site_title', $mobileDevice);
            $this->template->content = "<center>Nothing to see here.</center>";
        }
    }

    //Load the cooking posts 4
    public function action_cooking() {
        //load all post object from table that are electronic related
        $postItems = DB::select()->from('posts')->where('type','=','4')->order_by('posts.id', 'DESC')->execute();

        //Check the device type
        $mobileDevice = $this->detect_device();


        //If the site loaded something then
        if ($postItems->count() > 0)
        {
            
            View::bind_global('site_title', $mobileDevice);

            $this->template->content = View::factory('post/index');

            $this->template->content->postItems = $postItems;
        }

        //If no posts then display message
        else
        {
            

            View::bind_global('site_title', $mobileDevice);
            $this->template->content = "<center>Nothing to see here.</center>";
        }
    }
    
    //Load the everythingelse posts 5
    public function action_everything_else() {
        //load all post object from table that are electronic related
        $postItems = DB::select()->from('posts')->where('type','=','5')->order_by('posts.id', 'DESC')->execute();

        //Check the device type
        $mobileDevice = $this->detect_device();


        //If the site loaded something then
        if ($postItems->count() > 0)
        {
            
            View::bind_global('site_title', $mobileDevice);

            $this->template->content = View::factory('post/index');

            $this->template->content->postItems = $postItems;
        }

        //If no posts then display message
        else
        {
            
            
            View::bind_global('site_title', $mobileDevice);
            $this->template->content = "<center>Nothing to see here.</center>";
        }
    }

    //Load the contact me page
    public function action_contact() {
        //Load the page
        $this->template->content = "<center><br />Why not send me an e-mail, I'm I'd love to hear from you. e: <a href='mailto:david@karujahundu.com?Subject=contact'>
        David</a></center>";
    }

    //Detect the device type
    function detect_device() {

        //detect device
        $browser = Request::user_agent('mobile');

        //If $browser is not null then device is mobile
        if ($browser != null)
        {
            $mobileDevice = "Mobile :: ";
        }
        else
        {
            $mobileDevice = "";
        }

        return $mobileDevice;
    }
}

// End Post