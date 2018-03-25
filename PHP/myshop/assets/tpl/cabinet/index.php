<?php include './assets/tpl/layouts/header.php'; ?>

<div class="cabinet">
    <h2>Кабинет пользователя</h2>
    <p>Добрый день, <?= $user['name'];?>!</p>
    <ul>Выберите действие:
        <?php if($is_admin): ?>
        <li><a href="/admin/"><i class="fa fa-edit"></i> Админпанель</a></li>
        <?php endif; ?>
        <li><a href="/cabinet/edit"><i class="fa fa-edit"></i> Редактировать данные</a></li>
        <li><a href="/cabinet/order"><i class="fa fa-eye"></i> Просмотреть заказы</a></li>
        <li><a href="/catalog/"><i class="fa fa-shopping-bag"></i> Вернуться в каталог</a></li>
        <li><a href="/user/logout/"><i class="fa fa-sign-out-alt"></i> Выйти</a></li>
    </ul>
</div>

<?php include './assets/tpl/layouts/footer.php'; ?>
