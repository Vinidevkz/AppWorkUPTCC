<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Detalhes do Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Detalhes das Empresas</h1>
        <p><strong>ID:</strong> {{ $empresa->idEmpresa }}</p>
        <p><strong>Username:</strong> {{ $empresa->usernameEmpresa }}</p>
        <p><strong>Nome:</strong> {{ $empresa->nomeEmpresa }}</p>
        <p><strong>Email:</strong> {{ $empresa->emailEmpresa }}</p>
        <p><strong>Foto:</strong> {{ $empresa->fotoEmpresa }}</p>
        <p><strong>Sobre :</strong> {{ $empresa->sobreEmpresa }}</p>
        <p><strong>Atuação:</strong> {{ $empresa->atuacaoEmpresa }}</p>
        <p><strong>Cnpj:</strong> {{ $empresa->cnpjEmpresa }}</p>
        <p><strong>Contato:</strong> {{ $empresa->contatoEmpresa }}</p>
        <!-- Adicione mais detalhes conforme necessário -->
        <a href="/verEmpresa" class="btn btn-primary">Voltar</a>

    </div>
</body>
</html>
