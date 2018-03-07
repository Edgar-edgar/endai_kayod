<?php
require_once('class/Subjects.php');
$subjects = Subjects::get_all();
echo '<pre>';
echo     json_encode(['subjects' => $subjects], JSON_PRETTY_PRINT);
echo '</pre>';
?>  