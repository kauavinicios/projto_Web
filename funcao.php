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

function getClientes($op)
{
  $conexao = getConnection();
  if($op==1){
    $sql = "SELECT cliente.*, animal.nome AS nomePet, animal.raca AS racaPet, animal.id AS idPet FROM cliente JOIN animal ON cliente.id = animal.cod_dono ORDER BY nome";
  }else{
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
  $sql = "UPDATE area SET descricao=? WHERE id=?";
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

?>