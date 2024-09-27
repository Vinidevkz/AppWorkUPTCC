<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="assets/css/navEfooterhome.css">

    <!-- Custom JS -->
    <script src="/resources/js/home.js" async></script>
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
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid navbarcf">
            <a class="navbar-brand" href="#">
                <img src="{{url('/assets/img/home/workuplogo.png')}}" alt="Logo Desktop" class="logo-desktop">
                <img src="{{url('/assets/img/home/WUPlogo.png')}}" alt="Logo Mobile" class="logo-mobile">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#Work">Trabalho</a></li>
                    <li class="nav-item"><a class="nav-link" href="#Metas">Metas</a></li>
                    <li class="nav-item"><a class="nav-link" href="#Time">Time</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Principais</a>
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
        <header class="cabecalho bg-dark py-4 init-hidden">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-6 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-white mb-2">WorkUP</h1>
                            <p class="lead fw-normal text-white-50 mb-4">ligando mentes inovadoras a empresas brilhantes</p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-success btn-lg px-4 me-sm-3" href="/login">venha conosco</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="#!">saiba mais</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                        <img class="img-fluid rounded-3 my-5" src="{{url('/assets/img/home/WUPlogo.png')}}" alt="imgHeader" />
                    </div>
                </div>
            </div>
        </header>

        <!-- sobre nos -->
        <section class="container-fluid seccf init-hidden py-5 section-spacing">
            <div class="row p-4">
                <div class="col-md-6">
                    <div class="p-4">
                        <div class="card">
                            <div class="content">
                                <h1>Quem Somos</h1>
                                <p class="para">
                                    Somos uma plataforma dedicada a unir jovens talentos e empresas em busca da primeira grande oportunidade. Acreditamos que todos merecem uma chance de brilhar, e nossa missão é fazer essa conexão acontecer. Combinamos paixão, inovação e comprometimento para transformar sonhos em realidade.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <img class="imgquemsomos" src="{{url('/assets/img/home/1.png')}}" alt="Imagem" class="img-fluid">
                </div>
            </div>
        </section>

        <section class="container-fluid seccf init-hidden py-5 section-spacing">
            <div class="row p-4">
                <!-- Imagem à esquerda com margem ajustada -->
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <img class="imgquemsomos img-fluid" src="{{url('/assets/img/home/1.png')}}" alt="Imagem" style="max-width: 100%; height: auto; margin: 0 20px;">
                </div>

                <!-- Card à direita -->
                <div class="col-md-6">
                    <div class="p-4">
                        <div class="card">
                            <div class="content">
                                <h1>Por que Escolher Nossa Plataforma?</h1>
                                <p class="para">
                                    Se você é uma empresa que valoriza o potencial dos jovens e busca diversidade e energia fresca, você está no lugar certo. Nossa plataforma oferece acesso a uma base de talentos promissores, prontos para contribuir com ideias inovadoras e entusiasmo. Juntos, podemos construir um futuro brilhante.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="container-fluid seccf init-hidden py-5 section-spacing">
            <div class="row p-4">
                <div class="col-md-6">
                    <div class="p-4">
                        <div class="card">
                            <div class="content">
                                <h1>Sua Primeira Oportunidade Começa Aqui</h1>
                                <p class="para">
                                    Você é jovem, ambicioso e cheio de potencial? Nós entendemos. Na nossa plataforma, você encontrará oportunidades reais para dar o primeiro passo na sua carreira. De estágios a empregos de entrada, estamos aqui para apoiá-lo(a) em cada etapa. Vamos construir o seu caminho para o sucesso juntos!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <img class="imgquemsomos" src="{{url('/assets/img/home/1.png')}}" alt="Imagem" class="img-fluid">
                </div>
            </div>
        </section>

        <!-- depoimentos -->
        <div class="py-5 bg-light init-hidden pt-2 mt-6">
            <div class="container px-5 my-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-10 col-xl-7">
                        <div class="text-center">
                            <div class="fs-4 mb-4 fst-italic">"trabalho incrivel dos estudantes de ds para a comuninade jovem e desamparada"</div>
                            <div class="d-flex align-items-center justify-content-center">
                                <img class="rounded-circle me-3" src="{{url('/')}}" alt="..." />
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

        <!-- mais depoimentos -->
        <div class="py-5 bg-light init-hidden">
            <div class="container px-5 my-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-10 col-xl-7">
                        <div class="text-center">
                            <div class="fs-4 mb-4 fst-italic">"trabalho incrivel dos estudantes de ds para a comuninade jovem e desamparada"</div>
                            <div class="d-flex align-items-center justify-content-center">
                                <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
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
                    <p class="copyright">Copyright © 2024 <img href="#"><img id="logo-footer" src="{{url('/assets/img/login/workuplogo.png')}}" alt="Descrição da imagem" class="rounded"></a>.</p>
                </div>
            </div>
        </div>
    </div>


    <script src="{{url('/assets/js/home.js')}}" async></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>



</body>

</html>