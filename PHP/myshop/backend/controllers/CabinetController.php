<?php

//Контроллер CabinetController
//Кабинет пользователя
class CabinetController {

    //Action для страницы "Кабинет пользователя"
    public function indexAction() {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();
        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);
        //является ли пользователь админом
        $is_admin = User::isAdmin($user);
        // Подключаем вид
        $data = [
            'is_admin'=>$is_admin,
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
        $password1 = $user['password'];
        // Флаг ошибок
        $errors = false;
        // Флаг результата
        $result = false;
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования
            $name = $_POST['name'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
            // Валидируем значения
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!User::checkPassword($password1)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            if (!User::matchPasswords($password1, $password2)) {
                $errors[] = 'Пароли должны совпадать';
            }
            if ($errors == false) {
                // Если ошибок нет, сохраняет изменения профиля
                $result = User::edit($userId, $name, $password1);
            }
        }
        // Подключаем вид
        $data = [
            'result'=>$result,
            'errors'=>$errors,
            'name'=>$name
        ];
        $v = new View('cabinet/edit.php');
        $v->render($data);
        return true;
    }
    
    //Action для страницы просмотра заказов
    public function orderAction() {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();
        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);
        $order = Order::getOrderByUserId($userId);
        // Получаем массив с идентификаторами и количеством товаров
        $productsQuantity = json_decode($order['products'], true);
        // Получаем массив с индентификаторами товаров
        $productsIds = array_keys($productsQuantity);
        // Получаем список товаров в заказе
        $products = Product::getProductsByIds($productsIds);
        $ordersList = Order::getOrdersListByUserId($userId);
        $ordersList = array_reverse($ordersList);
        // Подключаем вид
        $data = [
            'user'=>$user,
            'order'=>$order,
            'products'=>$products,
            'productsQuantity'=>$productsQuantity,
            'productsIds'=>$productsIds,
            'ordersList'=>$ordersList
        ];
        $v = new View('cabinet/order.php');
        $v->render($data);
        return true;
    }
    
    public function viewAction($id) {
        // Получаем данные о конкретном заказе
        $order = Order::getOrderById($id);
        // Получаем массив с идентификаторами и количеством товаров
        $productsQuantity = json_decode($order['products'], true);
        // Получаем массив с индентификаторами товаров
        $productsIds = array_keys($productsQuantity);
        // Получаем список товаров в заказе
        $products = Product::getProductsByIds($productsIds);
        //стоимость заказа
        $sum = 0;
        foreach($products as $p) {
            $sum += ($p['price']*$productsQuantity[$p['id_product']]);
        }
        // Подключаем вид
        $data = [
            'order'=>$order,
            'products'=>$products,
            'productsQuantity'=>$productsQuantity,
            'sum'=>$sum
        ];
        $v = new View('cabinet/view.php');
        $v->render($data);
        return true;
    }
}






























