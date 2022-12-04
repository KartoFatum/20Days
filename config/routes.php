<?php

return array(

    // паттерн => значение
    'cabinet/orders' => 'cabinet/orderlist',
//Продукт
    'product/([0-9]+)' => 'product/view/$1',

//Каталог
    'catalog' => 'catalog/index',
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'category/([0-9]+)' => 'catalog/category/$1',

//Карзина
    'cart/checkout' => 'cart/checkout',
    'cart/delete/([0-9]+)' => 'cart/delete/$1',
    'cart/add/([0-9]+)' => 'cart/add/$1',
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
    'cart' => 'cart/index',

//Пользователи
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'personal/edit' => 'personal/edit',
    'personal' => 'personal/index',

//О магазине
    'about' => 'site/about',

//Гл.страница
    'index.php' => 'site/index',
    '' => 'site/index',
);