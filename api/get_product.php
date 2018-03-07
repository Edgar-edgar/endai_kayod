<?php
require_once('class/Products.php');
$id = 5;
$products = Products::find($id);
echo json_encode($products);
?>