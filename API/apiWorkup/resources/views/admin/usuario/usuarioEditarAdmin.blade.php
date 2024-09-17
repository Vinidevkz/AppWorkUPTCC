<?php

/*
|--------------------------------------------------------------------------
| Precisa editar
|--------------------------------------------------------------------------

*/
?>
<?php 
session_start(); 
require './conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="./componentes/css-componentes/navbar.css">
  <title>Administrador | Editar Usuário</title>
</head>

<body>
  <!-- NAVBAR -->
  <?php include('./componentes/navbar.php'); ?>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4>Editar Usuário</h4>
            <a href="./usuario.php" class="btn btn-danger float-end">Voltar</a>
          </div>
          <div class="card-body">
            <?php 
            if (isset($_GET['id'])) {
              $user_id = mysqli_real_escape_string($conection, $_GET['id']);
              $sql = "SELECT * FROM tb_Usuario WHERE idUsuario = '$user_id'";
              $query = mysqli_query($conection, $sql);

              if (mysqli_num_rows($query) > 0) {
                $user = mysqli_fetch_array($query);
            ?>
            <form action="./acoes.php" method="post">
              <input type="hidden" name="usuario_id" value="<?= $user['idUsuario']; ?>">
              <div class="mb-3">
                <label for="nome">Nome</label>
                <input type="text" name="nomeUsuario" id="nome" value="<?= $user['nomeUsuario']; ?>" class="form-control" required>
              </div>
              <div class="mb-3">
                <label for="email">E-mail</label>
                <input type="email" name="emailUsuario" id="email" value="<?= $user['emailUsuario']; ?>" class="form-control" required>
              </div>
              <div class="mb-3">
                <button type="submit" name="update_usuario" class="btn btn-primary">Salvar</button>
              </div>
            </form>
            <?php } 
            } else {
              echo '<h5>Usuário não encontrado</h5>';
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
