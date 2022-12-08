<?php
include_once "funcao.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$funcionario = array();
$funcionario['id'] = $_POST['id'];
$funcionario['nome'] = $_POST['nome'];
$funcionario['cpf'] = $_POST['cpf'];
$funcionario['telefone'] = $_POST['telefone'];
$funcionario['endereco'] = $_POST['endereco'];
$funcionario['cod_loja'] = $_POST['cod_loja'];
if ($funcionario['id'] == 0) {
  salvarFuncionario($funcionario);
  setcookie("mensagem", "O Funcionario: {$funcionario['nome']} foi adicionado com sucesso!!");
} else {
  alterarFuncionario($funcionario);
  setcookie("mensagem", "Funcionario {$funcionario['nome']} atualizada com sucesso!!");
}
header('location: funcionarios.php');
?>