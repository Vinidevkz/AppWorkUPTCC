<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{url('assets/img/adminImages/WU-icon.png')}}" type="image/x-icon">

    <title>Detalhes do Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 900px;">
            <div class="card-header text-center">
                <h1>Detalhes do Usuário</h1>
            </div>
            <div class="card-body">
                <h2 class="mb-4">Detalhes das Empresas</h2>
              
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <strong>ID:</strong> {{ $empresa->idEmpresa }} {{-- Essa linha aqui --}}
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Username:</strong> {{ $empresa->usernameEmpresa }}
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Nome:</strong> {{ $empresa->nomeEmpresa }}
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Email:</strong> {{ $empresa->emailEmpresa }}
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Foto:</strong> {{ $empresa->fotoEmpresa }}
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Sobre:</strong> {{ $empresa->sobreEmpresa }}
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>CNPJ:</strong> {{ $empresa->cnpjEmpresa }}
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Contato:</strong> {{ $empresa->contatoEmpresa }}
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Cidade:</strong> {{ $empresa->cidadeEmpresa }}
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Estado:</strong> {{ $empresa->estadoEmpresa }}
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Data da Criação do Perfil:</strong> {{ $empresa->created_at }}
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Logradouro:</strong> {{ $empresa->logradouroEmpresa }}
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>CEP:</strong> {{ $empresa->cepEmpresa }}
                    </div>
                    <div class="col-md-6 mb-3">
                        <strong>Número:</strong> {{ $empresa->numeroLograEmpresa }}
                    </div>
                </div>
 

                <h3 class="mt-4">Áreas de Atuação:</h3>
                <ul>
                    @foreach($empresa->areas as $area)
                        <li>{{ $area->nomeArea }}</li> <!-- Exibe o nome da área -->
                    @endforeach
                </ul>

                <div class="text-center mt-4">
                    <a href="{{ route ('empresas.index') }}" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
