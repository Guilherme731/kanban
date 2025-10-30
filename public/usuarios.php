<?php
include 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['nome'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO usuarios (nome, email) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $email);
    if($stmt->execute()){
        echo 'Usuário adicionado com sucesso!';
    }else{
        echo 'Erro ao cadastrar usuário.';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>
</head>
<body>
    <h1>Cadastrar Usuario</h1>
    <form>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" required>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>