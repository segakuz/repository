<?php

//Контроллер AdminOrderController
//Управление заказами в админпанели
class AdminOrderController extends AdminBase {

    //Action для страницы "Управление заказами"
    public function indexAction() {
        // Проверка доступа
        self::checkAdmin();
        // Получаем список заказов
        $ordersList = Order::getOrdersList();
        // Подключаем вид
        $data = [
            'ordersList'=>$ordersList
        ];
        $v = new View('admin_order/index.php');
        $v->render($data);
        return true;
    }

    //Action для страницы "Редактирование заказа"
    public function updateAction($id) {
        // Проверка доступа
        self::checkAdmin();
        // Получаем данные о конкретном заказе
        $order = Order::getOrderById($id);
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена   
            // Получаем данные из формы
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];
            $date = $_POST['date'];
            $status = $_POST['status'];
            // Сохраняем изменения
            Order::updateOrderById($id, $userName, $userPhone, $userComment, $date, $status);
            // Перенаправляем пользователя на страницу управлениями заказами
            //header("Location: /admin/order/view/{$id}");
            header("Location: /admin/order");
        }
        // Подключаем вид
        $data = [
            'id'=>$id,
            'order'=>$order
        ];
        $v = new View('admin_order/update.php');
        $v->render($data);
        return true;
    }

    //Action для страницы "Просмотр заказа"
    public function viewAction($id) {
        // Проверка доступа
        self::checkAdmin();
        // Получаем данные о конкретном заказе
        $order = Order::getOrderById($id);
        // Получаем массив с идентификаторами и количеством товаров
        $productsQuantity = json_decode($order['products'], true);
        // Получаем массив с индентификаторами товаров
        $productsIds = array_keys($productsQuantity);
        // Получаем список товаров в заказе
        $products = Product::getProductsByIds($productsIds);
        //сумма заказа
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
        $v = new View('admin_order/view.php');
        $v->render($data);
        return true;
    }

    //Action для страницы "Удалить заказ"
    public function deleteAction($id) {
        // Проверка доступа
        self::checkAdmin();
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем заказ
            Order::deleteOrderById($id);
            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/order");
        }
        // Подключаем вид
        $data = [
            'id'=>$id
        ];
        $v = new View('admin_order/delete.php');
        $v->render($data);
        return true;
    }
}
