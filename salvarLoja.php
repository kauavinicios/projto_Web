<?php
include_once "funcao.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$loja = array();
$loja['id'] = $_POST['id'];
$loja['nome'] = $_POST['nome'];
$loja['endereco'] = $_POST['endereco'];
$loja['contato'] = $_POST['contato'];
if ($loja['id'] == 0) {
  salvarloja($loja);
  setcookie("mensagem", "A Loja: {$loja['nome']} foi adicionado com sucesso!!");
} else {
  alterarLoja($loja);
  setcookie("mensagem", "Loja {$loja['nome']} atualizada com sucesso!!");
}
header('location: lojas.php');
?>