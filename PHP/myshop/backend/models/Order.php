<?php

//Класс Order - модель для работы с заказами
class Order {

    //Сохранение заказа 
    public static function save($userName, $userPhone, $userComment, $userId, $products) {
        // Текст запроса к БД
        $query = "INSERT INTO products_order (user_name, user_phone, user_comment, id_user, products) 
                VALUES (:user_name, :user_phone, :user_comment, :id_user, :products)";
        $products = json_encode($products);
        $result = DatabaseHandler::Execute($query, ['user_name'=>$userName, 'user_phone'=>$userPhone, 'user_comment'=>$userComment, 'id_user'=>$userId, 'products'=>$products]);
        return $result;
    }

    //Возвращает список заказов
    public static function getOrdersList() {
        // Получение и возврат результатов
        $query = "SELECT id_order, user_name, user_phone, date, status FROM products_order ORDER BY id_order DESC";
        $ordersList = DatabaseHandler::GetAll($query);
        return $ordersList;
    }

    //Возвращает текстое пояснение статуса для заказа :<br/>
    //<i>1 - Новый заказ, 2 - В обработке, 3 - Доставляется, 4 - Закрыт</i>
    public static function getStatusText($status) {
        switch ($status) {
            case '1':
                return 'Новый заказ';
                break;
            case '2':
                return 'В обработке';
                break;
            case '3':
                return 'Доставляется';
                break;
            case '4':
                return 'Закрыт';
                break;
        }
    }

    //Возвращает заказ с указанным id 
    public static function getOrderById($id) {
        // Текст запроса к БД
        $query = "SELECT * FROM products_order WHERE id_order = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = DatabaseHandler::GetRow($query, ['id'=>$id]);
        // Возвращаем данные
        return $result;
    }

    //Удаляет заказ с заданным id
    public static function deleteOrderById($id) {
        // Текст запроса к БД
        $query = "DELETE FROM products_order WHERE id_order = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = DatabaseHandler::Execute($query, ['id'=>$id]);
        return $result;
    }

    //Редактирует заказ с заданным id
    public static function updateOrderById($id, $userName, $userPhone, $userComment, $date, $status) {
        // Текст запроса к БД
        $query = "UPDATE products_order
            SET 
                user_name = :user_name, 
                user_phone = :user_phone, 
                user_comment = :user_comment, 
                date = :date, 
                status = :status 
            WHERE id_order = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = DatabaseHandler::Execute($query, ['user_name'=>$userName, 'user_phone'=>$userPhone, 'user_comment'=>$userComment, 'date'=>$date, 'status'=>$status, 'id'=>$id]);
        return $result;
    }
    
    public static function getOrderByUserId($id) {
        // Текст запроса к БД
        $query = "SELECT * FROM products_order WHERE id_user = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = DatabaseHandler::GetRow($query, ['id'=>$id]);
        // Возвращаем данные
        return $result;
    }
    
    public static function getOrdersListByUserId($id) {
        // Текст запроса к БД
        $query = "SELECT * FROM products_order WHERE id_user = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = DatabaseHandler::GetAll($query, ['id'=>$id]);
        // Возвращаем данные
        return $result;
    }
}
