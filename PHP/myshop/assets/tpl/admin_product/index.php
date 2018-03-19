<?php include './assets/tpl/layouts/header_adm.php'; ?>



    <div>
        <ol>
            <li><a href="/admin">Админпанель</a></li>
            <li>Управление товарами</li>
        </ol>
    </div>

    <a href="/admin/product/create">Добавить товар</a>

    <h4>Список товаров</h4>

    <br/>

    <table>
        <tr>
            <th>ID товара</th>
            <th>Артикул</th>
            <th>Название товара</th>
            <th>Цена</th>
            <th>Категория</th>
            <th></th>
            <th></th>
        </tr>
        <?php foreach ($productsList as $product): ?>
            <tr>
                <td><?= $product['id_product']; ?></td>
                <td><?= $product['code']; ?></td>
                <td><?= $product['name']; ?></td>
                <td><?= $product['price']; ?></td>  
                <td><?= $product['id_category']; /*Category::getCategoryById($product['id_category'])['name'];*/ ?></td>
                <td><a href="/admin/product/update/<?= $product['id_product']; ?>" title="Редактировать">edit</a></td>
                <td><a href="/admin/product/delete/<?= $product['id_product']; ?>" title="Удалить">del</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

<?php include './assets/tpl/layouts/footer.php'; ?>

