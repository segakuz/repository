<?php

//Контроллер AdminProductController
//Управление товарами в админпанели
class AdminProductController extends AdminBase {

    //Action для страницы "Управление товарами"
    public function indexAction() {
        // Проверка доступа
        self::checkAdmin();
        // Получаем список товаров
        $productsList = Product::getProductsList();
        $productsList = array_reverse($productsList);
        // Подключаем вид
        $data = [
            'productsList'=>$productsList
        ];
        $v = new View('admin_product/index.php');
        $v->render($data);
        return true;
    }

    //Action для страницы "Добавить товар"
    public function createAction() {
        // Проверка доступа
        self::checkAdmin();
        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();
        // Флаг ошибок в форме
        $errors = false;
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];
            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните поля';
            }
            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новый товар
                $id = Product::createProduct($options);
                // Если запись добавлена
                if ($id) {
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image"]["tmp_name"], "assets/img/products/{$id}.jpg");
                    }
                };
                // Перенаправляем пользователя на страницу управлениями товарами
                header("Location: /admin/product");
            }
        }
        // Подключаем вид
        $data = [
            'errors'=>$errors,
            'categoriesList'=>$categoriesList
        ];
        $v = new View('admin_product/create.php');
        $v->render($data);
        return true;
    }

    //Action для страницы "Редактировать товар"
    public function updateAction($id) {
        // Проверка доступа
        self::checkAdmin();
        // Получаем список категорий для выпадающего списка
        $categoriesList = Category::getCategoriesListAdmin();
        // Получаем данные о конкретном заказе
        $product = Product::getProductById($id);
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['name'] = $_POST['name'];
            $options['code'] = $_POST['code'];
            $options['price'] = $_POST['price'];
            $options['category_id'] = $_POST['category_id'];
            $options['brand'] = $_POST['brand'];
            $options['availability'] = $_POST['availability'];
            $options['description'] = $_POST['description'];
            $options['is_new'] = $_POST['is_new'];
            $options['is_recommended'] = $_POST['is_recommended'];
            $options['status'] = $_POST['status'];
            // Сохраняем изменения
            if (Product::updateProductById($id, $options)) {
                // Если запись сохранена
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                   move_uploaded_file($_FILES["image"]["tmp_name"], "assets/img/products/{$id}.jpg");
                }
            }
            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/product");
        }
        // Подключаем вид
        $data = [
            'id'=>$id,
            'product'=>$product,
            'categoriesList'=>$categoriesList
        ];
        $v = new View('admin_product/update.php');
        $v->render($data);
        return true;
    }

    //Action для страницы "Удалить товар"
    public function deleteAction($id) {
        // Проверка доступа
        self::checkAdmin();
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем товар
            Product::deleteProductById($id);
            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/product");
        }
        // Подключаем вид
        $data = [
            'id'=>$id
        ];
        $v = new View('admin_product/delete.php');
        $v->render($data);
        return true;
    }
}
