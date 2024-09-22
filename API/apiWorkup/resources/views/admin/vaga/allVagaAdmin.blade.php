<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Detalhes do Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Detalhes das Vagas</h1>
        <p><strong>ID:</strong> {{ $vaga->idVaga }}</p>
        <p><strong>Nome:</strong> {{ $vaga->nomeVaga }}</p>
        <p><strong>data Publicação :</strong> {{ $vaga->dataPublicacaoVaga }}</p>
        <p><strong>Prazo:</strong> {{ $vaga->prazoVaga }}</p>
        <p><strong>Modalidade:</strong> {{ $vaga->modalidadeVaga }}</p>
        <p><strong>Salario:</strong> {{ $vaga->salarioVaga }}</p>
        <p><strong>cidade:</strong> {{ $vaga->cidadeVaga }}</p>
        <p><strong>estado:</strong> {{ $vaga->estadoVaga }}</p>
        <p><strong>Área:</strong> {{ $vaga->areaVaga }}</p>
        <p><strong>Beneficios:</strong> {{ $vaga->beneficiosVaga }}</p>
        <p><strong>Diferecial:</strong> {{ $vaga->diferecialVaga }}</p>

        <p><strong>Empresa:</strong> {{ $vaga->idEmpresa }}</p>
        <p><strong>status:</strong> {{ $vaga->statusVaga }}</p>

        <!-- Adicione mais detalhes conforme necessário -->
        <a href="/verVaga" class="btn btn-primary">Voltar</a>

    </div>
</body>
</html>
