<?php

include "./core/Autoloader.php";
include "./core/Dump.php";

//ini_set('display_errors',1);
//error_reporting(E_ALL);

//В начале нашего скрипта пишем:
set_error_handler('errHandler', E_ALL);
function errHandler($errno, $errmsg, $filename, $linenum) {
    if(stripos($errmsg, 'call_user_func_array') === false) {
        $app = new App();
        $app->logger->log("Ошибка № " . $errno . " ---Текст: " . $errmsg . " ---в файле: " . $filename . " ---строка: " .   $linenum . "\r\n--------------->>>---------------");
    }
}

session_start();

$app = new App();
$app->run();

