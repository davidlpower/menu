<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Session extends Controller
{
    public $sessionState = TRUE;

    public function action_createSession()
    {
        if (Session::instance()->get('valid') === NULL)
        {
            Session::instance()->set('valid', TRUE); 
            $sessionState = TRUE;
        }
    }
    
    public function action_setVar(){   
        Session::instance()->set('No',$this->request->param('id'));  
    }
    
    public function action_getVar(){   
        $valu = Session::instance()->get('No', NULL);  
        print_r($valu);
    }
} // End Session