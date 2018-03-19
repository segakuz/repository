<?php include './assets/tpl/layouts/header.php'; ?>



    <div>

        <?php if ($result): ?>
            <p>Данные отредактированы!</p>
        <?php else: ?>
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?= $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div>
                <h2>Редактирование данных</h2>
                <form action="#" method="post">
                    <p>Имя:</p>
                    <input type="text" name="name" placeholder="Имя" value="<?= $name; ?>">

                    <p>Пароль:</p>
                    <input type="password" name="password" placeholder="Пароль" value="">
                    <br/>
                    <input type="submit" name="submit" value="Сохранить">
                </form>
            </div>

        <?php endif; ?>
        <br/>
        <br/>
    </div>


<?php include './assets/tpl/layouts/footer.php'; ?>