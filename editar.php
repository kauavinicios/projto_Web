<?php
include_once "funcao.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = $_GET['id'];
switch ($_GET['opc']) {
    case 1:
        $cliente = getCliente($id);
        include_once "frmCliente.php";
        break;
    case 2:
        $animal = getAnimal($id);
        include_once "frmAnimal.php";
        break;
    case 3:
        $animal = getAdAnimal($id);
        include_once "frmAdAnimal.php";
        break;
    case 4:
        $funcionario = getFuncionario($id);
        include_once "frmFuncionario.php";
        break;
    case 5:
        $loja = getLoja($id);
        include_once "frmLoja.php";
        break;
    case 6:
        $produto = getProduto($id);
        include_once "frmProduto.php";
        break;
}
?>