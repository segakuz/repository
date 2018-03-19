<?php include './assets/tpl/layouts/header_adm.php'; ?>


    <div>
        <div>

            <br/>

            <div>
                <ol>
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/order">Управление заказами</a></li>
                    <li>Просмотр заказа</li>
                </ol>
            </div>


            <h4>Просмотр заказа #<?= $order['id_order']; ?></h4>
            <br/>




            <h5>Информация о заказе</h5>
            <table>
                <tr>
                    <td>Номер заказа</td>
                    <td><?= $order['id_order']; ?></td>
                </tr>
                <tr>
                    <td>Имя клиента</td>
                    <td><?= $order['user_name']; ?></td>
                </tr>
                <tr>
                    <td>Телефон клиента</td>
                    <td><?= $order['user_phone']; ?></td>
                </tr>
                <tr>
                    <td>Комментарий клиента</td>
                    <td><?= $order['user_comment']; ?></td>
                </tr>
                <?php if ($order['id_user'] !== 0): ?>
                    <tr>
                        <td>ID клиента</td>
                        <td><?= $order['id_user']; ?></td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td><b>Статус заказа</b></td>
                    <td><?= Order::getStatusText($order['status']); ?></td>
                </tr>
                <tr>
                    <td><b>Дата заказа</b></td>
                    <td><?= $order['date']; ?></td>
                </tr>
            </table>

            <h5>Товары в заказе</h5>

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
                        <td><?= $product['id_product']; ?></td>
                        <td><?= $product['code']; ?></td>
                        <td><?= $product['name']; ?></td>
                        <td>$<?= $product['price']; ?></td>
                        <td><?= $productsQuantity[$product['id_product']]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <a href="/admin/order/update/<?= $order['id_order']; ?>">edit</a>
            <a href="/admin/order/">Назад</a>
        </div>




<?php include './assets/tpl/layouts/footer.php'; ?>

