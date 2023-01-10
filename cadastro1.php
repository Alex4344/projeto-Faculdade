<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação</title>
</head>
<body>
    <div>
    <?php include("menu-header.php"); ?>
    </div>
    <div>
        <?php
        //error_reporting(0);
        include 'conectabanco.php';
        
     $nome = $_POST['nome'];
     $email = $_POST['email'];
     $telefone = $_POST['telefone'];
     $datanascimento = $_POST['idd'];
     $cpf = $_POST['cpf'];
     $senha = $_POST['senha'];
    if($nome != "" and $email != ""){
        $sql = "INSERT INTO cliente (cpf, nome, telefone, email, dataNascimento, senha)
            VALUES ('$cpf','$nome','$telefone','$email','$datanascimento','$senha')";
        $banco->query($sql);
        if($banco->affected_rows >= 1){
            echo "Cliente $nome cadastrado com sucesso!";
        }}else{
            echo "Erro ao inserir Cliente";}

            $banco->close();
            
        ?>
    </div>

</body>
</html>