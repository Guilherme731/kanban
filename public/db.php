<?php

$dbname = 'kanban';
$host = 'localhost';
$user = 'root';
$pass = 'root';

$conn = new mysqli($host, $user, $pass, $dbname);

if($conn -> connect_error){
    die("Erro ao conectar com o banco de dados!");
}

?>