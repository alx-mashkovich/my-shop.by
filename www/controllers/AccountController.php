<?php

/**
 * Description of AccountController
 *
 * @author Алеша
 */
class AccountController {

    public function actionIndex() {

        $user_id = User::checkLogger();

        include_once (ROOT . '/views/account/index.php');
    }

}
