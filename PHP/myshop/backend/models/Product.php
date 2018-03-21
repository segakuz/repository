<?php

//Класс Product - модель для работы с товарами
class Product {

    // Количество отображаемых товаров по умолчанию
    const SHOW_BY_DEFAULT = 6;

    //Возвращает массив последних товаров
//+
    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT) {
        // Соединение с БД
        $query = "SELECT id_product, name, price, is_new FROM products 
                WHERE status = 1 ORDER BY id_product DESC 
                LIMIT {$count}";

        $productsList = DatabaseHandler::GetAll($query);
        return $productsList;
    }


    
    //Возвращает список товаров в указанной категории
//+
    public static function getProductsListByCategory($categoryId, $page = 1) {
        $limit = Product::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        // Текст запроса к БД
        $query = "SELECT id_product, name, price, is_new FROM products "
                . "WHERE status = 1 AND id_category = {$categoryId} "
                . "ORDER BY id_product ASC LIMIT {$limit} OFFSET {$offset}";

        // Используется подготовленный запрос
        $products = DatabaseHandler::GetAll($query);
        return $products;
    }

    //Возвращает продукт с указанным id
//+
    public static function getProductById($id) {
        // Текст запроса к БД
        $query = "SELECT * FROM products WHERE id_product = :id";
        // Используется подготовленный запрос
        $result = DatabaseHandler::GetRow($query, ['id'=>$id]);
        // Получение и возврат результатов
        return $result;
    }

    //Возвращаем количество товаров в указанной категории

    public static function getTotalProductsInCategory($categoryId) {
        // Текст запроса к БД
        $query = "SELECT count(id_product) AS count FROM products WHERE status= 1 AND id_category = {$categoryId}";
        // Выполнение коменды
        $result= DatabaseHandler::GetOne($query);
        return $result;
    }

    //Возвращает список товаров с указанными индентификторами

    public static function getProductsByIds($idsArray) {
//+
        // Превращаем массив в строку для формирования условия в запросе
        $idsString = implode(',', $idsArray);

        // Текст запроса к БД
        $query = "SELECT * FROM products WHERE status=1 AND id_product IN ({$idsString})";

        $products = DatabaseHandler::GetAll($query);
        return $products;
    }

    //Возвращает список рекомендуемых товаров
//+
    public static function getRecommendedProducts() {

        // Получение и возврат результатов
        $query = "SELECT id_product, name, price, is_new FROM products 
                WHERE status = 1 AND is_recommended = 1 
                ORDER BY id_product DESC";

        $productsList = DatabaseHandler::GetAll($query);
        return $productsList;
    }

    //Возвращает список товаров

    public static function getProductsList() {
//+
        // Получение и возврат результатов
        $query = "SELECT id_product, name, price, code, id_category FROM products ORDER BY id_product ASC";
        $productsList = DatabaseHandler::GetAll($query);
        return $productsList;
    }

    //Удаляет товар с указанным id
//+
    public static function deleteProductById($id) {

        // Текст запроса к БД
        $query = "DELETE FROM products WHERE id_product = :id";

        // Получение и возврат результатов. Используется подготовленный запрос

        $result = DatabaseHandler::Execute($query, ['id'=>$id]);
        return $result;
    }

    //Редактирует товар с заданным id
//+
    public static function updateProductById($id, $options) {

        // Текст запроса к БД
        $query = "UPDATE products
            SET 
                name = :name, 
                code = :code, 
                price = :price, 
                id_category = :category_id, 
                brand = :brand, 
                is_available = :availability, 
                description = :description, 
                is_new = :is_new, 
                is_recommended = :is_recommended, 
                status = :status
            WHERE id_product = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = DatabaseHandler::Execute($query, ['name'=>$options['name'], 'code'=>$options['code'], 'price'=>$options['price'], 'category_id'=>$options['category_id'], 'brand'=>$options['brand'], 'availability'=>$options['availability'], 'description'=>$options['description'], 'is_new'=>$options['is_new'], 'is_recommended'=>$options['is_recommended'], 'status'=>$options['status'], 'id'=>$id]);
        
        return $result;
    }

    //Добавляет новый товар
//+
    public static function createProduct($options) {

        // Текст запроса к БД
        $query = "INSERT INTO products 
                (name, code, price, id_category, brand, is_available,
                description, is_new, is_recommended, status)
                VALUES 
                (:name, :code, :price, :category_id, :brand, :availability,
                :description, :is_new, :is_recommended, :status)";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = DatabaseHandler::Execute($query, ['name'=>$options['name'], 'code'=>$options['code'], 'price'=>$options['price'], 'category_id'=>$options['category_id'], 'brand'=>$options['brand'], 'availability'=>$options['availability'], 'description'=>$options['description'], 'is_new'=>$options['is_new'], 'is_recommended'=>$options['is_recommended'], 'status'=>$options['status']]);
        
        
        if ($result) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            $id =  DatabaseHandler::GetOne("SELECT id_product FROM products ORDER BY id_product DESC LIMIT 1");
            //$img = $id . '.jpg';
            //DatabaseHandler::Execute("UPDATE products SET image = :img WHERE id_product = :id", ['img'=>$img, 'id'=>$id]);
            return $id;
        }
        // Иначе возвращаем 0
        return 0;
    }

    //Возвращает текстое пояснение наличия товара:<br/>
    //<i>0 - Под заказ, 1 - В наличии</i>
//+
    public static function getAvailabilityText($availability) {
        switch ($availability) {
            case '1':
                return 'В наличии';
                break;
            case '0':
                return 'Под заказ';
                break;
        }
    }

    //Возвращает путь к изображению
//+
    public static function getImage($id) {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с товарами
        $path = '/assets/img/products/';

        // Путь к изображению товара
        $pathToProductImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToProductImage;
        }

        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }
    
    public static function getCount() {
        $query = "SELECT COUNT(id_product) FROM products WHERE is_recommended = 1";
        
        $result = DatabaseHandler::GetOne($query);
        return $result;
    }

}











