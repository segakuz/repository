<?php include './assets/tpl/layouts/header_adm.php'; ?>


        <div>

            <br/>

            <div>
                <ol>
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление товарами</a></li>
                    <li>Удалить товар</li>
                </ol>
            </div>


            <h4>Удалить товар №<?= $id; ?></h4>


            <p>Вы действительно хотите удалить этот товар?</p>

            <form method="post">
                <input type="submit" name="submit" value="Удалить">
            </form>

        </div>


<?php include './assets/tpl/layouts/footer.php'; ?>

