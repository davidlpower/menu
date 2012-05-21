<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Login extends Controller_Temp {

    const INDEX_PAGE = '/login';

    public function action_index() {

        $post = $this->request->post();
        print_r($post);
        die;
        if (isset($post))
        {
            $this->action_login($post['username'], $post['passwrod']);

            if ($this->action_check_login())
            {
                //redirect user
                $this->request->redirect('/admin');
            }
            else
            {
                $this->template->content = View::factory('login/index');
            }
        }
    }

    public function action_check_login() {
        $is_logged_in = Auth::instance()->logged_in();
        if ($is_logged_in)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    // Log in
    public function action_login($user, $pass) {

        Auth::instance()->login($user, $pass);

        $is_logged_in = Auth::instance()->logged_in();

        if ($is_logged_in)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    // Log out
    public function action_logout() {

        Auth::instance()->logout();
    }

}

// End post