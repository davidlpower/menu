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
} // End Post