<?php

/**
 * Description of Post
 *
 * @author Алеша
 */
class Product {

    const COUNT_PRODUCT = 10;

    private $db;

    public function __construct() {

        $this->db = Db::getConnection();
    }

    /**
     * Description of getProduct
     * get product item
     * @param integer $product_id
     * @return Object
     * @author Алеша
     */
    public function getProduct($product_id) {

        $result = $this->db->prepare("SELECT id, name, description, price, image FROM product WHERE access = 1 AND id = :product_id");
        $result->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);

        $result = $result->fetch();

        return $result;
    }

    /**
     * Description of getProductList
     * get product list
     * @param integer $page ( default = 1)
     * @param integer $count
     * @return ObjectList
     * @author Алеша
     */
    public function getProductList($page = 1, $count = self::COUNT_PRODUCT) {

        $page = intval($page);
        $count = intval($count);
        $offset = ($page - 1) * $count;

        $result = $this->db->prepare("SELECT id, name, price, image FROM product WHERE access = 1 ORDER BY id DESC LIMIT :count OFFSET :offset");
        $result->bindParam(':count', $count, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetchAll();
    }

    /**
     * Description of getProductList
     * get product list
     * @param integer $page ( default = 1)
     * @param integer $count
     * @return fetchAll
     * @author Алеша
     */
    public static function getCount($user_id) {

        $user_id = intval($user_id);

        $db = Db::getConnection();

        $result = $db->prepare("SELECT COUNT(*) as post_count FROM posts WHERE user_id = :user_id");
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result = $result->fetch();

        return $result['post_count'];
    }

    public static function getLink($product_id) {

        return DS . strtolower(get_called_class()) . DS . $product_id;
    }

}
