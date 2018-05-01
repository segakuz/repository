<?php include './assets/tpl/layouts/header.php'; ?>


<div class="cabinet">
    <h2 id="breadcrumb" class="mgb">
        <a href="/cabinet/">Кабинет</a> / <a href="/cabinet/order">Список заказов</a> / Заказ №
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
                <td>
                    <?= $product['price']; ?> &#8381;
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
    <a href="/cabinet/order"><i class="fa fa-eye"></i> Назад к просмотру заказов</a>
</div>




<?php include './assets/tpl/layouts/footer.php'; ?>
