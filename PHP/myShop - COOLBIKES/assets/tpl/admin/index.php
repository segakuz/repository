<?php include './assets/tpl/layouts/header_adm.php'; ?>

<div class="admin pad-50">
    <h2>Добрый день, администратор!</h2>
    <p>Вам доступны следующие возможности:</p>
    <ul class="admin-acts">
        <li><a class="btn wid" href="/admin/product">Управление товарами</a></li>
        <li><a class="btn wid" href="/admin/category">Управление категориями</a></li>
        <li><a class="btn wid" href="/admin/order">Управление заказами</a></li>
        <li><a class="btn wid" href="/admin/users">Управление пользователями</a></li>
    </ul>
</div>

<?php include './assets/tpl/layouts/footer.php'; ?>
