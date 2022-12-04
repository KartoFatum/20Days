<?php include ROOT . "/views/layouts/header.php"; ?>
<table>
    <th>
        номер заказа

    </th>

    <th>
        товар
    </th>
    <th>
        количество
    </th>
    <th>
        дата заказа
    </th>
<? foreach ($table as $stroka):


?>
    <tr>

        <td>
            <?echo $stroka ['id']
            ?>
        </td>
        <td>
            <?echo $stroka ['products']
            ?>
        </td>
        <td>
            <?echo $stroka ['id']
            ?>
        </td>



        <td>
            <?echo $stroka ['date']
            ?>
        </td>

    </tr>
<?endforeach;
?>
</table>
<?php include ROOT . "/views/layouts/footer.php"; ?>

