<?php
require_once('../class/Products.php');
$logs = Logs::get_all();
echo json_encode(['logs' => $logs], JSON_PRETTY_PRINT);
?>