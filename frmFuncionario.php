<?php
include_once "funcao.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($funcionario)) 
{
  $funcionario = array();
  $funcionario['id'] = 0;
  $funcionario['nome'] = "";
  $funcionario['cpf'] = "";
  $funcionario['telefone'] = 0;
  $funcionario['endereco'] = "";
  $funcionario['cod_loja'] = 0;
}
$lojas = getlojas();
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.104.2">
  <title>Construção de Páginas Web II</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbar-fixed/">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }
    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
    .b-example-divider {
      height: 3rem;
      background-color: rgba(0, 0, 0, .1);
      border: solid rgba(0, 0, 0, .15);
      border-width: 1px 0;
      box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }
    .b-example-vr {
      flex-shrink: 0;
      width: 1.5rem;
      height: 100vh;
    }
    .bi {
      vertical-align: -.125em;
      fill: currentColor;
    }
    .nav-scroller {
      position: relative;
      z-index: 2;
      height: 2.75rem;
      overflow-y: hidden;
    }
    .nav-scroller .nav {
      display: flex;
      flex-wrap: nowrap;
      padding-bottom: 1rem;
      margin-top: -1px;
      overflow-x: auto;
      text-align: center;
      white-space: nowrap;
      -webkit-overflow-scrolling: touch;
    }
    body {
      min-height: 75rem;
      padding-top: 4.5rem;
      background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
    }
    nav{
    background: linear-gradient(90deg, rgba(2,0,36,1) 37%, rgba(20,109,184,0.8911939775910365) 69%, rgba(0,212,255,1) 89%);
    }
    .container img {
      width: 200px;
      border: 1px solid gray;
      padding: 0.5rem;
      border-radius: 10px;
    }
  </style>
</head>
<body>
  <?php
    include_once "menu.php";
  ?>
  <main class="container">
    <div class="bg-light p-5 rounded">
      <h1>Cadastro de Funcionarios</h1>
      <form class="m-5 container" action="salvar.php?opc=4" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?php echo $funcionario['id']; ?>">
        <div class="mb-3">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $funcionario['nome'];?>">
        </div>
        <div class="mb-3">
          <label for="cpf" class="form-label">CPF</label>
          <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $funcionario['cpf'];?>">
        </div>
        <div class="mb-3">
          <label for="telefone" class="form-label">Telefone</label>
          <input type="number" class="form-control" id="telefone" name="telefone" value="<?php echo $funcionario['telefone'];?>">
        </div>
        <div class="mb-3">
          <label for="endereco" class="form-label">Endereço</label>
          <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $funcionario['endereco'];?>">
        </div>
        <div class="mb-3">
          <label for="cod_loja" class="form-label">Filial</label>
          <select class="form-select" name="cod_loja" id="cod_loja">
            <?php
              foreach ($lojas as $loja) {
                $selected = $funcionario['cod_loja'] == $loja['id']?'selected':'';
                echo "<option $selected name='cod_dono' value='{$loja['id']}'>{$loja['nome']}</option>";
              }
            ?>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </form>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>
