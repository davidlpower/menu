<?php
/*
 * This class is to provide additional functionality 
 * for the aid of the blog program.
 */
class Helper_BlogHelper
{
    // property declaration
    //public $var = 'a default value';

    // method declaration
    public static function debugPrint($to_Prnt) {
        echo "<pre>";
        print_r($to_Prnt);
        die;
    }
}
?>