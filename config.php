<?php

    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '10122007';
    $dbName = 'formulario_cadastro';

    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

    // if($conexao->connect_errno)
    // {
    //     echo "erro";
    // }
    // else
    // {
    //     echo "conexão efetuada com sucesso";
    // }

?>