<?php 
    require_once("connection.php");

    try {

        $sqlQuery = "DELETE from todoapp.info_table where info_id = ". $_GET['info_id'];
        $statement = $con->prepare($sqlQuery);
        $statement->execute();

        ?>
        
        <script>
            window.location.href = "../index.php";
        </script>

        <?php

    } catch (PDOException $e) {
        echo "Error: " .$e->getMessage();   
    }

?>