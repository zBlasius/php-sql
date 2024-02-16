<?php
require 'config.php';

$sql = $pdo->query('SELECT * FROM estoque');
$dados = $sql->fetchAll(PDO::FETCH_ASSOC);

if ($dados) {
    echo json_encode($dados);
} else {
    echo json_encode([
        'message' => 'Nenhum dado encontrado na tabela "estoque".'
    ]);
}
?>