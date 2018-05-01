<?php include './assets/tpl/layouts/header_adm.php'; ?>

<div class="cabinet pb0">
    <h2 id="breadcrumb"><a href="/admin">Админпанель</a> / Управление товарами</h2>
</div>
<div class="admin pad-50 pt0">
    <a class="btn" href="/admin/product/create">Добавить товар</a>
    <h4>Список товаров</h4>
    <div class="table-container">
        <table>
            <tr>
                <th>ID товара</th>
                <th>Артикул</th>
                <th>Название товара</th>
                <th>Цена</th>
                <th>Категория</th>
                <th>Редактировать</th>
                <th>Удалить</th>
            </tr>
            <?php foreach ($productsList as $product): ?>
            <tr>
                <td>
                    <?= $product['id_product']; ?>
                </td>
                <td>
                    <?= $product['code']; ?>
                </td>
                <td>
                    <?= $product['name']; ?>
                </td>
                <td>
                    <?= $product['price']; ?>
                </td>
                <td>
                    <?= $product['id_category']; /*Category::getCategoryById($product['id_category'])['name'];*/ ?>
                </td>
                <td><a href="/admin/product/update/<?= $product['id_product']; ?>" title="Редактировать" class="edit"><i class="fa fa-edit"></i></a></td>
                <td><a href="/admin/product/delete/<?= $product['id_product']; ?>" title="Удалить" class="del"><i class="fa fa-times"></i></a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

<?php include './assets/tpl/layouts/footer.php'; ?>
