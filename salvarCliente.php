<?php
include_once "funcao.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$cliente = array();
$cliente['id'] = $_POST['id'];
$cliente['nome'] = $_POST['nome'];
$cliente['cpf'] = $_POST['cpf'];
$cliente['telefone'] = $_POST['telefone'];
if ($cliente['id'] == 0) {
  salvarCliente($cliente);
  setcookie("mensagem", "O Cliente: {$cliente['nome']} foi adicionado com sucesso!!");
} else {
  alterarCliente($cliente);
  setcookie("mensagem", "Cliente {$cliente['nome']} atualizada com sucesso!!");
}
header('location: cliente.php');
?>