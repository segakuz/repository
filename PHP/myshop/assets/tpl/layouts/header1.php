<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Myshop</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="/assets/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/js/main.js"></script>
</head>
<body>
    <header>
        <a href="/">Главная</a>
        <a href="/catalog/">Каталог</a>
        <a href="/basket/">Корзина(<span id="cart-count"><?php echo Basket::countItems(); ?></span>)</a>
        <a href="/about/">О магазине</a>
        <a href="/contacts/">Контакты</a>
        <a href="/admin/">Админка</a>
        <?php if (User::isGuest()): ?>                                        
            <a href="/user/login/">Вход</a>
        <?php else: ?>
            <a href="/cabinet/">Кабинет</a>
            <a href="/user/logout/">Выход</a>
        <?php endif; ?>
    </header>
