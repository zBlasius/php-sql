<?php
    require 'config.php';

    $produto = $_POST["produto"];
    $cor = $_POST["cor"];
    $tamanho = $_POST["tamanho"];
    $deposito = $_POST["deposito"];
    $data_disponibilidade = $_POST["data_disponibilidade"];
    $quantidade = $_POST["quantidade"];

    $sql = $pdo->prepare("INSERT INTO estoque (produto, cor, tamanho, deposito, data_disponibilidade, quantidade) 
        VALUES (:produto, :cor, :tamanho, :deposito, :data_disponibilidade, :quantidade)");
    
    $sql->bindValue(':produto', $produto);
    $sql->bindValue(':cor', $cor);
    $sql->bindValue(':tamanho', $tamanho);
    $sql->bindValue(':deposito', $deposito);
    $sql->bindValue(':data_disponibilidade', $data_disponibilidade);
    $sql->bindValue(':quantidade', $quantidade);
    $sql->execute();

    echo json_encode([
        'produto' =>  $produto,
        'cor' => $cor,
        'tamanho' => $tamanho,
        'deposito' =>  $deposito,
        'data_disponibilidade' => $data_disponibilidade,
        'quantidade' => $quantidade
    ]);
    
?>