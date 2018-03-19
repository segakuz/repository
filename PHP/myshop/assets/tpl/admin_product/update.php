<?php include './assets/tpl/layouts/header_adm.php'; ?>


<div>

    <br/>

    <div>
        <ol>
            <li><a href="/admin">Админпанель</a></li>
            <li><a href="/admin/product">Управление товарами</a></li>
            <li>Редактировать товар</li>
        </ol>
    </div>


    <h4>Редактировать товар №<?= $id; ?></h4>

    <br/>


        <div>
            <form action="#" method="post" enctype="multipart/form-data">

                <p>Название товара</p>
                <input type="text" name="name" placeholder="" value="<?= $product['name']; ?>">

                <p>Артикул</p>
                <input type="text" name="code" placeholder="" value="<?= $product['code']; ?>">

                <p>Стоимость, $</p>
                <input type="text" name="price" placeholder="" value="<?= $product['price']; ?>">

                <p>Категория</p>
                <select name="category_id">
                    <?php if (is_array($categoriesList)): ?>
                        <?php foreach ($categoriesList as $category): ?>
                            <option value="<?= $category['id_category']; ?>" 
                                <?php if ($product['id_category'] === $category['id_category']) echo ' selected="selected"'; ?>>
                                <?= $category['name']; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>

                <br/><br/>

                <p>Производитель</p>
                <input type="text" name="brand" placeholder="" value="<?= $product['brand']; ?>">

                <p>Изображение товара</p>
                <img src="<?= Product::getImage($product['id_product']); ?>" alt="">
                <input type="file" name="image" placeholder="" value="">

                <p>Детальное описание</p>
                <textarea name="description"><?= $product['description']; ?></textarea>

                <br/><br/>

                <p>Наличие на складе</p>
                <select name="availability">
                    <option value="1" <?php if ($product['is_available'] == 1) echo ' selected="selected"'; ?>>Да</option>
                    <option value="0" <?php if ($product['is_available'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                </select>

                <br/><br/>

                <p>Новинка</p>
                <select name="is_new">
                    <option value="1" <?php if ($product['is_new'] == 1) echo ' selected="selected"'; ?>>Да</option>
                    <option value="0" <?php if ($product['is_new'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                </select>

                <br/><br/>

                <p>Рекомендуемые</p>
                <select name="is_recommended">
                    <option value="1" <?php if ($product['is_recommended'] == 1) echo ' selected="selected"'; ?>>Да</option>
                    <option value="0" <?php if ($product['is_recommended'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                </select>

                <br/><br/>

                <p>Статус</p>
                <select name="status">
                    <option value="1" <?php if ($product['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                    <option value="0" <?php if ($product['status'] == 0) echo ' selected="selected"'; ?>>Скрыт</option>
                </select>

                <br/><br/>

                <input type="submit" name="submit" value="Сохранить">

                <br/><br/>

            </form>
        </div>
    </div>



<?php include './assets/tpl/layouts/footer.php'; ?>

