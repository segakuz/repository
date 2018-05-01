<?php include './assets/tpl/layouts/header_adm.php'; ?>

<div class="cabinet pb0">
    <h2 id="breadcrumb"><a href="/admin">Админпанель</a> / Управление пользователями</h2>
</div>
<div class="admin pad-50 pt0">
    <h2>Список пользователей</h2>
    <div class="table-container">
        <table>
            <tr>
                <th>ID пользователя</th>
                <th>Имя пользователя</th>
                <th>email</th>
                <th>Роль</th>
                <th>Редактировать</th>
                <th>Удалить</th>
            </tr>
            <?php foreach ($users as $user): ?>
            <tr>
                <td>
                    <?= $user['id_user']; ?>
                </td>
                <td>
                    <?= $user['name']; ?>
                </td>
                <td>
                    <?= $user['email']; ?>
                </td>
                <td>
                    <?= $user['role'];; ?>
                </td>
                <td><a href="/admin/users/update/<?= $user['id_user']; ?>" title="Редактировать" class="edit"><i class="fa fa-edit"></i></a></td>
                <td><a href="/admin/users/delete/<?= $user['id_user']; ?>" title="Удалить" class="del"><i class="fa fa-times"></i></a></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>


<?php include './assets/tpl/layouts/footer.php'; ?>
