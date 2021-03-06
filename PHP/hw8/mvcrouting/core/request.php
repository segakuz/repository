<?php

/* объединяем get и post через merge */

class Request {
    public $input; //это get и post
    public $server;
    public $session;

    function __construct() {
        $this->input = new Input(); 
        $this->server = new Server();
        $this->session = new Session();
    }
}

class Session {
    private $session;

    function __construct() {
        $this->session = $_SESSION;
    }

    function get($key) {
        //проверка установлен ли ключ isset() ? null;
        $result = (isset($key))? $this->session[$key] : null;
        return $result;
    }

    function set($key, $value) {
        $this->session[$key] = $value;
    } 
}

class Input {
    private $input;

    function __construct() {
        $this->input = array_merge($_GET, $_POST);
    }

    function get($key) {
        //проверка установлен ли ключ isset() ? null;
        $result = (isset($key))? $this->input[$key] : null;
        return $result;
    }

    function set($key, $value) {
        $this->input[$key] = $value;
    }
}


class Server {
    private $server;

    function __construct() {
        $this->server = $_SERVER;
    }

    function get($key) {
        //проверка установлен ли ключ isset() ? null;
        $result = (isset($key))? $this->server[$key] : null;
        return $result;
    }

    function set($key, $value) {
        $this->server[$key] = $value;
    }
}

class Application {
    public $request;
    public $logger;
    public $response;

    function __construct() {
        $this->request = new Request();
    }

    function run() {
        //автозагрузка
    }
}

/*$rq = new Request();
$rq->session->get/set();
$rq->input->get();*/

//$app = new Application();
//$app->request->input->set(xxx, 1135430);
//echo $app->request->input->get(xxx); //$_SERVER['SCRIPT_NAME']


session_start();

class UserModel {
    public function getUser($login, $password) {
        //запрос к данным для нахождения пользователя в системе
        //возвращает массив с набором свойств
        return ['login'=>'Vasya', 'phone'=>'89111232343', 'email'=>'example@mail.ru', 'role'=>'admin'];
    }
}

class UserProfile {
    private $login;
    private $password;
    private $name;
    private $phone;
    private $email;
    private $role;
    
    public function __construct($user) {
        foreach($user as $key=>$value) {
            $this->$key = $value;
        }
    }
}

class Auth {
    private $login;
    private $password;
    private $user;    
    
    public function __construct($login, $password) {
        $this->login = $login;
        $this->password = hashPsw($password); 
    }
    
    public function hashPsw ($password) {
        return md5($password);
    }
    
    public function verification() {
        $mdl = new UserModel();
        $result = $mdl->getUser($this->login, $this->password);
        if(count($result) !== 0) {
            $this->user = new UserProfile($result);
            $_SESSION['auth'] = true;
            $_SESSION['profile'] = $this->user;
        } else {
            echo 'ошибка';
        }
    }
    
    public function logout() {
        unset($_SESSION['auth']);
        unset($_SESSION['profile']);
    }
    
    public function isAuth() {
        return (isset($_SESSION['auth']));
    }
    
    public function getProfile() {
        return (isset($_SESSION['profile']))?$_SESSION['profile'] : null;
    }
}

$login = App::Request->input->get('login');
$psw = App::Request->input->get('password');


$auth = new Auth($login, $psw);
$auth->verification();