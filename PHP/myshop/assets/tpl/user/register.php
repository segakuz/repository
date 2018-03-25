<?php include './assets/tpl/layouts/header.php'; ?>

<div class="register">
    <h2>Регистрация на сайте</h2>
    <div class="container">

        <?php if ($result): ?>
        <p>Вы зарегистрированы!</p>
        <a href="/cabinet/"><i class="fa fa-user"></i> В кабинет</a>
        <?php else: ?>
        <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
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
                    <label for="name">Ведите Ваше имя</label>
                </div>
                <div class="col-75">
                    <input type="text" name="name" placeholder="Имя..." value="<?= $name; ?>" id="name" />
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="email">Ведите Ваш E-mail</label>
                </div>
                <div class="col-75">
                    <input type="email" name="email" placeholder="E-mail..." value="<?= $email; ?>" id="email" />
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="psw1">Придумайте пароль</label>
                </div>
                <div class="col-75">
                    <input type="password" name="password1" id="psw1" placeholder="Пароль..." value="<?= $password1; ?>" />
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="psw2">Повторите пароль</label>
                </div>
                <div class="col-75">
                    <input type="password" name="password2" id="psw2" placeholder="Пароль..." value="" />
                </div>
            </div>
            <div class="row">
                <input type="submit" name="submit" class="btn btn-default" value="Регистрация" />
            </div>
        </form>
    </div>
    <?php endif; ?>

</div>

<?php include './assets/tpl/layouts/footer.php'; ?>
