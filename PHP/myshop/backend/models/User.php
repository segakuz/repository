<?php

//модель для работы с пользователями
class User {

    //Регистрация пользователя 
    public static function register($name, $email, $password) {
        //хешируем пароль
        $password = self::hashPassword($password);
        // Текст запроса к БД
        $query = "INSERT INTO users (name, email, password) 
                VALUES (:name, :email, :password)";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = DatabaseHandler::Execute($query, ['name'=>$name, 'email'=>$email, 'password'=>$password]);
        return true;
    }

    //Редактирование данных пользователя
    public static function edit($id, $name, $password) {
        //хешируем пароль
        $password = self::hashPassword($password);
        // Текст запроса к БД
        $query = "UPDATE users 
                SET name = :name, password = :password 
                WHERE id_user = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = DatabaseHandler::Execute($query, ['id'=>$id, 'name'=>$name, 'password'=>$password]);
        return true;
    }
    
    //Редактирование данных пользователя
    public static function setAdmin($id, $role) {
        // Текст запроса к БД
        $query = "UPDATE users 
                SET role = :role 
                WHERE id_user = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = DatabaseHandler::Execute($query, ['id'=>$id, 'role'=>$role]);
        return true;
    }

    //Проверяем существует ли пользователь с заданными $email и $password
    public static function checkUserData($email, $password) {
        //хешируем пароль
        $password = self::hashPassword($password);
        // Текст запроса к БД
        $query = "SELECT * FROM users WHERE email = :email AND password = :password";
        // Получение результатов. Используется подготовленный запрос
        $result = DatabaseHandler::GetRow($query, ['email'=>$email, 'password'=>$password]);
        // Обращаемся к записи
        $user = $result;
        if ($user) {
            // Если запись существует, возвращаем id пользователя
            return $user['id_user'];
        }
        return false;
    }

    //Запоминаем пользователя
    public static function auth($userId) {
        // Записываем идентификатор пользователя в сессию
        $_SESSION['user'] = $userId;
    }

    //Возвращает идентификатор пользователя, если он авторизирован.<br/>
    //Иначе перенаправляет на страницу входа
    public static function checkLogged() {
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header("Location: /user/login");
    }

    //Проверяет является ли пользователь гостем
    public static function isGuest() {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    //Проверяет имя: не меньше, чем 2 символа
    public static function checkName($name) {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }

    //Проверяет телефон: не меньше, чем 10 символов
    public static function checkPhone($phone) {
        if (strlen($phone) >= 10) {
            return true;
        }
        return false;
    }

    //Проверяет имя: не меньше, чем 6 символов
    public static function checkPassword($password) {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    //Проверяет совпадение паролей
    public static function matchPasswords($password1, $password2) {
        return ($password1 === $password2);
    }

    
    //Проверяет email
    public static function checkEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    //Проверяет не занят ли email другим пользователем
    public static function checkEmailExists($email) {
        // Текст запроса к БД
        $query = "SELECT COUNT(*) FROM users WHERE email = :email";
        // Получение результатов. Используется подготовленный запрос
        $result = DatabaseHandler::GetOne($query, ['email'=>$email]);
        if ($result)
            return true;
        return false;
    }

    //Возвращает пользователя с указанным id
    public static function getUserById($id) {
        // Текст запроса к БД
        $query = "SELECT * FROM users WHERE id_user = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = DatabaseHandler::GetRow($query, ['id'=>$id]);
        return $result;
    }
    
    //Возвращает всех пользователей
    public static function getAllUsers() {
        // Текст запроса к БД
        $query = "SELECT * FROM users";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = DatabaseHandler::GetAll($query);
        return $result;
    }
    
    //хеш пароля
    public static function hashPassword($password) {
        return md5($password);
    }
    
    //проверка пользователя на админа
    public static function isAdmin($user) {
        if($user['role'] === 'admin') {
            return true;
        } else {
            return false;
        }
    }
    
    //удаление пользователя
    public static function deleteUser($id) {
        $query = "DELETE FROM users WHERE id_user = :id";
        $result = DatabaseHandler::Execute($query, ['id'=>$id]);
        return $result;
    }
}
