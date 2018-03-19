<?php include './assets/tpl/layouts/header.php'; ?>


    <div>
        <h2>Каталог</h2>
        <div>
            <?php foreach ($categories as $category): ?>

                    <div>
                        <h4>
                            <a href="/category/<?= $category['id_category']; ?>">
                                <?= $category['name']; ?>
                            </a>
                        </h4>
                    </div>

            <?php endforeach; ?>
        </div>
    </div>



    <div>
        <h2>Корзина</h2>

        <?php if ($result): ?>
            <p>Заказ оформлен. Ожидайте звонка.</p>
        <?php else: ?>

            <p>Выбрано товаров: <?= $totalQuantity; ?>, на сумму: <?= $totalPrice; ?>, Rub</p><br/>

            <?php if (!$result): ?>                        

                <div>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?= $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <p>Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</p>

                    <div>
                        <form action="#" method="post">

                            <p>Ваша имя</p>
                            <input type="text" name="userName" placeholder="" value="<?= $userName; ?>">

                            <p>Номер телефона</p>
                            <input type="text" name="userPhone" placeholder="" value="<?= $userPhone; ?>">

                            <p>Комментарий к заказу</p>
                            <input type="text" name="userComment" placeholder="Сообщение" value="<?= $userComment; ?>">

                            <br/>
                            <br/>
                            <input type="submit" name="submit" value="Оформить">
                        </form>
                    </div>
                </div>

            <?php endif; ?>

        <?php endif; ?>

    </div>


<?php include './assets/tpl/layouts/footer.php'; ?>