<?php

//Контроллер UserController
class UserController {

    //Action для страницы "Регистрация"
    public function registerAction() {
        // Переменные для формы
        $name = false;
        $email = false;
        $password1 = false;
        $password2 = false;
        $result = false;
        // Флаг ошибок
        $errors = false;
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
            // Валидация полей
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password1)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            if (!User::matchPasswords($password1, $password2)) {
                $errors[] = 'Пароли должны совпадать';
            }
            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }
            if ($errors == false) {
                // Если ошибок нет
                // Регистрируем пользователя
                $result = User::register($name, $email, $password1);
                //header("Location: /user/login");
            }
        }
        // Подключаем вид
        $data = [
            'result'=>$result,
            'errors'=>$errors,
            'name'=>$name,
            'email'=>$email,
            'password1'=>$password1
        ];
        $v = new View('user/register.php');
        $v->render($data);
        return true;
    }

    //Action для страницы "Вход на сайт"
    public function loginAction() {
        // Переменные для формы
        $email = false;
        $password = false;
        // Флаг ошибок
        $errors = false;
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $email = $_POST['email'];
            $password = $_POST['password'];
            // Валидация полей
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            // Проверяем существует ли пользователь
            $userId = User::checkUserData($email, $password);
            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                User::auth($userId);
                // Перенаправляем пользователя в закрытую часть - кабинет 
                header("Location: /cabinet");
            }
        }
        // Подключаем вид
        $data = [
            'errors'=>$errors,
            'email'=>$email,
            'password'=>$password
        ];
        $v = new View('user/login.php');
        $v->render($data);
        return true;
    }

    //Удаляем данные о пользователе из сессии
    public function logoutAction() {
        // Удаляем информацию о пользователе из сессии
        unset($_SESSION["user"]);
        // Перенаправляем пользователя на главную страницу
        header("Location: /");
    }
}
