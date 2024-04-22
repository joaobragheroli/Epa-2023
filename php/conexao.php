<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'form';

    $conn = new mysqli($host, $user, $password, $database);

    if ($conn->connect_error) {
        die('Erro de conexão com o banco de dados');
    }

?>