<?php include './assets/tpl/layouts/header.php'; ?>

<div class="basket">
    <h2>Корзина</h2>

    <?php if ($result): ?>

    <p>Заказ оформлен. Ожидайте звонка.</p>

    <?php else: ?>

    <p>Выбрано товаров:
        <?= $totalQuantity; ?>, на сумму:
            <?= $totalPrice; ?> &#8381;</p>

    <?php if (!$result): ?>
    <div class="container">
        <p>Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</p>

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
                    <label for="name">Ваше имя</label>
                </div>
                <div class="col-75">
                    <input type="text" name="userName" placeholder="Имя..." value="<?= $userName; ?>" id="name" />
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="userPhone">Номер телефона</label>
                </div>
                <div class="col-75">
                    <input type="text" name="userPhone" placeholder="+7 (888) 888-88-88" value="<?= $userPhone; ?>" id="userPhone" />
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="userComment">Комментарий к заказу</label>
                </div>
                <div class="col-75">
                    <textarea name="userComment" placeholder="Сообщение..." value="<?= $userComment; ?>" id="userComment"><?= $userComment; ?></textarea>
                </div>
            </div>
            <div class="row">
                <input type="submit" name="submit" value="Оформить">
            </div>
        </form>
    </div>

    <?php endif; ?>

    <?php endif; ?>

</div>

<?php include './assets/tpl/layouts/footer.php'; ?>
