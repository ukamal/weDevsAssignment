<?php 

    try {
        $conn = new PDO('mysql:host=127.0.0.1;dbname=todo', 'root', '');
    } catch( PDOException $e ){
        echo 'Bohut Problem Ache!';
    } 

    function insertTodo($data){
        global $conn;
        $sql = "INSERT INTO `task`(`name`) VALUES (:title)";
        $stmt = $conn->prepare($sql);

        return $stmt->execute(array(
            ':title' => $data
        ));
    }


    function readData($table = 'task', $done = 0, $id = NULL){
        global $conn;
        $where = '';
        if( $id != NULL ){
            $where = " AND id = $id";
        }
        
        $sql = "SELECT * FROM $table  WHERE done = $done $where";
        $res = $conn->query($sql);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    function deleteTask($id){
        global $conn;
        $sql = "DELETE FROM task WHERE id = $id";
        
        return $conn->exec($sql);        
    }


    function updateTask($data, $id){
        global $conn;
        $sql = "UPDATE task SET name = :data WHERE id = :id";
        $stmt = $conn->prepare($sql);
        
        return $stmt->execute(array(
            ':data' => $data,
            ':id' => $id
        ));        
    }






