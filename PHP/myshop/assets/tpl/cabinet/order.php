<?php include './assets/tpl/layouts/header.php'; ?>

<div class="cabinet">

    <h2 id="breadcrumb"><a href="/cabinet/">Кабинет</a> / Заказы пользователя
        <?= $user['name']; ?>
    </h2>
    <div class="table-container mgb">
        <table>
            <tr>
                <th>ID заказа</th>
                <th>Имя покупателя</th>
                <th>Телефон покупателя</th>
                <th>Дата оформления</th>
                <th>Статус</th>
                <th></th>
            </tr>

            <?php foreach ($ordersList as $order): ?>
            <tr>
                <td>
                    <a href="/cabinet/order/view/<?= $order['id_order']; ?>">
                        <?= $order['id_order']; ?>
                    </a>
                </td>
                <td>
                    <?= $order['user_name']; ?>
                </td>
                <td>
                    <?= $order['user_phone']; ?>
                </td>
                <td>
                    <?= $order['date']; ?>
                </td>
                <td>
                    <?= Order::getStatusText($order['status']); ?>
                </td>
                <td><a href="/cabinet/order/view/<?= $order['id_order']; ?>" title="Смотреть">look</a></td>
            </tr>
            <?php endforeach; ?>

        </table>
    </div>
    <a href="/cabinet/"><i class="fa fa-user"></i> Назад в кабинет</a>
</div>

<?php include './assets/tpl/layouts/footer.php'; ?>
