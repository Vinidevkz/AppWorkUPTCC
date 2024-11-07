<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('../assets/css/style-candidatos.css')}}">
    <link rel="stylesheet" href="{{url('../assets/css/dashboardEmpresa.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>

@include('components.navbarDashboardEmpresa')

    <section class="candidatos">

        <h4>Candidatos da vaga: {{ $vaga->nomeVaga }}</h4>

        <div class="box-candidatos row">
        @foreach($candidatos as $candidato)
            <div class="col">
                <div class="card-candidato">
                    <div style="display: flex; flex-direction: row; width: 60%; align-items: center;">
                        <div class="dados-candidato">
                            <img class="img-candidato" src="{{$candidato->usuario->fotoUsuario}}">
                            <div>
                                <h5 class="text-truncate">
                                    {{ $candidato->usuario->nomeUsuario }}
                                </h5>
                                <p>{{ $candidato->usuario->nomeUsuario }}</p>
                            </div>
                        </div>
                        <button class="perfil" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Visualizar perfil
                        </button>

                        {{ $candidato->status->tipoStatusVaga }}


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content d-flex justify-content-center">
                                        <div class="modal-candidato">
                                            <img src="{{$candidato->usuario->fotoBanner}}" alt="" class="banner-modal">
                                            <div class="d-flex header-modal">
                                                <img src="{{$candidato->usuario->fotoUsuario}}" alt="" style="width: 100px; height: 100px; border-radius: 5rem; align-self: start;">
                                                <div class="dados-modal">
                                                    <div style="margin-top: 1.5rem">
                                                        <h5 class="w-100 text-break">{{ $candidato->usuario->nomeUsuario }}</h5>
                                                        <h6 class="mb-0 align-self-center username" style="color: #6a6a6a">{{ $candidato->usuario->usernameUsuario }}</h6>
                                                    </div>
                                                    <div class="d-flex flex-column sub-candidato">
                                                        <p>{{ $candidato->usuario->emailUsuario }}</p>
                                                        <p>Nasceu em:{{ $candidato->usuario->nascUsuario }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="conteudo-modal">
                                                <div class="sobre">
                                                    <h5>Sobre mim:</h5>
                                                    <p style="font-size: 0.8rem">
                                                        {{ $candidato->usuario->sobreUsuario }}
                                                    </p>
                                                </div>
                                                <div class="info-adicional">
                                                    <div class="row d-flex flex-column">
                                                        <div class="col">
                                                            <h6>Contato:</h6>
                                                            <p>{{ $candidato->usuario->contatoUsuario }}</p>
                                                        </div>
                                                        <div class="col">
                                                            <h6>Escolaridade:</h6>
                                                            <p>{{ $candidato->usuario->ensinoMedio }}</p>
                                                        </div>
                                                        <div class="col">
                                                            <h6>Cidade:</h6>
                                                            <p>{{ $candidato->usuario->cidadeUsuario }}</p>
                                                        </div>
                                                        <div class="col">
                                                            <h6>Estado:</h6>
                                                            <p>{{ $candidato->usuario->estadoUsuario }}</p>
                                                        </div>
                                                        <div class="col">
                                                            <h6>Extra:</h6>
                                                            <p>{{ $candidato->usuario->formacaoCompetenciaUsuario }}</p>
                                                        </div>
                                                        <div class="col">
                                                            <h6>Término:</h6>
                                                            <p>{{ $candidato->usuario->dataFormacaoCompetenciaUsuario }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="opcoes-candidato">
                        <div class="botoes-candidato">
                            <form action="{{ route('candidaturas.aprovar', $candidato->idVagaUsuario) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="aprovar">Aprovar</button>
                            </form>

                            <form action="{{ route('candidaturas.negar', $candidato->idVagaUsuario) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="negar">Negar</button>
                            </form>

                        </div>
                        <button type="button" onclick="toggleDenunciaForm('{{ $candidato->idUsuario }}')" style="background-color: transparent"><i class="fa-solid fa-flag" style="color: #2f3036;"></i></button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

</body>

</html>