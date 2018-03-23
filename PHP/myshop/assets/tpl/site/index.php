<!--header-->
<?php include './assets/tpl/layouts/header.php'; ?>

<main>

    <!--Акции слайдер-->
    <div class="slideshow-container main-border" id="hero-slider">
        <div class="mySlides fade" id="spring">
            <div class="numbertext">1 / 4</div>
            <div class="text">
                <p>С 1-го марта по 31-е мая</p>
                <h2>Весенние скидки</h2>
                <p>на городские велосипеды</p>
                <p class="super">-20%</p>
                <button>Смотреть</button>
            </div>
        </div>
        <div class="mySlides fade" id="competition">
            <div class="numbertext">2 / 4</div>
            <div class="text">
                <p>Внимание!</p>
                <h2>Фотоконкурс</h2>
                <p>присылайте Ваши фотографии<br />и получите шанс выиграть</p>
                <p class="super">MegaBike3000</p>
                <button>Участвовать</button></div>
        </div>
        <div class="mySlides fade" id="low-price">
            <div class="numbertext">3 / 4</div>
            <div class="text">
                <p>До 31-го марта</p>
                <h2>Цена месяца</h2>
                <p>MegaBike4000 всего за</p>
                <p class="super">9 999 р.</p>
                <button>Купить</button></div>
        </div>
        <div class="mySlides fade" id="travel">
            <div class="numbertext">4 / 4</div>
            <div class="text">
                <p>Присоединяйтесь!</p>
                <h2>AfricaTrip</h2>
                <p>в Африку вместе<br />с нашей командой</p>
                <button>Узнать подробности</button></div>
        </div>
    </div>

    <!--Рекомендуемые товары-->
    <section>
        <div class="sec-header"><i class="fa fa-star"></i> Рекомендуем наши хиты</div>
        <div class="slideshow-container" id="hit-slider">

            <?php foreach ($sliderProducts as $key=>$product): ?>

            <div class="mySlides fade" id="hit<?= $key+1; ?>">
                <div class="numbertext">
                    <?= $key+1; ?> /
                        <?= count($sliderProducts); ?>
                </div>
                <div class="hit-img"><img src="<?= Product::getImage($product['id_product']); ?>" alt="Popular bicycle" /></div>
                <div class="text">
                    <h2>
                        <a href="/product/<?= $product['id_product']; ?>">
                            <i class="fa fa-bicycle"></i>
                            <?= $product['name']; ?> <i class="fa fa-caret-right"></i>
                        </a>
                    </h2>
                    <p class="hit-price">
                        <?= $product['price']; ?> р.</p>
                    <button data-do="tobasket">В корзину <i class="fa fa-cart-plus"></i></button>
                </div>
            </div>

            <?php endforeach; ?>

            <a class="prev">&#10094;</a>
            <a class="next">&#10095;</a>
        </div>
    </section>


    <!--Категория слайдер-->
    <?php foreach ($categories as $category): ?>
    <section>
        <div class="sec-header"><i class="fa fa-bicycle"></i>
            <?= $category['name']; ?>
        </div>
        <div class="category-slider" id="category-slider-<?= $category['id_category']; ?>">
            <a class="prev">&#10094;</a>
            <a class="next">&#10095;</a>
            <div class="three">
                <?php foreach(Product::getProductsListByCategory($category['id_category']) as $catproducts): ?>
                <div class="cat-slide">
                    <div>
                        <h2><a href="/product/<?= $product['id_product']; ?>"><i class="fa fa-bicycle"></i>
                            <?= $catproducts['name']; ?> <i class="fa fa-caret-right"></i></a>
                        </h2>
                        <div class="cat-img"><img src="<?= Product::getImage($catproducts['id_product']); ?>" alt="<?= $catproducts['name']; ?>" /></div>
                        <p class="cat-price">
                            <?= $catproducts['price']; ?> р.</p>
                        <button>В корзину <i class="fa fa-cart-plus"></i></button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php endforeach; ?>




</main>


<!--футер-->
<?php include './assets/tpl/layouts/footer.php'; ?>
