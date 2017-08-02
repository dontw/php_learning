<?php
    namespace App\Core;

    class Request{

        //拿到指定頁面的uri
        public static function uri(){
            //www.doge.com/doge -> doge
            //trim -> 把擷取的uri_path前後部分的"/"都刪掉 
            return trim(
                parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'
            );
        }

        //拿到指定頁面的http的方法
        public static function method(){
            return $_SERVER['REQUEST_METHOD'];
        }
    }
?>