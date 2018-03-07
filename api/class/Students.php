<?php 
require_once('ServicesDatabaseManager.php');
class Students{
    public $id;
    public $first_name;
    public $last_name;
  
    function __construct($academics){
        $this->$subject = $row['subject'];
        $this->$first_name = $row['first_name'];
        $this->$last_name = $row['last_name'];
    }

    function save_student(){
        $db = new ServicesDatabaseManager();
        $students = $db->save_student();
        return $students;
    }

    static function get_all(){
        $db = new ServicesDatabaseManager();
        $students = $db->get_all_students();
        return $students;
    }
}
?>