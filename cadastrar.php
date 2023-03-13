<?php
if (!isset($_SESSION)) {
    session_start();
    ob_start();
    $btnvai = filter_input(INPUT_POST, 'btnvai', FILTER_SANITIZE_STRING);
    if ($btnvai) {
        include_once('conexao.php');
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        //var_dump($dados);
        $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);
        $nome = $_GET["nome"];
        $email = $_GET["email"];
        $senha = $dados['senha']; 
        $result_usuario = "INSERT INTO usuarios (nome,email,senha)VALUES(
            '' " . $dados['nome'] . ",
            '' " . $dados['email'] . ",
            '' " . $dados['senha'] . "
        )";
        $resultado_usuario = mysqli_query($mysqli, $result_usuario);
        if (mysqli_insert_id($mysqli)) {
            $_SESSION['id'] = "Usuário Cadastrado com Sucesso !";
            header("Location: index.php");

        } else {
            $_SESSION['id'] = "Erro ao cadastar usuário !";
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
    <title>Cadastrar</title>
</head>

<body>
    CADASTRO
    <form action="" method="POST">
        <p>
            <label for="nome">Nome</label>
            <input type="text" name="nome" placeholder="Digite seu Nome e sobrenome">
        </p>
        <p>
            <label for="email">Email:</label>
            <input type="text" name="email" placeholder="Digite seu email">
        </p>
        <p>
            <label>Password:</label>
            <input type="password" name="senha" placeholder="Digite sua senha">
        </p>
        <button type="submit" name="btnvai">Cadastar</button>
        Ja tem uma conta ? <a href="index.php">Clique aqui</a> para logar
    </form>
</body>

</html>