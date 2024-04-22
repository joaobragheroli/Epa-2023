<?php
    session_start();
    include './conexao.php';
    include './cors.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href='../style/login.css'>
    <title>Formulários</title>
</head>
<body>


    
    <div class="container">
        
        <form action="index.php" method="get">
    
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome">
    
            <br>
            <div class="botao">
                <input class="botaozinho" type="submit" name="acao" value="inserir">
                <input class="botaozinho" type="submit" name="acao" value="excluir">
            </div>


        </form>
        <a class="bJoguinho" href="../php/jogo.php">Jogar</a>
    </div>

    <?php 
        $nome = isset($_GET['nome']) ? $_GET['nome'] : null;
        $acao = isset($_GET['acao']) ? $_GET['acao'] : null;
        

        if ($acao == 'inserir'){
            $sql = "INSERT INTO login1 VALUES (0, '$nome');";

            if ($conn->query($sql) === true) {
                echo "Dados inseridos com sucesso!";
            } else {
                echo "Erro ao inserir dados: " . $conn->error;
            }
        }

        $_SESSION ['nome'] = $nome;
        echo $_SESSION['nome'];

        if ($acao == 'excluir'){
           include '../php/conexao.php';
      
            $sql = "DELETE FROM login WHERE nome ='$nome';";

             if ($conn->query($sql) === true) {
                echo "Dados inseridos com sucesso!";
            } else {
                echo "Erro ao inserir dados: " . $conn->error;
            }
        }
        ?>
</body>
</html>