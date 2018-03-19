<?php

include "./core/Autoloader.php";
include "./core/Dump.php";

//$id = DatabaseHandler::GetOne("SELECT id_product FROM products ORDER BY id_product DESC LIMIT 1");
//dump($id);
//
//if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
//                        // Если загружалось, переместим его в нужную папке, дадим новое имя
//                        move_uploaded_file($_FILES["image"]["tmp_name"], "/assets/img/products/{$id}.jpg");
//                    }

$query = "INSERT INTO products 
                (name, code, price, id_category, brand, is_available,
                description, is_new, is_recommended, status)
                VALUES 
                (:name, :code, :price, :category_id, :brand, :availability,
                :description, :is_new, :is_recommended, :status)";

        // Получение и возврат результатов. Используется подготовленный запрос
        //$result = DatabaseHandler::Execute($query, ['name'=>'tt', 'code'=>'', 'price'=>'', 'category_id'=>7, 'brand'=>'', 'availability'=>'', 'description'=>'', 'is_new'=>'', 'is_recommended'=>'', 'status'=>'']);

        //dump($result);


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post" enctype="multipart/form-data">
    
        <p>Изображение товара</p>
        <input type="file" name="image" placeholder="" value="">
        <input type="submit" name="submit" value="Сохранить">
    </form>
</body>
</html>



    
    
    
    
    
