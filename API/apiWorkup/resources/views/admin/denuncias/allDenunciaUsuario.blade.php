<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Detalhes do Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function goBack() {
            window.history.back()
        }
    </script>
</head>
<body>
    <div class="container">

    <div class="card" style="width: 500px;">
    <div class="card-header text-center">
        <h1>Detalhes da Denunca</h1>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <p><strong>Nome:</strong> {{ $denuncia->usuario->nomeUsuario }}</p>
            <p><strong>Motivo:</strong> {{ $denuncia->motivo }}</p>
            <p><strong>Data:</strong> {{ $denuncia->created_at}}</p>

        </div>


        <div class="mt-4">
        <button onclick="goBack()" class="d-flex p-1 align-items-center m-0" style="background-color: transparent; border:none">
            <p class="m-0">Voltar</p>
        </button>
        </div>
    </div>
</div>

    </div>
</body>
</html>
