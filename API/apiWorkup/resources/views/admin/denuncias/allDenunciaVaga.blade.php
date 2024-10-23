<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Detalhes da Vaga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">

    <div class="card" style="width: 500px;">
    <div class="card-header text-center">
        <h1>Detalhes da Denunca</h1>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <p><strong>Nome:</strong> {{ $denuncia->vaga->nomeVaga }}</p>
            <p><strong>Motivo:</strong> {{ $denuncia->motivo }}</p>
            <p><strong>Data:</strong> {{ $denuncia->created_at}}</p>

        </div>


        <div class="mt-4">
            <a href="/admin/denuncia" class="btn btn-primary">Voltar</a>
        </div>
    </div>
</div>

    </div>
</body>
</html>
