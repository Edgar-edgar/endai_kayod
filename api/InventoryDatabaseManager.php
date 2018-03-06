<?php 
class InventoryDatabaseManager{
    public $mysql = null;
    
    function __construct() {
        $this->mysql = mysqli_connect('localhost', 'root', '', 'inventory_system');
        if($this->mysql->error) {
            die('Error connecting to database');
        }
    }

    function save_product($product){
        $sql = "INSERT INTO products (`name`, `price`, `quantity`) 
        VALUES ('?' '?' '?' )";
        $stmt = $this->mysql->prepare($sql);
        $stmt->bind_param('sdd', $product->name, $product->price, $product->quantity);
        $stmt->execute();
    }

    function get_all_products(){
        $sql = 'SELECT * FROM products';
        $products = array();
        $result = $this->mysql->query($sql);
        while($row = $result->fetch_assoc()) {
            $products[] = [
                'product_id' => $row['id'],
                'product_name' => $row['name'],
                'product_price' => $row['price'],
                'product_quantity' => $row['quantity'],
            ];
        }
        return $products;
    }

    function get_product($id) {
        $query = "SELECT * from products where id = $id";
        $item_details = array();
        $result = $this->mysql->query($query);
        while ($row = $result->fetch_assoc()) {
            $item_details = [
                'name' => $row['name'],
                'price' => $row['price'],
                'quantity' =>$row['quantity'],
            ];
        }
        return $item_details;
    }

    function show_logs(){
        $query = "SELECT products.name, users.username, quantity, total_sales, created_on FROM logs, products, users 
        WHERE logs.product_id = products.id AND logs.modified_by = users.id";
        $logs = array();
        $result = $this->mysql->query($query);
        while ($row = $result->fetch_assoc()) {
            $logs[] = [    
                'product_name' => $row['name'], 
                'quantity' => $row['quantity'], 
                'total_sales' => $row['total_sales'], 
                'in_charge' => $row['username'], 
                'created_on' => $row['created_on'], 
            ];
        }
        return $logs;
    }

    function sell_item() {
        $query = "UPDATE products 
                    SET total_sold = total_sold + $sell_item, quantity = quantity - $sell_item 
                    WHERE id = $sell_id;";
        $result[1] = $this->mysql->query($query);
        
        $query = "INSERT into logs  (id,id, quantity, total_sales)
                    SELECT $sell_id, 1, $sell_item, product_price * $sell_item 
                    FROM products WHERE id = $sell_id;";
        $result[2] = $this->mysql->query($query);
        return $result;
    }
}
?>