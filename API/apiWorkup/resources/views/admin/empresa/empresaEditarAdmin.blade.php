<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('assets/css/style-editar-empresa.css')}}">
    <link rel="stylesheet" href="{{url('../assets/css/dashboardEmpresa.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Editar empresa</title>
</head>
<body>

    <section id="editar-vaga">

    @include('components.navbarDashboardEmpresa')

        <div class="box-editar-vaga">
            <form method="POST" action="{{ route('empresas.update', $empresa->idEmpresa) }}" class="wrap-editar-empresa">

                @csrf
                @method('PUT')

                <h5>Editar perfil:</h5>
                <div class="body-editar-empresa">
                    <div class="row">
                        <div class="col-edit col-6">
                            <label for="nomeEmpresa">Nome da empresa:</label>
                            <input type="text" name="nomeEmpresa" placeholder="{{ $empresa->nomeEmpresa }}" value="{{ $empresa->nomeEmpresa }}" required>
                            @error('nomeEmpresa')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-edit col-6">
                            <label for="usernameEmpresa">Nome do usuário:</label>
                            <input type="text" name="usernameEmpresa" placeholder="{{ $empresa->usernameEmpresa }}" value="{{ $empresa->usernameEmpresa }}" required>
                            @error('usernameEmpresa')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-edit col-7">
                            <label for="emailEmpresa">Email:</label>
                            <input type="text" name="emailEmpresa" placeholder="{{ $empresa->emailEmpresa }}" value="{{ $empresa->emailEmpresa }}" required>
                            @error('emailEmpresa')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-edit col-5">
                            <label for="contatoEmpresa">Contato:</label>
                            <input type="text" name="contatoEmpresa" placeholder="{{ $empresa->contatoEmpresa }}" value="{{ $empresa->contatoEmpresa }}" required>
                            @error('contatoEmpresa')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-edit col-7">
                            <label for="cidadeEmpresa">Cidade:</label>
                            <input type="text" name="cidadeEmpresa" placeholder="{{ $empresa->cidadeEmpresa }}" value="{{ $empresa->cidadeEmpresa }}" required>
                            @error('cidadeEmpresa')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-edit col-5">
                            <label for="estadoEmpresa">Estado:</label>
                            <input type="text" name="estadoEmpresa" placeholder="{{ $empresa->estadoEmpresa }}" value="{{ $empresa->estadoEmpresa }}" required>
                            @error('estadoEmpresa')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-edit col-4">
                            <label for="cepEmpresa">CEP:</label>
                            <input type="text" name="cepEmpresa" placeholder="{{ $empresa->cepEmpresa }}" value="{{ $empresa->cepEmpresa }}" required>
                            @error('cepEmpresa')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-edit col-4">
                            <label for="LogradouroEmpresa">Logradouro:</label>
                            <input type="text" name="LogradouroEmpresa" placeholder="{{ $empresa->LogradouroEmpresa }}" value="{{ $empresa->LogradouroEmpresa }}" required>
                            @error('LogradouroEmpresa')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-edit col-4">
                            <label for="numeroLograEmpresa">Número:</label>
                            <input type="text" name="numeroLograEmpresa" placeholder="{{ $empresa->numeroLograEmpresa }}" value="{{ $empresa->numeroLograEmpresa }}" required>
                            @error('numeroLograEmpresa')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-edit col-12">
                            <label for="sobreEmpresa">Sobre:</label>
                            <input type="text" name="sobreEmpresa" placeholder="{{ $empresa->sobreEmpresa }}" value="{{ $empresa->sobreEmpresa }}" required>
                        </div>
                    </div>
                </div>
                <div class="footer-editar-empresa">
                    <button>Voltar</button>
                    <input type="submit" value="Confirmar"></input>
                </div>
            </form>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>