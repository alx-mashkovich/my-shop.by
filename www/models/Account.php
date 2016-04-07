<?php


/**
 * Description of Account
 *
 * @author Алеша
 */
class Account extends Product{

    private $user_id; 
    
    public function __construct($user_id) {
        $this->user_id = $user_id;
        parent::__construct();
    }
    
    /**
     * Description of getProductList
     * get product list
     * @param integer $page ( default = 1)
     * @param integer $count
     * @return ObjectList
     * @author Алеша
     */
    public function getProductList($page, $count = self::COUNT_PRODUCT) {
        
        $offset = ($page - 1) * $count;

        $result = $this->db->prepare("SELECT id, name, price, image, description, amount FROM product WHERE user_id = :user_id AND access = 1 ORDER BY id DESC LIMIT :count OFFSET :offset");
        $result->bindParam(':user_id', $this->user_id, PDO::PARAM_INT);
        $result->bindParam(':count', $count, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetchAll();
    }
    
}
