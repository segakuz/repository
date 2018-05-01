<?php include './assets/tpl/layouts/header_adm.php'; ?>

<div class="cabinet pb0">
    <h2 id="breadcrumb"><a href="/admin">Админпанель</a> / <a href="/admin/order">Управление заказами</a> / Просмотр заказа</h2>
</div>
<div class="admin pad-50 pt0">
    <h2 class="mgb">Просмотр заказа №
        <?= $order['id_order']; ?>
    </h2>
    <h3>Информация о заказе</h3>
    <div class="table-container mgb">
        <table>
            <tr>
                <td>Номер заказа</td>
                <td>
                    <?= $order['id_order']; ?>
                </td>
            </tr>
            <tr>
                <td>Имя клиента</td>
                <td>
                    <?= $order['user_name']; ?>
                </td>
            </tr>
            <tr>
                <td>Телефон клиента</td>
                <td>
                    <?= $order['user_phone']; ?>
                </td>
            </tr>
            <tr>
                <td>Комментарий клиента</td>
                <td>
                    <?= $order['user_comment']; ?>
                </td>
            </tr>
            <?php if ($order['id_user'] !== 0): ?>
            <tr>
                <td>ID клиента</td>
                <td>
                    <?= $order['id_user']; ?>
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <td><b>Статус заказа</b></td>
                <td>
                    <?= Order::getStatusText($order['status']); ?>
                </td>
            </tr>
            <tr>
                <td><b>Дата заказа</b></td>
                <td>
                    <?= $order['date']; ?>
                </td>
            </tr>
        </table>
    </div>
    <h3>Товары в заказе</h3>
    <div class="table-container mgb">
        <table>
            <tr>
                <th>ID товара</th>
                <th>Артикул товара</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Количество</th>
            </tr>
            <?php foreach ($products as $product): ?>
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
                <td>&#8381;
                    <?= $product['price']; ?>
                </td>
                <td>
                    <?= $productsQuantity[$product['id_product']]; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <h3 class="mgb">Сумма заказа:
        <?= $sum; ?> &#8381;
    </h3>
    <a class="btn" href="/admin/order/update/<?= $order['id_order']; ?>"><i class="fa fa-edit"></i> Редактировать</a>
    <a class="btn" href="/admin/order/">Назад к управлению заказами</a>
</div>

<?php include './assets/tpl/layouts/footer.php'; ?>
