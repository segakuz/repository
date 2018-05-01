<?php 
//include './core/app.php';
//session_start();
//$app = new App();

/*$url = $_SERVER[ 'REQUEST_URI' ];
$action  = basename($url);
$action2  =  trim( $url ,  '/' );

echo $url, '<br>';
echo $action, '<br>';
echo $action2, '<br>';*/

//($app->request->auth->isAuth())? $app->request->auth->getProfile()['name'] : 'guest'; 

//$name = $app->request->auth->getName();
//$name = UserProfile::getName();

/*
echo $name, '<br>';
echo '<pre>';
print_r ($name);
echo '<br>';
var_export($name);
echo '</pre>';
*/

include 'core/databasehandler.php';
$query = 'SELECT * FROM authorization WHERE login=:login AND password=:password';
$login = 'guest';
$password = '5f4dcc3b5aa765d61d8327deb882cf99';
$result = DatabaseHandler::GetRow($query, ['login'=>$login, 'password'=>$password]);
var_dump($result);
CREATE TABLE IF NOT EXISTS `mydb`.`auth` (
  `id_auth` INT NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `login` VARCHAR(45) NOT NULL,
  `password` VARCHAR(8) NOT NULL,
  `dt_create` DATETIME NOT NULL,
  `is_valid` TINYINT NOT NULL,
  PRIMARY KEY (`id_auth`),
  UNIQUE INDEX `login_UNIQUE` USING BTREE (`login` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Таблица авторизации'