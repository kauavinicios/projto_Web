<?php
  include_once "funcao.php";
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

// variavel global que contem informacoes do método GET
  $id = $_GET['id'];
  $idPet = $_GET['idPet'];

  $cliente = getCliente($id);
  $pet = getAnimal($idPet);
  // excluirAnimal($idPet);
  // excluirCliente($id);
  setcookie("mensagem", "Cliente {$cliente['nome']} {$id} e {$idPet}  Pet {$pet['nome']} foi excluído");
  header('location: cliente.php');
 ?>
