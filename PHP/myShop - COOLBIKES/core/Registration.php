<?php

class Registration {
    private $username;
    private $login;
    private $password;
    
    public function __construct() {
    }
    
    public function init($username, $login, $password1, $password2) {
        if($this->pswMatch($password1, $password2)) {
            $this->username = $username;
            $this->login = $login;
            $this->password = $this->hashPsw($password1);
            return true;
        } else {
            return false;
        }
    }
    
    public function hashPsw ($password) {
        return md5($password);
    }
    
    public function pswMatch ($password1, $password2) {
        return $password1 === $password2;
    }
    
    public function addUser() {
        $query = 'INSERT INTO authorization VALUES (null, :username, :login, :password)';
        try {
            $result = DatabaseHandler::Execute($query, ['username'=>$this->username, 'login'=>$this->login, 'password'=>$this->password]);
        } catch (Exception $e) {
            $app = new App();
            $app->logger->log('Не отработал reg->addUser ' . $e->getMessage());
        }
        
    }
}
















