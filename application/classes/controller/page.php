<?php defined('SYSPATH') or die('No direct script access.');
  
  class Controller_Page extends Controller_Tempsite {
  
  	public function action_home()
  	{
  		$this->template->title = __('Software, Electronics, Music and all-round Geekery');
  		
  		$this->template->content = View::factory('page/home' );
  	}
  	
  	public function action_contact()
  	{
  		$this->template->title = __('Contact Information for Acme Widgets');
  		
  		$this->template->content = View::factory('page/contact' );
  	}
} 