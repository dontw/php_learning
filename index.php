<?php
    //自動用composer load 所有class 
    require 'vendor/autoload.php';

    //讀入config檔 讀入database設定 設定view函式
    require "core/bootstrap.php";

    //使用 Router, Request class
    use App\Core\{Router, Request};


    //1. 用Router Class的load方法取得有routes.php值的Router物件
    //2. 拿到目前頁面 uri 的值 及 方法 ex: ('doge','get')
    //3. 用Router Class 的direct方法 取的uri的controller
    Router::load('app/routes.php') -> direct(Request::uri(), Request::method());
 ?>