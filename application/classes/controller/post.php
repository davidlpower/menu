<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Post extends Controller_Temp {

    const INDEX_PAGE = '/';

    public $mobileDevice = null;

    //Load the softeware posts 0
    public function action_index() {

        // load all post object from table that are software related
        $postItems = DB::select()
                ->from('posts')
                ->where('published', '=', '1')
                ->order_by('posts.id', 'DESC')
                ->limit('5')
                ->execute();

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
        $postItems = DB::select()
                ->from('posts')
                ->where('type','=','1')
                ->and_where('published', '=', '1')
                ->order_by('posts.id', 'DESC')
                ->execute();

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
        $postItems = DB::select()
                ->from('posts')
                ->where('type','=','2')
                ->and_where('published', '=', '1')
                ->order_by('posts.id', 'DESC')
                ->execute();

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
        $postItems = DB::select()
                ->from('posts')
                ->where('type','=','3')
                ->and_where('published', '=', '1')
                ->order_by('posts.id', 'DESC')->execute();
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
        $postItems = DB::select()
                ->from('posts')
                ->where('type','=','4')
                ->and_where('published', '=', '1')
                ->order_by('posts.id', 'DESC')
                ->execute();

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
        $postItems = DB::select()
                ->from('posts')
                ->where('type','=','5')
                ->and_where('published', '=', '1')
                ->order_by('posts.id', 'DESC')
                ->execute();

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
        
        //Check device type
        $mobileDevice = $this->detect_device();
        View::bind_global('site_title', $mobileDevice);
        
        //Load the page
        $body = '<p><img style="float: left;" title="A photo of David Power" src="../media/images/me.png" alt="David Power" />Hello, my name is David Power and I\'m a UL, CIT, WIT graduate. I work as a web developer, primarly using PHP and in my spare time cook, bake, play music and make play with electronics.</p>';
        $linkedIn = '<a href="http://ie.linkedin.com/pub/david-power/29/560/1a"> <img src="http://www.linkedin.com/img/webpromo/btn_profile_bluetxt_80x15.png" width="80" height="15" border="0" alt="View David Power\'s profile on LinkedIn"></a>';
        $this->template->content = "<p>$body If you would like to get in contact please send me an e-mail. </p><p><center>e: <a href='mailto:david@karujahundu.com?Subject=contact'> David</a> | ". $linkedIn . "</p></center>";
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