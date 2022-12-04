<?php


class personalController
{

    public function actionIndex()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        require_once(ROOT . '/views/personal/index.php');
        return true;
    }

}
