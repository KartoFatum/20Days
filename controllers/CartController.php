<?php


class CartController
{

    //добавление товара
    public function actionAdd($id)
    {
        Cart::addProduct($id);

        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }

    // кол-во товаров
    public function actionAddAjax($id)
    {
        echo Cart::addProduct($id);
        return true;
    }


    //удаление товара из корзины
    public function actionDelete($id)
    {
        Cart::deleteProduct($id);

        header("Location: /cart");
    }

    // корзина
    public function actionIndex()
    {
        $categories = Category::getCategoriesList();

        $productsInCart = Cart::getProducts();

        if ($productsInCart) {

            $productsIds = array_keys($productsInCart);
            $products = Product::getProdustsByIds($productsIds);

            $totalPrice = Cart::getTotalPrice($products);
        }

        require_once(ROOT . '/views/cart/index.php');
        return true;
    }

    //оформление
    public function actionCheckout()
    {
        $productsInCart = Cart::getProducts();

        if ($productsInCart == false) {
            header("Location: /");
        }

        $categories = Category::getCategoriesList();

        $productsIds = array_keys($productsInCart);
        $products = Product::getProdustsByIds($productsIds);
        $totalPrice = Cart::getTotalPrice($products);
        $totalQuantity = Cart::countItems();

        $userName = false;
        $userPhone = false;
        $userComment = false;

        $result = false;

        if (!User::isGuest()) {

            $userId = User::checkLogged();
            $user = User::getUserById($userId);
            $userName = $user['name'];
        } else {

            $userId = false;
        }

        if (isset($_POST['submit'])) {


            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];


            $errors = false;

                if (User::isGuest()) {
                    $userId = 1;
                } else {
                    $userId = User::checkLogged();
                }


            if (!User::checkName($userName)) {
                $errors[] = 'Неправильное имя';
            }
            if (!User::checkPhone($userPhone)) {
                $errors[] = 'Неправильный телефон';
            }


            if ($errors == false) {

                $result = Order::save($userName, $userPhone, $userComment, $userId, $productsInCart);

                  Cart::clear();
            }
        }

        require_once(ROOT . '/views/cart/checkout.php');
        return true;
    }

}
