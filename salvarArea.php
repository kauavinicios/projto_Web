<?php
  include_once "funcao.php";
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $area = array();
  // variavel global $_POST
  $area['id'] = $_POST['id'];
  $area['descricao'] = $_POST['descricao'];

  if ($area['id'] == 0) {
    salvarArea($area);
  } else {
    alterarArea($area);
  }
  setcookie("mensagem", "{$area['descricao']} foi salva");

  // pede para o navegador chamar o recurso professores.php
  header('location: areas.php');
 ?>
