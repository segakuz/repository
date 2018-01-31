<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>
        <link rel="stylesheet" href="./asset/css/style.css">
    </head>
    <body>
        <button><a href="index" class="auth_page">На главную</a></button>
        <form action="check" method="POST" class="auth_page">
            <fieldset>
                <legend>Авторизуйтесь</legend>

                <label for="login">Введите логин</label>
                <input type="text" name="login" id="login" required>
                
                <label for="password">Введите пароль</label>
                <input type="password" name="password" id="password" required>
                
                <input type="submit" name="login_submit" value="Войти">
            </fieldset>
        </form>
    </body>
    </html>