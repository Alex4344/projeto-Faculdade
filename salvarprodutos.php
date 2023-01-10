<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Produtos</title>
</head>
<body>
<div>
    <?php include("menu-header.php"); ?>
    </div>
<div>
<?php
include('conectabanco.php');

$update= $_POST['update'];
//echo $update;
if(isset($update)){
    //echo "Teste";
    $idProduto = $_POST['idproduto'];
    $descricao = $_POST['descricao'];
    $qtdProduto = $_POST['qtdProduto'];
    $precoProduto= $_POST['precoProduto'];
    $dataCadastro = $_POST['dataCadastro'];
    $situacao = $_POST['situacao'];
    $cpf = $_SESSION['cpf'];

    $sqlUpdate = "UPDATE produto SET descricao = '$descricao', qtdproduto = '$qtdproduto', precoproduto = '$precoproduto', datacadastro = '$datacadastro', situacao = '$situacao' 
    WHERE idProduto = '$idProduto'";
    echo $sqlUpdate;
    $resultado = $banco->query($sqlUpdate);
    echo $resultado;
}
    header('Location: listaprodutos.php');

?>
</div>
</body>
</html>