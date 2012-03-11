<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Admin extends Controller_Temp
{
    const INDEX_PAGE = '/admin';
    public $mobileDevice = null;

    public function action_index()
    {
        $adminItems = ORM::factory('admin')->find_all(); // load all admin object from table
        
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
        $this->template->content = View::factory('admin/index');
        $this->template->adminItems = View::bind_global('adminItems',$adminItems);
    }

    // loads the new article form
    public function action_new()
    {
        $admin = new Model_admin();
        
        $aTitle = 'Edit or Post something new!';
        $this->template->title = View::bind_global('title', $aTitle);
        $this->template->content = View::factory('admin/edit');
        $this->template->admin = View::bind_global('admin',$admin);
    }

    // save the article
    public function action_post()
    {
        $admin_id = $this->request->param('id');
        $admin = new Model_admin($admin_id);
        $admin->values($_admin); // populate $admin object from $_admin array
        $admin->save(); // saves admin to database

        $this->request->redirect('/admin'); // redirects to admin page after saving
    }

    // edit the admin items
    public function action_edit()
    {
        $admin_id = $this->request->param('id');
        $admin = new Model_admin($admin_id);
        $aTitle = 'Edit that admin!';
        $this->template->title = View::bind_global('title', $aTitle);
        $this->template->content = View::factory('admin/edit');
        $this->template->admin = View::bind_global('admin',$admin);
    }

    // delete the post item
    public function action_delete()
    {
        $admin_id = $this->request->param('id');
        $admin = new Model_admin($admin_id);

        $admin->delete(); // delete in database
        $this->request->redirect(self::INDEX_PAGE);
    }
} // End admin