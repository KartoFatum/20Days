<?php


class SiteController
{

    public function actionIndex()
    {
        $categories = Category::getCategoriesList();
        $latestProducts = Product::getLatestProducts(12);

        require_once(ROOT . '/views/site/index.php');
        return true;
    }

    public function actionAbout()
    {
        require_once(ROOT . '/views/site/about.php');
        return true;
    }



}
