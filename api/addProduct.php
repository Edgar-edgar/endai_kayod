<?php
require_once('../class/Products.php');
$product_info = [
   'name' => $_POST['name'],
    'price' => $_POST['price'],
    'quantity' => $_POST['quantity'],
    'total_sold' => = $_POST['total_sold']
];

$product = new Product($product_info);
echo $product;
?>