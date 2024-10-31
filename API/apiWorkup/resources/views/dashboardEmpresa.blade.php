<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{url('../assets/css/dashboardEmpresa.css')}}">
    <title>Empresa | Dashboard</title>
</head>

<body>

@include('components.navbarDashboardEmpresa')


    <section class="card">
        <div class="row">
            <div class="col">
                <div class="txt-card-wrap">
                    <p>Seja bem vinda Empresa</p>
                    <h3>
                        Nos ajude nessa jornada de transformar a carreira de diversas pessoas
                    </h3>
                    <div class="botoes-card">
                        <a href="{{ route('cadastrarVaga') }}" class="botao-card botao-vaga">Publicar vaga</a>
                        <a href="{{ route('post.create', $empresa->idEmpresa) }}" class="botao-card botao-post">Fazer post</a>
                    </div>
                </div>
            </div>
            <div class="col">
            </div>
        </div>
    </section>


    <section class="funcoes">
        <h3 class="titulo-secao">Aqui você pode:</h3>
        <div class="fundo-funcoes">
            <div class="row">
                <div class="col col-6">
                    <div class="card-funcoes">
                        <div class="header-card-funcoes">
                            <i class="fa-solid fa-note-sticky" style="color: #20dd77;"></i>
                            <h4>Publicar vagas</h4>
                        </div>
                        <div class="body-card-funcoes">
                            <p>O nosso foco é a publicação de vagas, sendo essa a função principal dessa página. As vagas podem ser editadas e removidas posteriormente</p>
                        </div>
                    </div>
                </div>
                <div class="col col-6">
                    <div class="card-funcoes">
                        <div class="header-card-funcoes">
                            <i class="fa-solid fa-paper-plane" style="color: #20dd77;"></i>
                            <h4>Fazer publicaçõs</h4>
                        </div>
                        <div class="body-card-funcoes">
                            <p>O nosso foco é a publicação de vagas, sendo essa a função principal dessa página. As vagas podem ser editadas e removidas posteriormente</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="vagas" class="vagas">


        <div class="d-flex justify-content-start mt-5">
            <p class="titulo-2">Vagas publicadas</p>
        </div>


        <div class="wrap-carrossel">

            <img src="{{url('assets/img/dashboardEmpresa/bckBtn.png')}}" class="btn-carrossel" id="backBtn">

            <div class="carrossel">

                @foreach($vagas as $vaga)

                    <div class="col-vaga col-sm-6 col-md-4 col-lg-3 h-100">
                        <div class="vaga">
                            <div class="wrap-vaga">
                                <div class="header-vaga">
                                    <h3>{{ $vaga->nomeVaga }}</h3>
                                    <div>
                                        <p>Publicada em {{ \Carbon\Carbon::parse($vaga->created_at)->format('d/m/Y')}} </p>
                                        <p>Aberta até {{ \Carbon\Carbon::parse($vaga->prazoVaga)->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                                <div class="opt-vaga">
                                    <p>Salário: R${{ $vaga->salarioVaga }}</p>
                                    <p>Área: {{ $vaga->nomeVaga }}</p>
                                    <p>Estado: {{ $vaga->estadoVaga }}</p>
                                    <p>Candidatos: {{ $vaga->total_candidatos }}</p>
                                </div>
                                <a href="{{ route('vagas.edit', $vaga->idVaga) }}" class="btn-vagas">Mais detalhes <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <img id="nextBtn" src="{{url('assets/img/dashboardEmpresa/nextBtn.png')}}" class="btn-carrossel"
                id="nextBtn">

        </div>

    </section>


    <div class="publicacoes">
        <h3>Publicações</h3>
        <div class="container container-publ">
            <div class="row">
                <div class="col col-publ">
                    <!--Publicação-->
                    <div class="publ">
                        <div class="row-publ">
                            <div class="col">
                                <div class="empresa-publ">
                                    <div>
                                        <img src="{{url('assets/img/dashboardEmpresa/user.png')}}" alt="">
                                        <p>Empresa</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col conteudo-publ">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Aenean
                                luctus, urna quis varius
                                consequat, eros justo efficitur ex, nec efficitur dui diam in diam. Mauris laoreet,
                                risus
                                sit amet posuere
                                gravida, neque odio tincidunt lorem, ut suscipit tortor dolor vel enim. Praesent nibh
                                leo,
                                rutrum vitae aliquet
                                a, facilisis vel enim.
                            </div>
                            <div class="col img-publ">
                                <img src="{{url('assets/img/dashboardEmpresa/feteps.jpg')}}" alt="">
                            </div>
                            <div class="col botoes-publ">
                                <div>
                                    <i class="fa-solid fa-message"></i>
                                    <i class="fa-regular fa-heart"></i>
                                </div>
                                <i class="fa-solid fa-flag"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-publ">
                    <!--Publicação-->
                    <div class="publ">
                        <div class="row-publ">
                            <div class="col">
                                <div class="empresa-publ">
                                    <div>
                                        <img src="{{url('assets/img/dashboardEmpresa/user.png')}}" alt="">
                                        <p>Empresa</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col conteudo-publ">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Aenean
                                luctus, urna quis varius
                                consequat, eros justo efficitur ex, nec efficitur dui diam in diam. Mauris laoreet,
                                risus
                                sit amet posuere
                                gravida, neque odio tincidunt lorem, ut suscipit tortor dolor vel enim. Praesent nibh
                                leo,
                                rutrum vitae aliquet
                                a, facilisis vel enim.
                            </div>
                            <div class="col img-publ">
                                <img src="{{url('assets/img/dashboardEmpresa/feteps.jpg')}}" alt="">
                            </div>
                            <div class="col botoes-publ">
                                <div>
                                    <i class="fa-solid fa-message"></i>
                                    <i class="fa-regular fa-heart"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>

        <script src="../js/card-equipe.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
            crossorigin="anonymous"></script>

</body>

</html>