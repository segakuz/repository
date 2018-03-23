<?php include './assets/tpl/layouts/header.php'; ?>

<div class="contacts">
    <img src="/assets/img/front-images/map.png" alt="Карта" />
    <h2>Адреса магазинов</h2>
    <p><i class="fa fa-map-marker"></i> Наш адрес: 191186, г. Санкт-Петербург, пр-кт Невский, д. 1, корп. 1.</p>
    <h2 class="mgt">Позвоните нам</h2>
    <p><i class="fa fa-phone"></i> Наш телефон: +7 (999) 999-99-99.</p>
    <h2 class="mgt">Обратная связь</h2>
    <?php if ($result): ?>
    <p>Сообщение отправлено! Мы ответим Вам на указанный email.</p>
    <?php else: ?>
    <?php if (isset($errors) && is_array($errors)): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
        <li> -
            <?= $error; ?>
        </li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    <p><i class="fa fa-envelope"></i> Есть вопрос? Напишите нам</p>
    <br/>
    <div class="container">
        <form action="#" method="post">
            <div class="row">
                <div class="col-25">
                    <label for="email">Ваша почта</label>
                </div>
                <div class="col-75">
                    <input type="email" name="userEmail" placeholder="E-mail..." value="<?= $userEmail; ?>" id="email" />
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="subject">Сообщение</label>
                </div>
                <div class="col-75">
                    <textarea name="userText" placeholder="Сообщение..." value="<?= $userText; ?>" id="subject"></textarea>
                </div>
            </div>
            <div class="row">
                <input type="submit" name="submit" value="Отправить" />
            </div>
        </form>
    </div>
    <?php endif; ?>
</div>



<?php include './assets/tpl/layouts/footer.php'; ?>
