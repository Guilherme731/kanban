<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
    if(password_verify($senha, $row['senha'])){
        $_SESSION["user_id"] = $row["id"];
        $_SESSION["user_email"] = $row["email"];
        header('Location: ../private/index.php');
    }else{
        echo"<div class='confirmar'>
        <p>Usuario ou senha incorretos</p>
        <a href=''>Fechar</a>
        </div>";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <h1>Login</h1>
    <div class="links">
        <a>Sistema de Gerenciamento de Tarefas</a>
    </div>
    <div class='centralizar-flex'>
        <form method="POST" action="">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" required>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>
            <input type="submit" id="enviar" value="Login">
        </form>
    </div>

</body>

</html>