<?php include './assets/tpl/layouts/header_adm.php'; ?>

        <div>

            <br/>
                        
            <div>
                <ol>
                    <li><a href="/admin">Админпанель</a></li>
                    <li>Управление заказами</li>
                </ol>
            </div>

            <h4>Список заказов</h4>

            <br/>

            
            <table>
                <tr>
                    <th>ID заказа</th>
                    <th>Имя покупателя</th>
                    <th>Телефон покупателя</th>
                    <th>Дата оформления</th>
                    <th>Статус</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($ordersList as $order): ?>
                    <tr>
                        <td>
                            <a href="/admin/order/view/<?= $order['id_order']; ?>">
                                <?= $order['id_order']; ?>
                            </a>
                        </td>
                        <td><?= $order['user_name']; ?></td>
                        <td><?= $order['user_phone']; ?></td>
                        <td><?= $order['date']; ?></td>
                        <td><?= Order::getStatusText($order['status']); ?></td>    
                        <td><a href="/admin/order/view/<?= $order['id_order']; ?>" title="Смотреть">look</a></td>
                        <td><a href="/admin/order/update/<?= $order['id_order']; ?>" title="Редактировать">edit</a></td>
                        <td><a href="/admin/order/delete/<?= $order['id_order']; ?>" title="Удалить">del</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>


<?php include './assets/tpl/layouts/footer.php'; ?>

