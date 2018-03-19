<?php

//Контроллер CabinetController
//Кабинет пользователя

class CabinetController {

    //Action для страницы "Кабинет пользователя"
//+
    public function indexAction() {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);

        // Подключаем вид
        $data = [
            'user'=>$user
        ];
        $v = new View('cabinet/index.php');
        $v->render($data);
        return true;
    }

    //Action для страницы "Редактирование данных пользователя"

    public function editAction() {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);

        // Заполняем переменные для полей формы
        $name = $user['name'];
        $password = $user['password'];

        // Флаг результата
        $result = false;

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования
            $name = $_POST['name'];
            $password = $_POST['password'];

            // Флаг ошибок
            $errors = false;

            // Валидируем значения
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            if ($errors === false) {
                // Если ошибок нет, сохраняет изменения профиля
                $result = User::edit($userId, $name, $password);
            }
        }

        // Подключаем вид
        $data = [
            'result'=>$result,
            'errors'=>$errors,
            'name'=>$name,
            'password'=>$password
        ];
        $v = new View('cabinet/edit.php');
        $v->render($data);
        return true;
    }

}
