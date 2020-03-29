<?php 

require 'functions.php';

extract($_POST);

$id = (int) $id;

$sql = "UPDATE task SET done = :done WHERE id = :id";
$stmt = $conn->prepare($sql);

$res = $stmt->execute(array(
    ':done' => 1,
    ':id' => $id
));  

if( $res ) {
    echo 'Complete';
}
