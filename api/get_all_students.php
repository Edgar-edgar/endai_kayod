<?php
require_once('class/Students.php');
$students = Students::get_all();
echo '<pre>';
echo     json_encode(['students' => $students], JSON_PRETTY_PRINT);
echo '</pre>';
?>  