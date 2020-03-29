<?php 
    require 'functions.php';

    
    $data = readData('task', 0, $_GET['edit']);

    if( isset($_POST['title']) ){
        updateTask($_POST['title'], $_GET['edit']);
        
        header('Location: http://localhost/update');
    }
        
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TODO App</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-xs-offest-2">
                <h1>Edit Task!</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <form action="update.php?edit=<?php echo $data[0]['id']; ?>" method="POST">
                    @csrf
                    <input type="text" name="title" value="<?php echo $data[0]['name']; ?>">
                    <button class="btn btn-md bg-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>