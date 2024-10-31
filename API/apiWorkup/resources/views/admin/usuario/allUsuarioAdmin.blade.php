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
            <p><strong>ID:</strong> {{ $usuario->idUsuario }}</p>
            <p><strong>Nome:</strong> {{ $usuario->nomeUsuario }}</p>
            <p><strong>Username:</strong> {{ $usuario->usernameUsuario }}</p>
            <p><strong>Data de Nascimento:</strong> {{ $usuario->nascUsuario }}</p>
            <p><strong>Email:</strong> {{ $usuario->emailUsuario }}</p>
            <p><strong>Contato:</strong> {{ $usuario->contatoUsuario }}</p>
            <p><strong>Foto:</strong> {{ $usuario->fotoUsuario }}</p>
            <p><strong>Cidade:</strong> {{ $usuario->cidadeUsuario }}</p>
            <p><strong>Estado:</strong> {{ $usuario->estadoUsuario }}</p>
            <p><strong>Logradouro:</strong> {{ $usuario->logradouroUsuario }}</p>
            <p><strong>CEP:</strong> {{ $usuario->cepUsuario }}</p>
            <p><strong>Número:</strong> {{ $usuario->numeroLograUsuario }}</p>
            <p><strong>Sobre:</strong> {{ $usuario->sobreUsuario }}</p>
            <p><strong>Formação:</strong> {{ $usuario->formacaoCompetenciaUsuario }}</p>
            <p><strong>Data da Formação:</strong> {{ $usuario->dataFormacaoCompetenciaUsuario }}</p>
            <p><strong>data criação Perfil:</strong> {{ $usuario->created_at }}</p>
        </div>

        <h3>Áreas de Interesse:</h3>
        <ul>
            @foreach($usuario->areas as $area)
                <li>{{ $area->nomeArea }}</li>
            @endforeach
        </ul>

        <div class="mt-4">
            <a href="{{ route('usuarios.index')}}" class="btn btn-primary">Voltar</a>
        </div>
    </div>
</div>

    </div>
</body>
</html>
