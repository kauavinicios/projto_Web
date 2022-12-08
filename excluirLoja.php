<?php
include_once "funcao.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// variavel global que contem informacoes do método GET
$id = $_GET['id'];

$loja = getLoja($id);
excluirLoja($id);
setcookie("mensagem", "Loja {$loja['nome']} foi excluída");
header('location: lojas.php');
?>