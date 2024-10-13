<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('assets/css/estilo-cadastro-empresa.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/estilo-padrao-workup.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Cadastrar Empresa</title>
</head>

<body>

    <div class="box-cadastro">
        <form class="wrap-cadastro" action="">
            
            <div class="wrap-header">
                <h2>Cadastro de empresa</h2>
                <p>Primeiro, vamos preencher o básico</p>
            </div>

            <div class="row d-flex flex-column w-75 h-75 align-items-center justify-content-between inputs-txt">
                <div class="col col-12 h-50">
                    <label for="nome-empresa">Nome da empresa:</label>
                    <input type="text">
                </div>
                <div class="col col-12 h-50">
                    <label for="nome-empresa">Representante da empresa:</label>
                    <input type="text">
                </div>
            </div>

            <div class="row d-flex flex-row h-50 w-75 inputs-txt">
                <div class="col d-flex col-6 h-100">
                    <label for="nome-empresa">Email:</label>
                    <input type="text">
                </div>
                <div class="col d-flex col-6 h-100">
                    <label for="nome-empresa">Senha:</label>
                    <input type="text">
                </div>
            </div>
            <div class="botoes-cadastro mt-4">
                <button type="button" class="voltar" onclick="prevStep()">Voltar</button>
                <button type="button" class="avancar" onclick="nextStep()">Avançar</button>
            </div>

        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

</body>

</html>