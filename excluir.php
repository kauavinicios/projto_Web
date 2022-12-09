<?php
include_once "funcao.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = $_GET['id'];
switch ($_GET['opc']) {
    case 1:
        $idpet = $_GET['idPet'];
        $pet = getAnimal($idpet);
        $cliente = getCliente($id);
        excluirAnimal($idpet);
        excluirCliente($id);
        $txt = "Cliente {$cliente['nome']} e Pet {$pet['nome']} foram excluídos";
        $arq = "cliente.php";
        break;
    case 2:
        $animal = getAnimal($id);
        excluirAnimal($id);
        $text = "Pet {$animal['nome']} foi excluída";
        $arq = "animais.php";
        break;
    case 3:
        $animal = getAdAnimal($id);
        excluirAdAnimal($id);
        $txt = "Pet {$animal['nome']} foi excluído da adoção";
        $arq = "adocao.php";
        break;
    case 4:
        $funcionario = getFuncionario($id);
        excluirFuncionario($id);
        $txt = "Funcionario {$funcionario['nome']} foi excluído";
        $arq = "funcionarios.php";
        break;
    case 5:
        $loja = getLoja($id);
        excluirLoja($id);
        $txt = "Loja {$loja['nome']} foi excluída";
        $arq = "lojas.php";
        break;
    case 6:
        $produto = getProduto($id);
        excluirProduto($id);
        $txt = "Produto {$produto['nome']} foi excluído";
        $arq = "produtos.php";
        break;
    case 7:
        excluirNota($id);
        $txt = "Nota excluída!!";
        $arq = "notas.php";
        break;
}
setcookie("mensagem", "$txt");
header("location: $arq");
?>