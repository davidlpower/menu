<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Restaurant extends Controller
{
    const INDEX_PAGE = 'index.php/restaurant/restaurant';

// Load restaurant information and send it to restaurant view
    public function action_restaurant()
    {
        if (Session::instance()->get('valid') === NULL)
        {
            print_r("No Session Set");
            Session::instance()->set('valid', TRUE);
        }else{
            print_r("Session Set");
        }
        $restaurantItems = ORM::factory('restaurant')->find_all(); // loads all restaurants from restauraunts table
        //Populate the browser var with the mobile device type
        $browser = Request::user_agent('mobile');
        //http://kohanaframework.org/3.0/guide/api/Request - UserAgent Detection Here

        //If $browser is not null then device is mobile
        if ($browser != null) {
            $view = new View('restaurant/mobileRestaurant');
            $view->set("restaurantItems", $restaurantItems); // set/send "restaurantItems" object to view
        } else {
            $view = new View('restaurant/restaurant');
            $view->set("restaurantItems", $restaurantItems); // set/send "restaurantItems" object to view
        }
        $this->response->body($view);
    }

// loads the new article form
    public function action_newRestaurant()
    {
        $restaurant = new Model_Restaurant();

        $view = new View('restaurant/editRestaurant'); // Load the edit view and
        $view->set("restaurant", $restaurant); // assign the Model_Restaurant model to it

        $this->response->body($view);
    }

// edit the Restaurant items
    public function action_editRestaurant()
    {
        $restaurant_id = $this->request->param('id');
        $restaurant = new Model_Restaurant($restaurant_id);

        $view = new View('restaurant/editRestaurant');
        $view->set("restaurant", $restaurant);

        $this->response->body($view);
    }

// save the Restaurant
    public function action_postRestaurant()
    {
        $r_id = $this->request->param('id');
        $restaurant = new Model_Restaurant($r_id);
        //exit(print_r($_POST));
        $restaurant->values($_POST); // populate $restaurant object from $_POST array
        $restaurant->save(); // saves restaurant to database
        
        $this->request->redirect('index.php/restaurant/restaurant'); // redirects to rest page after saving
    }

// Delete a restaurant item
    public function action_deleteRestaurant()
    {
        $restaurant_id = $this->request->param('id');
        $restaurant = new Model_Restaurant($restaurant_id);
        $restaurant->delete(); // delete in database
        $this->request->redirect(self::INDEX_PAGE);
    }
}
;