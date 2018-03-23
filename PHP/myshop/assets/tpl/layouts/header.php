<!DOCTYPE html>
<html lang="ru-RU">

<head>
    <title>Myshop</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css" />
    <meta name="description" content="#" />
    <meta name="keywords" content="#" />
    <meta name="author" content="Sergei Kuznetsov" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>-->
    <script src="/assets/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/js/fontawesome-all.js"></script>
    <script src="/assets/js/main.js"></script>


</head>

<body>

    <header>
        <div id="logo">
            c<img src="/assets/img/front-images/bicycle-34159_640.png" alt="bikeshop" />lbikes
        </div>
        <div id="bar">
            <a href="/basket/"><i class="fa fa-shopping-cart"></i><span> Корзина(<span id="cart-count"><?php echo Basket::countItems(); ?></span>)</span></a>
            <?php if (User::isGuest()): ?>
            <a href="/user/register"><i class="fa fa-id-card"></i><span> Регистрация</span></a>
            <a href="/user/login/"><i class="fa fa-sign-in-alt"></i><span> Вход</span></a>
            <?php else: ?>

            <a href="/user/logout/"><i class="fa fa-sign-out-alt"></i><span> Выход</span></a>
            <a href="/cabinet/"><i class="fa fa-user"></i><span> Кабинет</span></a>
            <span>Добрый день, Username!</span>
            <?php endif; ?>
        </div>
        <nav>
            <div class="topnav" id="myTopnav">
                <a href="/">Главная</a>
                
                <div class="dropdown">
                    <a href="/catalog/" class="dropbtn">Каталог 
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <div class="dropdown-content">
                        <?php $categories = Category::getCategoriesList();
                        foreach ($categories as $category): ?>
                        <a href="/category/<?= $category['id_category']; ?>">
                            <?= $category['name']; ?>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <a href="/about/">О нас</a>
                <a href="/contacts/">Контакты</a>
                <div class="icon">
                    <div class="bar1"></div>
                    <div class="bar2"></div>
                    <div class="bar3"></div>
                </div>
            </div>
        </nav>
    </header>
