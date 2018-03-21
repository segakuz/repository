<?php include './assets/tpl/layouts/header.php'; ?>


<div class="catalog-cats">
    <h2>Каталог</h2>

    <?php foreach ($categories as $category): ?>
    <a href="/category/<?= $category['id_category'];?>">
        <?= $category['name'];?>
    </a>
    <?php endforeach; ?>
</div>








<div class="catalog-prods">
    <h2>Последние товары</h2>

    <?php foreach ($latestProducts as $product): ?>

    <div class="product-item">
        <p>
            <a href="/product/<?= $product['id_product'];?>">
                <?= $product['name'];?> <i class="fa fa-caret-right"></i>
            </a>
        </p>
        <img class="img" src="<?= Product::getImage($product['id_product']); ?>" alt="">
        <br />
        <p class="price"><?= $product['price'];?> p.</p>
        <a class="cart" href="#" data-id="<?= $product['id_product'];?>">В корзину</a>
        <?php if ($product['is_new']): ?>
        <img src="/assets/img/front-images/new.png" class="new" alt="" />
        <?php endif; ?>

    </div>




    <?php endforeach;?>

</div>










<?php include './assets/tpl/layouts/footer.php'; ?>
