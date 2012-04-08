<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Post extends Controller_Temp {

    const INDEX_PAGE = '/';

    public $mobileDevice = null;

    //Load the softeware posts 0
    public function action_index() {

        // load all post object from table that are software related
        $postItems = DB::select()->from('posts')->order_by('id')->limit(2)->execute();        

        //Check the device type
        $mobileDevice = $this->detect_device();

        //If the site loaded something then
        if ($postItems->count() > 0)
        {
            $aTitle = 'Software, Electronics, Music and all-round Geekery';
            $mobileDevice = $mobileDevice . $aTitle;
            View::bind_global('title', $aTitle);
            View::bind_global('site_title', $mobileDevice);

            $this->template->content = View::factory('post/index');

            $this->template->content->postItems = $postItems;
        }

        //If no posts then display message
        else
        {
            $aTitle = 'Software, Electronics, Music and all-round Geekery';
            $mobileDevice = $mobileDevice . $aTitle;

            View::bind_global('title', $aTitle);
            View::bind_global('site_title', $mobileDevice);
            $this->template->content = "<center>Nothing to see here.</center>";
        }
    }

    //Load the electronics posts
    public function action_software() {
        // load all post object from table that are electronic related
        $postItems = ORM::factory('post')
                ->where('type', '=', 1)
                ->find();

        //Check the device type
        $mobileDevice = $this->detect_device();


        //If the site loaded something then
        if ($postItems->loaded())
        {
            $aTitle = 'Software, Electronics, Music and all-round Geekery';
            $mobileDevice = $mobileDevice . $aTitle;

            $this->template->title = View::bind_global('title', $aTitle);
            $this->template->site_title = View::bind_global('site_title', $mobileDevice);
            $this->template->content = View::factory('post/index');
            $this->template->postItems = View::bind_global('postItems', $postItems);
        }
        //If no posts then display message
        else
        {
            $aTitle = 'Software, Electronics, Music and all-round Geekery';
            $mobileDevice = $mobileDevice . $aTitle;

            $this->template->title = View::bind_global('title', $aTitle);
            $this->template->site_title = View::bind_global('site_title', $mobileDevice);
            $this->template->content = "<center>Nothing to see here.</center>";
        }
    }

//Load the electronics posts 1
    public function action_electronics() {

// load all post object from table that are electronic related
        $postItems = ORM::factory('post')
                ->where('type', '=', 1)
                ->find();

//Check the device type
        $mobileDevice = $this->detect_device();


//If the site loaded something then
        if ($postItems->loaded())
        {
            $aTitle = 'Software, Electronics, Music and all-round Geekery';
            $mobileDevice = $mobileDevice . $aTitle;

            $this->template->title = View::bind_global('title', $aTitle);
            $this->template->site_title = View::bind_global('site_title', $mobileDevice);
            $this->template->content = View::factory('post/index');
            $this->template->postItems = View::bind_global('postItems', $postItems);
        }
//If no posts then display message
        else
        {
            $aTitle = 'Software, Electronics, Music and all-round Geekery';
            $mobileDevice = $mobileDevice . $aTitle;

            $this->template->title = View::bind_global('title', $aTitle);
            $this->template->site_title = View::bind_global('site_title', $mobileDevice);
            $this->template->content = "<center>Nothing to see here.</center>";
        }
    }

//Load the music posts 2
    public function action_music() {
        $this->template->content = "<center>Music</center>";
    }

//Load the everythingelse posts 3
    public function action_everything_else() {
        $this->template->content = "<center>Everything Else</center>";
    }

//Load the contact me page
    public function action_contact() {

//Load the page
        $this->template->content = "<center>e: <a href='mailto:david@karujahundu.com?Subject=contact'>
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