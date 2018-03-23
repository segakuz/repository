<?php include './assets/tpl/layouts/header.php'; ?>

<div>
    <h2>Кабинет пользователя</h2>
    <p>Привет, <?php echo $user['name'];?>!</p>
    <ul>
        <li><a href="/cabinet/edit">Редактировать данные</a></li>
        <!--<li><a href="/cabinet/history">Список покупок</a></li>-->
    </ul>
</div>

<?php include './assets/tpl/layouts/footer.php'; ?>
