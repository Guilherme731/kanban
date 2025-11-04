<?php
include '../public/db.php';
$sqlTarefasAFazer = "SELECT * FROM tarefas WHERE status = 'a fazer' ORDER BY prioridade DESC, dataCadastro DESC;";
$resultAFazer = $conn->query($sqlTarefasAFazer);

$sqlTarefasFazendo = "SELECT * FROM tarefas WHERE status = 'fazendo' ORDER BY prioridade DESC, dataCadastro DESC;";
$resultFazendo = $conn->query($sqlTarefasFazendo);

$sqlTarefasPronto = "SELECT * FROM tarefas WHERE status = 'pronto' ORDER BY prioridade DESC, dataCadastro DESC;";
$resultPronto = $conn->query($sqlTarefasPronto);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Lista de Tarefas</title>
</head>
<body>
    <h1>Kanban</h1>
    <div class="links">
        <a href="cadastroTarefas.php">Cadastrar Tarefas</a>
        <a href="../public/usuarios.php">Cadastrar Usuários</a>
    </div>
    <table border="1">
        <tr>
            <td class="textoSuperior"><strong>A Fazer</strong></td>
            <td class="textoSuperior"><strong>Fazendo</strong></td>
            <td class="textoSuperior"><strong>Pronto</strong></td>
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
                        <div class='descricao'><span>" . $row['descricao'] . "</span></div> <br>
                        <span class='usuario'>" . $nomeUsuario['nome'] . "</span> <br>
                        <span class='prioridade'> Prioridade: <strong>" . $row['prioridade'] . "</strong></span> <br> 
                        <span class='setor'>Setor: " . $row['nomeSetor'] . "</span> <br><br>
                        <a class='botaoKanban' href='moverTarefa.php?id=" . $row['id'] . "&status=fazendo'>▶️Mover para Fazendo</a> <div style='padding: 6px;'></div>
                        <a class='botaoKanban' href='moverTarefa.php?id=" . $row['id'] . "&status=pronto'>⏩Mover para Pronto</a> <div style='padding: 6px;'></div>
                        <a class='botaoKanban' href='cadastroTarefas.php?id=" . $row['id'] . "'>✏️Editar Tarefa</a> <div style='padding: 6px;'></div>
                        <a class='bg-vermelho botaoKanban' href='index.php?excluir=" . $row['id'] . "'>❌Excluir Tarefa</a> <br>
                        <div class='data'><span>Criado em: " . $row['dataCadastro'] . "</span></div>
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
                        <div class='descricao'><span>" . $row['descricao'] . "</span></div> <br>
                        <span class='usuario'>" . $nomeUsuario['nome'] . "</span> <br>
                        <span class='prioridade'> Prioridade: <strong>" . $row['prioridade'] . "</strong></span> <br> 
                        <span class='setor'>Setor: " . $row['nomeSetor'] . "</span> <br><br>
                        <a class='botaoKanban' href='moverTarefa.php?id=" . $row['id'] . "&status=pronto'>▶️Mover para Pronto</a> <div style='padding: 6px;'></div>
                        <a class='botaoKanban' href='moverTarefa.php?id=" . $row['id'] . "&status=a fazer'>◀️Voltar para A Fazer</a> <div style='padding: 6px;'></div>
                        <a class='botaoKanban' href='cadastroTarefas.php?id=" . $row['id'] . "'>✏️Editar Tarefa</a> <div style='padding: 6px;'></div>
                        <a class='bg-vermelho botaoKanban' href='index.php?excluir=" . $row['id'] . "'>❌Excluir Tarefa</a> <br>
                        <div class='data'><span>Criado em: " . $row['dataCadastro'] . "</span></div>
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
                        <div class='descricao'><span>" . $row['descricao'] . "</span></div> <br>
                        <span class='usuario'>" . $nomeUsuario['nome'] . "</span> <br>
                        <span class='prioridade'> Prioridade: <strong>" . $row['prioridade'] . "</strong></span> <br> 
                        <span class='setor'>Setor: " . $row['nomeSetor'] . "</span> <br><br>
                        <a class='botaoKanban' href='moverTarefa.php?id=" . $row['id'] . "&status=fazendo'>◀️Voltar para Fazendo</a> <div style='padding: 6px;'></div>
                        <a class='botaoKanban' href='moverTarefa.php?id=" . $row['id'] . "&status=a fazer'>⏪Voltar para A Fazer</a> <div style='padding: 6px;'></div>
                        <a class='botaoKanban' href='cadastroTarefas.php?id=" . $row['id'] . "'>✏️Editar Tarefa</a> <div style='padding: 6px;'></div>
                        <a class='bg-vermelho botaoKanban' href='index.php?excluir=" . $row['id'] . "'>❌Excluir Tarefa</a> <br>
                        <div class='data'><span>Criado em: " . $row['dataCadastro'] . "</span></div>
                    </div>
                    ";
                }
                ?>
            </td>
        </tr>
        
    </table>
    <?php
    if(isset($_GET['excluir'])){
        echo"<div class='confirmar'>
        <p>Deseja realmente excluir a tarefa?</p>
        <a href='excluirTarefa.php?id=" . $_GET['excluir'] . "'>Excluir</a>
        <a href='index.php'>Cancelar</a>
    </div>";
    }
    ?>
    
</body>
</html>