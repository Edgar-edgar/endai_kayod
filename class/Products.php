<?php 
require_once('InventoryDatabaseManager.php');
class Products{
    public $id;
    public $name;
    public $price;
    public $quantity;
    public $total_sold;

    function __construct($products){
        $this->$name = $row['name'];
        $this->$price = $row['price'];
        $this->$quantity = $row['quantity'];
        $this->$total_sold = $row['total_sold'];

    }
    
    function save(){
        $db = new InventoryDatabaseManager();
        $products = $db->save_products();
        return $products;

    }
    
    static function get_all(){
        $db = new InventoryDatabaseManager();
        $products = $db->get_all_products();
        return $products;
    }

    static function find($id){
        $db = new InventoryDatabaseManager();
        $products = $db->get_product($id);
        return $products;
    }
}
?>