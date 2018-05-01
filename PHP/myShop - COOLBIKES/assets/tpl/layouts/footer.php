<footer>
    <div class="mgb30">
        <ul>
            <p class="mgb"><a href="/catalog/">Каталог <i class="fa fa-caret-right"></i></a></p>

            <?php $categories = Category::getCategoriesList();
                        foreach ($categories as $category): ?>
            <li class="mgb">
                <a href="/category/<?= $category['id_category']; ?>">
                    <?= $category['name']; ?>
                        <i class="fa fa-caret-right"></i>
                </a>
            </li>
            <?php endforeach; ?>

        </ul>
    </div>
    <div class="mgb30">
        <p class="mgb"><a href="/">Главная <i class="fa fa-caret-right"></i></a></p>
        <p class="mgb"><a href="/about/">О нас <i class="fa fa-caret-right"></i></a></p>
        <p class="mgb"><a href="/contacts/">Контакты <i class="fa fa-caret-right"></i></a></p>
        <br class="mgb" />
        <div class="mgb"><a href="/basket/"><i class="fa fa-shopping-cart"></i> Корзина<!-- (<span id="basket-count"><?= Basket::countItems(); ?></span>)--> <i class="fa fa-caret-right"></i></a></div>

        <?php if (User::isGuest()): ?>
        <div class="mgb"><a href="/user/login/"><i class="fa fa-sign-in-alt"></i> Вход <i class="fa fa-caret-right"></i></a></div>
        <div class="mgb"><a href="/user/register/"><i class="fa fa-id-card"></i> Регистрация <i class="fa fa-caret-right"></i></a></div>
        <?php else: ?>
        <div class="mgb"><a href="/cabinet/"><i class="fa fa-user"></i> Кабинет <i class="fa fa-caret-right"></i></a><br /></div>
        <div class="mgb"><a href="/user/logout/"><i class="fa fa-sign-out-alt"></i> Выход <i class="fa fa-caret-right"></i></a></div>
        <?php endif; ?>

    </div>
    <div class="social mgb">
        <p>Оставайтесь с нами</p>
        <a href="#facebook"><img src="/assets/img/front-images/facebook-667456_640.png" alt="facebook" /></a>
        <a href="#instagram"><img src="/assets/img/front-images/insta.png" alt="instagram" /></a>
        <a href="#twitter"><img src="/assets/img/front-images/twitter.png" alt="twitter" /></a>
        <a href="#vk"><img src="/assets/img/front-images/vk.png" alt="vk" /></a>
    </div>
    <img src="/assets/img/front-images/vintage-937960_640.png" alt="bikeshop" />
</footer>

</body>

</html>
