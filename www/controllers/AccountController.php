<?php

/**
 * Description of AccountController
 *
 * @author Алеша
 */
class AccountController{

    protected $account;

    public function __construct() {

        $this->account = new Account();
    }
    
    public function actionIndex($page = 1) {

        $user_id = User::checkLogger();
        
        $page = intval($page);
        
        if($page == 0){
            $page = 1;
        }

        include_once (ROOT . '/views/account/index.php');
    }
    

}
