<?php

/**
 * Description of User
 *
 * @author Алеша
 */
class User {

    const MIN_LENGTH_PASSWORD = 6;
    
    private $salt = "DJGhf9883Rd.31";
    private $db;

    public function __construct() {

        $this->db = DB::getConnection();
    }
    
    private function generateHashWithSalt($password) {
        
        $hashSalt = md5($this->salt);
        $hashSalt = substr($hashSalt, 0, 10);
        
        return hash("sha256", $password . $hashSalt);
    }
    
    public function registration($email, $password, $first_name, $second_name, $patronymic, $phone){
        
        $passwordHash = $this->generateHashWithSalt($password);
       
        $result = $this->db->prepare('INSERT INTO user (email, password, first_name, second_name, patronymic, phone) '
                . 'VALUES (:email, :passwordHash, :first_name, :second_name, :patronymic, :phone)');
        
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':passwordHash', $passwordHash, PDO::PARAM_STR);
        $result->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        $result->bindParam(':second_name', $second_name, PDO::PARAM_STR);
        $result->bindParam(':patronymic', $patronymic, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);

        return $result->execute();   
    }

    
    /**
     * Проверяет существует ли пользователь с заданными $email и $password
     * @param string $email
     * @param string $password
     * @return mixed : integer user id or false
     */
    public function checkUserData($email, $password) {

        $passwordHash = $this->generateHashWithSalt($password);
        
        $result = $this->db->prepare('SELECT id FROM user WHERE email = :email AND password = :passwordHash');
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':passwordHash', $passwordHash, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();

        if ($user) {
            return $user['id'];
        }

        return false;
    }

    
    
    /**
     * Проверяет валидность $email адреса
     * @param string $email
     * @return mixed : true or false
     */
    public function checkEmail($email) {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }

        return false;
    }

    /**
     * Проверяет валидность $password
     * @param string $password
     * @return mixed : true or false
     */
    public function checkPassword($password, $length = self::MIN_LENGTH_PASSWORD) {

        if (strlen($password) >= $length) {
            return true;
        }

        return false;
    }

    /**
     * Запоминаем в сессии $user_id авторизировавшегося юзера
     * @param integer $user_id
     * @return true
     */
    public function auth($user_id) {

        $_SESSION['user'] = $user_id;
        
        return true;
    }

    /**
     * Проверяет залогинен ли юзер
     * @return redirect or user_id
     */
    public function checkLogged() {

        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }

        header("Location: /user/login/");
    }
    
     /**
     * Проверяет является ли юзер гостем
     * @return mixed : true or false
     */
    public function isGuest() {

        if (isset($_SESSION['user'])) {
            return false;
        }

        return true;
    }

}
