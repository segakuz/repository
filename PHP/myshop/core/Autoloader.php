<?php

spl_autoload_register(function ($class_name) {
    //$class_name = strtolower($class_name);
	$directories = [
        'backend/views/',
        'backend/models/',
        'backend/controllers/',           
        'core/',           
        ];
    foreach($directories as $directory) {
        if(file_exists($directory.$class_name . '.php')) {
            //echo $directory.$class_name . '.php';
            //echo "</br>";
            require_once($directory.$class_name . '.php');
            //return;
        } else {
            //echo "Класс ".$class_name ." не найден.";
        }          
    }
});


/*
function __autoload($class_name)
{
    // Массив папок, в которых могут находиться необходимые классы
    $array_paths = array(
        '/models/',
        '/components/',
        '/controllers/',
    );
    // Проходим по массиву папок
    foreach ($array_paths as $path) {
        // Формируем имя и путь к файлу с классом
        $path = ROOT . $path . $class_name . '.php';
        // Если такой файл существует, подключаем его
        if (is_file($path)) {
            include_once $path;
        }
    }
}

*/