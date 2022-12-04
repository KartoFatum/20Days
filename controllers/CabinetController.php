<?php

class CabinetController
{
    public function actionOrderList()
    {
        $userName = User::checkLogged();
        $id = Cabinet::raspars(96);
        $table = Cabinet::showOrders();

        require_once(ROOT . '/views/cabinet/orders.php');

        return true;

    }


}