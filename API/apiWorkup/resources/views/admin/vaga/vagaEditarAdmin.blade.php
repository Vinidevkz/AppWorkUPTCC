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
  <link rel="stylesheet" href="./componentes/css-componentes/navbar.css">
  <title>Administrador | Visualizar Vaga</title>
</head>

<body>
  <!-- NAVBAR -->
  <?php include('./componentes/navbar.php'); ?>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>Visualizar Vaga</h4>
            <a href="./vagas.php" class="btn btn-danger float-end">Voltar</a>
          </div>
          <div class="card-body">
            <?php 
            if (isset($_GET['idVaga']) && !empty($_GET['idVaga'])) {
              $vaga_id = mysqli_real_escape_string($conection, $_GET['idVaga']);
              $sql = "SELECT * FROM tb_Vaga WHERE idVaga = '$vaga_id'";
              $query = mysqli_query($conection, $sql);

              if (mysqli_num_rows($query) > 0) {
                $vaga = mysqli_fetch_array($query);
            ?>
            
            <div class="mb-3">
              <label for="nomeVaga" class="form-label">Nome da Vaga</label>
              <p class="form-control"><?= htmlspecialchars($vaga['nomeVaga']); ?></p>
            </div>

            <div class="mb-3">
              <label for="dataPublicacaoVaga" class="form-label">Data de Publicação</label>
              <p class="form-control"><?= htmlspecialchars($vaga['dataPublicacaoVaga']); ?></p>
            </div>

            <div class="mb-3">
              <label for="prazoVaga" class="form-label">Prazo de Inscrição</label>
              <p class="form-control"><?= htmlspecialchars($vaga['prazoVaga']); ?></p>
            </div>

            <div class="mb-3">
              <label for="modalidadeVaga" class="form-label">Modalidade</label>
              <p class="form-control"><?= htmlspecialchars($vaga['modalidadeVaga']); ?></p>
            </div>

            <div class="mb-3">
              <label for="salarioVaga" class="form-label">Salário</label>
              <p class="form-control"><?= htmlspecialchars($vaga['salarioVaga']); ?></p>
            </div>

            <div class="mb-3">
              <label for="cidadeVaga" class="form-label">Cidade</label>
              <p class="form-control"><?= htmlspecialchars($vaga['cidadeVaga']); ?></p>
            </div>

            <div class="mb-3">
              <label for="estadoVaga" class="form-label">Estado</label>
              <p class="form-control"><?= htmlspecialchars($vaga['estadoVaga']); ?></p>
            </div>

            <div class="mb-3">
              <label for="areaVaga" class="form-label">Área</label>
              <p class="form-control"><?= htmlspecialchars($vaga['areaVaga']); ?></p>
            </div>

            <div class="mb-3">
              <label for="beneficiosVaga" class="form-label">Benefícios</label>
              <p class="form-control"><?= htmlspecialchars($vaga['beneficiosVaga']); ?></p>
            </div>

            <div class="mb-3">
              <label for="diferencialVaga" class="form-label">Diferenciais</label>
              <p class="form-control"><?= htmlspecialchars($vaga['diferencialVaga']); ?></p>
            </div>

            <?php 
              } else {
                echo '<h5 class="text-center">Nenhuma vaga encontrada</h5>';
              }
            } else {
              echo '<h5 class="text-center">ID da vaga não fornecido</h5>';
            }
            ?>
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
