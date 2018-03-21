<footer>
    <div>
        <ul>Каталог

            <?php $categories = Category::getCategoriesList();
                        foreach ($categories as $category): ?>
            <li>
                <a href="/category/<?= $category['id_category']; ?>">
                    <?= $category['name']; ?>
                </a>
            </li>
            <?php endforeach; ?>

        </ul>
    </div>
    <div>
        <p>О нас</p>
        <p>Доставка и оплата</p>
        <p>Контакты</p>
    </div>
    <div>
        <p>Оставайтесь с нами</p> <a href="#facebook"><i class="fa fa-facebook-square"></i></a>
        <a href="#odnoklassniki"><i class="fa fa-odnoklassniki-square"></i></a>
        <a href="#twitter"><i class="fa fa-twitter-square"></i></a>
        <a href="#vk"><i class="fa fa-vk"></i></a>
        <a href="#mail"><i class="fa fa-envelope-square"></i></a>
    </div>
    <div>
        <p>Будьте в курсе наших новостей</p>
        <form>
            <input type="text" />
            <input type="submit" />
        </form>
    </div>
    <img src="images/vintage-937960_640.png" alt="bikeshop" />
</footer>

</body>

</html>