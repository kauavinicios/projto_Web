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

$arquivo = $_FILES['arquivo'];
if ($arquivo['name'] != "") {
  $arquivoTemporario = $arquivo['tmp_name'];
  $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
  $nomeArquivo = sha1(time()) . "." . $extensao;
  move_uploaded_file($arquivoTemporario, "imagens/" . $nomeArquivo);
  if ($animal['foto'] != "") {
    unlink('imagens/' . $animal[foto]);
  }
  $animal['foto'] = $nomeArquivo;
}

if ($animal['id'] == 0) {
  salvarAnimal($animal);
  setcookie("mensagem", "Pet: {$animal['nome']} adicionado com sucesso!!");
} else {
  alterarAnimal($animal);
  setcookie("mensagem", "Pet {$animal['nome']} atualizado com sucesso!!");

}
header('location: animais.php');
?>