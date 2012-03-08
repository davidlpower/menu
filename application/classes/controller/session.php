<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Session extends Controller
{
    public $sessionState;

    public function action_createSession()
    {
        if (Session::instance()->get('valid') === NULL)
        {
            Session::instance()->set('valid', TRUE); 
            $sessionState = TRUE;
        }
    }
    
    //Get a value and set in session
    public function action_setVar(){   
        Session::instance()->set('No',$this->request->param('id'));  
    }
    
    //Display set value
    public function action_getVar(){   
        $value = Session::instance()->get('No', NULL);  
        print_r("Value: ".$value."\n session state".$sessionState);
    }
    
    //Delete current session
    public function action_deleteSession(){
        Session::instance()->destroy();
        $sessionState = FALSE;
    }
    
} // End Session