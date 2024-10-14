<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Home</title>
</head>

<body>

    <?php
    require_once('../components/navbar.php');
    ?>

    <section class="card">
        <div class="row">
            <div class="col">
                <div class="txt-card-wrap">
                    <p>Seja bem vinda Empresa</p>
                    <h3>
                        Nos ajude nessa jornada de transformar a carreira de diversas pessoas
                    </h3>
                    <div class="botoes-card">
                        <button class="botao-card botao-vaga">Criar vaga <i class="fa-solid fa-plus"></i></button>
                        <button class="botao-card botao-post">Fazer post</button>
                    </div>
                </div>
            </div>
            <div class="col">
            </div>
        </div>
    </section>

    <section class="funcoes">
        <h3 class="titulo-secao">Aqui você pode:</h3>
        <div class="fundo-funcoes">
            <div class="row">
                <div class="col col-6">
                    <div class="card-funcoes">
                        <div class="header-card-funcoes">
                            <i class="fa-solid fa-note-sticky" style="color: #20dd77;"></i>
                            <h4>Publicar vagas</h4>
                        </div>
                        <div class="body-card-funcoes">
                            <p>texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto 
                            texto texto texto texto texto texto texto texto </p>
                        </div>
                    </div>
                </div>
                <div class="col col-6">
                    <div class="card-funcoes">
                        <div class="header-card-funcoes">
                            <i class="fa-solid fa-paper-plane" style="color: #20dd77;"></i>
                            <h4>Fazer publicaçõs</h4>
                        </div>
                        <div class="body-card-funcoes">
                            <p>texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto 
                            texto texto texto texto texto texto texto texto </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    require_once('../components/vagas.php');
    ?>

    <?php
    require_once('../components/area-post.php');
    ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

</body>

</html>