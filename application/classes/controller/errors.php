<?php

class Controller_Errors extends Controller_Temp {

    public function action_404() {
        
        $title = '404 !';
        $this->request->status = 404;
        $this->template->title = View::bind_global('title', $title);
        $this->template->title = View::bind_global('site_title', $title);
        $this->template->content = View::factory('errors/404');
    }
}
?>