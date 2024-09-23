<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Detalhes do Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Detalhes do Usuário</h1>
        <p><strong>ID:</strong> {{ $usuario->idUsuario }}</p>
        <p><strong>Nome:</strong> {{ $usuario->nomeUsuario }}</p>
        <p><strong>Username:</strong> {{ $usuario->usernameUsuario }}</p>
        <p><strong>nascUsuario:</strong> {{ $usuario->nascUsuario }}</p>
        <p><strong>Email:</strong> {{ $usuario->emailUsuario }}</p>
        <p><strong>Contato:</strong> {{ $usuario->contatoUsuario }}</p>
        <p><strong>fotoUsuario:</strong> {{ $usuario->fotoUsuario }}</p>
        <p><strong>cidadeUsuario:</strong> {{ $usuario->cidadeUsuario }}</p>
        <p><strong>estadoUsuario:</strong> {{ $usuario->estadoUsuario }}</p>
        <p><strong>logradouroUsuario:</strong> {{ $usuario->logradouroUsuario }}</p>
        <p><strong>cepUsuario:</strong> {{ $usuario->cepUsuario }}</p>
        <p><strong>numeroLograUsuario:</strong> {{ $usuario->numeroLograUsuario }}</p>
        <p><strong>sobreUsuario:</strong> {{ $usuario->sobreUsuario }}</p>
        <p><strong>formacaoCompetenciaUsuario:</strong> {{ $usuario->formacaoCompetenciaUsuario }}</p>
        <p><strong>dataFormacaoCompetenciaUsuario:</strong> {{ $usuario->dataFormacaoCompetenciaUsuario }}</p>

        <h3>Áreas de Interrese:</h3>
        <ul>
            @foreach($usuario->areas as $area)
                <li>{{ $area->nomeArea }}</li> <!-- Exibe o nome da área -->
            @endforeach
        </ul>
        <!-- Adicione mais detalhes conforme necessário -->
        <a href="/verUsuario" class="btn btn-primary">Voltar</a>

    </div>
</body>
</html>
