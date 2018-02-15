<?php

class Model {
    
    public function getUsers($xxx) {
        $num = $xxx*10;
        //$query = "SELECT * FROM users LIMIT " . +$num . ", 10";
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
    
    public function deleteUsers($id) {
        $query1 = "SELECT name FROM users WHERE id_users=:id";
        $result1 = DatabaseHandler::GetRow($query1, ['id'=>$id]);
        
        $query = "DELETE FROM users WHERE id_users=:id";
        $result = DatabaseHandler::Execute($query, ['id'=>$id]);
        return $result1;
    } 
    
    public function getOneUser($id) {
        $query = "SELECT * FROM users WHERE id_users=:id";
        $result = DatabaseHandler::GetRow($query, ['id'=>$id]);
        return $result;
    } 
    
    public function updateUser($id, $n, $l, $a, $e) {
        $query1 = "UPDATE users SET name=:name, login=:login, age=:age, email=:email WHERE id_users=:id";
        $result1 = DatabaseHandler::Execute($query1, ['id'=>$id, 'name'=>$n, 'login'=>$l, 'age'=>$a, 'email'=>$e]);
        
        $query2 = "SELECT * FROM users WHERE id_users=:id";
        $result2 = DatabaseHandler::GetRow($query2, ['id'=>$id]);
        return $result2;
    }
}




























