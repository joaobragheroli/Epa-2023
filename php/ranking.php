<?php
    include './conexao.php';
    include './cors.php';

    $sql = "SELECT nome,tempo,pontos,ranking FROM usuario";

    $result = $connection->query($sql);

    if ($connection->query($sql) === true) {
    echo "Se vira para fazer a lógica";
} else {
    echo "Da um retorno de erro ai e boa" . $connection->error;
}
?>