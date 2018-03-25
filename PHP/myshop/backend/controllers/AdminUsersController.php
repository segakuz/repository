<?php

//Контроллер AdminUsersController 
class AdminUsersController extends AdminBase {

    //Action для стартовой страницы "Панель администратора"
    public function indexAction() {
        // Проверка доступа
        self::checkAdmin();
        //получаем список всех пользователей
        $users = User::getAllUsers();
        // Подключаем вид
        $data = [
            'users'=>$users
        ];
        $v = new View('admin_users/index.php');
        $v->render($data);
        return true;
    }
    
    public function updateAction($id) {
        // Проверка доступа
        self::checkAdmin();
        //получаем данные пользователя
        $user = User::getUserById($id);
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена   
            // Получаем данные из формы
            $name = $_POST['name'];
            $email = $_POST['email'];
            $role = $_POST['role'];
            // Сохраняем изменения
            User::setAdmin($id, $role);
            // Перенаправляем пользователя на страницу управлениями пользователями
            header("Location: /admin/users");
        }
        // Подключаем вид
        $data = [
            'user'=>$user
        ];
        $v = new View('admin_users/update.php');
        $v->render($data);
        return true;
    }
    
    public function deleteAction($id) {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена   
            // Удаляем
            User::deleteUser($id);
            // Перенаправляем пользователя на страницу управлениями пользователями
            header("Location: /admin/users");
        }
        // Подключаем вид
        $data = [
            'id'=>$id
        ];
        $v = new View('admin_users/delete.php');
        $v->render($data);
        return true;
    }
}