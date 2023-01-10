<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionário</title>
</head>
<body>
    <div>
    <?php include("menu-header.php"); ?>
    </div>
    <div>
        <?php
    //error_reporting(0);
    include 'conectabanco.php';
    
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $sql = "SELECT cpf, nome, email, senha FROM funcionario WHERE cpf = '$cpf'";
    //echo "$sql";
    $funcionario = $banco->query($sql);
    if($funcionario){ //cliente resultado da consulta é cheio?
        while($row= mysqli_fetch_assoc($funcionario)){
            if($row['senha']==$senha){
                $_SESSION['cpf']=$row['cpf'];
                $_SESSION['nome']=$row['nome'];
                $_SESSION['email']=$email;
                header('produtos.php');
                $banco->close();
            }else{
                echo "A senha do funcionário $cpf está incorreta.";
            }
        }
    }else{
        $banco->close();
        echo "CPF: $cpf não cadastrado";
    }
    
   /* $oi = "SELECT cpf FROM funcionario WHERE cpf = '$cpf' AND senha = '$senha'";
    $banco -> query($oi);
        if($banco->affected_rows >= 1){
            echo "Login feito com sucesso";
        
       
        }else{
            echo 'Falha no Login';
        }
    
            $banco->close(); */
        ?>
    
    
    </div>
</body>
</html>