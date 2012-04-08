<?php

defined('SYSPATH') or die('No direct script access.');

//Pulls the Menu table out of the database and provides a way for the system to intergrate with it.
class Model_Post extends ORM {

    public function all_posts() {

        $results = DB::select()->from('posts')->as_object()->execute();
        return $results;
    }

    public function all_categories() {

        $results = DB::select()->from('post_category')->execute();
        $array = array();
        
        foreach($results as $id => $category){
            $array[$category['id']] = $category['category'];
        }

        return $array;
    }

}