<?php include './assets/tpl/layouts/header_adm.php'; ?>

<div class="cabinet pb0">
    <h2 id="breadcrumb"><a href="/admin">Админпанель</a> / <a href="/admin/category">Управление категориями</a> / Удалить категорию</h2>
</div>
<div class="admin pad-50 pt0">
    <h2>Удаление категории №
        <?= $id; ?>
    </h2>
    <p>Вы действительно хотите удалить эту категорию?</p>
    <form method="post">
        <input class="left" type="submit" name="submit" value="Удалить" />
    </form>
</div>

<?php include './assets/tpl/layouts/footer.php'; ?>
