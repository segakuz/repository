<?php

class Model {
    
    public function getUsers() {
        $query = "SELECT * FROM users";
        $result = DatabaseHandler::GetAll($query);
        if($result !== false) {
            return $result;
        } else {
            return 'nothing';
        }
    }
    
    public function addUsers($n, $l, $a, $e) {
        $query = "INSERT INTO users VALUES (null, :name, :login, :age, :email)";
        $result = DatabaseHandler::Execute($query, ['name'=>$n, 'login'=>$l, 'age'=>$a, 'email'=>$e]);
        
    }
    
    public function getLastUser() {
        $query = "SELECT * FROM users ORDER BY id_users DESC LIMIT 1";
        $result = DatabaseHandler::GetRow($query);
        return $result;
    }
}





