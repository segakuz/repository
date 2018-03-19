<?php include './assets/tpl/layouts/header.php'; ?>



    <div>

        <?php if (isset($errors) && is_array($errors)): ?>
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li> - <?= $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <div>
            <h2>Вход на сайт</h2>
            <form action="#" method="post">
                <input type="email" name="email" placeholder="E-mail" value="<?= $email; ?>"/>
                <input type="password" name="password" placeholder="Пароль" value="<?= $password; ?>"/>
                <input type="submit" name="submit" class="btn btn-default" value="Вход" />
            </form>
        </div>

        <br/>
        <br/>
        <a href="/user/register">Регистрация</a>
    </div>


<?php include './assets/tpl/layouts/footer.php'; ?>