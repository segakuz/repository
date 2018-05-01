<?php

//Класс Category - модель для работы с категориями товаров
class Category {

    //Возвращает массив категорий для списка на сайте
    public static function getCategoriesList() {
        // Соединение с БД
        $query = "SELECT id_category, name 
                FROM categories 
                WHERE status = 1 ORDER BY sort_order, name ASC";
        // Получение и возврат результатов
        $categories = DatabaseHandler::GetAll($query);
        return $categories;
    }

    //Возвращает массив категорий для списка в админпанели <br/>
    //(при этом в результат попадают и включенные и выключенные категории)
    public static function getCategoriesListAdmin() {
        // Запрос к БД
        $query = "SELECT id_category, name, sort_order, status 
                FROM categories ORDER BY sort_order ASC";
        // Получение и возврат результатов
        $categories = DatabaseHandler::GetAll($query);
        return $categories;
    }

    //Удаляет категорию с заданным id
    public static function deleteCategoryById($id) {
        // Текст запроса к БД
        $query = "DELETE FROM categories WHERE id_category = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = DatabaseHandler::Execute($query, ['id'=>$id]);
        return $result;
    }

    //Редактирование категории с заданным id
    public static function updateCategoryById($id, $name, $sortOrder, $status) {
        // Текст запроса к БД
        $query = "UPDATE categories
                SET 
                    name = :name, 
                    sort_order = :sort_order, 
                    status = :status
                WHERE id_category = :id";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = DatabaseHandler::Execute($query, ['name'=>$name, 'sort_order'=>$sortOrder, 'status'=>$status, 'id'=>$id]);
        return $result;
    }

    //Возвращает категорию с указанным id
    public static function getCategoryById($id) {
        // Текст запроса к БД
        $query = "SELECT * FROM categories WHERE id_category = :id";
        // Используется подготовленный запрос
        $result = DatabaseHandler::GetRow($query, ['id'=>$id]);
        // Возвращаем данные
        return $result;
    }

    //Возвращает текстое пояснение статуса для категории :<br/>
    //<i>0 - Скрыта, 1 - Отображается</i>
    public static function getStatusText($status) {
        switch ($status) {
            case '1':
                return 'Отображается';
                break;
            case '0':
                return 'Скрыта';
                break;
        }
    }

    //Добавляет новую категорию
    public static function createCategory($name, $sortOrder, $status) {
        // Текст запроса к БД
        $query = "INSERT INTO categories (name, sort_order, status) 
                VALUES (:name, :sort_order, :status)";
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = DatabaseHandler::Execute($query, ['name'=>$name, 'sort_order'=>$sortOrder, 'status'=>$status]);
        return $result;
    }
}










