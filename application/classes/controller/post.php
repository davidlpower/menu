<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Post extends Controller_Temp {

    const INDEX_PAGE = '/';

    public $mobileDevice = null;

    public function action_index() {

        // load all post object from table that are software related
        $postItems = ORM::factory('post')
                ->where('type', '=', 0)
                ->find();



        //detect device
        $browser = Request::user_agent('mobile');
        //http://kohanaframework.org/3.0/guide/api/Request - UserAgent Detection Here
        //If $browser is not null then device is mobile
        if ($browser != null)
        {
            $mobileDevice = "Mobile :: ";
        }
        else
        {
            $mobileDevice = "";
        }
        
        //If the site loaded something then
        if ($postItems->loaded())
        {
            $aTitle = 'Software, Electronics, Music and all-round Geekery';
            $mobileDevice = $mobileDevice . $aTitle;

            $this->template->title = View::bind_global('title', $aTitle);
            $this->template->title = View::bind_global('site_title', $mobileDevice);
            $this->template->content = View::factory('post/index');
            $this->template->postItems = View::bind_global('postItems', $postItems);
        }
        //If no posts then display message
        else
        {


            $aTitle = 'Software, Electronics, Music and all-round Geekery';
            $mobileDevice = $mobileDevice . $aTitle;

            $this->template->title = View::bind_global('title', $aTitle);
            $this->template->title = View::bind_global('site_title', $mobileDevice);
            $this->template->content = "<center>Nothing to see here.</center>";
        }
    }

    public function action_electronics() {

        // load all post object from table that are electronic related
        $postItems = ORM::factory('post')
                ->where('type', '=', 1)
                ->find();

        //detect device
        $browser = Request::user_agent('mobile');
        //http://kohanaframework.org/3.0/guide/api/Request - UserAgent Detection Here
        //If $browser is not null then device is mobile
        if ($browser != null)
        {
            $mobileDevice = "Mobile :: ";
        }
        else
        {
            $mobileDevice = "";
        }


        $aTitle = 'Software, <b>Electronics</b>, Music and all-round Geekery';
        $mobileDevice = $mobileDevice . $aTitle;

        $this->template->title = View::bind_global('title', $aTitle);
        $this->template->title = View::bind_global('site_title', $mobileDevice);
        $this->template->content = View::factory('post/index');
        $this->template->postItems = View::bind_global('postItems', $postItems);
    }

}

// End Post