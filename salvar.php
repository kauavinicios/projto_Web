<?php
include_once "funcao.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dados = array();
$dados['id'] = $_POST['id'];
$dados['nome'] = $_POST['nome'];
$dados['cpf'] = $_POST['cpf'];
$dados['telefone'] = $_POST['telefone'];
$dados['idade'] = date("Y/m/d", strtotime($_POST['idade']));
$dados['raca'] = $_POST['raca'];
$dados['sexo'] = $_POST['sexo'];
$dados['foto'] = $_POST['foto'];
$dados['cod_dono'] = $_POST['cod_dono'];
$dados['endereco'] = $_POST['endereco'];
$dados['contato'] = $_POST['contato'];

switch ($_GET['opc']) {
    case 1:
        $aqv = "cliente.php";
        if ($dados['id'] == 0) {
            salvarCliente($dados);
            $txt = "O Cliente: {$dados['nome']} foi adicionado com sucesso!!";
        } else {
            alterarCliente($dados);
            $txt = "Cliente {$dados['nome']} atualizada com sucesso!!";
        }
        break;
    case 2:
        $arquivo = $_FILES['arquivo'];
        if ($arquivo['name'] != "") {
            $arquivoTemporario = $arquivo['tmp_name'];
            $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
            $nomeArquivo = sha1(time()) . "." . $extensao;
            move_uploaded_file($arquivoTemporario, "imagens/" . $nomeArquivo);
            if ($animal['foto'] != "") {
                unlink('imagens/' . $animal['foto']);
            }
            $dados['foto'] = $nomeArquivo;
        }
        $aqv = "animais.php";
        if ($dados['id'] == 0) {
            salvarAnimal($dados);
            $txt = "Pet: {$dados['nome']} adicionado com sucesso!!";
        } else {
            alterarAnimal($dados);
            $txt = "Cliente {$dados['nome']} atualizada com sucesso!!";
        }
        break;
    case 3:
        $arquivo = $_FILES['arquivo'];
        if ($arquivo['name'] != "") {
            $arquivoTemporario = $arquivo['tmp_name'];
            $extensao = pathinfo($arquivo['name'], PATHINFO_EXTENSION);
            $nomeArquivo = sha1(time()) . "." . $extensao;
            move_uploaded_file($arquivoTemporario, "imagens/" . $nomeArquivo);
            if ($dados['foto'] != "") {
                unlink('imagens/' . $dados['foto']);
            }
            $dados['foto'] = $nomeArquivo;
        }
        $aqv = "adocao.php";
        if ($dados['id'] == 0) {
            salvarAdAnimal($dados);
            $txt = "Pet: {$dados['nome']} adicionado a adoção com sucesso!!";
        } else {
            alterarAdAnimal($dados);
            $txt = "Pet {$dados['nome']} atualizado com sucesso!!";
        }
        break;
    case 4:
        $dados['cod_loja'] = $_POST['cod_loja'];
        $aqv = "funcionarios.php";
        if ($dados['id'] == 0) {
            salvarFuncionario($dados);
            $txt = "O Funcionario: {$dados['nome']} foi adicionado com sucesso!!";
        } else {
            alterarFuncionario($dados);
            $txt = "Funcionario {$dados['nome']} atualizada com sucesso!!";
        }
        break;
    case 5:
        $aqv = "lojas.php";
        if ($dados['id'] == 0) {
            salvarloja($dados);
            $txt = "A Loja: {$dados['nome']} foi adicionado com sucesso!!";
        } else {
            alterarLoja($dados);
            $txt = "Loja {$dados['nome']} atualizada com sucesso!!";
        }
        break;
    case 6:
        $dados['descricao'] = $_POST['descricao'];
        $dados['preco'] = $_POST['preco'];
        $aqv = "produtos.php";
        if ($dados['id'] == 0) {
            salvarProduto($dados);
            $txt = "O Produto: {$dados['nome']} foi adicionado com sucesso!!";
        } else {
            alterarProduto($dados);
            $txt = "Produto {$dados['nome']} atualizada com sucesso!!";
        }
        break;
    case 7:
        $dados['id_cliente'] = $_POST['id_cliente'];
        $dados['id_loja'] = $_POST['id_loja'];
        $dados['id_produto'] = $_POST['id_produto'];
        $dados['qtd'] = $_POST['qtd'];
        $dados['data_compra'] = date("Y/m/d", strtotime($_POST['data_compra']));
        salvarNota($dados);
        $txt = "Nota Registrada";
        $aqv = "notas.php";
        break;
}

setcookie("mensagem", $txt);
header("location: $aqv");
?>