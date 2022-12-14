<?php
include_once "funcao.php";
session_start();

if (!isset($_SESSION['usuario'])) {
  header("location: frmLogin.php");
  exit(0);
}
?>
<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Inicio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
      aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="cliente.php">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="animais.php">Pets</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="produtos.php">Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="lojas.php">Lojas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="funcionarios.php">Funcionarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="adocao.php">Adoção</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="notas.php">Notas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="logout.php">Sair</a>
        </li>
      </ul>
    </div>
  </div>
</nav>