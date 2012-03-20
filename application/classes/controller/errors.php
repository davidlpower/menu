<?php

class Controller_Errors extends Controller_Temp {

    public function action_404() {
        $this->request->status = 404;
        $this->template->title = View::bind_global('title', '404 Oops!');
        $this->template->title = View::bind_global('site_title', '404 Oops!');
        $this->template->content = View::factory('errors/404');
    }
}
?>