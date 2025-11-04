<?php
session_start();
include '../public/db.php';

if (isset($_SESSION['email'])) {
    header('location: ../public/login.php');
}
include 'boredAPI.php';
$sqlUsuarios = 'SELECT * FROM usuarios';
$result = $conn->query($sqlUsuarios);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sqlTarefa = "SELECT * FROM tarefas WHERE id = $id";
    $resultTarefa = $conn->query($sqlTarefa);
    $form = $resultTarefa->fetch_assoc();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $idUsuario = $_POST['usuario'];
        $descricao = $_POST['descricao'];
        $nomeSetor = $_POST['nomeSetor'];
        $prioridade = $_POST['prioridade'];

        $stmt = $conn->prepare("UPDATE tarefas SET idUsuario = ?, descricao = ?, nomeSetor = ?, prioridade = ? WHERE id = ?");
        $stmt->bind_param("isssi", $idUsuario, $descricao, $nomeSetor, $prioridade, $id);
        if ($stmt->execute()) {
            header('Location: kanban.php');
        } else {
            header('Location: kanban.php');
        }
    } else {
        $idUsuario = $_POST['usuario'];
        $descricao = $_POST['descricao'];
        $nomeSetor = $_POST['nomeSetor'];
        $prioridade = $_POST['prioridade'];
        $dataCadastro = date('Y') . '-' . date('m') . '-' . date('d');
        $status = 'a fazer';

        $stmt = $conn->prepare("INSERT INTO tarefas (idUsuario, descricao, nomeSetor, prioridade, dataCadastro, status) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssss", $idUsuario, $descricao, $nomeSetor, $prioridade, $dataCadastro, $status);
        if ($stmt->execute()) {
            echo"<div class='confirmar verde'>
        <p>Tarefa adicionada com Sucesso!</p>
        <a href=''>Fechar</a>
    </div>";
        } else {
            echo"<div class='confirmar'>
        <p>Erro ao adicionar tarefa.</p>
        <a href=''>Fechar</a>
    </div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Tarefas</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <h1><?php if (isset($_GET['id'])) {
            echo 'Editar uma Tarefa';
        } else {
            echo 'Inserir uma Tarefa';
        } ?></h1>
    <div class="links">
        <a href="index.php">Kanban</a>
        <a href="../public/usuarios.php">Cadastrar Usuários</a>
        <a href="sair.php">Encerrar Sessão</a>
    </div>
    <div class="centralizar-flex">
        <form action="" method="post">
            <label for="usuario">Usuário:</label>
            <select name="usuario" id="usuario" required>
                <?php
                while ($row = $result->fetch_assoc()) {
                ?>
                    <option value="<?= $row['id'] ?>" <?php if (isset($_GET['id'])) {
                                                        if ($form['idUsuario'] == $row['id']) {
                                                            echo 'selected';
                                                        }
                                                    } ?>><?= $row['nome'] ?></option>
                <?php
                }
                ?>

            </select>
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" value="<?php if (isset($_GET['id'])) {
                                                                            echo $form['descricao'];
                                                                        } else{
                                                                            echo obterSugestao();
                                                                        } ?>" required>
            <label for="nomeSetor">Nome do Setor:</label>
            <input type="text" name="nomeSetor" id="nomeSetor" value="<?php if (isset($_GET['id'])) {
                                                                            echo $form['nomeSetor'];
                                                                        } ?>" required>
            <label for="prioridade">Prioridade:</label>
            <select name="prioridade" id="prioridade" required>
                <option value="alta" <?php if (isset($_GET['id'])) {
                                            if ($form['prioridade'] == 'alta') {
                                                echo 'selected';
                                            }
                                        } ?>>Alta</option>
                <option value="media" <?php if (isset($_GET['id'])) {
                                            if ($form['prioridade'] == 'media') {
                                                echo 'selected';
                                            }
                                        } ?>>Média</option>
                <option value="baixa" <?php if (isset($_GET['id'])) {
                                            if ($form['prioridade'] == 'baixa') {
                                                echo 'selected';
                                            }
                                        } ?>>Baixa</option>
            </select>
            <input type="submit" id="enviar" value="<?php if (isset($_GET['id'])) {
                                            echo 'Editar';
                                        } else {
                                            echo 'Adicionar';
                                        } ?> Tarefa">
        </form>
    </div>

</body>

</html>