<?php include './assets/tpl/layouts/header_adm.php'; ?>


        <div>
            <div>
                <ol>
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/category">Управление категориями</a></li>
                    <li>Удалить категорию</li>
                </ol>
            </div>


            <h4>Удалить категорию № <?= $id; ?></h4>


            <p>Вы действительно хотите удалить эту категорию?</p>

            <form method="post">
                <input type="submit" name="submit" value="Удалить" />
            </form>

        </div>


<?php include './assets/tpl/layouts/footer.php'; ?>

