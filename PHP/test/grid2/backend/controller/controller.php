<?php

class Controller {
    
    public function adminAction() {
        $mdl = new Model();
        $res = $mdl->getUsers();
        echo json_encode($res);
    }
}



function getData($x) {
    $x = $x . 'Action';
    return (string) $x;
}

$str = getData($_POST['route_data']);
echo var_dump($str), '<br>';
$str();

function adminAction() {
        $mdl = new Model();
        $res = $mdl->getUsers();
        echo json_encode($res);
    }


//$router = $_REQUEST['route_data'];
/*$router = $_POST['route_data'];
echo var_dump($router), '<br>';
$router = $router . 'Action';
echo var_dump($router), '<br>';*/
//$router = 'adminAction';
//$route = (string) $route;
//$route = $route.'Action';
//Controller::$router();
//$ctr = new Controller();
//$ctr->$str();
//echo json_encode("$router()");
//echo json_encode(gettype($route));

//$func = "Controller::" . "$router";
//$func();


