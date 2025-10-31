<?php
include 'db.php';
$sqlUsuarios = 'SELECT * FROM usuarios';
$result = $conn->query($sqlUsuarios);

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $idUsuario = $_POST['usuario'];
    $descricao = $_POST['descricao'];
    $nomeSetor = $_POST['nomeSetor'];
    $prioridade = $_POST['prioridade'];
    $dataCadastro = date('Y') . '-' . date('m') . '-' . date('d');
    $status = 'a fazer';

    $stmt = $conn->prepare("INSERT INTO tarefas (idUsuario, descricao, nomeSetor, prioridade, dataCadastro, status) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $idUsuario, $descricao, $nomeSetor, $prioridade, $dataCadastro, $status);
    if($stmt->execute()){
        echo 'Tarefa adicionada com sucesso!';
    }else{
        echo 'Erro ao cadastrar tarefa.';
    }
}
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
        <input type="submit" value="Adicionar Tarefa">
    </form>
</body>
</html>