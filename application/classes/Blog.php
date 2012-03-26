<?php
class Helper
{

    public static function debugPrint($to_Prnt) {
        echo "<pre>";
        print_r($to_Prnt);
        die;
    }
}
?>