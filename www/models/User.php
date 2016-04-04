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
        $result->execute();

        return $result;
        
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
    public function checkLogger() {

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
    
    /**
     * Получить $user_id залогиненого юзера
     * @return $id
     */
    public function getLoginFromSessionID() {

        $user_id = intval($_SESSION['user']);
        
        return self::getLogin($user_id);

    }
    
    
    
     /**
     * Возвращает имя юзера по его $user_id
     * @param integer $user_id
     * @return mixed : string user name or false
     */
    
    public function getFirstName($user_id) {

        $user_id = intval($user_id);


        $result = $this->db->prepare("SELECT first_name FROM user WHERE id = :user_id");
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $user = $result->fetch();

        if ($user && !empty($user['name'])) {
            return $user['name'];
        }

        return false;
    }

    /**
     * Возвращает логин юзера по его $user_id
     * @param integer $user_id
     * @return mixed : string user login or false
     */
    /*public function getLogin($user_id) {

        $db = Db::getConnection();

        $result = $db->prepare("SELECT login FROM user WHERE id = :user_id");
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $user = $result->fetch();

        if ($user && !empty($user['login'])) {
            return $user['login'];
        }

        return false;
    }*/

    /**
     * Возвращает аватар юзера по его $user_id
     * @param integer $user_id
     * @return mixed : string user avatar or false
     */
    /*public function getAvatar($user_id) {

        $db = Db::getConnection();

        $result = $db->prepare("SELECT avatar FROM user WHERE id = :user_id");
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $user = $result->fetch();

        if ($user && !empty($user['avatar'])) {
            return $user['avatar'];
        }

        return false;
    }*/

    /**
     * Возвращает статус юзера по его $user_id
     * @param integer $user_id
     * @return mixed : string user status or false
     */
    /*public function getStatus($user_id) {

        $db = Db::getConnection();

        $result = $db->prepare("SELECT status FROM user WHERE id = :user_id");
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $user = $result->fetch();

        if ($user && !empty($user['status'])) {
            return $user['status'];
        }

        return false;
    }*/

    /**
     * Возвращает информацию о юзере по его $user_id
     * @param integer $user_id
     * @return array(
     * @param name
     * @param login
     * @param avatar
     * @param status
     * @param post
     * @param follower
     * @param subscriber
     * )
     */
    /*public function getUserInfoHeader($user_id) {

        $result = array();

        $result['name'] = self::getName($user_id);
        $result['login'] = self::getLogin($user_id);
        $result['avatar'] = self::getAvatar($user_id);
        $result['status'] = self::getStatus($user_id);
        $result['post'] = Post::getCount($user_id);
        $result['follower'] = Follower::getCountFollower($user_id);
        $result['subscriber'] = Follower::getCountSubscriber($user_id);

        return $result;
    }*/

    /**
     * Возвращает id юзера с указанным логином
     * @param string $login
     * @return mixed : integer user id or false
     */
    /*public function getUserIdByLogin($login) {

        $db = Db::getConnection();

        $result = $db->prepare("SELECT id FROM user WHERE login = :login");
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $user = $result->fetch();

        if ($user) {
            return $user['id'];
        }

        return false;
    }*/
    
    

}
