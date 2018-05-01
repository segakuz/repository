<?php include './assets/tpl/layouts/header.php'; ?>

<div class="basket">
    <h2>Корзина</h2>

    <?php if ($productsInBasket): ?>
    <p>Вы выбрали такие товары:</p>
    <div class="table-container mgb">
        <table>
            <tr>
                <th>Код товара</th>
                <th>Название</th>
                <th>Стоимость</th>
                <th>Количество, шт</th>
                <th>Удалить</th>
            </tr>
            <?php foreach ($products as $product): ?>
            <tr>
                <td>
                    <?= $product['code'];?>
                </td>
                <td>
                    <a class="look" href="/product/<?= $product['id_product'];?>">
                        <?= $product['name'];?> <span> <i class="fa fa-eye"></i></span>
                    </a>
                </td>
                <td>
                    <?= $product['price'];?> &#8381;
                </td>
                <td>
                    <?= $productsInBasket[$product['id_product']];?>
                </td>
                <td>
                    <a class="del" href="/basket/delete/<?= $product['id_product'];?>"><i class="fa fa-times"></i>
                            </a>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="4">Общая стоимость:</td>
                <td>
                    <?= $totalPrice;?> &#8381;
                </td>
            </tr>
        </table>
    </div>
    <a class="btn" href="/basket/checkout">Оформить заказ</a>
    <?php else: ?>
    <p>Корзина пуста</p>
    <a class="btn" href="/catalog/">Вернуться к покупкам</a>
    <?php endif; ?>

</div>

<?php include './assets/tpl/layouts/footer.php'; ?>
