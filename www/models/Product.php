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

        $result = $this->db->prepare("SELECT p.id, u.email, u.phone, concat(u.second_name, ' ', u.first_name, ' ', u.patronymic) as fio, p.name, p.description, p.price, image"
                . " FROM product p, user u"
                . " WHERE p.access = 1"
                . " AND p.id = :product_id"
                . " AND u.id = p.user_id");

        $result->bindParam(':product_id', $product_id, PDO::PARAM_INT);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetch();
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

        $result = $this->db->prepare("SELECT id, name, price, image FROM product WHERE access = 1 ORDER BY id DESC LIMIT :count OFFSET :offset");
        $result->bindParam(':count', $count, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result->fetchAll();
    }

    /**
     * Description of getProductList
     * Генерим линки на продукт
     * @param array $productList
     * @return array $productList
     * @author Алеша
     */
    public function setLinkToProductList($productList) {

        $className = strtolower(get_called_class());

        foreach ($productList as $key => $item) {
            $productList[$key]['link'] = DS . $className . DS . $item['id'];
        }

        return $productList;
    }

}
