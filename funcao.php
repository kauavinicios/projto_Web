<?php
function getConnection()
{
  try {
    $conexao = new PDO('mysql:host=localhost;dbname=test;port=3306', "root", "");
    return $conexao;
  } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
  }
}

function getUserByEmail($email)
{
  $conexao = getConnection();
  $sql = "SELECT * FROM usuario WHERE email=?";
  $sentenca = $conexao->prepare($sql);
  $sentenca->bindParam(1, $email);
  $sentenca->execute();
  $usuario = $sentenca->fetch(PDO::FETCH_ASSOC);
  $conexao = null;
  return $usuario;
}

function getClientes($op)
{
  $conexao = getConnection();
  if ($op == 1) {
    $sql = "SELECT cliente.*, animal.nome AS nomePet, animal.raca AS racaPet, animal.id AS idPet FROM cliente JOIN animal ON cliente.id = animal.cod_dono ORDER BY nome";
  } else {
    $sql = "SELECT cliente.* FROM cliente ORDER BY nome";
  }
  $sentenca = $conexao->query($sql, PDO::FETCH_ASSOC);
  $dados = $sentenca->fetchAll();
  $conexao = null;
  return $dados;
}

function salvarCliente($ciente)
{
  $conexao = getConnection();
  $sql = "INSERT INTO cliente (nome, cpf, telefone) VALUES (?,?,?)";
  $sentenca = $conexao->prepare($sql);
  $sentenca->bindParam(1, $ciente['nome']);
  $sentenca->bindParam(2, $ciente['cpf']);
  $sentenca->bindParam(3, $ciente['telefone']);
  $sentenca->execute();
  $conexao = null;
}


function excluirCliente($id)
{
  $conexao = getConnection();
  $sql = "DELETE FROM cliente WHERE id=?";
  $sentenca = $conexao->prepare($sql);
  $sentenca->bindParam(1, $id);
  $sentenca->execute();
  $conexao = null;
}

function alterarCliente($ciente)
{
  $conexao = getConnection();
  $sql = "UPDATE cliente SET nome=?,cpf=?,telefone=? WHERE id=?";
  $sentenca = $conexao->prepare($sql);
  $sentenca->bindParam(1, $ciente['nome']);
  $sentenca->bindParam(2, $ciente['cpf']);
  $sentenca->bindParam(3, $ciente['telefone']);
  $sentenca->bindParam(4, $ciente['id']);
  $sentenca->execute();
  $conexao = null;
}

function getCliente($id)
{
  $conexao = getConnection();
  $sql = "SELECT * FROM cliente WHERE id=?";
  $sentenca = $conexao->prepare($sql);
  $sentenca->bindParam(1, $id);
  $sentenca->execute();
  $cliente = $sentenca->fetch(PDO::FETCH_ASSOC);
  $conexao = null;
  return $cliente;
}

function getAnimais()
{
  $conexao = getConnection();
  $sql = "SELECT animal.*, cliente.nome as nomeDono FROM animal join cliente on cliente.id = animal.cod_dono ORDER BY nome";
  $sentenca = $conexao->query($sql, PDO::FETCH_ASSOC);
  $dados = $sentenca->fetchAll();
  $conexao = null;
  return $dados;
}

function salvarAnimal($animal)
{
  $conexao = getConnection();
  $sql = "INSERT INTO animal (nome, idade, raca, sexo, foto, cod_dono) VALUES (?,?,?,?,?,?)";
  $sentenca = $conexao->prepare($sql);
  $sentenca->bindParam(1, $animal['nome']);
  $sentenca->bindParam(2, $animal['idade']);
  $sentenca->bindParam(3, $animal['raca']);
  $sentenca->bindParam(4, $animal['sexo']);
  $sentenca->bindParam(5, $animal['foto']);
  $sentenca->bindParam(6, $animal['cod_dono']);
  $sentenca->execute();
  $conexao = null;
}

function excluirAnimal($id)
{
  $conexao = getConnection();
  $sql = "DELETE FROM animal WHERE id=?";
  $sentenca = $conexao->prepare($sql);
  $sentenca->bindParam(1, $id);
  $sentenca->execute();
  $conexao = null;
}


function getAnimal($id)
{
  $conexao = getConnection();
  $sql = "SELECT * FROM animal WHERE id=?";
  $sentenca = $conexao->prepare($sql);
  $sentenca->bindParam(1, $id);
  $sentenca->execute();
  $animal = $sentenca->fetch(PDO::FETCH_ASSOC);
  $conexao = null;
  return $animal;
}


function alterarAnimal($animal)
{
  $conexao = getConnection();
  $sql = "UPDATE animal SET nome=?,idade=?,raca=?,sexo=?,foto=?,cod_dono=? WHERE id=?";
  $sentenca = $conexao->prepare($sql);
  $sentenca->bindParam(1, $animal['nome']);
  $sentenca->bindParam(2, $animal['idade']);
  $sentenca->bindParam(3, $animal['raca']);
  $sentenca->bindParam(4, $animal['sexo']);
  $sentenca->bindParam(5, $animal['foto']);
  $sentenca->bindParam(6, $animal['cod_dono']);
  $sentenca->bindParam(7, $animal['id']);
  $sentenca->execute();
  $conexao = null;
}

function getProdutos()
{
  $conexao = getConnection();
  $sql = "SELECT * FROM produto";
  $sentenca = $conexao->query($sql, PDO::FETCH_ASSOC);
  $dados = $sentenca->fetchAll();
  $conexao = null;
  return $dados;
}

function getProduto($id)
{
  $conexao = getConnection();
  $sql = "SELECT * FROM produto WHERE id=?";
  $sentenca = $conexao->prepare($sql);
  $sentenca->bindParam(1, $id);
  $sentenca->execute();
  $produto = $sentenca->fetch(PDO::FETCH_ASSOC);
  $conexao = null;
  return $produto;
}

function salvarProduto($produto)
{
  $conexao = getConnection();
  $sql = "INSERT INTO produto(nome, descricao, preco) VALUES (?,?,?)";
  $sentenca = $conexao->prepare($sql);
  $sentenca->bindParam(1, $produto['nome']);
  $sentenca->bindParam(2, $produto['descricao']);
  $sentenca->bindParam(3, $produto['preco']);
  $sentenca->execute();
  $conexao = null;
}

function alterarProduto($produto)
{
  $conexao = getConnection();
  $sql = "UPDATE produto SET nome=?, descricao=?, preco=? WHERE id=?";
  $sentenca = $conexao->prepare($sql);
  $sentenca->bindParam(1, $produto['nome']);
  $sentenca->bindParam(2, $produto['descricao']);
  $sentenca->bindParam(3, $produto['preco']);
  $sentenca->bindParam(4, $produto['id']);
  $sentenca->execute();
  $conexao = null;
}

function excluirProduto($id)
{
  $conexao = getConnection();
  $sql = "DELETE FROM produto WHERE id=?";
  $sentenca = $conexao->prepare($sql);
  $sentenca->bindParam(1, $id);
  $sentenca->execute();
  $conexao = null;
}

function getLojas()
{
  $conexao = getConnection();
  $sql = "SELECT * FROM loja";
  $sentenca = $conexao->query($sql, PDO::FETCH_ASSOC);
  $dados = $sentenca->fetchAll();
  $conexao = null;
  return $dados;
}

function getLoja($id)
{
  $conexao = getConnection();
  $sql = "SELECT * FROM loja WHERE id=?";
  $sentenca = $conexao->prepare($sql);
  $sentenca->bindParam(1, $id);
  $sentenca->execute();
  $loja = $sentenca->fetch(PDO::FETCH_ASSOC);
  $conexao = null;
  return $loja;
}

function salvarloja($loja)
{
  $conexao = getConnection();
  $sql = "INSERT INTO loja(nome, endereco, contato) VALUES (?,?,?)";
  $sentenca = $conexao->prepare($sql);
  $sentenca->bindParam(1, $loja['nome']);
  $sentenca->bindParam(2, $loja['endereco']);
  $sentenca->bindParam(3, $loja['contato']);
  $sentenca->execute();
  $conexao = null;
}

function alterarLoja($loja)
{
  $conexao = getConnection();
  $sql = "UPDATE loja SET nome=?, endereco=?, contato=? WHERE id=?";
  $sentenca = $conexao->prepare($sql);
  $sentenca->bindParam(1, $loja['nome']);
  $sentenca->bindParam(2, $loja['endereco']);
  $sentenca->bindParam(3, $loja['contato']);
  $sentenca->bindParam(4, $loja['id']);
  $sentenca->execute();
  $conexao = null;
}

function excluirLoja($id)
{
  $conexao = getConnection();
  $sql = "DELETE FROM loja WHERE id=?";
  $sentenca = $conexao->prepare($sql);
  $sentenca->bindParam(1, $id);
  $sentenca->execute();
  $conexao = null;
}

function getFuncionarios()
{
  $conexao = getConnection();
  $sql = "SELECT funcionario.*, loja.nome as loja FROM funcionario join loja on funcionario.cod_loja = loja.id";
  $sentenca = $conexao->query($sql, PDO::FETCH_ASSOC);
  $dados = $sentenca->fetchAll();
  $conexao = null;
  return $dados;
}

function getFuncionario($id)
{
  $conexao = getConnection();
  $sql = "SELECT * FROM funcionario WHERE id=?";
  $sentenca = $conexao->prepare($sql);
  $sentenca->bindParam(1, $id);
  $sentenca->execute();
  $funcionario = $sentenca->fetch(PDO::FETCH_ASSOC);
  $conexao = null;
  return $funcionario;
}

function salvarFuncionario($funcionario)
{
  $conexao = getConnection();
  $sql = "INSERT INTO funcionario(nome, cpf, telefone, endereco, cod_loja) VALUES (?,?,?,?,?)";
  $sentenca = $conexao->prepare($sql);
  $sentenca->bindParam(1, $funcionario['nome']);
  $sentenca->bindParam(2, $funcionario['cpf']);
  $sentenca->bindParam(3, $funcionario['telefone']);
  $sentenca->bindParam(4, $funcionario['endereco']);
  $sentenca->bindParam(5, $funcionario['cod_loja']);
  $sentenca->execute();
  $conexao = null;
}

function alterarFuncionario($funcionario)
{
  $conexao = getConnection();
  $sql = "UPDATE funcionario SET nome=?, cpf=?, telefone=?, endereco=?, cod_loja=? WHERE id=?";
  $sentenca = $conexao->prepare($sql);
  $sentenca->bindParam(1, $funcionario['nome']);
  $sentenca->bindParam(2, $funcionario['cpf']);
  $sentenca->bindParam(3, $funcionario['telefone']);
  $sentenca->bindParam(4, $funcionario['endereco']);
  $sentenca->bindParam(5, $funcionario['cod_loja']);
  $sentenca->bindParam(6, $funcionario['id']);
  $sentenca->execute();
  $conexao = null;
}

function excluirFuncionario($id)
{
  $conexao = getConnection();
  $sql = "DELETE FROM funcionario WHERE id=?";
  $sentenca = $conexao->prepare($sql);
  $sentenca->bindParam(1, $id);
  $sentenca->execute();
  $conexao = null;
}

?>