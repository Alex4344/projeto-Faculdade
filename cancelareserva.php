<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Reservas</title>
</head>
<body>
<div>
    <?php include("menu-header.php"); ?>
    </div>
<div>

<?php

if(!empty($_GET['idReserva'])){

    include('conectabanco.php');

    $idreserva = $_GET['idReserva'];

    $sqlSelect = "SELECT * FROM reserva WHERE idReserva = $idreserva";
    $resultado = $banco->query($sqlSelect);
    if($resultado->num_rows > 0){
        while($row = mysqli_fetch_assoc($resultado)){
            $situacao = 'Inativo';
        $sqlUpdate = "UPDATE reserva SET situacao = '$situacao' WHERE idReserva = '$idreserva'";
            echo $sqlUpdate;    
            $resultado = $banco->query($sqlUpdate);
            echo $resultado;
    }
}
header('Location: listareserva.php');
}
?>
</div>
</body>
</html>
