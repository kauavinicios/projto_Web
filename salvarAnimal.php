<?php
include_once "funcao.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$animal = array();
$animal['id'] = $_POST['id'];
$animal['nome'] = $_POST['nome'];
$animal['idade'] = date("Y/m/d", strtotime($_POST['idade']));
$animal['raca'] = $_POST['raca'];
$animal['sexo'] = $_POST['sexo'];
$animal['foto'] = $_POST['foto'];
$animal['cod_dono'] = $_POST['cod_dono'];

if ($animal['id'] == 0) {
  salvarAnimal($animal);
} else {
  alterarAnimal($animal);
}
setcookie("mensagem", "{$animal['nome']} foi salva");
header('location: animais.php');
?>