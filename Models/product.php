<?php
class Product {
    public $name;
    public $manu_id;
    public $type_id;
    public $price;
    public $pro_image;
    public $description;
    public $feature;
    public $created_at;
    public function __construct($name, $manu_id, $type_id, $price, $pro_image, $description, $feature, $created_at){
        $this->name = $name;
        $this->manu_id = $manu_id;
        $this->type_id = $type_id;
        $this->price = $price;
        $this->pro_image = $pro_image;
        $this->description = $description;
        $this->feature = $feature;
        $this->created_at = $created_at;
    }
}