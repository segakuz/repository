<?php

//Контроллер SiteController
class SiteController {

    //Action для главной страницы
    public function indexAction() {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();
        // Список последних товаров
        $latestProducts = Product::getLatestProducts();
        // Список товаров для слайдера
        $sliderProducts = Product::getRecommendedProducts();
        // Подключаем вид
        $data = [
            'categories'=>$categories,          
            'latestProducts'=>$latestProducts,
            'sliderProducts'=>$sliderProducts
            ];
        $v = new View('site/index.php');
        $v->render($data);
        return true;
    }

    //Action для страницы "Контакты"
    public function contactAction() {
        // Переменные для формы
        $userEmail = false;
        $userText = false;
        $result = false;
        // Флаг ошибок
        $errors = false;
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена 
            // Получаем данные из формы
            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];
            // Валидация полей
            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }
            if ($errors === false) {
                // Если ошибок нет
                // Отправляем письмо администратору 
                $adminEmail = 'admin@myshop.ru';
                $message = "Текст: {$userText}. От {$userEmail}";
                $subject = 'Тема письма';
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }
        }
        // Подключаем вид
        $data = [
            'result'=>$result,
            'errors'=>$errors,
            'userEmail'=>$userEmail,
            'userText'=>$userText
        ];
        $v = new View('site/contact.php');
        $v->render($data);
        return true;
    }

    //Action для страницы "О магазине"
    public function aboutAction() {
        // Подключаем вид
        $v = new View('site/about.php');
        $v->render();
        return true;
    }
}
