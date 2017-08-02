<?php
    //使用用App\Core中的App Class
    use App\Core\App;

    //將config.php(陣列)的值 塞到App class 中的 $registry['config']中
    App::bind('config', require 'config.php');

    //將建立的物件塞到新的QueryBuilder物件，
    //再將QueryBuilder物件塞到App物件中的$registry['database']中
    App::bind('database', new QueryBuilder(
        //由App::get取出DB設定檔，並建立PDO物件
        Connection::make(App::get('config')['database'])
    ));

    //定義controller 要返回的view
    function view($name, $data){

        extract($data);
        //['name'=>'doge','sound'=>'wow']
        //$name = 'doge';
        //$sound = 'wow';

        return require "app/views/{$name}.view.php";
    }
?>