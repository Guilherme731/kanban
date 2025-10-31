<?php
include 'db.php';
$sqlUsuarios = 'SELECT * FROM usuarios';
$result = $conn->query($sqlUsuarios);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Tarefas</title>
</head>
<body>
    <h1>Inserir uma Tarefa</h1>
    <form action="" method="post">
        <label for="usuario">Usuário:</label>
        <select name="usuario" id="usuario" required>
            <?php
            while ($row = $result->fetch_assoc()){
            ?>
            <option value="<?=$row['id']?>"><?=$row['nome']?></option>
            <?php
            }
            ?>
            
        </select>
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao" required>
        <label for="nomeSetor">Nome do Setor:</label>
        <input type="text" name="nomeSetor" id="nomeSetor" required>
        <label for="prioridade">Prioridade:</label>
        <select name="prioridade" id="prioridade" required>
            <option value="alta">Alta</option>
            <option value="media">Média</option>
            <option value="baixa">Baixa</option>
        </select>
        <label for="dataCadastro">Data de Cadastro:</label>
        <input type="date" name="dataCadastro" id="dataCadastro" required>
        <input type="submit" value="Adicionar Tarefa">
    </form>
</body>
</html>