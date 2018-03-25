<?php

//Класс Basket
//Компонент для работы корзиной
class Basket {

    //Добавление товара в корзину (сессию)
    public static function addProduct($id) {
        // Приводим $id к типу integer
        $id = intval($id);
        // Пустой массив для товаров в корзине
        $productsInBasket = array();
        // Если в корзине уже есть товары (они хранятся в сессии)
        if (isset($_SESSION['products'])) {
            // То заполним наш массив товарами
            $productsInBasket = $_SESSION['products'];
        }
        // Проверяем есть ли уже такой товар в корзине 
        if (array_key_exists($id, $productsInBasket)) {
            // Если такой товар есть в корзине, но был добавлен еще раз, увеличим количество на 1
            $productsInBasket[$id] ++;
        } else {
            // Если нет, добавляем id нового товара в корзину с количеством 1
            $productsInBasket[$id] = 1;
        }
        // Записываем массив с товарами в сессию
        $_SESSION['products'] = $productsInBasket;
        // Возвращаем количество товаров в корзине
        return self::countItems();
    }

    //Подсчет количество товаров в корзине (в сессии)
    public static function countItems() {
        // Проверка наличия товаров в корзине
        if (isset($_SESSION['products'])) {
            // Если массив с товарами есть
            // Подсчитаем и вернем их количество
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            // Если товаров нет, вернем 0
            return 0;
        }
    }

    //Возвращает массив с идентификаторами и количеством товаров в корзине<br/>
    //Если товаров нет, возвращает false;
    public static function getProducts() {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }

    //Получаем общую стоимость переданных товаров
    public static function getTotalPrice($products) {
        // Получаем массив с идентификаторами и количеством товаров в корзине
        $productsInBasket = self::getProducts();
        // Подсчитываем общую стоимость
        $total = 0;
        if ($productsInBasket) {
            // Если в корзине не пусто
            // Проходим по переданному в метод массиву товаров
            foreach ($products as $item) {
                // Находим общую стоимость: цена товара * количество товара
                $total += $item['price'] * $productsInBasket[$item['id_product']];
            }
        }
        return $total;
    }

    //Очищает корзину
    public static function clear() {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }

    //Удаляет товар с указанным id из корзины
    public static function deleteProduct($id) {
        // Получаем массив с идентификаторами и количеством товаров в корзине
        $productsInBasket = self::getProducts();
        // Удаляем из массива элемент с указанным id
        unset($productsInBasket[$id]);
        // Записываем массив товаров с удаленным элементом в сессию
        $_SESSION['products'] = $productsInBasket;
    }
}
