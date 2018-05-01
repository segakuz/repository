<?php include './assets/tpl/layouts/header_adm.php'; ?>

<div class="cabinet pb0">
    <h2 id="breadcrumb"><a href="/admin">Админпанель</a> / Управление заказами</h2>
</div>
<div class="admin pad-50 pt0">
    <h2>Список заказов</h2>
<div class="table-container">
           <table>
        <tr>
            <th>ID заказа</th>
            <th>Имя покупателя</th>
            <th>Телефон покупателя</th>
            <th>Дата оформления</th>
            <th>Статус</th>
            <th>Смотреть</th>
            <th>Редактировать</th>
            <th>Удалить</th>
        </tr>
        <?php foreach ($ordersList as $order): ?>
        <tr>
            <td>
                <a class="look" href="/admin/order/view/<?= $order['id_order']; ?>">
                    <?= $order['id_order']; ?> <span><i class="fa fa-eye"></i></span>
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
            <td><a href="/admin/order/view/<?= $order['id_order']; ?>" title="Смотреть" class="edit"><i class="fa fa-eye"></i></a></td>
            <td><a href="/admin/order/update/<?= $order['id_order']; ?>" title="Редактировать" class="edit"><i class="fa fa-edit"></i></a></td>
            <td><a href="/admin/order/delete/<?= $order['id_order']; ?>" title="Удалить" class="del"><i class="fa fa-times"></i></a></td>
        </tr>
        <?php endforeach; ?>
    </table>
    </div>
</div>


<?php include './assets/tpl/layouts/footer.php'; ?>
