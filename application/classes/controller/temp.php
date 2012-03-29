<?php

defined('SYSPATH') or die('No direct script access.');

class Controller_Temp extends Controller_Template {

    public $template = 'template/template';

    /**
     * The before() method is called before your controller action.
     * In our template controller we override this method so that we can
     * set up default values. These variables are then available to our
     * controllers if they need to be modified.
     */
    public function before() {
        parent::before();

        if ($this->auto_render)
        {
            // Initialize empty values
            $this->template->title = '';
            $this->template->site_title = '';
            
            $this->template->head = view::factory('template/head');
            if($this->request->controller() = 'admin'){
                $this->template->head->menu = view::factory('template/menuBarAdmin');
            }else{
               $this->template->head->menu = view::factory('template/menuBar'); 
            } 
            
            $this->template->content = '';
            $this->template->foot = view::factory('template/foot');
            $this->template->styles = array();
        }
    }

    /**
     * The after() method is called after your controller action.
     * In our template controller we override this method so that we can
     * make any last minute modifications to the template before anything
     * is rendered.
     */
    public function after() {
        if ($this->auto_render)
        {
            $styles = array(
                '<link href=\'http://fonts.googleapis.com/css?family=Open+Sans\' rel=\'stylesheet\' type=\'text/css\'>' => 'print',
                'media/css/stylesheet.css' => 'screen',
            );

            $this->template->styles = array_merge($this->template->styles, $styles);
        }
        parent::after();
    }

}