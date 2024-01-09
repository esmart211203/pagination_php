<?php
require_once('db.php');
require_once('product.php');


#class
class Product_Db extends Db{
    public function getAllProducts($page,$limit){
        $offset = ($page - 1) * $limit;
        $sql = self::$connection->prepare("SELECT * FROM tbl_product LIMIT ?, ?");
        $sql->bind_param("ii",$offset,$limit);  
        $sql->execute(); //return obj

        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        $arr_product = array();
        foreach ($items as $key => $value) {
            $arr_product[] = new Product($value['name'],$value['manu_id'],$value['type_id'],
            $value['price'],$value['pro_image'],$value['description'],$value['feature'],$value['created_at']);
        }
        return $arr_product;
    }
    public function getTotalProducts() {
        $sql = self::$connection->prepare("SELECT COUNT(*) as total FROM tbl_product");
        $sql->execute();
        $result = $sql->get_result()->fetch_assoc();
        return $result['total'];
    }
}