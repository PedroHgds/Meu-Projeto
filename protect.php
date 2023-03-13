<?php 
if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['id'])){
    die("ERRO ! Voce nao esta logado ! <p><a hrfe=\"index.php\">Entrar</a></p>");
}
?>