<?php include './assets/tpl/layouts/header_adm.php'; ?>


<div class="cabinet pb0">
    <h2 id="breadcrumb"><a href="/admin">Админпанель</a> / <a href="/admin/category">Управление категориями</a> / Редактировать категорию</h2>
</div>
<div class="admin pad-50 pt0">
    <h2>Редактирование категории "
        <?= $category['name']; ?>"</h2>
    <div class="container">
        <form action="#" method="post">
            <div class="row">
                <div class="col-25">
                    <label for="name">Название</label>
                </div>
                <div class="col-75">
                    <input type="text" name="name" placeholder="Название категории..." value="<?= $category['name']; ?>" id="name" />
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="sort_order">Порядковый номер</label>
                </div>
                <div class="col-75">
                    <input type="text" name="sort_order" placeholder="Порядковый номер..." value="<?= $category['sort_order']; ?>" id="sort_order" />
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="status">Статус</label>
                </div>
                <div class="col-75">
                    <select name="status" id="status">
                <option value="1" <?php if ($category['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                <option value="0" <?php if ($category['status'] == 0) echo ' selected="selected"'; ?>>Скрыта</option>
            </select></div>
            </div>
            <div class="row">
                <input type="submit" name="submit" value="Сохранить">
            </div>
        </form>
    </div>
</div>

<?php include './assets/tpl/layouts/footer.php'; ?>
