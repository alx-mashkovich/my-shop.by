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
        
        $errors = false;
        
        $product_id = intval($product_id);

        $result = $this->product->getProduct($product_id);
        
        if (!count($result)) {
            $errors[] = 'Товар не найдены';
        }
        
        include_once ROOT . '/views/product/index.php';

        return true;
    }

    public function actionList($page = 1) {

        $errors = false;

        $page = intval($page);

        $result = $this->product->getProductList($page);

        if (!count($result)) {
            $errors[] = 'В магазине товаров нет';
            goto gotoview;
        }

        $result = $this->product->setLinkToProductList($result);

        gotoview:
        include_once ROOT . '/views/product/list.php';

        return true;
    }
    
    public function actionDeleteAjax($product_id){
        
        echo "action delete ajax";
    }

}
