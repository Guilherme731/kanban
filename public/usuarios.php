<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['nome'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO usuarios (nome, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);
    if ($stmt->execute()) {
        echo"<div class='confirmar verde'>
        <p>Usuário Cadastrado com Sucesso!</p>
        <a href=''>Fechar</a>
    </div>";
    } else {
        echo"<div class='confirmar'>
        <p>Erro ao cadastrar usuários</p>
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
    <h1>Cadastrar Usuario</h1>
    <div class="links">
        <a href="index.php">Kanban</a>
        <a href="cadastroTarefas.php">Cadastrar Tarefas</a>
    </div>
    <div class='centralizar-flex'>
        <form method="POST" action="">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" required>
            <input type="submit" id="enviar" value="Cadastrar">
        </form>
    </div>

</body>

</html>