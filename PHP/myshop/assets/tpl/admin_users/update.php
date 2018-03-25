<?php include './assets/tpl/layouts/header_adm.php'; ?>

<div class="cabinet pb0">
    <h2 id="breadcrumb"><a href="/admin">Админпанель</a> / <a href="/admin/users">Управление пользователями</a> / Редактировать пользователя</h2>
</div>
<div class="admin pad-50 pt0">
    <h2>Редактировать пользователя "
        <?= $user['name']; ?>"</h2>
    <div class="container">
        <form action="#" method="post">
            <div class="row">
                <div class="col-25">
                    <label for="name">Имя</label>
                </div>
                <div class="col-75">
                    <input type="text" name="name" placeholder="" value="<?= $user['name']; ?>" id="name"></div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="email">E-mail</label>
                </div>
                <div class="col-75">
                    <input type="email" name="email" placeholder="" value="<?= $user['email']; ?>" id="email" /> </div>
                <div class="row">
                    <div class="col-25">
                        <p>Роль</p>
                    </div>
                    <div class="col-75">
                        <label for="role1">Админ</label>
                        <input type="radio" id="role1" name="role" value="admin" <?=( $user[ 'role']==='admin' )? 'checked': ''; ?>><br />
                        <label for="role2">Нет</label>
                        <input type="radio" id="role2" name="role" value="" <?=( $user[ 'role']!=='admin' )? 'checked': ''; ?>></div>
                </div>
                <div class="row">
                    <input type="submit" name="submit" value="Сохранить">
                </div>
            </div>
        </form>
    </div>
</div>

<?php include './assets/tpl/layouts/footer.php'; ?>
