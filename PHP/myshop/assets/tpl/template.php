<?php foreach ($categories as $categoryItem): ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a href="/category/<?php echo $categoryItem['id']; ?>">
                    <?php echo $categoryItem['name']; ?>
                </a>
            </h4>
        </div>
    </div>
<?php endforeach; ?>




<?php foreach ($latestProducts as $product): ?>
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="<?php echo Product::getImage($product['id']); ?>" alt="" />
                    <h2>$<?php echo $product['price']; ?></h2>
                    <p>
                        <a href="/product/<?php echo $product['id']; ?>">
                            <?php echo $product['name']; ?>
                        </a>
                    </p>
                    <a href="#" class="btn btn-default add-to-cart" data-id="<?php echo $product['id']; ?>"><i class="fa fa-shopping-cart"></i>В корзину</a>
                </div>
                <?php if ($product['is_new']): ?>
                    <img src="/template/images/home/new.png" class="new" alt="" />
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>


                       
<?php foreach ($sliderProducts as $sliderItem): ?>
    <div class="item">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <img src="<?php echo Product::getImage($sliderItem['id']); ?>" alt="" />
                    <h2>$<?php echo $sliderItem['price']; ?></h2>
                    <a href="/product/<?php echo $sliderItem['id']; ?>">
                        <?php echo $product['name']; ?>
                    </a>
                    <br/><br/>
                    <a href="#" class="btn btn-default add-to-cart" data-id="<?php echo $sliderItem['id']; ?>"><i class="fa fa-shopping-cart"></i>В корзину</a>
                </div>
                <?php if ($sliderItem['is_new']): ?>
                    <img src="/template/images/home/new.png" class="new" alt="" />
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
