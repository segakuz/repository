<?php include './assets/tpl/layouts/header.php'; ?>

<div class="cabinet">
    <h2 id="breadcrumb"><a href="/cabinet/">Кабинет</a> / Редактирование данных</h2>
    <div class="container mgb">
        <?php if ($result): ?>
        <p>Данные отредактированы!</p>
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
                    <label for="name">Новое имя</label>
                </div>
                <div class="col-75">
                    <input type="text" name="name" placeholder="Имя..." value="<?= $name; ?>" id="name" />
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="password1">Новый пароль</label>
                </div>
                <div class="col-75">
                    <input type="password" name="password1" placeholder="Пароль" value="" id="password1" />
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="password2">Повторите пароль</label>
                </div>
                <div class="col-75">
                    <input type="password" name="password2" placeholder="Повторите пароль" value="" id="password2" />
                </div>
            </div>
            <div class="row">
            <input type="submit" name="submit" value="Сохранить">
            </div>
        </form>
    </div>
    <?php endif; ?>
    
    <a href="/cabinet/"><i class="fa fa-user"></i> Назад в кабинет</a>
</div>

<?php include './assets/tpl/layouts/footer.php'; ?>
