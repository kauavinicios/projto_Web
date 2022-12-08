<?php
include_once "funcao.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = $_GET['id'];
$funcionario = getFuncionario($id);
excluirFuncionario($id);
setcookie("mensagem", "Funcionario {$funcionario['nome']} foi excluído");
header('location: funcionarios.php');
?>