<?php
    require_once ("connection.php");

    try {
        if(isset($_POST['save'])) {

            $taskName = $_POST['taskName'];
            $taskDate = $_POST['taskDate'];
            $status = "unchecked";

            $sqlQuery = "INSERT INTO todoapp.info_table VALUES (?,?,?,?)";
            $statement = $con->prepare($sqlQuery);
            $result = $statement->execute(array(null, $taskName, $taskDate, $status));

            if($result == true) {
                ?>
                    <script>
                        alert("Task Added Successully");
                        window.location.href = "../index.php";
                    </script>
                <?php
            }

            else {
                ?>
                    <script>
                        alert("Task Did Not added")
                        window.location.href = "../index.php";
                    </script>
                <?php
            }

        }
    } catch (PDOException $e) {
        echo "Error: " .$e->getMessage();
    }
?>