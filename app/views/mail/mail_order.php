<?php $curr = \myshop\App::$registry->getProperty('currency'); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<table style="border: 1px solid #ddd; border-collapse: collapse; width: 100%;">
    <thead>
    <tr style="background: #f9f9f9;">
        <th style="padding: 8px; border: 1px solid #ddd;">Наименование</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Кол-во</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Цена</th>
        <th style="padding: 8px; border: 1px solid #ddd;">Сумма</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($_SESSION['cart'] as $item): ?>
        <tr>
            <td style="padding: 8px; border: 1px solid #ddd;"><?=$item['title'] ?></td>
            <td style="padding: 8px; border: 1px solid #ddd;"><?=$item['qty'] ?></td>
            <td style="padding: 8px; border: 1px solid #ddd;">
            <?=$curr['symbol_left'] . $item['price'] * $curr['value'] . " " . $curr['symbol_right']; ?>
            </td>
            <td style="padding: 8px; border: 1px solid #ddd;">
                <?=$curr['symbol_left'] . $item['price'] * $item['qty'] * $curr['value'] . " " . $curr['symbol_right'];?>
            </td>
        </tr>
    <?php endforeach;?>
    <tr>
        <td style="padding: 8px; border: 1px solid #ddd;">Итого:</td>
        <td style="padding: 8px; border: 1px solid #ddd;"><?=$_SESSION['cart.qty'] ?></td>
        <td style="padding: 8px; border: 1px solid #ddd;"></td>
        <td style="padding: 8px; border: 1px solid #ddd;">
            <?= $curr['symbol_left'] . $_SESSION['cart.sum'] * $curr['value'] . " " . $curr['symbol_right']; ?>
        </td>
    </tr>
    </tbody>
</table>

</body>
</html>