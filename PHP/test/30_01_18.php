<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>30.01.2018</title>
</head>
<body>
    
</body>
</html>



<?php

//app скорее всего не работает
require_once('./database.php');

App::$DB::execute();
App::$DB->execute();

class App {
    public static $DB = 'DatabaseHandler';
    public static $app;
    
    
    public static function getInstance() {
        if(!isset(self::$app)) {
            self::$app = new self();
        }
        return self::$app;
    }
}    























