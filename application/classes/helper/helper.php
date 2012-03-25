<?php
class Helper_Herlper
{

    public static function debugPrint($to_Prnt) {
        echo "<pre>";
        print_r($to_Prnt);
        die;
    }
}
?>