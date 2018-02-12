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
    
}





