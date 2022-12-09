<?php
include_once "funcao.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.104.2">
  <title>Adote um pet</title>
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
      <?php
        if (isset($_COOKIE['mensagem'])) {
          echo "
            <div class='alert alert-success'>
              {$_COOKIE['mensagem']}
            </div>";
          unset($_COOKIE['mensagem']);
          setcookie("mensagem", "", 1);
        }
      ?>
      <h1>Adoção de pets</h1>
      <a href="frmAdAnimal.php" class="btn btn-primary">Novo</a>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th></th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Raça</th>
            <th>Sexo</th>
            <th>Excluir</th>
            <th>Editar</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $animais = getAdAnimais();
            foreach ($animais as $animal) {
              $data = date('Y') - date("Y", strtotime($animal['idade']));
              $foto = $animal['foto']!= ""? $animal['foto']: 'anonimo.webp';
              echo "<tr>
                      <td style='width: 45px; height: 45px; background: url(./imagens/$foto) no-repeat;'></td>
                      <td>{$animal['nome']}</td>
                      <td>$data Anos</td>
                      <td>{$animal['raca']}</td>
                      <td>{$animal['sexo']}</td>
                      <td><a href='excluirAdAnimal.php?id={$animal['id']}' class='btn btn-danger'>-</a></td>
                      <td><a href='editarAdAnimal.php?id={$animal['id']}' class='btn btn-primary'>+</a></td>
                    </tr>";
            }
          ?>
        </tbody>
      </table>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>