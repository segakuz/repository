<?php include './assets/tpl/layouts/header.php'; ?>

<div class="login">
    <h2>Войдите на сайт</h2>
    <p>или</p>
    <a href="/user/register"><i class="fa fa-id-card"></i><span> Зарегистрируйтесь</span></a>
    <div class="container">
       
        <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
            <li><i class="fa fa-exclamation-triangle"></i> <?= $error; ?></li>
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
</div>


<?php include './assets/tpl/layouts/footer.php'; ?>
