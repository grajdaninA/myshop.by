<?php $curr = \myshop\App::$registry->getProperty('currency'); ?>
<?php if(!empty($_SESSION['cart'])):?>
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total price</th>
                <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION['cart'] as $id => $item): ?>
            <tr>
                <td>
                    <a href="product/<?= $item['alias'];?>">
                        <img src="images/<?=$item['img'];?>" alt="">
                    </a>
                </td>
                <td>
                    <a href="product/<?= $item['alias'];?>">
                        <?= $item['title'];?>
                    </a>
                </td>
                <td>
                    <?=$item['qty'];?>
                </td>
                <td>
                    <?=$curr['symbol_left']?>
                    <?=$item['price'] * $curr['value'];?>
                    <?=$curr['symbol_right']?>
                </td>
                <td>
                    <?=$curr['symbol_left']?>
                    <?=$item['price'] * $item['qty'] * $curr['value'];?>
                    <?=$curr['symbol_right']?>
                </td>
                <td>
                    <span data-id="<?=$id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span>
                </td>
            </tr>
            <?php endforeach;?>
            <tr>
                <td>Summary quantity:</td>
                <td colspan="5" class="text-right cart-qty"><?=$_SESSION['cart.qty']?></td>
            </tr>
            <tr>
                <td>Summary price:</td>
                <td colspan="5" class="text-right cart-sum">
                    <?=$curr['symbol_left']?>
                    <?=$_SESSION['cart.sum'] * $curr['value'];?>
                    <?=$curr['symbol_right']?>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<?php else:?>
    <h3>Cart is empty</h3>
<?php endif; ?>
