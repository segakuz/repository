<?php

//Контроллер CatalogController
//Каталог товаров

class CatalogController {

    //Action для страницы "Каталог товаров"
//+
    public function indexAction() {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();
        // Список последних товаров
        $latestProducts = Product::getLatestProducts(12);
        // Подключаем вид
        $data = [
            'categories'=>$categories,          
            'latestProducts'=>$latestProducts
            ];
        $v = new View('catalog/index.php');
        $v->render($data);
        return true;
    }

    //Action для страницы "Категория товаров"
//+
    public function categoryAction($categoryId, $page = 1) {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();

        // Список товаров в категории
        $categoryProducts = Product::getProductsListByCategory($categoryId, $page);

        // Общее количетсво товаров (необходимо для постраничной навигации)
        $total = Product::getTotalProductsInCategory($categoryId);

        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        // Подключаем вид
        $data = [
            'categories'=>$categories,
            'categoryProducts'=>$categoryProducts,
            'pagination'=>$pagination
        ];
        $v = new View('catalog/category.php');
        $v->render($data);
        return true;
    }

}
