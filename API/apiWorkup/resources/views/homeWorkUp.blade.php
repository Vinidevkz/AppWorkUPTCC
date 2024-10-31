<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="{{url('assets/img/adminImages/WU-icon.png')}}" type="image/x-icon">

        <!-- Favicon -->
        <link rel="icon" href="/img/icons/android-chrome-192x192.png" type="image/x-icon">
        <title>WorkUP | Home</title>

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



                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Principais</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="/admin/cadastrar">cadastrar admin</a></li>
                            <li><a class="dropdown-item" href="/vaga/cadastrar">cadastrar vaga</a></li>
                            <li><a class="dropdown-item" href="/empresa/cadastrar">cadastrar empresa</a></li>
                            <li><a class="dropdown-item" href="/admin">home Admin</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>

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
                    <img class="Logoheader" src="{{url('/assets/img/home/workuplogo.png')}}" alt="Logoheader" class="logoheader mb-3">
                    <p class="lead fw-normal text-white mb-4">Ligando mentes inovadoras a empresas brilhantes</p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                    <a class="btn btn-success btn-lg px-4 me-sm-3" href="/login">Venha conosco</a>
                    <button type="button" class="btn btn-success btn-lg px-4" data-bs-toggle="modal" data-bs-target="#videoModal">Saiba mais</button>

                    <!-- Modal -->
                    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/y-Kao78Ug8I" allowfullscreen style="width: 100%; height: 500px;"></iframe>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                <div id="carouselExampleSlidesOnly" class="carousel" data-bs-ride="carousel">
                    <div class="carousel-inner">
                    <div class="carousel-item top  active">
                        <img class="img-fluid rounded-4 my-0" src="{{url('/assets/img/home/smart.png')}}" alt="imgHeader">
                    </div>
                    <div class="carousel-item">
                        <img class="img-fluid rounded-4 my-0" src="{{url('/assets/img/home/mkwup.png')}}" alt="imgHeader">
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </header>
        <div class="rownossamissao">
            <div class="container">
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-12">
                        <h1>WorkUp Web</h1>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h6 class="card-subtitle text-muted"> WorkUp Web para Empresas</h6>
                                <p class="textcard">Bem-vindo à WorkUp Web, a plataforma desenvolvida especialmente para conectar empresas a jovens talentos promissores. Sabemos que encontrar o candidato ideal pode ser um desafio, e é por isso que criamos um ambiente intuitivo e eficiente para facilitar esse processo.</p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNossamissao">
                                    Abrir
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="cardimage">
                            <img src="{{url('/assets/img/home/1.png')}}" alt="" class="card-img-top" alt="Imagem 3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Nossamissao -->
        <div class="modal fade" id="modalNossamissao" tabindex="-1" aria-labelledby="modalNossamissao" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalnossamissaoLabel">WorkUp Web</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p> Aqui, você pode cadastrar sua empresa, postar vagas, e gerenciar todo o processo de recrutamento de forma simplificada. A WorkUp Web não só oferece uma ampla base de candidatos qualificados, mas também proporciona ferramentas avançadas de busca e filtragem para encontrar exatamente o que você precisa. Junte-se a nós e descubra como a WorkUp Web pode transformar o seu processo de recrutamento. </p>
                    </div>
                    <div class="floating-images">
                        <img src="{{url('/assets/img/home/mkwup.png')}}" alt="Imagem 1" class="floating-image right">
                        <img src="{{url('/assets/img/home/smart.png')}}" alt="Imagem 2" class="floating-image right right-0">
                        <img src="{{url('/assets/img/home/1.png')}}" alt="Imagem 3" class="floating-image left">
                    </div>
                </div>
            </div>
        </div>

        <div class="rowjovens">
            <div class="container">
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-12">
                        <h1>Nossos Jovens</h1>
                    </div>
                    <div class="col-md-6">
                        <div class="cardimage">
                            <img src="{{url('/assets/img/home/3.png')}}" alt="" class="card-img-top" alt="Imagem 3">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body">
                                <p class="textcard">Os jovens são o coração da WorkUp. Sabemos que iniciar uma carreira pode ser um desafio, e é por isso que estamos aqui para apoiar cada passo do caminho. </p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalJovens">
                                    Abrir
                                </button>
                            </div>
                        </div>
                    </div>
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
                        <p>Nossos usuários têm acesso a uma vasta gama de recursos, desde perfis personalizados que destacam suas habilidades e experiências, até um feed de notícias com dicas de carreira e oportunidades de emprego. Estamos comprometidos em ajudar nossos jovens a alcançar seu potencial máximo e a encontrar a oportunidade perfeita para iniciar suas carreiras. Somos uma empresa dedicada a fornecer soluções inovadoras . </p>
                    </div>
                    <div class="floating-images">
                        <img src="{{url('/assets/img/home/mkwup.png')}}" alt="Imagem 1" class="floating-image right">
                        <img src="{{url('/assets/img/home/smart.png')}}" alt="Imagem 2" class="floating-image right right-0">
                        <img src="{{url('/assets/img/home/1.png')}}" alt="Imagem 3" class="floating-image left">
                    </div>

                </div>
            </div>
        </div>

        <div class="rowsobrenos">
            <div class="container">
                <div class="row" style="margin-top: 20px;">
                    <div class="col-md-12">
                        <h1>Quem Somos</h1>
                    </div>
                    <div class="col-md-5">
                        <div class="card mb-3">
                            <div class="card-body">

                                <p class="textcard">
                                    A WorkUp é uma plataforma dedicada a conectar jovens talentos com suas primeiras oportunidades no mercado de trabalho. Entendemos as dificuldades que muitos enfrentam ao buscar seu primeiro emprego, e nossa missão é tornar esse processo mais acessível e eficiente.
                                </p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSobreNos">
                                    Saiba mais
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">


                        <div class="cardimage">
                            <img src="{{url('/assets/img/home/1.png')}}" alt="" class="card-img-top" alt="Imagem 3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- Modal Sobre Nós -->
        <div class="modal fade" id="modalSobreNos" tabindex="-1" aria-labelledby="modalSobreNos" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalSobreNosLabel">Sobre Nós</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="textcard">
                            Combinando tecnologia inovadora e uma abordagem centrada nos usuários, oferecemos um espaço onde estudantes podem encontrar vagas que se alinham com suas habilidades e interesses, e onde as empresas podem descobrir novos talentos. A WorkUp é mais do que apenas um aplicativo; somos uma comunidade dedicada a transformar a busca pelo primeiro emprego em uma experiência empoderadora e acessível. Fundada com o objetivo de reduzir as barreiras enfrentadas pelos jovens ao entrar no mercado de trabalho, nossa plataforma oferece recursos inovadores para conectar talentos emergentes com empresas que valorizam e investem no desenvolvimento de novos profissionais.
                        </p>
                    </div>
                    <!-- Adiciona as imagens flutuantes -->
                    <div class="floating-images">
                        <img src="{{url('/assets/img/home/mkwup.png')}}" alt="Imagem 1" class="floating-image right">
                        <img src="{{url('/assets/img/home/smart.png')}}" alt="Imagem 2" class="floating-image right right-0">
                        <img src="{{url('/assets/img/home/1.png')}}" alt="Imagem 3" class="floating-image left">
                    </div>
                </div>
            </div>
        </div>





        <div class="rowdepoimento">
            <!-- mais depoimentos -->
            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row gx-5 justify-content-center">
                                <div class="col-lg-10 col-xl-7">
                                    <div class="text-center">
                                        <div class="fs-4 mb-4 fst-italic">"Trabalho incrível dos estudantes de DS para a comunidade jovem e desamparada"</div>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                            <div class="fw-bold">
                                                Fernanda Silva
                                                <span class="fw-bold text-primary mx-1">/</span>
                                                Analista, Empregada
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item ">
                        <div class="container">
                            <div class="row gx-5 justify-content-center">
                                <div class="col-lg-10 col-xl-7">
                                    <div class="text-center">
                                        <div class="fs-4 mb-4 fst-italic">"Outro depoimento de usuário do app"</div>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                            <div class="fw-bold">
                                                João Pereira
                                                <span class="fw-bold text-primary mx-1">/</span>
                                                Desenvolvedor, Freelancer
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Controles -->
                <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Próximo</span>
                </button>
            </div>
        </div>

    </main>



    <!-- Rodapé -->
    <div class="footer imgfooter">
        <div class="container footer">
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
                            <li><a href="https://portal.ciee.org.br/" target="_blank">ciee</a></li>
                            <li><a href="https://descomplica.com.br/" target="_blank">descomplica</a></li>
                            <li><a href="https://www.fatecsp.br/" target="_blank">Fatec</a></li>
                            <li><a href="https://univesp.br/" target="_blank">UNIVESP</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="single_footer">
                        <h4>Receba nossas noticias</h4>
                        <div class="signup_form">
                            <form action="#" class="subscribe">
                                <input type="text" class="subscribe__input" placeholder="Digite seu Email ">
                                <button type="button" class="subscribe__btn"><i class="fa-solid fa-envelope"></i></button>
                            </form>
                        </div>
                        <div class="social_profile">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-x"></i></a></li>
                                <li><a href="#"><i class="fab fa-google"></i></a></li>
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
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="partner-container">
                                <div class="partner-title">Empresas Parceiras</div>
                                <img src="{{url('/assets/img/home/helphouse.jpeg')}}" alt="Logo Empresa 1" class="partner-logo">
                                <img src="{{url('/assets/img/home/acheaqui.png')}}" alt="Logo Empresa 2" class="partner-logo">
                                <img src="{{url('/assets/img/home/conectec.jpeg')}}" alt="Logo Empresa 3" class="partner-logo">
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12">

                                <p class="copyright">Copyright © 2024 <img href="#"><img id="logo-footer"
                                        src="{{url('/assets/img/login/workuplogo.png')}}" alt="Descrição da imagem"
                                        class="rounded"></a>.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div vw class="enabled">
                    <div vw-access-button class="active"></div>
                    <div vw-plugin-wrapper>
                        <div class="vw-plugin-top-wrapper"></div>
                    </div>
                </div>
                <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
                <script>
                    new window.VLibras.Widget('https://vlibras.gov.br/app');
                </script>


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