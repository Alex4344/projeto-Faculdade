<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div>
    <?php include("menu-header.php"); ?>
    </div>
    <div>
    <?php
    //error_reporting(0);
    include 'conectabanco.php';

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    if(isset($email)|| isset($senha)){
        if(strlen($email) == 0){ //strlen = quantidade de caracteres.
            echo "Preencha seu e-mail. ";
        }else if(strlen($senha) == 0){
            echo "Preencha sua senha. ";
        }else{  //p evitar que hacker possa digitar ' OR 1='1 Joga direto na consulta do SQL
            $email = $banco->real_escape_string($email);
            $senha = $banco->real_escape_string($senha);
        } 
    }


    $sql = "SELECT cpf, nome, email, senha FROM cliente WHERE email = '$email'";
    //echo "$sql";
    $cliente = $banco->query($sql);
    if($cliente){ //cliente resultado da consulta é cheio?
        while($row= mysqli_fetch_assoc($cliente)){
            if($row['senha']==$senha){
                $_SESSION['cpf']=$row['cpf'];
                $_SESSION['nome']=$row['nome'];
                $_SESSION['email']=$email;
                header('Location: reservacadastro.php');
                $banco->close();
            }else{
                echo "A senha do usuário $email está incorreta.";
            }
        }
    }else{
        $banco->close();
        echo "E-mail: $email não cadastrado";
    }

    ?>
    </div>
</body>
</html>