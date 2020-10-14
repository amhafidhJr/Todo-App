<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<title>ToDo App</title>
</head>
<body>

<header>
    <div class="container mt-3">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <b><a class="navbar-brand" href="#">Todo App</a></b>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#taskModal"><i class= "fas fa-plus"></i>Add Task</button>
        </li>
        </ul>
        </div>
        </nav>
    </div>
</header>

<main>
    <br><br>
    <div class="container">
       <table class="table table-striped table-bordered table-responsive" id="taskDataTable">
           <thead class="thead-inverse">
               <tr>
                   <th></th>
                   <th>No</th>
                   <th>Task</th>
                   <th>Date</th>
                   <th>Action</th>
               </tr>
               </thead>
               <tbody>

                <?php 
                    require_once("includes/connection.php");
                    $sqlQuery = "SELECT * FROM todoapp.info_table";
                    $statement = $con->prepare($sqlQuery);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    $count = 0;

                    if($result == true) {
                        foreach($result as $row) {
                            $count++;
                     
                ?>
                   <tr>
                       <td><div class="form-check">
                           <input id="my-input" class="form-check-input" type="checkbox" name="" value="true">

                       </div></td>
                       <td><?php echo $count; ?></td>
                       <td><?php echo $row[1]; ?></td>
                       <td><?php echo $row[2]; ?></td>
                       <td>
                           <a href="includes/delete.php?info_id=<?php echo $row[0]; ?>" name="deleteTask" id="" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i></a>
                       </td>
                   </tr>
                        <?php }} ?>
               </tbody>
       </table> 
    </div>
</main>

<div id="taskModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Title</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="includes/addTask.inc.php">
                <div class="form-group">
                  <label for=""> Enter Task Name</label>
                  <input type="text" name="taskName" id="" class="form-control" placeholder="">
                </div>
                <div class="form-group" id="dateTimePicker">
                  <label for="">Choose Date</label>
                  <input type="date" name="taskDate"  class="form-control" placeholder="">
                </div>
                <br>
                <input type="submit" name ="save"  value="Save" class="btn btn-primary">
                </form>
            </div>
            <div class="modal-footer text-1">
                Created By <a href="">amHafidhJr</a> 
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
</body>
</html>

<script>
   $(document).ready(function () {
       $('#taskDataTable').DataTable();
   });
</script>