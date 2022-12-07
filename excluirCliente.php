<?php
  include_once "funcao.php";
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

// variavel global que contem informacoes do método GET
  $idpet = $_GET['idPet'];

  $pet = getAnimal($idpet);
  $cliente = getCliente($pet['cod_dono']);
  excluirAnimal($idpet);
  excluirCliente($pet['cod_dono']);
  setcookie("mensagem", "Cliente {$cliente['nome']} e Pet {$pet['nome']} foi excluído");
  header('location: cliente.php');
 ?>
