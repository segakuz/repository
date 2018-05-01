<?php include './assets/tpl/layouts/header_adm.php'; ?>

<div class="cabinet pb0">
    <h2 id="breadcrumb"><a href="/admin">Админпанель</a> / Управление категориями</h2>
</div>
<div class="admin pad-50 pt0">
    <a class="btn" href="/admin/category/create">Добавить категорию</a>
    <h4>Список категорий</h4>
    <div class="table-container">
        <table>
            <tr>
                <th>ID категории</th>
                <th>Название категории</th>
                <th>Порядковый номер</th>
                <th>Статус</th>
                <th>Редактировать</th>
                <th>Удалить</th>
            </tr>
            <?php foreach ($categories as $category): ?>
            <tr>
                <td>
                    <?= $category['id_category']; ?>
                </td>
                <td>
                    <?= $category['name']; ?>
                </td>
                <td>
                    <?= $category['sort_order']; ?>
                </td>
                <td>
                    <?= Category::getStatusText($category['status']); ?>
                </td>
                <td><a class="edit" href="/admin/category/update/<?= $category['id_category']; ?>" title="Редактировать"><i class="fa fa-edit"></i></a></td>
                <td><a class="del" href="/admin/category/delete/<?= $category['id_category']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>


<?php include './assets/tpl/layouts/footer.php'; ?>
