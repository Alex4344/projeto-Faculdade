<div>
    <?php include("menu-header.php"); ?>
    </div>
    <div>
        <?php
        if(!empty($_GET['idProduto'])){
        
        include 'conectabanco.php';

        $idProduto = $_GET['idProduto'];

        $sqlSelect = "SELECT * FROM produto WHERE idProduto = $idProduto";

        $resultado = $banco->query($sqlSelect);

        if($resultado->num_rows > 0){
            while($userdata = mysqli_fetch_assoc($resultado)){
                //$nome = $_SESSION['nome'];
            $descricao = $userdata['descricao'];
            $qtdproduto= $userdata['qtdproduto'];
            $precoproduto = $userdata['precoproduto'];
            $datacadastro = $userdata['datacadastro'];
            $situacao = $userdata['situacao'];
            $cpf = $_SESSION['cpf'];

            }
            
        }else{
            header('Location: listaprodutos.php');
        }
    }
    

    $banco->close();    
            
        ?>
    </div>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/produtos.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <title>Produtos</title>
</head>
<body>

<div class="telaeditarproduto">
    <h1>Produtos Editados</h1>
        <form action="salvarprodutos.php" method="post">
        <div class="editarproduto">
       <?php
       echo $_SESSION['nome'];
       //include'conectabanco.php';
       ?>
        </div> 
        <br><br>
        <div class="inputproduto">
        <label for="datacadastro">Data</label><br>
        <input type="date" name="datacadastro" id="data" value="<?php echo ($datacadastro) ?>" required>
        </div>
        <br><br>
        <div class="inputproduto">
        <label for="text" class="labelcadastro">Descricao</label><br>
        <input type="text" name="Descricao" id="descricao" class="inputhello" placeholder="Descricao" value="<?php echo ($descricao) ?>" required>
        </div>
        <br><br>
        <div class="inputproduto">
        <label for="qtdpess">Quantidade</label><br>
        <input type="number" name="qtdProduto" id="qtdproduto" value="<?php echo ($qtdprodutos) ?>" min=1 max=500>
        </div>
        
        <br><br>
        <div class="inputproduto">
        <label for="precoproduto" class="labelcadastro">Preço </label><br>
        <input type="text" name="precoproduto" id="precoproduto" placeholder="(Valor)" value="<?php echo ($precoproduto) ?>" maxlength="45">
        </div>
        <br><br>
        <input type="hidden" name="idProduto" value="<?php echo ($idProduto) ?>">
        <input type="submit" name="update" value="Salvar" id="update">
        <br><br>
        </form>
        <form action="listaprodutos.php" method="post">
        <input type="submit" value="Voltar para lista de Produtos" id="submit">
        </form>

    </div>


</body>
</html>
