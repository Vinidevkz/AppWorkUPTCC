<?php

/*
|--------------------------------------------------------------------------
| Precisa editar
|--------------------------------------------------------------------------

*/
?>
<?php
session_start(); 
require 'conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="./componentes/css-componentes/aside.css">
  <link rel="stylesheet" href="./componentes/css-componentes/navbar.css">
  <link rel="stylesheet" href="./styles.css">
  <title>Administrador | Vagas</title>
</head>

<body>
  <!-- NAVBAR -->
  <?php include('./componentes/navbar.php'); ?>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <?php include('./componentes/aside.php') ?>
      </div>

      <div class="col-md-9">
        <div class="container my-4">
          <?php include('./mensagem.php'); ?>
          <div class="card bg-dark text-light" style="--bs-bg-opacity: .8;">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h1>Vagas <span class="bi bi-briefcase"></span></h1>
              <a href="./criar-vaga.php" class="btn btn-outline-info"><span class="bi bi-plus-circle"></span>&nbsp;Adicionar vaga</a>
            </div>
            <div class="card-body">
              <table class="table table-dark table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data de Publicação</th>
                    <th>Prazo de Inscrição</th>
                    <th>Modalidade</th>
                    <th>Salário</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Área</th>
                    <th>Benefícios</th>
                    <th>Diferencial</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $sql = 'SELECT * FROM tb_Vaga';
                  $vagas = mysqli_query($conection, $sql); 
                  if (mysqli_num_rows($vagas) > 0) {
                    foreach($vagas as $vaga) {
                  ?>
                  <tr>
                    <td><?= $vaga['idVaga'] ?></td>
                    <td><?= htmlspecialchars($vaga['nomeVaga']) ?></td>
                    <td><?= htmlspecialchars($vaga['dataPublicacaoVaga']) ?></td>
                    <td><?= htmlspecialchars($vaga['prazoVaga']) ?></td>
                    <td><?= htmlspecialchars($vaga['modalidadeVaga']) ?></td>
                    <td><?= htmlspecialchars($vaga['salarioVaga']) ?></td>
                    <td><?= htmlspecialchars($vaga['cidadeVaga']) ?></td>
                    <td><?= htmlspecialchars($vaga['estadoVaga']) ?></td>
                    <td><?= htmlspecialchars($vaga['areaVaga']) ?></td>
                    <td><?= htmlspecialchars($vaga['beneficiosVaga']) ?></td>
                    <td><?= htmlspecialchars($vaga['diferencialVaga']) ?></td>
                    <td class="d-flex">
                      <a href="./vaga-view.php?id=<?=$vaga['idVaga']?>" class="btn btn-outline-secondary btn-sm me-2"><span class="bi bi-eye-fill"></span></a>
                      <a href="./vaga-view.php?id=<?=$vaga['idVaga']?>" class="btn btn-outline-success btn-sm me-2"><span class="bi bi-pencil-fill"></span></a>
                      <form action="./acoes.php" method="post" class="d-inline">
                        <button onclick="return confirm('Realmente deseja excluir esta vaga?')" type="submit" name="delete_vaga" value="<?= $vaga['idVaga'] ?>" class="btn btn-outline-danger btn-sm"><span class="bi bi-trash-fill"></span></button>
                      </form>
                    </td>
                  </tr>
                  <?php 
                    }
                  } else {
                    echo '<tr><td colspan="12" class="text-center">Nenhuma vaga encontrada</td></tr>';
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
