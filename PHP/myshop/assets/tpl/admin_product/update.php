<?php include './assets/tpl/layouts/header_adm.php'; ?>

<div class="cabinet pb0">
    <h2 id="breadcrumb"><a href="/admin">Админпанель</a> / <a href="/admin/product">Управление товарами</a> / Редактировать товар</h2>
</div>
<div class="admin pad-50 pt0">
    <h2>Редактирование товара №
        <?= $id; ?>
    </h2>
    <div class="container">
        <form action="#" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-25">
                    <label for="name">Название товара</label>
                </div>
                <div class="col-75">
                    <input type="text" name="name" placeholder="" value="<?= $product['name']; ?>" id="name"></div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="code">Артикул</label>
                </div>
                <div class="col-75">
                    <input type="text" name="code" placeholder="" value="<?= $product['code']; ?>" id="code" />
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="price">Стоимость, &#8381;</label>
                </div>
                <div class="col-75">
                    <input type="text" name="price" placeholder="" value="<?= $product['price']; ?>" id="price">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="category_id">Категория</label>
                </div>
                <div class="col-75">
                    <select name="category_id" id="category_id">
                    <?php if (is_array($categoriesList)): ?>
                        <?php foreach ($categoriesList as $category): ?>
                            <option value="<?= $category['id_category']; ?>" 
                                <?php if ($product['id_category'] === $category['id_category']) echo ' selected="selected"'; ?>>
                                <?= $category['name']; ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select></div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="brand">Производитель</label>
                </div>
                <div class="col-75">
                    <input type="text" name="brand" placeholder="" value="<?= $product['brand']; ?>" id="brand">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="image">Изображение товара</label>
                </div>
                <div class="col-75">
                    <img src="<?= Product::getImage($product['id_product']); ?>" alt="">
                    <input type="file" name="image" placeholder="" value="" id="image">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="description">Детальное описание</label>
                </div>
                <div class="col-75">
                    <textarea name="description" id="description"><?= $product['description']; ?></textarea></div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="availability">Наличие на складе</label>
                </div>
                <div class="col-75">
                    <select name="availability" id="availability">
                    <option value="1" <?php if ($product['is_available'] == 1) echo ' selected="selected"'; ?>>Да</option>
                    <option value="0" <?php if ($product['is_available'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                </select></div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="is_new">Новинка</label>
                </div>
                <div class="col-75">
                    <select name="is_new" id="is_new">
                    <option value="1" <?php if ($product['is_new'] == 1) echo ' selected="selected"'; ?>>Да</option>
                    <option value="0" <?php if ($product['is_new'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                </select></div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="is_recommended">Рекомендуемые</label>
                </div>
                <div class="col-75">
                    <select name="is_recommended" id="is_recommended">
                    <option value="1" <?php if ($product['is_recommended'] == 1) echo ' selected="selected"'; ?>>Да</option>
                    <option value="0" <?php if ($product['is_recommended'] == 0) echo ' selected="selected"'; ?>>Нет</option>
                </select></div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="status">Статус</label>
                </div>
                <div class="col-75">
                    <select name="status" id="status">
                    <option value="1" <?php if ($product['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                    <option value="0" <?php if ($product['status'] == 0) echo ' selected="selected"'; ?>>Скрыт</option>
                </select></div>
            </div>
            <div class="row">
                <input type="submit" name="submit" value="Сохранить">
            </div>
        </form>
    </div>
</div>



<?php include './assets/tpl/layouts/footer.php'; ?>
