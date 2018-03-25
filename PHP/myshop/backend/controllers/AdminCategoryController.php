<?php

//Контроллер AdminCategoryController управление категориями товаров в админпанели
class AdminCategoryController extends AdminBase {

    //Action для страницы "Управление категориями"
    public function indexAction() {
        // Проверка доступа
        self::checkAdmin();
        // Получаем список категорий
        $categories = Category::getCategoriesListAdmin();
        // Подключаем вид
        $data = [
            'categories'=>$categories
        ];
        $v = new View('admin_category/index.php');
        $v->render($data);
        return true;
    }

    //Action для страницы "Добавить категорию"
    public function createAction() {
        // Проверка доступа
        self::checkAdmin();
        // Флаг ошибок в форме
            $errors = false;
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];
            // При необходимости можно валидировать значения нужным образом
            if (!isset($name) || empty($name)) {
                $errors[] = 'Заполните поля';
            }
            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую категорию
                Category::createCategory($name, $sortOrder, $status);
                // Перенаправляем пользователя на страницу управлениями категориями
                header("Location: /admin/category");
            }
        }
        $data = [
            'errors'=>$errors
        ];
        $v = new View('admin_category/create.php');
        $v->render($data);
        return true;
    }

    //Action для страницы "Редактировать категорию"
    public function updateAction($id) {
        // Проверка доступа
        self::checkAdmin();
        // Получаем данные о конкретной категории
        $category = Category::getCategoryById($id);
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена   
            // Получаем данные из формы
            $name = $_POST['name'];
            $sortOrder = $_POST['sort_order'];
            $status = $_POST['status'];
            // Сохраняем изменения
            Category::updateCategoryById($id, $name, $sortOrder, $status);
            // Перенаправляем пользователя на страницу управлениями категориями
            header("Location: /admin/category");
        }
        // Подключаем вид
        $data = [
            'category'=>$category
        ];
        $v = new View('admin_category/update.php');
        $v->render($data);
        return true;
    }

    //Action для страницы "Удалить категорию"
    public function deleteAction($id) {
        // Проверка доступа
        self::checkAdmin();
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем категорию
            Category::deleteCategoryById($id);
            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/category");
        }
        // Подключаем вид
        $data = [
            'id'=>$id
        ];
        $v = new View('admin_category/delete.php');
        $v->render($data);
        return true;
    }
}
