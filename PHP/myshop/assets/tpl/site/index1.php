<!--header-->
<?php include './assets/tpl/layouts/header.php'; ?>




<!--Список категорий-->
<?php foreach ($categories as $category): ?>
    <h4>
        <a href="/category/<?= $category['id_category']; ?>">
            <?= $category['name']; ?>
        </a>
    </h4>
<?php endforeach; ?>




<!--Последние товары-->
<?php foreach ($latestProducts as $product): ?>
    <div>
        <img src="<?= Product::getImage($product['id_product']); ?>" alt="">
        <h2><?= $product['price']; ?></h2>
        <p>
            <a href="/product/<?php echo $product['id_product']; ?>">
                <?= $product['name']; ?>
            </a>
        </p>
        <a href="#" data-id="<?php echo $product['id_product']; ?>">В корзину</a>
    </div>
    <?php if ($product['is_new']): ?>
        <img src="/template/images/home/new.png" class="new" alt="">
    <?php endif; ?>

<?php endforeach; ?>




<!--Слайдер продуктов-->
<?php foreach ($sliderProducts as $sliderItem): ?>

    <div>
        <img src="<?= Product::getImage($sliderItem['id_product']); ?>" alt="">
        <h2><?= $sliderItem['price']; ?></h2>
        <a href="/product/<?= $sliderItem['id_product']; ?>">
            <?= $product['name']; ?>
        </a>
        <br/><br/>
        <a href="#" data-id="<?= $sliderItem['id_product']; ?>">В корзину</a>
    </div>
    <?php if ($sliderItem['is_new']): ?>
        <img src="/template/images/home/new.png" class="new" alt="" />
    <?php endif; ?>

<?php endforeach; ?>





<!--футер-->
<?php include './assets/tpl/layouts/footer.php'; ?>