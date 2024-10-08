<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="icon" href="/img/icons/android-chrome-192x192.png" type="image/x-icon">
    <title>WorkUP</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/bodyhomeW.css">

    <link rel="stylesheet" href="assets/css/cssHomeWup/navbarhomeW.css">

    <link rel="stylesheet" href="assets/css/cssHomeWup/footerhomeW.css">

    <!-- Custom JS -->
    <!-- <script src="/resources/js/homew.js" async></script> -->

</head>

<body>



    <!-- Sidebar -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSidebar" style="width: 300px;">
        <div class="offcanvas-header">
            <a class="navbar-brand" href="#">
                <img src="{{url('/assets/img/home/workuplogo.png')}}" alt="Logo Desktop" class="logo-desktop">
                <img src="{{url('/assets/img/home/WUPlogo.png')}}" alt="Logo Mobile" class="logo-mobile">
            </a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body ">
            <ul class="list-group">
                <li class="list-group-item"><a href="/homeAdmin">home Admin</a></li>
                <li class="list-group-item"><a href="/cadastrarAdmin">cadastrar admin</a></li>
                <li class="list-group-item"><a href="/cadastrarVaga">cadastrar vaga</a></li>
                <li class="list-group-item"><a href="/cadastrarEmpresa">cadastrar empresa</a></li>

            </ul>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid navbarcf">
            <a class="navbar-brand" href="#">
                <img src="{{url('/assets/img/home/workuplogo.png')}}" alt="Logo Desktop" class="logo-desktop">
                <img src="{{url('/assets/img/home/WUPlogo.png')}}" alt="Logo Mobile" class="logo-mobile">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar"
                aria-controls="offcanvasSidebar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#Work">Nosso Trabalho</a></li>
                    <li class="nav-item"><a class="nav-link" href="#Metas">Metas</a></li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Principais</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/cadastrarAdmin">cadastrar admin</a></li>
                            <li><a class="dropdown-item" href="/cadastrarVaga">cadastrar vaga</a></li>
                            <li><a class="dropdown-item" href="/cadastrarEmpresa">cadastrar empresa</a></li>
                            <li><a class="dropdown-item" href="/cadastrarAreaEmpresa">cadastrar Area empresa</a></li>
                            <li><a class="dropdown-item" href="/admin">home Admin</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-search"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-lightbulb"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="conteudo">



        <!-- cabeçalho -->

        <header class="quemsomosf bg-dark py-5">

            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-6 text-center text-xl-start">
                            <img src="{{url('/assets/img/home/workuplogo.png')}}" alt="Logoheader"
                                class="logoheader mb-3">
                            <p class="lead fw-normal text-white mb-4">Ligando mentes inovadoras a empresas brilhantes
                            </p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-success btn-lg px-4 me-sm-3" href="/login">Venha conosco</a>
                                <a class="btn btn-success btn-lg px-4" href="#!">Saiba mais</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                        <img class="img-fluid rounded-4 my-0" src="{{url('/assets/img/home/cell2.png')}}"
                            alt="imgHeader" />
                    </div>
                </div>
            </div>
        </header>




        <div class="rowsobrenos">
            <!-- cardshome -->
            <div class="container">
                <div class="row" style="margin-top: 20px;">

                    <div class="col-md-12">
                        <h1>Sobre nós</h1>
                    </div>
                    <div class="col-md-6">
                        <!-- Card 1 (Sobre nós) -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="card-subtitle text-muted">Nossa missão e visão</h6>
                                <p>Somos uma plataforma dedicada a unir jovens talentos e empresas em busca da primeira
                                    grande oportunidade. Acreditamos que todos merecem uma chance de brilhar, e nossa
                                    missão é fazer essa conexão acontecer.</p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalSobreNos">
                                    Abrir
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Card maior (apenas vídeo) -->

                        <div class="laptop-frame">
                            <div class="laptop-screen">
                                <iframe width="560" height="315"
                                    src="https://www.youtube.com/embed/4ArtpRaYleM?si=fBzTyuWArDvwD7mj"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="rowjovens">
            <!-- cardshome -->
            <div class="container">
                <div class="row" style="margin-top: 20px;">

                    <div class="col-md-12">
                        <h1>Nossos Jovens</h1>
                    </div>
                    <div class="col-md-6">
                        <!-- Card maior (apenas imagem) -->
                        <div class="cardimage">
                            <img src="{{url('/assets/img/home/1.png')}}" alt="" class="card-img-top" alt="Imagem 3">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Card 1 (Sobre nós) -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="card-subtitle text-muted">Nossa missão e visão</h6>
                                <p>Somos uma plataforma dedicada a unir jovens talentos e empresas em busca da primeira
                                    grande oportunidade. Acreditamos que todos merecem uma chance de brilhar, e nossa
                                    missão é fazer essa conexão acontecer.</p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalJovens">
                                    Abrir
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="rowsobrenos">
            <!-- cardshome -->
            <div class="container">
                <div class="row" style="margin-top: 20px;">

                    <div class="col-md-12">
                        <h1>Sobre nós</h1>
                    </div>
                    <div class="col-md-6">
                        <!-- Card 1 (Sobre nós) -->
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="card-subtitle text-muted">Nossa missão e visão</h6>
                                <p>Somos uma plataforma dedicada a unir jovens talentos e empresas em busca da primeira
                                    grande oportunidade. Acreditamos que todos merecem uma chance de brilhar, e nossa
                                    missão é fazer essa conexão acontecer.</p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalSobreNos">
                                    Abrir
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Card maior (apenas vídeo) -->

                        <div class="cardimage">
                            <img src="{{url('/assets/img/home/1.png')}}" alt="" class="card-img-top" alt="Imagem 3">
                        </div>
                    </div>
                </div>
            </div>
        </div>








        <!-- Modal Nossos Jovens -->
        <div class="modal fade" id="modalNossosJovens" tabindex="-1" aria-labelledby="modalNossosJovensLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalNossosJovensLabel">Nossos Jovens</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p> Você é jovem, ambicioso e cheio de potencial? Nós entendemos. Na nossa plataforma,
                            você encontrará oportunidades reais para dar o primeiro passo na sua carreira. De
                            estágios a empregos de entrada, estamos aqui para apoiá-lo(a) em cada etapa. Vamos
                            construir o seu caminho para o sucesso juntos!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>



        </div>
        </div>

        </div>







        <!-- Modal Sobre Nós -->
        <div class="modal fade" id="modalSobreNos" tabindex="-1" aria-labelledby="modalSobreNosLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalSobreNosLabel">Sobre Nós</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <p class="mt-3">
                            Somos uma empresa dedicada a fornecer soluçõe
                    </div>s inovadoras no campo da tecnologia. Nossa missão é entregar produtos de
                    alta qualidade que atendam às necessidades de nossos clientes, sempre com foco
                    em excelência e inovação .
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <  /div>
                </div>
            </div>
        </div>

        <!-- Modal Nossos Jovens -->
        <div class="modal fade" id="modalJovens" tabindex="-1" aria-labelledby="modalJovens" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalJovovens">Nossos Jovens</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p> Somos uma empresa dedicada a fornecer soluções inovadoras no campo da
                            tecnologia. Nossa missão é entregar produtos de alta qualidade que atendam
                            às necessidades de nossos clientes, sempre com foco em excelência e inovação
                            . </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        </div>





        <div class="rowdepoimento">

            <!-- mais depoimentos -->
            <div class=" depoimento  ">
                <div class="container">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-10 col-xl-7">
                            <div class="text-center">
                                <div class="fs-4 mb-4 fst-italic">"trabalho incrivel dos estudantes de ds para a
                                    comuninade jovem e desamparada"</div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d"
                                        alt="..." />
                                    <div class="fw-bold">
                                        fernada silva
                                        <span class="fw-bold text-primary mx-1">/</span>
                                        Analista, empregada
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </main>

    <div class="partners-logo-slider">

        <div class="slide-track">
            <div class="slide">
                <img src="{{url('/assets/img/carouselLogos/eteclogo.jpg')}}" height="100" width="250" alt="" />
            </div>
            <div class="slide">
                <img src="{{url('/assets/img/carouselLogos/cpslogo.jpg')}}" height="100" width="250" alt="" />
            </div>
            <div class="slide">
                <img src="{{url('/assets/img/carouselLogos/logoestado.jpeg')}}" height="100" width="250" alt="" />
            </div>
            <div class="slide">
                <img src="{{url('/assets/img/carouselLogos/eteclogo.jpg')}}" height="100" width="250" alt="" />
            </div>
            <div class="slide">
                <img src="{{url('/assets/img/carouselLogos/eteclogo.jpg')}}" height="100" width="250" alt="" />
            </div>
            <div class="slide">
                <img src="{{url('/assets/img/carouselLogos/cpslogo.jpg')}}" height="100" width="250" alt="" />
            </div>
            <div class="slide">
                <img src="{{url('/assets/img/carouselLogos/logoestado.jpeg')}}" height="100" width="250" alt="" />
            </div>
            <div class="slide">
                <img src="{{url('/assets/img/carouselLogos/eteclogo.jpg')}}" height="100" width="250" alt="" />
            </div>
            <div class="slide">
                <img src="{{url('/assets/img/carouselLogos/eteclogo.jpg')}}" height="100" width="250" alt="" />
            </div>
            <div class="slide">
                <img src="{{url('/assets/img/carouselLogos/cpslogo.jpg')}}" height="100" width="250" alt="" />
            </div>
            <div class="slide">
                <img src="{{url('/assets/img/carouselLogos/logoestado.jpeg')}}" height="100" width="250" alt="" />
            </div>
            <div class="slide">
                <img src="{{url('/assets/img/carouselLogos/eteclogo.jpg')}}" height="100" width="250" alt="" />
            </div>
            <div class="slide">
                <img src="{{url('/assets/img/carouselLogos/cpslogo.jpg')}}" height="100" width="250" alt="" />
            </div>
            <div class="slide">
                <img src="{{url('/assets/img/carouselLogos/logoestado.jpeg')}}" height="100" width="250" alt="" />
            </div>
            <div class="slide">
                <img src="{{url('/assets/img/carouselLogos/logoestado.jpeg')}}" height="100" width="250" alt="" />
            </div>

        </div>
    </div>

    <!-- Rodapé -->
    <div class="footer init-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="single_footer">
                        <h4>Serviços</h4>
                        <ul>
                            <li><a href="#">vagas</a></li>
                            <li><a href="#">curriculo</a></li>
                            <li><a href="#">nossos projetos</a></li>
                            <li><a href="#">conheça nossa empresa</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="single_footer">
                        <h4>Paginas parceiras</h4>
                        <ul>
                            <li><a href="#">ciee</a></li>
                            <li><a href="#">descomplica</a></li>
                            <li><a href="#">Fatec</a></li>
                            <li><a href="#">UNIVESP</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="single_footer">
                        <h4>Receba nossas noticias</h4>
                        <div class="signup_form">
                            <form action="#" class="subscribe">
                                <input type="text" class="subscribe__input" placeholder="Digite seu Email ">
                                <button type="button" class="subscribe__btn"><i class="fas fa-paper-plane"></i></button>
                            </form>
                        </div>
                        <div class="social_profile">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p class="copyright">

                        <img href="#">

                    </p>
                    <div class="login-adms">
                        <span>Login para</span>
                        <button class="animated-button">
                            <svg viewBox="0 0 24 24" class="arr-2" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                                </path>
                            </svg>
                            <span class="text">Admin</span>
                            <span class="circle"></span>
                            <svg viewBox="0 0 24 24" class="arr-1" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
                                </path>
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12">

                    <p class="copyright">Copyright © 2024 <img href="#"><img id="logo-footer"
                            src="{{url('/assets/img/login/workuplogo.png')}}" alt="Descrição da imagem"
                            class="rounded"></a>.</p>
                </div>
            </div>
        </div>
    </div>


    <script src="{{url('/assets/js/home.js')}}" async></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>



</body>

</html>