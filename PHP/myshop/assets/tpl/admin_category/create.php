<?php include './assets/tpl/layouts/header_adm.php'; ?>

<div class="cabinet pb0">
    <h2 id="breadcrumb"><a href="/admin">Админпанель</a> / <a href="/admin/category">Управление категориями</a> / Добавить категорию</h2>
</div>
<div class="admin pad-50 pt0">
    <h2>Добавить новую категорию</h2>
    <div class="container">
        <?php if (isset($errors) && is_array($errors)): ?>
        <ul class="err">
            <?php foreach ($errors as $error): ?>
            <li><i class="fa fa-exclamation-triangle"></i>
                <?= $error; ?>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <form action="#" method="post">
            <div class="row">
                <div class="col-25">
                    <label for="name">Название</label>
                </div>
                <div class="col-75">
                    <input type="text" name="name" placeholder="Название категории..." value="" id="name" />
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="sort_order">Порядковый номер</label>
                </div>
                <div class="col-75">
                    <input type="text" name="sort_order" placeholder="Порядковый номер..." value="" id="sort_order">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="status">Статус</label>
                </div>
                <div class="col-75">
                    <select id="status" name="status">
                        <option value="1" selected="selected">Отображается</option>
                        <option value="0">Скрыта</option>
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
