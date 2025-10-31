<?php
include 'db.php';
$sqlTarefasAFazer = "SELECT * FROM tarefas WHERE status = 'a fazer'";
$resultAFazer = $conn->query($sqlTarefasAFazer);

$sqlTarefasFazendo = "SELECT * FROM tarefas WHERE status = 'fazendo'";
$resultFazendo = $conn->query($sqlTarefasFazendo);

$sqlTarefasPronto = "SELECT * FROM tarefas WHERE status = 'pronto'";
$resultPronto = $conn->query($sqlTarefasPronto);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
</head>
<body>
    <table>
        <tr>
            <td><strong>A Fazer</strong></td>
            <td><strong>Fazendo</strong></td>
            <td><strong>Pronto</strong></td>
        </tr>
        <tr>
            <td>
                <?php
                while($row = $resultAFazer->fetch_assoc()){
                    $idUsuario = $row['idUsuario'];
                    $sqlUsuario = "SELECT id, nome FROM usuarios WHERE id = $idUsuario";
                    $resultUsuario = $conn->query($sqlUsuario);
                    $nomeUsuario = $resultUsuario->fetch_assoc();
                    echo "
                    <div class='card'>
                        <span class='descricao'>" . $row['descricao'] . "</span> <br>
                        <span class='usuario'>" . $nomeUsuario['nome'] . "</span>
                        <span class='prioridade'> Prioridade: " . $row['prioridade'] . "</span> <br> 
                        <span class='setor'>" . $row['nomeSetor'] . "</span> <br>
                        <a href='moverTarefa.php?id=" . $row['id'] . "&status=fazendo'>Mover para Fazendo</a> <br>
                        <a href='moverTarefa.php?id=" . $row['id'] . "&status=pronto'>Mover para Pronto</a> <br>
                        <a href='editarTarefa.php?id=" . $row['id'] . "'>Editar Tarefa</a> <br>
                        <a href='excluirTarefa.php?id=" . $row['id'] . "'>Excluir Tarefa</a> <br>
                        <span class='data'>" . $row['dataCadastro'] . "</span>
                    </div>
                    ";
                }
                ?>
            </td>
            <td>
                <?php
                while($row = $resultFazendo->fetch_assoc()){
                    $idUsuario = $row['idUsuario'];
                    $sqlUsuario = "SELECT id, nome FROM usuarios WHERE id = $idUsuario";
                    $resultUsuario = $conn->query($sqlUsuario);
                    $nomeUsuario = $resultUsuario->fetch_assoc();
                    echo "
                    <div class='card'>
                        <span class='descricao'>" . $row['descricao'] . "</span> <br>
                        <span class='usuario'>" . $nomeUsuario['nome'] . "</span>
                        <span class='prioridade'> Prioridade: " . $row['prioridade'] . "</span> <br> 
                        <span class='setor'>" . $row['nomeSetor'] . "</span> <br>
                        <a href='moverTarefa.php?id=" . $row['id'] . "&status=fazendo'>Mover para Fazendo</a> <br>
                        <a href='moverTarefa.php?id=" . $row['id'] . "&status=pronto'>Mover para Pronto</a> <br>
                        <a href='editarTarefa.php?id=" . $row['id'] . "'>Editar Tarefa</a> <br>
                        <a href='excluirTarefa.php?id=" . $row['id'] . "'>Excluir Tarefa</a> <br>
                        <span class='data'>" . $row['dataCadastro'] . "</span>
                    </div>
                    ";
                }
                ?>
            </td>
            <td>
                <?php
                while($row = $resultPronto->fetch_assoc()){
                    $idUsuario = $row['idUsuario'];
                    $sqlUsuario = "SELECT id, nome FROM usuarios WHERE id = $idUsuario";
                    $resultUsuario = $conn->query($sqlUsuario);
                    $nomeUsuario = $resultUsuario->fetch_assoc();
                    echo "
                    <div class='card'>
                        <span class='descricao'>" . $row['descricao'] . "</span> <br>
                        <span class='usuario'>" . $nomeUsuario['nome'] . "</span>
                        <span class='prioridade'> Prioridade: " . $row['prioridade'] . "</span> <br> 
                        <span class='setor'>" . $row['nomeSetor'] . "</span> <br>
                        <a href='moverTarefa.php?id=" . $row['id'] . "&status=fazendo'>Mover para Fazendo</a> <br>
                        <a href='moverTarefa.php?id=" . $row['id'] . "&status=pronto'>Mover para Pronto</a> <br>
                        <a href='editarTarefa.php?id=" . $row['id'] . "'>Editar Tarefa</a> <br>
                        <a href='excluirTarefa.php?id=" . $row['id'] . "'>Excluir Tarefa</a> <br>
                        <span class='data'>" . $row['dataCadastro'] . "</span>
                    </div>
                    ";
                }
                ?>
            </td>
        </tr>
        
    </table>
</body>
</html>