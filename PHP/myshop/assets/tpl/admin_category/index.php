<?php include './assets/tpl/layouts/header_adm.php'; ?>



            <div>
                <ol>
                    <li><a href="/admin">Админпанель</a></li>
                    <li>Управление категориями</li>
                </ol>
            </div>

            <a href="/admin/category/create">Добавить категорию</a>
            
            <h4>Список категорий</h4>

            <br/>

            <table>
                <tr>
                    <th>ID категории</th>
                    <th>Название категории</th>
                    <th>Порядковый номер</th>
                    <th>Статус</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?= $category['id_category']; ?></td>
                        <td><?= $category['name']; ?></td>
                        <td><?= $category['sort_order']; ?></td>
                        <td><?= Category::getStatusText($category['status']); ?></td>  
                        <td><a href="/admin/category/update/<?= $category['id_category']; ?>" title="Редактировать">edit</a></td>
                        <td><a href="/admin/category/delete/<?= $category['id_category']; ?>" title="Удалить">del</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>


<?php include './assets/tpl/layouts/footer.php'; ?>

