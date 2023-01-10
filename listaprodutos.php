<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/produtos.css">
    <link rel="stylesheet" href="assets/css/responsive.css">


    <title>Lista de Produtos</title>
</head>
<body>
<div>
        <?php
            include("menu-header.php");
        ?> 
    <div class="listaprodutos">
             <h1>Lista de Produtos</h1>
        <?php
            echo "Bem vindo A lista de Produtos, ", $_SESSION['nome'],".";

            include'conectabanco.php';

            $sql = "SELECT * FROM produtos ORDER BY idproduto DESC";

            $resultado = $banco->query($sql);

       //print_r($lista);
        ?>

    </div>
    <div class="">
    <table class="tabela">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Descrição</th>
                <th scope="col">Quantidade de produtos</th>
                <th scope="col">Preço do Produto</th>
                <th scope="col">Data Cadastro</th>
                <th scope="col">Situação</th>
                <th scope="col">...</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            if($resultado){
          while($userdata = mysqli_fetch_assoc($resultado)){
          echo "<tr>";
          echo "<td>".$userdata['idproduto']."</td>";
          echo "<td>".$userdata['descricao']."</td>";
          echo "<td>".$userdata['qtproduto']."</td>";
          echo "<td>".$userdata['precoproduto']."</td>";
          echo "<td>".$userdata['datacadastro']."</td>";
          echo "<td>".$userdata['situacao']."</td>";
          echo "<td>
            <a class='btn btn-sm btn-primary' href='editareserva.php?idReserva=$userdata[idReserva]'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
            <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
            <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
            </svg>
            </a>
            
            <a class='btn btn-sm btn-danger' href='deletareserva.php?idReserva=$userdata[idReserva]'>
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
            <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z'/>
            </svg>
            </a>
            
          </td>";  
          echo "</tr>";

            }
        }
          ?>
        </tbody>
        </table>
    </div>
</div>
</body>
</html>