<?php

//Контроллер ProductController
//Товар

class ProductController {

    //Action для страницы просмотра товара
//+
    public function viewAction($productId) {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();

        // Получаем инфомрацию о товаре
        $product = Product::getProductById($productId);

        // Подключаем вид
        $data = [
            'categories'=>$categories,
            'product'=>$product
        ];
        
        $v = new View('product/view.php');
        $v->render($data);
        return true;
    }

}
