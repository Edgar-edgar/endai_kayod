<?php
require_once('../class/Products.php');
$products = Products::get_all();
echo json_encode(['products' => $products], JSON_PRETTY_PRINT);
?>