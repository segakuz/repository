<?php include './assets/tpl/layouts/header_adm.php'; ?>


            <div>
                <ol>
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/order">Управление заказами</a></li>
                    <li>Редактировать заказ</li>
                </ol>
            </div>


            <h4>Редактировать заказ #<?= $id; ?></h4>

            <br/>

            <div>
                <div>
                    <form action="#" method="post">

                        <p>Имя клиента</p>
                        <input type="text" name="userName" placeholder="" value="<?= $order['user_name']; ?>">

                        <p>Телефон клиента</p>
                        <input type="text" name="userPhone" placeholder="" value="<?= $order['user_phone']; ?>">

                        <p>Комментарий клиента</p>
                        <input type="text" name="userComment" placeholder="" value="<?= $order['user_comment']; ?>">

                        <p>Дата оформления заказа</p>
                        <input type="text" name="date" placeholder="" value="<?= $order['date']; ?>">

                        <p>Статус</p>
                        <select name="status">
                            <option value="1" <?php if ($order['status'] == 1) echo ' selected="selected"'; ?>>Новый заказ</option>
                            <option value="2" <?php if ($order['status'] == 2) echo ' selected="selected"'; ?>>В обработке</option>
                            <option value="3" <?php if ($order['status'] == 3) echo ' selected="selected"'; ?>>Доставляется</option>
                            <option value="4" <?php if ($order['status'] == 4) echo ' selected="selected"'; ?>>Закрыт</option>
                        </select>
                        <br>
                        <br>
                        <input type="submit" name="submit" value="Сохранить">
                    </form>
                </div>
            </div>


<?php include './assets/tpl/layouts/footer.php'; ?>

