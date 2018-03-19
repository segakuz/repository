<?php include './assets/tpl/layouts/header.php'; ?>

    <div>
        <h2>Каталог</h2>
        <div>
            <?php foreach ($categories as $category): ?>
                <div>
                    <h4>
                        <a href="/category/<?= $category['id_category']; ?>"
                           class="<?php if ($categoryId == $category['id_category']) echo 'active'; ?>"> <?= $category['name']; ?>
                        </a>
                    </h4>
                </div>
            <?php endforeach; ?>
        </div>
    </div>



    <div>
        <h2>Последние товары</h2>
        <?php foreach ($categoryProducts as $product): ?>

            <div>
                <img src="<?= Product::getImage($product['id_product']); ?>" alt="" />
                <h2>$<?= $product['price']; ?></h2>
                <p>
                    <a href="/product/<?= $product['id_product']; ?>">
                        <?= $product['name']; ?>
                    </a>
                </p>
                <a href="/basket/add/<?= $product['id_product']; ?>" data-id="<?= $product['id_product']; ?>">
                    В корзину
                </a>
            </div>
            <?php if ($product['is_new']): ?>
                <img src="/template/images/home/new.png" class="new" alt="" />
            <?php endif; ?>

        <?php endforeach; ?>                              
    </div>

    <!-- Постраничная навигация -->
    <?= $pagination->get(); ?>



<?php include './assets/tpl/layouts/footer.php'; ?>