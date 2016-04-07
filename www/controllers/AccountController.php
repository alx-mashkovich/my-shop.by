<?php

/**
 * Description of AccountController
 *
 * @author Алеша
 */
class AccountController{

    protected $account;

    public function __construct() {

        $this->account = new Account(User::checkLogged());
    }
    
    public function actionIndex($page = 1) {

        $page = intval($page);
        
        if($page == 0) {
            $page = 1;
        }

        $result = $this->account->getProductList($page);
        
        if (!count($result)) {
            $errors[] = 'У вас нет товаров в продаже';
        }

        include_once ROOT . '/views/account/accountList.php';
    }
    

}
