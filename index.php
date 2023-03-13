<?php
include('conexao.php');

if(isset($_POST['email'])|| isset($_POST['senha'])){

    if(strlen($_POST['email'])==0){
        echo "Preencha seu email";
    }
    else if(strlen($_POST['senha'])==0){
        echo "Preencha seu senha";
    } else{
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios where email ='$email' and senha = '$senha' ";
        $sql_query = $mysqli->query($sql_code) or die("Falha ao executar SQL code: ".$mysqli->error);

        $quantidade = $sql_query-> num_rows;

        if($quantidade ==1){

            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location:painel.php");

        
        } else {
            echo "Falha ao Logar ! Email ou senha icorretos";
        }

    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Acesse sua conta</h1>
    <form action="" method="POST">
        <p>
            <label for="email">Email:</label>
            <input type="text" name="email">
        </p>
        <p>
            <label >Password:</label>
            <input type="password" name="senha">
        </p>
        <button type="submit">Entrar</button>
        <h4>Voce ainda nao possui uma conta ?</h4>
        <a href="cadastrar.php">Crie grátis</a>
    </form>
</body>

</html>