<?php

class Order
{
    public static function saveOrder(){
        $cen=[];
        $tov=[];
        $ddd = date("d.m.Y");
        $userBaz = $_SESSION['user']['login'];
        foreach ($_SESSION['cart'] as $p):
            array_push($cen, $p['price']);
            settype($p['price'], "integer");
            array_push($tov, $p['header']);
            $tov[] .= " (штук: ";
            $tov[] .= $p['dubler'];
            $tov[] .= ")";
        endforeach;

        $tovBaz = implode('', $tov);
        $cenBaz = array_sum($cen);

        $db = Db::getConnection();
        $sql = 'INSERT INTO orders (user, data, tovars, price)'
            . 'VALUES (:user, :data, :tovars, :price)';

        $result = $db->prepare($sql);
        $result->bindParam('user', $userBaz, PDO::PARAM_STR);
        $result->bindParam('data', $ddd, PDO::PARAM_STR);
        $result->bindParam('tovars', $tovBaz, PDO::PARAM_STR);
        $result->bindParam('price', $cenBaz, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getOrders(){
        $db = Db::getConnection();

        $userBaz = $_SESSION['user']['login'];
        $result = $db->query("SELECT * FROM orders WHERE user = '{$userBaz}'");

        $orderList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $orderList[$i]['data'] = $row['data'];
            $orderList[$i]['tovars'] = $row['tovars'];
            $orderList[$i]['price'] = $row['price'];
            $i++;
        }
        return $orderList;
    }
}