<?php include './assets/tpl/layouts/header_adm.php'; ?>

<div class="cabinet pb0">
    <h2 id="breadcrumb"><a href="/admin">Админпанель</a> / <a href="/admin/order">Управление заказами</a> / Удалить заказ</h2>
</div>
<div class="admin pad-50 pt0">
    <h2>Удаление заказа №
        <?= $id; ?>
    </h2>
    <p>Вы действительно хотите удалить этот заказ?</p>
    <form method="post">
        <input class="left" type="submit" name="submit" value="Удалить">
    </form>
</div>

<?php include './assets/tpl/layouts/footer.php'; ?>
