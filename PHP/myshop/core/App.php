<?php

//include './core/autoloader.php';
//include './core/helper.php';

class App {
    public $request;
    public $logger;
    //public $response;
    private $routes;
    
    function __construct() {
        $this->request = new Request();
        $this->logger = new Logger('myshop', 'logs/logs.txt');
        $this->routes = include('./config/routes.php');
    }
    
    private function getURI() {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
    
    public function run() {
        // Получаем строку запроса
        $uri = $this->getURI();
        // Проверяем наличие такого запроса в массиве маршрутов (routes.php)
        foreach ($this->routes as $uriPattern => $path) {
            // Сравниваем $uriPattern и $uri
            if (preg_match("~$uriPattern~", $uri)) {
                // Получаем внутренний путь из внешнего согласно правилу.
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                // Определить контроллер, action, параметры
                $segments = explode('/', $internalRoute);
                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);
                $actionName = array_shift($segments) . 'Action';
                $parameters = $segments;
                // Подключить файл класса-контроллера
                $controllerFile = './backend/controllers/' . $controllerName . '.php';
//                if (file_exists($controllerFile)) {
//                    include_once($controllerFile);
//                }
                // Создать объект, вызвать метод (т.е. action)
                $controllerObject = new $controllerName();
                //Вызываем необходимый метод ($actionName) у определенного 
                //класса ($controllerObject) с заданными ($parameters) параметрами

                //$result = $controllerObject->$actionName($parameters);
                $result = @call_user_func_array(array($controllerObject, $actionName), $parameters);
                
                // Если метод контроллера успешно вызван, завершаем работу роутера
                if ($result != null) {
                    break;
                }
            }
        }
    }
    

}








