<?php include './assets/tpl/layouts/header_adm.php'; ?>



    <div>
        <ol>
            <li><a href="/admin">Админпанель</a></li>
            <li><a href="/admin/category">Управление категориями</a></li>
            <li>Редактировать категорию</li>
        </ol>
    </div>


    <h4>Редактировать категорию "<?= $category['name']; ?>"</h4>

    <br/>


    <div>
        <form action="#" method="post">

            <p>Название</p>
            <input type="text" name="name" placeholder="" value="<?= $category['name']; ?>">

            <p>Порядковый номер</p>
            <input type="text" name="sort_order" placeholder="" value="<?= $category['sort_order']; ?>">

            <p>Статус</p>
            <select name="status">
                <option value="1" <?php if ($category['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                <option value="0" <?php if ($category['status'] == 0) echo ' selected="selected"'; ?>>Скрыта</option>
            </select>

            <br><br>

            <input type="submit" name="submit" value="Сохранить">
        </form>
    </div>


<?php include './assets/tpl/layouts/footer.php'; ?>

