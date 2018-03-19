<?php include './assets/tpl/layouts/header.php'; ?>



    <div>
        <h2>Каталог</h2>
        <div>
            <?php foreach ($categories as $category): ?>
                    <div>
                        <h4>
                            <a href="/category/<?= $category['id_category']; ?>">
                                <?= $category['name']; ?>
                            </a>
                        </h4>
                    </div>
            <?php endforeach; ?>
        </div>
    </div>



    <div>
        <img src="<?= Product::getImage($product['id_product']); ?>" alt="">
    </div>


    <div>

        <?php if ($product['is_new']): ?>
            <img src="/template/images/product-details/new.jpg" class="newarrival" alt="" />
        <?php endif; ?>

        <h2><?= $product['name']; ?></h2>
        <p>Код товара: <?= $product['code']; ?></p>
        <span>
            <span>Руб<?= $product['price']; ?></span>
            <a href="#" data-id="<?= $product['id_product']; ?>">
                В корзину
            </a>
        </span>
        <p><b>Наличие:</b> <?= Product::getAvailabilityText($product['is_available']); ?></p>
        <p><b>Производитель:</b> <?= $product['brand']; ?></p>
    </div>


    <div>
        <br/>
        <h5>Описание товара</h5>
        <p><?= str_replace("\r\n", '<br>', $product['description']); ?></p>
    </div>


<?php include './assets/tpl/layouts/footer.php'; ?>