<?php

//Контроллер AdminController Главная страница в админпанели
class AdminController extends AdminBase {

    //Action для стартовой страницы "Панель администратора"
    public function indexAction() {
        // Проверка доступа
        self::checkAdmin();
        // Подключаем вид
        $v = new View('admin/index.php');
        $v->render();
        return true;
    }
}
