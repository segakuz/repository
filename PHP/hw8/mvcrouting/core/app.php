<?php

//include './backend/controller/controller.php';
//include './backend/model/model.php';
//include './backend/view/view.php';
//include "../config.php";

/*class App {
   public static function run() {
   	$controller = $_GET['controller'];
   	$action = $_GET['action'];
   	var_dump($action);
   	$ctr  = new $controller();
    $ctr->$action();
   }
}*/

include './core/helper.php';
include './core/autoloader.php';

class App {
    public static function run() {
        $ctr  = new Controller();
        $url = $_SERVER[ 'REQUEST_URI' ];
        $action  = basename($url);
        //$action  =  trim( $url ,  '/' );
        if(strcasecmp($action, 'mvcrouting') === 0) {
            $route = 'indexAction';
            $ctr->$route();
        } else {
            $data_arr = explode('?',$action);
            $route = $data_arr[0] . 'Action';
            $ctr->$route($data_arr[1]);
        }
    }
}









