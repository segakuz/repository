<?php

//Контроллер CartController
//Корзина
class BasketController {

    //Action для добавления товара в корзину синхронным запросом
    public function addAction($id) {
        // Добавляем товар в корзину
        Basket::addProduct($id);
        // Возвращаем пользователя на страницу с которой он пришел
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }

    //Action для добавления товара в корзину при помощи асинхронного запроса (ajax)
    public function addAjaxAction($id) {
        // Добавляем товар в корзину и печатаем результат: количество товаров в корзине
        echo Basket::addProduct($id);
        return true;
    }

    //Action для добавления товара в корзину синхронным запросом
    public function deleteAction($id) {
        // Удаляем заданный товар из корзины
        Basket::deleteProduct($id);
        // Возвращаем пользователя в корзину
        header("Location: /basket");
    }

    //Action для страницы "Корзина"
    public function indexAction() {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();
        // Получим идентификаторы и количество товаров в корзине
        $productsInBasket = Basket::getProducts();
        //инициализация переменных
        $products = false;
        $totalPrice = false;
        if ($productsInBasket) {
            // Если в корзине есть товары, получаем полную информацию о товарах для списка
            // Получаем массив только с идентификаторами товаров
            $productsIds = array_keys($productsInBasket);
            // Получаем массив с полной информацией о необходимых товарах
            $products = Product::getProductsByIds($productsIds);
            // Получаем общую стоимость товаров
            $totalPrice = Basket::getTotalPrice($products);
        }
        // Подключаем вид
        $data = [
            'categories'=>$categories,
            'productsInBasket'=>$productsInBasket,
            'products'=>$products,
            'totalPrice'=>$totalPrice
        ];
        $v = new View('basket/index.php');
        $v->render($data);
        return true;
    }

    //Action для страницы "Оформление покупки"
    public function checkoutAction() {
        // Получием данные из корзины      
        $productsInBasket = Basket::getProducts();
        // Если товаров нет, отправляем пользователи искать товары на главную
        if ($productsInBasket == false) {
            header("Location: /");
        }
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();
        // Находим общую стоимость
        $productsIds = array_keys($productsInBasket);
        $products = Product::getProductsByIds($productsIds);
        $totalPrice = Basket::getTotalPrice($products);
        // Количество товаров
        $totalQuantity = Basket::countItems();
        // Поля для формы
        $userName = false;
        $userPhone = false;
        $userComment = false;
        // Флаг ошибок
        $errors = false;
        // Статус успешного оформления заказа
        $result = false;
        // Проверяем является ли пользователь гостем
        if (!User::isGuest()) {
            // Если пользователь не гость
            // Получаем информацию о пользователе из БД
            $userId = User::checkLogged();
            $user = User::getUserById($userId);
            $userName = $user['name'];
        } else {
            // Если гость, поля формы останутся пустыми
            $userId = false;
        }
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];
            // Валидация полей
            if (!User::checkName($userName)) {
                $errors[] = 'Неправильное имя';
            }
            if (!User::checkPhone($userPhone)) {
                $errors[] = 'Неправильный телефон';
            }
            if ($errors == false) {
                // Если ошибок нет
                // Сохраняем заказ в базе данных
                $result = Order::save($userName, $userPhone, $userComment, $userId, $productsInBasket);
                if ($result) {
                    // Если заказ успешно сохранен
                    // Оповещаем администратора о новом заказе по почте                
                    $adminEmail = 'admin@myshop.ru';
                    $message = '<a href="/admin/orders">Список заказов</a>';
                    $subject = 'Новый заказ!';
                    mail($adminEmail, $subject, $message);
                    // Очищаем корзину
                    Basket::clear();
                }
            }
        }
        // Подключаем вид
        $data = [
            'categories'=>$categories,
            'result'=>$result,
            'totalQuantity'=>$totalQuantity,
            'totalPrice'=>$totalPrice,
            'errors'=>$errors,
            'userName'=>$userName,
            'userPhone'=>$userPhone,
            'userComment'=>$userComment
        ];
        $v = new View('basket/checkout.php');
        $v->render($data);
        return true;
    }
}
