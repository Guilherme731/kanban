<?php
include 'db.php';

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM tarefas WHERE id = ?");
$stmt->bind_param("i", $id);
if($stmt->execute()){
    header('Location: index.php');
}else{
    header('Location: index.php');
}

?>