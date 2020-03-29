<?php 
    require 'functions.php';

    $btn = 'Add';


    $action = 'add';

    if( isset($_GET['delete']) ){
        $delete = deleteTask($_GET['delete']);
        
        if($delete) {
            $msg = 'Successfully Deleted!';
        }
    }


    if( isset($_GET['edit']) ){
        $action = 'edit';
        $btn = "Save";
        
        $data = readData('task', 0, $_GET['edit']);
        
        if( isset($_POST['title']) && $_GET['action'] == 'edit' ){
            updateTask($_POST['title'], $_GET['edit']);
        }
        
        
    }


    if(isset($_POST['title']) ) {
        
        if( insertTodo( $_POST['title'] ) ) {
            $msg = 'Successfully Inserted!';
        }
        
    }
    

    $tasks = readData();
    $taskCompleted = readData('task', 1);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>weDevs Assignment</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    
    <div class="container text-center">
        <div class="row">
            <div class="col-md-12">
                <h1 style="color: #ECDFE1;font-size: 70px">todos</h1>
                <p><?php echo isset($msg) ? $msg : ''; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="weDevsTodo">
                    <form action="#" method="POST">
                    <input style="border: none;" class="form-control" type="text" name="title">
                </form>
           
                <ul class="todo" id="todoList" style="list-style-type: none;" class="form-control">
                    <?php
                        foreach( $tasks as $task ){
                            echo '<li data-id="'.$task['id'].'" id="id_'.$task['id'].'">'. $task['name'] .' <a class="btn bg-danger" href="?delete='. $task['id'] .'">X</a> <a class="btn bg-success" href="update.php?edit='. $task['id'] .'">Edit</a> </li>';
                        }
                    ?>
                </ul>
                </div>
            </div>
        </div>
    </div>
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>