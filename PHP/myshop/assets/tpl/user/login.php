<?php include './assets/tpl/layouts/header.php'; ?>

<div class="login">
    <h2>Вход на сайт</h2>
    <div class="container">
        <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
            <li> -
                <?= $error; ?>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>


        <form action="#" method="post">
            <div class="row">
                <div class="col-25">
                    <label for="email">Ваш e-mail</label>
                </div>
                <div class="col-75">
                    <input type="email" name="email" placeholder="E-mail" value="<?= $email; ?>" id="email" />
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="password">Ваш пароль</label>
                </div>
                <div class="col-75">
                    <input type="password" name="password" placeholder="Пароль" value="<?= $password; ?>" id="password" />
                </div>
            </div>
            <div class="row">
                <input type="submit" name="submit" class="btn btn-default" value="Вход" />
            </div>
        </form>
    </div>

    <br/>
    <br/>
    <a href="/user/register">Регистрация</a>
</div>


<?php include './assets/tpl/layouts/footer.php'; ?>
