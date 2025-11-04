<?php
session_start();
include '../public/db.php';

if (isset($_SESSION['email'])) {
    header('location: ../public/login.php');
}

$id = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM tarefas WHERE id = ?");
$stmt->bind_param("i", $id);
if($stmt->execute()){
    header('Location: index.php');
}else{
    header('Location: index.php');
}

?>