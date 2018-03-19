<?php include './assets/tpl/layouts/header.php'; ?>


    <div>
        <h2>Каталог</h2>
        <div>
            <?php foreach ($categories as $category): ?>
                    <div>
                        <h4>
                            <a href="/category/<?= $category['id_category'];?>">
                                <?php echo $category['name'];?>
                            </a>
                        </h4>
                    </div>
            <?php endforeach; ?>
        </div>
    </div>



    <div>
        <h2>Корзина</h2>

        <?php if ($productsInBasket): ?>
            <p>Вы выбрали такие товары:</p>
            <table>
                <tr>
                    <th>Код товара</th>
                    <th>Название</th>
                    <th>Стомость, $</th>
                    <th>Количество, шт</th>
                    <th>Удалить</th>
                </tr>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product['code'];?></td>
                        <td>
                            <a href="/product/<?= $product['id_product'];?>">
                                <?= $product['name'];?>
                            </a>
                        </td>
                        <td><?= $product['price'];?></td>
                        <td><?= $productsInBasket[$product['id_product']];?></td> 
                        <td>
                            <a href="/basket/delete/<?= $product['id_product'];?>">
                                del
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                    <tr>
                        <td colspan="4">Общая стоимость, rub:</td>
                        <td><?= $totalPrice;?></td>
                    </tr>

            </table>

            <a href="/basket/checkout">Оформить заказ</a>
        <?php else: ?>
            <p>Корзина пуста</p>

            <a href="/">Вернуться к покупкам</a>
        <?php endif; ?>

    </div>


<?php include './assets/tpl/layouts/footer.php'; ?>