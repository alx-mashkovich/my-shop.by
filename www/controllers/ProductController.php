<?php

/**
 * Description of PostController
 *
 * @author Алеша
 */
class ProductController {

    protected $product;

    public function __construct() {

        $this->product = new Product();
    }

    public function actionIndex($product_id) {

       /* $user_id = intval(User::getUserIdByLogin($product_id));

        $result = $this->post->getProduct($user_id, $product_id);

        $errors = false;

        if (!count($result)) {
            $errors[] = "Фото не найдено";
        }

        include_once ROOT . '/views/product/index.php';*/

        $product_id = intval($product_id);
        
        $result = $this->product->getProduct($product_id);
        
        include_once ROOT . '/views/product/index.php';
        
        
        return true;
    }

    public function actionList($page = 1) {

        //$user_id = intval(User::getUserIdByLogin($login));
        //$result = $this->post->getProductList($user_id);

        $errors = false;

        /* if (!1) {
          $errors[] = "У данного пользователя нет фотографий";
          }

          include_once ROOT . '/views/product/list.php'; */

        $result = $this->product->getProductList();
        
        include_once ROOT . '/views/product/list.php';
        
        return true;
    }

}
