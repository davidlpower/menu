<?php
class Blog
{

    public static function debugPrint($to_Prnt) {
        echo "<pre>";
        print_r($to_Prnt);
        die;
    }
    
    public static function printMessage($to_Prnt) {
        echo $to_Prnt;
    }
}
?>