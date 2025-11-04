<?php
include '../public/db.php';

$id = $_GET['id'];
$status = $_GET['status'];

$stmt = $conn->prepare("UPDATE tarefas SET status = ? WHERE id = ?");
$stmt->bind_param("si", $status, $id);
if($stmt->execute()){
    header('Location: index.php');
}else{
    header('Location: index.php');
}

?>