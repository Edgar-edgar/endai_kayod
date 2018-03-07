<?php 
require_once('ServicesDatabaseManager.php');
class Subjects{
    public $id;
    public $name;
    public $price;
  
    function __construct($subjects){
        $this->$name = $row['name'];
        $this->$price = $row['price'];
    }

    function save_subjects(){
        $db = new ServicesDatabaseManager();
        $students = $db->save_students();
        return $students;
    }

    static function get_all(){
        $db = new ServicesDatabaseManager();
        $subjects = $db->get_all_subjects();
        return $subjects;

    }
}
?>