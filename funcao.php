<?php
  function getConnection() {
    try {
      $conexao = new PDO('mysql:host=localhost;dbname=test;port=3306', "root", "");
      return $conexao;
    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
  }

  function getClientes() {
    $conexao = getConnection();
    $sql = "SELECT cliente.*, animal.nome AS nomePet, animal.raca AS racaPet, animal.id AS idPet FROM cliente JOIN animal ON cliente.id = animal.cod_dono ORDER BY nome";
    $sentenca = $conexao->query($sql, PDO::FETCH_ASSOC);
    $dados = $sentenca->fetchAll();
    $conexao = null;
    return $dados;
  }
  
  function salvarProfessor($professor) {
    $conexao = getConnection();
    $sql = "INSERT INTO professor (nome, email, area_id, data_aniversario, foto) VALUES (?,?,?,?,?)";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $professor['nome']);
    $sentenca->bindParam(2, $professor['email']);
    $sentenca->bindParam(3, $professor['area_id']);
    $sentenca->bindParam(4, $professor['data_aniversario']);
    $sentenca->bindParam(5, $professor['foto']);
    $sentenca->execute();
    $conexao = null;
  }

  
  function excluirCliente($id) {
    $conexao = getConnection();
    $sql = "DELETE FROM cliente WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $id);
    $sentenca->execute();
    $conexao = null;
  }

  function alterarCliente($ciente) {
    $conexao = getConnection();
    $sql = "UPDATE professor SET nome=?, email=?, area_id=?, data_aniversario=?, foto=? WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $ciente['nome']);
    $sentenca->bindParam(2, $ciente['email']);
    $sentenca->bindParam(3, $ciente['area_id']);
    $sentenca->bindParam(4, $ciente['data_aniversario']);
    $sentenca->bindParam(5, $ciente['foto']);
    $sentenca->bindParam(6, $ciente['id']);
    $sentenca->execute();
    $conexao = null;
  }
  
  function getCliente($id) {
    $conexao = getConnection();
    $sql = "SELECT * FROM cliente WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $id);
    $sentenca->execute();
    $cliente = $sentenca->fetch(PDO::FETCH_ASSOC);
    $conexao = null;
    return $cliente;
  }
  
  function getAreas() {
    $conexao = getConnection();
    $sql = "SELECT * FROM area ORDER BY descricao";
    $sentenca = $conexao->query($sql, PDO::FETCH_ASSOC);
    $dados = $sentenca->fetchAll();
    $conexao = null;
    return $dados;
  }
  
  function salvarArea($area) {
    $conexao = getConnection();
    $sql = "INSERT INTO area (descricao) VALUES (?)";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $area['descricao']);
    $sentenca->execute();
    $conexao = null;
  }

  function excluirAnimal($id) {
    $conexao = getConnection();
    $sql = "DELETE FROM animal WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $id);
    $sentenca->execute();
    $conexao = null;
  }
  

  function getAnimal($id) {
    $conexao = getConnection();
    $sql = "SELECT nome FROM animal WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $id);
    $sentenca->execute();
    $animal = $sentenca->fetch(PDO::FETCH_ASSOC);
    $conexao = null;
    return $animal;
  }


  function alterarArea($area) {
    $conexao = getConnection();
    $sql = "UPDATE area SET descricao=? WHERE id=?";
    $sentenca = $conexao->prepare($sql);
    $sentenca->bindParam(1, $area['descricao']);
    $sentenca->bindParam(2, $area['id']);
    $sentenca->execute();
    $conexao = null;
  }

  function getUserByEmail($email) {
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
