<?php include './assets/tpl/layouts/header.php'; ?>



    <div>

        <?php if ($result): ?>
            <p>Вы зарегистрированы!</p>
        <?php else: ?>
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?= $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div>
                <h2>Регистрация на сайте</h2>
                <form action="#" method="post">
                    <input type="text" name="name" placeholder="Имя" value="<?= $name; ?>"/>
                    <input type="email" name="email" placeholder="E-mail" value="<?= $email; ?>"/>
                    <input type="password" name="password" placeholder="Пароль" value="<?= $password; ?>"/>
                    <input type="submit" name="submit" class="btn btn-default" value="Регистрация" />
                </form>
            </div>

        <?php endif; ?>
        <br/>
        <br/>
    </div>


<?php include './assets/tpl/layouts/footer.php'; ?>