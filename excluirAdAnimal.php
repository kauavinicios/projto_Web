<?php
include_once "funcao.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = $_GET['id'];
$animal = getAdAnimal($id);
excluirAdAnimal($id);
setcookie("mensagem", "Pet {$animal['nome']} foi excluído da adoção");
header('location: adocao.php');
?>