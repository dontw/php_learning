<?php 

    namespace App\Core;
    
    class App{

        protected static $registry = [];

        //把 $value 存在 本class $registry陣列中 key的名子為$key
        public static function bind($key, $value){

            static::$registry[$key] = $value;

        }

        
        public static function get($key){

            if(!array_key_exists($key, static::$registry)){

                throw new Exception("No {$key} is bound in the container");
            }
            return static::$registry[$key];
        }
    }
?>