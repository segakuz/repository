<?php

//Контроллер ProductController
//Товар
class ProductController {

    //Action для страницы просмотра товара
    public function viewAction($productId) {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();
        // Получаем инфомрацию о товаре
        $product = Product::getProductById($productId);
        //категория товара
        $prod_category = Category::getCategoryById($product['id_category']);
        // Подключаем вид
        $data = [
            'categories'=>$categories,
            'prod_category'=>$prod_category,
            'product'=>$product
        ];
        $v = new View('product/view.php');
        $v->render($data);
        return true;
    }
}
