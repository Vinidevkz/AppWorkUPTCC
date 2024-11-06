<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{url('assets/img/adminImages/WU-icon.png')}}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{url('../assets/css/dashboardEmpresa.css')}}">
    <title>Empresa | Dashboard</title>
</head>

<body>

@include('components.navbarDashboardEmpresa')


<section class="card">
    <div class="row g-0">
        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
            <div class="txt-card-wrap text-center text-md-start p-3">
                <p>Seja bem-vindo(a) {{ $empresa->nomeEmpresa }}!</p>
                <h3>
                    Nos ajude nessa jornada de transformar a carreira de diversas pessoas
                </h3>
                <div class="botoes-card d-flex flex-column flex-md-row justify-content-center justify-content-md-start">
                    <a href="{{ route('cadastrarVaga') }}" class="botao-card botao-vaga mb-2 mb-md-0 me-md-2">Publicar vaga</a>
                    <a href="{{ route('post.create', $empresa->idEmpresa) }}" class="botao-card botao-post">Fazer post</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <!-- Imagem ou conteúdo adicional pode ser adicionado aqui -->
        </div>
    </div>
</section>

    <section class="funcoes py-4">
    <div class="container">
        <h3 class="titulo-secao text-center mb-4">Aqui você pode:</h3>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card-funcoes p-3 h-100">
                    <div class="header-card-funcoes d-flex align-items-center mb-3">
                        <i class="fa-solid fa-note-sticky me-2" style="color: #20dd77;"></i>
                        <h4>Publicar vagas</h4>
                    </div>
                    <div class="body-card-funcoes">
                        <p>O nosso foco é a publicação de vagas, sendo essa a função principal dessa página. As vagas podem ser editadas e removidas posteriormente.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card-funcoes p-3 h-100">
                    <div class="header-card-funcoes d-flex align-items-center mb-3">
                        <i class="fa-solid fa-paper-plane me-2" style="color: #20dd77;"></i>
                        <h4>Mensagens</h4>
                    </div>
                    <div class="body-card-funcoes">
                        <p>Enviar menssagens aos candidatos de forma rapida e segura .</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card-funcoes p-3 h-100">
                    <div class="header-card-funcoes d-flex align-items-center mb-3">
                        <i class="fa-solid fa-users me-2" style="color: #20dd77;"></i>
                        <h4>Conhecer os jovens talentos</h4>
                    </div>
                    <div class="body-card-funcoes">
                        <p>Aqui você pode conectar estudantes de diferentes áreas, promovendo a troca de conhecimento e networking.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card-funcoes p-3 h-100">
                    <div class="header-card-funcoes d-flex align-items-center mb-3">
                        <i class="fa-solid fa-briefcase me-2" style="color: #20dd77;"></i>
                        <h4>Encontrar oportunidades</h4>
                    </div>
                    <div class="body-card-funcoes">
                        <p>Além de publicar vagas, você também pode encontrar oportunidades de estágio e emprego na nossa plataforma.</p>
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

    <div class="wrap-carrossel position-relative">
        <img src="{{url('assets/img/dashboardEmpresa/bckBtn.png')}}" class="btn-carrossel position-absolute start-0" id="backBtn">

        <div class="carrossel d-flex justify-content-center">
            @if($vagas->isEmpty())
                <div class="alert alert-warning" role="alert">
                    Nenhuma vaga publicada.
                </div>
            @else
                @foreach($vagas as $vaga)
                    <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center mb-4">
                        <div class="vaga">
                            <div class="wrap-vaga">
                                <div class="header-vaga">
                                    <h4 class="text-truncate">{{$vaga->nomeVaga}}</h4>
                                    <div>
                                        <p>Publicada em {{ \Carbon\Carbon::parse($vaga->created_at)->format('d/m/Y')}} </p>
                                        <p>Aberta até {{ \Carbon\Carbon::parse($vaga->prazoVaga)->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                                <div class="opt-vaga">
                                    <p class="text-truncate my-1">Salário: R${{ $vaga->salarioVaga }}</p>
                                    <p class="text-truncate mb-1">Área: {{ $vaga->nomeVaga }}</p>
                                    <p class="text-truncate mb-1">Estado: {{ $vaga->estadoVaga }}</p>
                                    <p class="text-truncate mb-1">Candidatos: {{ $vaga->total_candidatos }}</p>
                                </div>
                                <div class="footer-vaga">
                                    <a href="{{ route('vagas.edit', $vaga->idVaga) }}" class="btn-vagas">Detalhes <i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></a>
                                    <a href="{{ route('verVagaCadastrada', $vaga->idVaga) }}" class="btn-vagas">Candidatos <i class="fa-solid fa-user" style="color: #ffffff;"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <img id="nextBtn" src="{{url('assets/img/dashboardEmpresa/nextBtn.png')}}" class="btn-carrossel position-absolute end-0" id="nextBtn">
    </div>
</section>

        <img id="nextBtn" src="{{url('assets/img/dashboardEmpresa/nextBtn.png')}}" class="btn-carrossel position-absolute end-0" id="nextBtn">
    </div>
</section>


    <div class="publicacoes">
        <h3>Publicações</h3>
        <div class="container container-publ">
            <div class="row">
            @if($posts->isEmpty())
            <div class="alert alert-warning" role="alert">
                Nenhuma postagem encontrada.
            </div>
            @else
            @foreach($posts as $post)
                <div class="col col-publ">
                    <div class="publ">
                        <div class="row-publ">
                        
                            <div class="col">
                                <div class="empresa-publ">
                                    <div>
                                        <img src="{{ $empresa->fotoEmpresa }}" alt="">
                                        <p>{{ $empresa->usernameEmpresa }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col conteudo-publ">
                                {{ $post->detalhePublicacao }}
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
                @endforeach
            </div>
            @endif
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