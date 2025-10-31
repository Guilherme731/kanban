<?php
include 'db.php';

$id = $_GET['id'];
$status = $_GET['status'];

$stmt = $conn->prepare("UPDATE tarefas SET status = ? WHERE id = ?");
$stmt->bind_param("si", $status, $id);
if($stmt->execute()){
    header('Location: kanban.php');
}else{
    header('Location: kanban.php');
}

?>