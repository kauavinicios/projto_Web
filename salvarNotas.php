<?php
include_once "funcao.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$cliente = array();
$cliente['id'] = $_POST['id'];
$cliente['id_cliente'] = $_POST['id_cliente'];
$cliente['id_loja'] = $_POST['id_loja'];
$cliente['id_produto'] = $_POST['id_produto'];
$cliente['qtd'] = $_POST['qtd'];
$cliente['data_compra'] = date("Y/m/d", strtotime($_POST['data_compra']));
salvarNota($cliente);
setcookie("mensagem", "Nota Registrada");
header('location: notas.php');
?>