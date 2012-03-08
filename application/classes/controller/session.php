<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Session extends Controller
{
    private $sessionState;

    public function action_createSession()
    {
        if (Session::instance()->get('valid') === NULL)
        {
            Session::instance()->set('valid', TRUE); 
            $sessionState = TRUE;
        }
        
        print_r("<ul>
            <li>setVar</li>
            <li>getVar</li>
            <li>deleteSession</li>
            <li>setSessionState</li>
            <li>getSessionState</li>
            </ul>");
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
    
    public function action_setSessionState($par){
        if($par == TRUE || $par == FALSE){
            $sessionState = $par;
        }else
        {
            echo("\$par is not a boolean");
        }
    }
    
    public function action_getSessionState(){
        return $sessionState;
    }
    
} // End Session