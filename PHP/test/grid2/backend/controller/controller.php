<?php

include '../model/model.php';
include '../../core/databasehandler.php';
include '../../core/config.php';

class Controller {
    
    public function getUsers() {
        $count = $_POST['count'];
        $mdl = new Model();
        $res = $mdl->getUsers($count);
        echo json_encode($res);
    }
    
    public function addUsers() {
        $n = $_POST['name'];
        $l = $_POST['login'];
        $a = $_POST['age'];
        $e = $_POST['email'];
        $mdl = new Model();
        $mdl->addUsers($n, $l, $a, $e);
        $res = $mdl->getLastUser();
        echo json_encode($res);
    }
    
    public function deleteUsers() {
        $id = $_POST['id'];
        $mdl = new Model();
        $res = $mdl->deleteUsers($id);
        echo json_encode($res);
    }
    
    public function getOneUser() {
        $id = $_POST['id'];
        $mdl = new Model();
        $res = $mdl->getOneUser($id);
        echo json_encode($res);
    }
    
    public function updateUser() {
        $id = $_POST['id'];
        $n = $_POST['name'];
        $l = $_POST['login'];
        $a = $_POST['age'];
        $e = $_POST['email'];
        $mdl = new Model();
        $res = $mdl->updateUser($id, $n, $l, $a, $e);
        echo json_encode($res);
    }
}

$route = $_POST['route'];
(!empty($route))? Controller::$route() : null;












