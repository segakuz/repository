<?php include './assets/tpl/layouts/header.php'; ?>

<div class="catalog-cats">
    <h2>Каталог</h2>
    <?php foreach ($categories as $category): ?>
    <a href="/category/<?= $category['id_category']; ?>" class="<?php if ($prod_category['id_category'] == $category['id_category']) echo 'active'; ?>">
        <?= $category['name']; ?>
    </a>
    <?php endforeach; ?>
</div>

<div class="catalog-prods" id="prod-view">
    <h2><a href="/catalog/">Каталог</a> / <a href="/category/<?= $prod_category['id_category']; ?>"><?= $prod_category['name']; ?></a> /
        <?= $product['name']; ?>
    </h2>
    <div class="product-view">
        <div class="product-view-img">
            <img src="<?= Product::getImage($product['id_product']); ?>" alt="">
        </div>
        <div class="product-view-info">

            <?php if ($product['is_new']): ?>
            <span class="new-prod">New!</span>
            <?php endif; ?>

            <p><b>Производитель:</b>
                <?= $product['brand']; ?>
            </p>
            <p><b>Наличие:</b>
                <?= Product::getAvailabilityText($product['is_available']); ?>
            </p>
            <p><b>Код товара:</b>
                <?= $product['code']; ?>
            </p><p><b>Цена: </b>
            <span class="price"><?= $product['price']; ?> &#8381;</span></p>
            <a href="#" class="cart add-to-basket" data-id="<?= $product['id_product']; ?>">В корзину <i class="fa fa-cart-plus"></i></a>
        </div>
    </div>
</div>
<div class="product-view-description-heading">Характеристики: </div>
<div class="product-view-description">
    <p><?= str_replace("\n", "</p><p>", $product['description']); ?></p>
</div>

<?php include './assets/tpl/layouts/footer.php'; ?>
