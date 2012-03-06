<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Menu extends Controller
{
    const INDEX_PAGE = 'index.php/menu';

    public function action_index()
    {
        $menuItems = ORM::factory('menu')->find_all(); // load all menu object from table

        $view = new View('menu/index');
        $view->set("menuItems", $menuItems); // set "menuItems" object to view

        $this->response->body($view);
    }

    // loads the new article form
    public function action_new()
    {
        $menu = new Model_Menu();

        $view = new View('menu/edit'); // Load the edit view and
        $view->set("menu", $menu); // assign the Model_Menu model to it

        $this->response->body($view);
    }

    // save the article
    public function action_post()
    {
        $menu_id = $this->request->param('id');
        $menu = new Model_Menu($menu_id);
        $menu->values($_POST); // populate $menu object from $_POST array
        $menu->save(); // saves menu to database

        $this->request->redirect('index.php/menu'); // redirects to menu page after saving
    }

    // edit the menu items
    public function action_edit()
    {
        $menu_id = $this->request->param('id');
        $menu = new Model_Menu($menu_id);

        $view = new View('menu/edit');
        $view->set("menu", $menu);

        $this->response->body($view);
    }

    // delete the menu item
    public function action_delete()
    {
        $menu_id = $this->request->param('id');
        $menu = new Model_Menu($menu_id);

        $menu->delete(); // delete in database
        $this->request->redirect(self::INDEX_PAGE);
    }
} // End Menu