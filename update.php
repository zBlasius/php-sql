<?php
    require 'config.php';

        if(isset($_POST["id_produto"])){

    
            $id_produto = $_POST["id_produto"];
            $produto = $_POST["produto"];
            $cor = $_POST["cor"];
            $tamanho = $_POST["tamanho"];
            $deposito = $_POST["deposito"];
            $data_disponibilidade = $_POST["data_disponibilidade"];
            $quantidade = $_POST["quantidade"];

            $verificaId = $pdo->prepare("SELECT COUNT(*) FROM estoque WHERE id = :id_produto");
            $verificaId->bindValue(':id_produto', $id_produto);
            $verificaId->execute();

            if($verificaId->fetchColumn()>0){
                $sql = $pdo->prepare("UPDATE estoque SET produto= :produto, cor = :cor, tamanho = :tamanho,
                deposito = :deposito, data_disponibilidade = :data_disponibilidade, quantidade = :quantidade
                WHERE id = :id_produto");

                $sql->bindValue(':id_produto', $id_produto);
                $sql->bindValue(':produto', $produto);
                $sql->bindValue(':cor', $cor);
                $sql->bindValue(':tamanho', $tamanho);
                $sql->bindValue(':deposito', $deposito);
                $sql->bindValue(':data_disponibilidade', $data_disponibilidade);
                $sql->bindValue(':quantidade', $quantidade);
                $sql->execute();

                echo json_encode([
                    'success'=> true,
                    'message'=> 'Atualização bem-sucedida!'
                ]);
            }

    } else {
        echo json_encode([
            'success'=> false,
            'message'=> 'ID Fornecido não encontrado'
        ]);
    }

?>