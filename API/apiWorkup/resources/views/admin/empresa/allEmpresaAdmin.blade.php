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
        <h1>Detalhes das Empresas</h1>
        <p><strong>ID:</strong> {{ $empresa->idEmpresa }}</p>
        <p><strong>Username:</strong> {{ $empresa->usernameEmpresa }}</p>
        <p><strong>Nome:</strong> {{ $empresa->nomeEmpresa }}</p>
        <p><strong>Email:</strong> {{ $empresa->emailEmpresa }}</p>
        <p><strong>Foto:</strong> {{ $empresa->fotoEmpresa }}</p>
        <p><strong>Sobre :</strong> {{ $empresa->sobreEmpresa }}</p>
        <p><strong>Cnpj:</strong> {{ $empresa->cnpjEmpresa }}</p>
        <p><strong>Contato:</strong> {{ $empresa->contatoEmpresa }}</p>
        <p><strong>cidade:</strong> {{ $empresa->cidadeEmpresa}}</p>
        <p><strong>estado:</strong> {{ $empresa->estadoEmpresa }}</p>
        <p><strong>data da criação do perfil :</strong> {{ $empresa->created_at }}</p>
        <p><strong>Logradouro:</strong> {{ $empresa->logradouroEmpresa }}</p>
        <p><strong>CEP:</strong> {{ $empresa->cepEmpresa }}</p>
        <p><strong>Número:</strong> {{ $empresa->numeroLograEmpresa }}</p>

        <h3>Áreas de Atuação:</h3>
        <ul>
            @foreach($empresa->areas as $area)
                <li>{{ $area->nomeArea }}</li> <!-- Exibe o nome da área -->
            @endforeach
        </ul>
        <!-- Adicione mais detalhes conforme necessário -->
        <div class="mt-4">
                <a href="/verEmpresa" class="btn btn-primary">Voltar</a>
        </div>
    </div>
</div>

    </div>
</body>
</html>
