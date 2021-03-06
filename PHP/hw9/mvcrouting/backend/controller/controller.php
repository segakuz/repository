<?php

class Controller {
    public function indexAction() {
        //главная
        $model = new Model();
        $mdl = $model->getAllPages();
        
        //$app = new App();
        //$app->logger->log('получили все страницы в index');

        $v = new View('template.php');
        $v->render($mdl);
    }
    
    public function adminAction($id) {
        //админка
        if(!empty($id)) {
            $model = new Model();
            $data = $model->getPage($id);
            
            $app = new App();
            $app->logger->log('переход в admin');
            
            $v = new View('admin.php');
            $v->render($data);
        } else {
            $v = new View('admin.php');
            $v->render($nothing);
        }
    }
    
    public function addAction() {
        //добавление страницы
        $app = new App();
        $title = $app->request->input->get('page_name');
        $text = $app->request->input->get('page_content');
        $model = new Model();
        $model->addPage($title, $text);

        $app->logger->log('добавление записи add');
        
        header("Location: index");
    }
    
    public function delAction($id) {
        //удаление страницы
        //if($_SESSION['auth'] === true) {
            $model = new Model();
            $model->delPage($id);
        
        $app = new App();
        $app->logger->log('удаление записи delete');
        
        //}
        header("Location: index");
    }
    
    public function editAction($id) {
        //редактирование
        $app = new App();
        $title = $app->request->input->get('page_name');
        $text = $app->request->input->get('page_content');
        $model = new Model();
        $model->editPage($id, $title, $text);
        
        $app->logger->log('редактирование записи edit');
        
        header("Location: index");
    }
    
    public function getAction($id) {
        //echo 'получение страницы';
        $model = new Model();
        $mdl = $model->getPage($id);
        $v = new View('template.php');
        $v->render($mdl);
    }
    
    public function authAction() {
        //страница авторизации
        
        $app = new App();
        $app->logger->log('переход на страницу авторизации');
        
        $v = new View('login.php');
        $v->render($nothing);
    }
    
    public function checkAction() {
        //проверка авторизации
        $app = new App();
        if($app->request->input->get('login') && $app->request->input->get('password') && $app->request->input->get('login_submit')) {
            $login = $app->request->input->get('login');
            $psw = $app->request->input->get('password');
            $app->request->auth->init($login, $psw);
            if($app->request->auth->verification()) {
$app->logger->log('на сайт вошел ' . $login);
                header("Location: index");
            } else {
                header("Location: auth");
            }
        }
    }
    
    public function logoutAction() {
        //выход из учетной записи
        $app = new App();
        $app->request->auth->logout();
        header("Location: index");
    }
    
    public function regformAction() {
        //страница регистрации
        
        $app = new App();
        $app->logger->log('переход на страницу регистрации');
        
        $v = new View('registration.php');
        $v->render($nothing);
    }
    
    public function registrationAction() {
        //регистрация пользователя
        $app = new App();
        $username = $app->request->input->get('username');
        $login = $app->request->input->get('login');
        $psw1 = $app->request->input->get('password1');
        $psw2 = $app->request->input->get('password2');
        
        if($app->request->registration->init($username, $login, $psw1, $psw2)) {
            $app->request->registration->addUser();
            $v = new View('login.php');
            $v->render($username);
        } else {
            $v = new View('registration.php');
            $v->render([$username, $login]);
        }
    }
}

















