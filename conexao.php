<?php
$host = 'localhost';
$database = 'login';
$usuario = 'root';
$senha = '';

$mysqli = new mysqli($host,$database, $usuario, $senha);

if($mysqli->connect_errno){
    echo("Falha ao conectar ao banco de dados: " .$mysqli->connect_errno);
}
?>