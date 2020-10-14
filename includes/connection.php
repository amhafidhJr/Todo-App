<?php 

    $USER = "root";
    $PASSWORD = "ghost";
    $DB_NAME = "todoapp";


    try {
        
        $con = new PDO("mysql:host = 'localhost'; dbname = $DB_NAME", $USER, $PASSWORD);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }


?>