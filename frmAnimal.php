<?php
include_once "funcao.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($animal)) {
  $animal = array();
  $animal['id'] = 0;
  $animal['nome'] = "";
  $animal['idade'] = "";
  $animal['raca'] = "";
  $animal['sexo'] = "";
  $animal['foto'] = "";
  $animal['id_dono'] = 0;
}
$donos = getClientes(0);
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
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php
    include_once "menu.php";
  ?>
  <main class="container">
    <div class="bg-light p-5 rounded">
      <h1>Cadastro de Área</h1>
      <form class="m-5 container" action="salvarAnimal.php" method="post">
        <input type="hidden" name="id" id="id" value="<?php echo $animal['id']; ?>">
        <div class="mb-3">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $animal['nome']; ?>">
        </div>
        <div class="mb-3">
          <label for="idade" class="form-label">Data de Nacimento</label>
          <input type="date" class="form-control" id="idade" name="idade" value="<?php echo $animal['idade']; ?>">
        </div>
        <div class="mb-3">
          <label for="raca" class="form-label">Raça</label>
          <input type="text" class="form-control" id="raca" name="raca" value="<?php echo $animal['raca']; ?>">
        </div>
        <div class="mb-3">
          <label for="sexo" class="form-label">Sexo</label>
          <input class="form-control" list="datalistOptions" name="sexo" id="sexo" value="<?php echo $animal['sexo']; ?>">
          <datalist id="datalistOptions">
            <option name="sexo" value="femea">
            <option name="sexo" value="macho">
          </datalist>
        </div>
        <div class="mb-3">
          <label for="foto" class="form-label">Foto</label>
          <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
        </div>
        <div class="mb-3">
          <label for="cod_dono" class="form-label">Dono</label>
          <select class="form-select" name="cod_dono" id="cod_dono">
            <?php
              foreach ($donos as $dono) {
                $selected = $animal['cod_dono'] == $dono['id']?'selected':'';
                echo "<option $selected name='cod_dono' value='{$dono['id']}'>{$dono['nome']}</option>";
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
