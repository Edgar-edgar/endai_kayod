<?php 
class ServicesDatabaseManager{
    public $mysql = null;
    
    function __construct() {
        $this->mysql = mysqli_connect('localhost', 'root', '', 'services_database');
        if($this->mysql->error) {
            die('Error connecting to database');
        }
    }

    function get_all_students(){
        $sql = "SELECT * FROM students";
        $students = array();
        $result = $this->mysql->query($sql);
        while($row = $result->fetch_assoc()) {
            $students[] = [
                'first_name' => $row['first_name'],
                'last_name' => $row['last_name'],
            ];
        }
        return $students;
    }

    function get_all_subjects(){
        $sql = "SELECT * FROM subjects";
        $subjects = array();
        $result = $this->mysql->query($sql);
        while($row = $result->fetch_assoc()) {
            $subjects[] = [
                'name' => $row['name'],
                'price' => $row['price'],
            ];
        }
        return $subjects;
    }

    function save_student(){
        $sql = "INSERT INTO students (`name`, `price`) 
        VALUES ('?' '?' )";
        $stmt = $this->mysql->prepare($sql);
        $stmt->bind_param('sd', $student->name, $student->price);
        $stmt->execute();        
    }

    function save_subject(){
        $sql = "INSERT INTO ssubjects (`name`, `price`) 
        VALUES ('?' '?' )";
        $stmt = $this->mysql->prepare($sql);
        $stmt->bind_param('sd', $subject->name, $subject->price);
        $stmt->execute();        
    }

}
?>