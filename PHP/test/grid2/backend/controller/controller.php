<?php

include '../model/model.php';
include '../../core/databasehandler.php';
include '../../core/config.php';

class Controller {
    
    public function adminAction() {
        $mdl = new Model();
        $res = $mdl->getUsers();
        echo json_encode($res);
    }
    
    public function addUsersAction() {
        $n = $_POST['name'];
        $l = $_POST['login'];
        $a = $_POST['age'];
        $e = $_POST['email'];
        $mdl = new Model();
        $mdl->addUsers($n, $l, $a, $e);
        
        $res = $mdl->getLastUser();
        echo json_encode($res);
    }
    
}

$route = $_POST['route'];
(!empty($route))? Controller::$route() : null;
//Controller::$route();
