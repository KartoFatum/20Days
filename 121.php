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
<div id="content">
    <h2>Добро пожаловать в Ваш личный кабинет!</h2>
    <br>
    <?php $orderList = Order::getOrders(); ?>

    <h4>Ваша история заказов</h4>
    <table border="2" class="table table-striped">
        <th class="stolbec">Дата заказа</th>
        <th class="stolbec">Товары</th>
        <th class="stolbec">Стоимость</th>
        <?php foreach ($orderList as $o): ?>
            <tr class="stroka">
                <td class="stolbec"><?php echo $o["data"]; ?></td>
                <td class="stolbec">
                    <?php $perenos = str_replace(')', ")\n", $o["tovars"]); ?>
                    <?php echo nl2br($perenos); ?>
                </td>
                <td class="stolbec"><?php echo $o["price"]; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>


<?php include ('layout/footer.php')?>
</body>
</html>