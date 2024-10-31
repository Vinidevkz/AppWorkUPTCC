<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Detalhes do Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
        <div class="container">

            <div class="card" style="width: 500px;">
            <div class="card-header text-center">
                <h1>Detalhes do Usuário</h1>
            </div>
            <div class="card-body">
                <div class="mb-3">
                <h1>Detalhes das Vagas</h1>
                <p><strong>ID:</strong> {{ $vaga->idVaga }}</p>
                <p><strong>Nome:</strong> {{ $vaga->nomeVaga }}</p>
                <p><strong>Prazo:</strong> {{ $vaga->prazoVaga }}</p>
                <p><strong>Salario:</strong> {{ $vaga->salarioVaga }}</p>
                <p><strong>cidade:</strong> {{ $vaga->cidadeVaga }}</p>
                <p><strong>estado:</strong> {{ $vaga->estadoVaga }}</p>
                <p><strong>Beneficios:</strong> {{ $vaga->beneficiosVaga }}</p>
                <p><strong>Diferecial:</strong> {{ $vaga->diferencialVaga }}</p>
                <p><strong>data Publicação :</strong> {{ $vaga->created_at }}</p>
                <p><strong>Empresa:</strong> {{ $vaga->empresa->nomeEmpresa ?? 'N/A' }}</p>
                <p><strong>Área:</strong> {{ $vaga->area->nomeArea ?? 'N/A' }}</p>
                <p><strong>Status:</strong> {{ $vaga->status->tipoStatus }}</p>
                <p><strong>Modalidade:</strong> {{ $vaga->modalidade->descModalidadeVaga }}</p>
                <!-- Adicione mais detalhes conforme necessário -->
                

                <div class="mt-4">
                <a href="{{ route('vagas.index') }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>
</div>

    </div>
</body>
</html>
