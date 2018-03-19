<?php include './assets/tpl/layouts/header_adm.php'; ?>


        <div>

            <br/>

            <div>
                <ol>
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/order">Управление заказами</a></li>
                    <li>Удалить заказ</li>
                </ol>
            </div>


            <h4>Удалить заказ #<?= $id; ?></h4>


            <p>Вы действительно хотите удалить этот заказ?</p>

            <form method="post">
                <input type="submit" name="submit" value="Удалить">
            </form>

        </div>


<?php include './assets/tpl/layouts/footer.php'; ?>

