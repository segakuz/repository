<?php include './assets/tpl/layouts/header_adm.php'; ?>

<div class="cabinet pb0">
    <h2 id="breadcrumb"><a href="/admin">Админпанель</a> / <a href="/admin/order">Управление заказами</a> / Редактировать заказ</h2>
</div>
<div class="admin pad-50 pt0">
    <h2>Редактирование заказа №
        <?= $id; ?>
    </h2>
    <div class="container">
        <form action="#" method="post">
            <div class="row">
                <div class="col-25">
                    <label for="name">Имя клиента</label>
                </div>
                <div class="col-75">
                    <input type="text" name="userName" placeholder="" value="<?= $order['user_name']; ?>" id="name" />
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="userPhone">Телефон клиента</label>
                </div>
                <div class="col-75">
                    <input type="text" name="userPhone" placeholder="" value="<?= $order['user_phone']; ?>" id="userPhone" />
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="userComment">Комментарий клиента</label>
                </div>
                <div class="col-75">
                    <textarea name="userComment" placeholder="" value="<?= $order['user_comment']; ?>" id="userComment"><?= $order['user_comment']; ?></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="date">Дата оформления заказа</label>
                </div>
                <div class="col-75">
                    <input type="text" name="date" placeholder="" value="<?= $order['date']; ?>" id="date" />
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="status">Статус</label>
                </div>
                <div class="col-75">
                    <select name="status" id="status">
                            <option value="1" <?php if ($order['status'] == 1) echo ' selected="selected"'; ?>>Новый заказ</option>
                            <option value="2" <?php if ($order['status'] == 2) echo ' selected="selected"'; ?>>В обработке</option>
                            <option value="3" <?php if ($order['status'] == 3) echo ' selected="selected"'; ?>>Доставляется</option>
                            <option value="4" <?php if ($order['status'] == 4) echo ' selected="selected"'; ?>>Закрыт</option>
                        </select>
                </div>
            </div>
            <div class="row">
                <input type="submit" name="submit" value="Сохранить">
            </div>
        </form>
    </div>
</div>

<?php include './assets/tpl/layouts/footer.php'; ?>
