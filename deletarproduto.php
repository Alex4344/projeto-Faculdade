<?php

if(!empty($_GET['idProduto'])){

    include('conectabanco.php');

    $idreserva = $_GET['idProduto'];

    $sqlSelect = "SELECT * FROM Produto WHERE idProduto = $idProduto";
    $resultado = $banco->query($sqlSelect);
    if($resultado->num_rows > 0){
        $sqlDelete = "DELETE FROM Produto WHERE idProduto = $idProduto";
    }
}


?>