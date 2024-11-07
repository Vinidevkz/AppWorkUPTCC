<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{url('assets/img/adminImages/WU-icon.png')}}" type="image/x-icon">
    <link rel="icon" href="/img/icons/android-chrome-192x192.png" type="image/x-icon">
    <title>WorkUP | Home</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/bodyhomeW.css">
    <link rel="stylesheet" href="assets/css/cssHomeWup/navbarhomeW.css">
    <link rel="stylesheet" href="assets/css/cssHomeWup/footerhomeW.css">
    <link rel="stylesheet" href="{{url('../assets/css/dashboardEmpresa.css')}}">

</head>

<body class="d-flex flex-column min-vh-100"> 

    <!-- Sidebar -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasSidebar">
        <div class="offcanvas-header">
            <a class="navbar-brand" href="#">
                <img src="{{url('/assets/img/home/workuplogo.png')}}" alt="Logo Desktop" class="logo-desktop">
                <img src="{{url('/assets/img/home/WUPlogo.png')}}" alt="Logo Mobile" class="logo-mobile">
            </a>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">
            <ul class="list-group">
                <li class="list-group-item"><a href="/homeAdmin">home Admin</a></li>
                <li class="list-group-item"><a href="/cadastrarAdmin">cadastrar admin</a></li>
                <li class="list-group-item"><a href="/cadastrarVaga">cadastrar vaga</a></li>
                <li class="list-group-item"><a href="/cadastrarEmpresa">cadastrar empresa</a></li>
            </ul>
        </div>
    </div>

    <!-- Navbar -->
    @include('components.navbarDashboardEmpresa')

    <main class="flex-grow-1"> 

        <!-- Cabeçalho -->
        <header class="quemsomosf bg-dark py-4">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-6 col-xl-5">
                        <div class="my-4 text-center text-lg-start">
                            <img class="logoheader mb-3" src="{{url('/assets/img/home/workuplogo.png')}}" alt="Logoheader">
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
                                <div class="carousel-item active">
                                    <img class="img-fluid rounded-2 my-0" src="{{url('/assets/img/home/smart.png')}}" alt="imgHeader">
                                </div>
                                <div class="carousel-item">
                                    <img class="img-fluid rounded-2 my-0" src="{{url('/assets/img/home/mkwup.png')}}" alt="imgHeader">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Funções -->
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

    </main>

    <!-- Rodapé -->
    <footer class="footer bg-light mt-auto py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="single_footer">
                    <h4>Receba Nossas Notícias</h4>
                    <div class="signup_form">
                        <form action="#" class="subscribe d-flex">
                            <input type="text" class="form-control me-2" placeholder="Digite seu Email">
                            <button type="button" class="btn btn-primary"><i class="fa-solid fa-envelope"></i></button>
                        </form>
                    </div>
                    <div class="social_profile mt-3">
                        <ul class="list-unstyled d-flex">
                            <li class="me-3"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="me-3"><a href="#"><i class="fab fa-x"></i></a></li>
                            <li class="me-3"><a href="#"><i class="fab fa-google"></i></a></li>
                            <li class="me-3"><a href="#"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4 text-center">
                <img src="{{url('/assets/img/home/workuplogo.png')}}" alt="Logo Dynamo" style="max-width: 250px; margin-bottom: 10px;">
                <h4>By Dynamo</h4>
                <p>Projetos Parceiros</p>
                <div class="d-flex justify-content-center">
                    <div class="m-2">
                        <img src="{{url('/assets/img/home/conectec.jpeg')}}" alt="Parceiro 1" class="rounded-circle" style="width: 50px; height: 50px;">
                    </div>
                    <div class="m-2">
                        <img src="{{url('/assets/img/home/acheaqui.png')}}" alt="Parceiro 2" class="rounded-circle" style="width: 50px; height: 50px;">
                    </div>
                    <div class="m-2">
                        <img src="{{url('/assets/img/home/helphouse.jpeg')}}" alt="Parceiro 3" class="rounded-circle" style="width: 50px; height: 50px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>



    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>
    <script src="{{url('/assets/js/home.js')}}" async></script>

</body>

</html>