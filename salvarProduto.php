<?php
include_once "funcao.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$produto = array();
$produto['id'] = $_POST['id'];
$produto['nome'] = $_POST['nome'];
$produto['descricao'] = $_POST['descricao'];
$produto['preco'] = $_POST['preco'];
if ($produto['id'] == 0) {
  salvarProduto($produto);
  setcookie("mensagem", "O Produto: {$produto['nome']} foi adicionado com sucesso!!");
} else {
  alterarProduto($produto);
  setcookie("mensagem", "Produto {$produto['nome']} atualizada com sucesso!!");
}
header('location: produtos.php');
?>