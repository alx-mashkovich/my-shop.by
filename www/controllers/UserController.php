<?php

/**
 * Description of UserController
 *
 * @author Алеша
 */
class UserController {

    protected $user;

    public function __construct() {

        $this->user = new User();
    }

    public function actionLogin() {

        $email = '';
        $password = '';

        if (isset($_POST['submit'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;
                    
            if (!$this->user->checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }

            if (!$this->user->checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            if($errors == false){
               $user_id = $this->user->checkUserData($email, $password);

                if ($user_id == false) {
                    $errors[] = 'Неправильне данные для входа на сайт';
                } else {
                    User::auth($user_id);
                    header("Location: /account/");
                } 
            }
            
        }

        include_once(ROOT . '/views/user/login.php');

        return true;
    }


    public function actionRegistration() {

        $email = '';
        $password = '';
        $first_name = '';
        $second_name = '';
        $patronymic = '';
        $phone = '';
        
        if (isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['first_name']) && isset($_POST['phone'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];
            $first_name = $_POST['first_name'];
            $second_name = $_POST['second_name'];
            $patronymic = $_POST['patronymic'];
            $phone = $_POST['phone'];
            
            $errors = false;

            if (!$this->user->checkEmail($email)) {
                $errors[] = 'Введите валидный email адрес';
            }

            if (!$this->user->checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            
            if ($errors == false) {
                if(!$this->user->checkUserData($email, $password)){
                    if (!$this->user->registration($email, $password, $first_name, $second_name, $patronymic, $phone)) {
                      $errors[] = 'Ошибка при регистрации!';
                    } else {
                        header("Location: /user/login");
                    }
                } else { 
                  $errors[] = 'Пользователь с данным email-ом существует!';  
                }
                
            }
            
        }

        include_once(ROOT . '/views/user/registration.php');

        return true;
    }

    public function actionLogout() {

        unset($_SESSION['user']);
        header("Location: /");
    }

}
