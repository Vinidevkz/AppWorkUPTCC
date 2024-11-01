<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('assets/css/dynamo.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/dynamoPadrao.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Dynamo</title>
</head>

<body class="dark-mode">

    <header class="fixed-top">
        <img class="logo" src="{{url('assets/img/dynamo/logo.png')}}">
        <nav>
            <ul class="nav-itens">
                <li><a href="#home">Início</a></li>
                <li><a href="#sobre">Sobre</a></li>
                <li><a href="#equipe">Equipe</a></li>
                <li><a href="/home">WorkUp</a></li>
                <li><a href="#parceiros">Parceiros</a></li>
                <li><a href="#contato">Contato</a></li>
            </ul>
        </nav>
        <nav id="botoes-nav" class="d-flex justify-content-around" style="width: 15%;">
            <a class="px-2"><i class="bi bi-globe-americas px-2"></i>pt-br</a>
            <input type="button" id="darkmode">
        </nav>
    </header>


    <section class="secao" id="home">

        <div class="d-flex flex-column align-items-center">
            <div class="wrap">
                <h1 class="titulo-1 ">DYNAMO</h1>
                <hr>
            </div>
        </div>

        <div class="container" style="width: 70vw;">
            <div class="row">

                <div class="col col-7 home-content home-div-1"></div>
                <div class="col col-5 home-content home-div-2 d-flex align-items-center">

                    <a class="num fs-1">1°</a>

                    <div class="wrap w-75" id="intro">
                        <p class="texto-1" style="font-weight: var(--txt-leve);">Bem-vindo ao site da <a
                                class="fw-semibold">Dynamo</a>. Continue e conheça um pouco sobre nós!</p>
                    </div>

                </div>
                <div class="d-flex justify-content-center">
                    <a href="#sobre" id="botao-home">Veja mais sobre nós</a>
                </div>
            </div>
        </div>

    </section>


    <section class="secao" id="sobre">

        <div class="container h-100 d-flex align-items-center" id="wrap-sobre">

            <div class="row h-100 w-100">

                <div class="col h-100 col-5 sobre-div-1 d-flex justify-content-center align-items-center">

                    <div class="wrap w-50 h-75">
                        <h1 class="titulo-2 py-3">
                            <span>Sobre</span> a Dynamo
                        </h1>
                        <p class="texto-1">
                            Somos uma empresa focada no desenvolvimento e aplicações web e mobile com o objetivo de
                            ajudar
                            nossos usuários de diversas formas
                        </p>
                    </div>

                </div>

                <div class="col col-7 h-100 sobre-div-2">

                    <div class="sobre-cards">
                        <i class="bi bi-pencil-fill fs-2"></i>
                        <p>Usamos da criatividade e ferramentas ao nosso alcance para oferecer uma boa experiência de
                            uso</p>
                    </div>

                    <div class="sobre-cards-meio">
                        <p>Projetamos e desenvolvemos projetos com base em problemas e idéias que possam ser
                            solucionadas com aplicações</p>
                        <i class="bi bi-lightbulb-fill fs-2"></i>
                    </div>

                    <div class="sobre-cards">
                        <i class="bi bi-book-fill fs-2"></i>
                        <p>Com uma pesquisa aprofundada e coerente sobre o assunto abordado, buscamos relatos e
                            exepriências de nossos usuários</p>
                    </div>


                </div>
            </div>
        </div>

    </section>


    <section id="equipe" class="equipe secao">

        <div class="embrulho">
            <div class="d-flex flex-column align-items-center mt-5">
                <p class="titulo-2">Nossa equipe</p>
                <span class="texto">Conheça um pouco sobre quem constitue nossa empresa</span>
            </div>


            <div class="wrap-carrossel">

                <img id="backBtn" src="{{url('assets/img/dynamo/bckBtn.png')}}" class="btn-carrossel" id="backBtn">

                <div class="carrossel">

                    <div class="carrossel-div-1">

                        <div class="card">
                            <img id="backBtn" src="{{url('assets/img/dynamo/feh.png')}}" alt="img" draggable="false">

                            <p>Fernanda Luíza</p>
                            <span>Analista - Designer</span>
                            <div class="icones">
                                <i class="bi bi-instagram"></i>
                                <i class="bi bi-linkedin"></i>
                                <i class="bi bi-github"></i>
                            </div>
                        </div>

                        <div class="card">
                            <img src="{{url('assets/img/dynamo/edu.png')}}" alt="img" draggable="false">

                            <p>Eduardo Felipe</p>
                            <span>DBA - Back-End</span>
                            <div class="icones">
                                <i class="bi bi-instagram"></i>
                                <i class="bi bi-linkedin"></i>
                                <i class="bi bi-github"></i>
                            </div>
                        </div>

                        <div class="card">
                            <img src="{{url('assets/img/dynamo/muh.png')}}" alt="img" draggable="false">

                            <p>Murilo Henrique</p>
                            <span>Front-End - Designer</span>
                            <div class="icones">
                                <i class="bi bi-instagram"></i>
                                <i class="bi bi-linkedin"></i>
                                <i class="bi bi-github"></i>
                            </div>
                        </div>

                        <div class="card">
                            <img src="{{url('assets/img/dynamo/vini.png')}}" alt="img" draggable="false">

                            <p>Vinicius Eduardo</p>
                            <span>Front-End - DBA</span>
                            <div class="icones">
                                <i class="bi bi-instagram"></i>
                                <i class="bi bi-linkedin"></i>
                                <i class="bi bi-github"></i>
                            </div>
                        </div>

                        <div class="card">
                            <img src="{{url('assets/img/dynamo/felipe.png')}}" alt="img" draggable="false">

                            <p>Felipe Anselmo</p>
                            <span>Tester - Back-End</span>
                            <div class="icones">
                                <i class="bi bi-instagram"></i>
                                <i class="bi bi-linkedin"></i>
                                <i class="bi bi-github"></i>
                            </div>
                        </div>

                    </div>


                    <div class="carrossel-div-1">

                        <div class="card">
                            <img src="{{url('assets/img/dynamo/dan.png')}}" alt="img" draggable="false">

                            <p>Danilo da Silva</p>
                            <span>DBA - Back-End</span>
                            <div class="icones">
                                <i class="bi bi-instagram"></i>
                                <i class="bi bi-linkedin"></i>
                                <i class="bi bi-github"></i>
                            </div>
                        </div>

                        <div class="card">
                            <img src="{{url('assets/img/dynamo/ale.png')}}" alt="img" draggable="false">

                            <p>Alessandra Marins</p>
                            <span>DBA - Designer</span>
                            <div class="icones">
                                <i class="bi bi-instagram"></i>
                                <i class="bi bi-linkedin"></i>
                                <i class="bi bi-github"></i>
                            </div>
                        </div>

                        <div class="card">
                            <img src="{{url('assets/img/dynamo/papi.png')}}" alt="img" draggable="false">

                            <p>Luiz Inacio</p>
                            <span>Front-End - Designer</span>
                            <div class="icones">
                                <i class="bi bi-instagram"></i>
                                <i class="bi bi-linkedin"></i>
                                <i class="bi bi-github"></i>
                            </div>
                        </div>

                        <div class="card">
                            <img src="{{url('assets/img/dynamo/chad.png')}}" alt="img" draggable="false">

                            <p>Vitor Augusto</p>
                            <span>Front-End - Tester</span>
                            <div class="icones">
                                <i class="bi bi-instagram"></i>
                                <i class="bi bi-linkedin"></i>
                                <i class="bi bi-github"></i>
                            </div>
                        </div>

                        <div class="card">
                            <img src="{{url('assets/img/dynamo/daniel.png')}}" alt="img" draggable="false">

                            <p>Daniel Nogueira</p>
                            <span></span>
                            <div class="icones">
                                <i class="bi bi-instagram"></i>
                                <i class="bi bi-linkedin"></i>
                                <i class="bi bi-github"></i>
                            </div>
                        </div>

                    </div>

                </div>

                <img id="nextBtn" src="{{url('assets/img/dynamo/nextBtn.png')}}" class="btn-carrossel" id="nextBtn">

            </div>

        </div>
    </section>


    <section class="secao" id="parceiros">

        <p class="titulo-2">Parceiros</p>


        <div class="container container-parceiros d-flex flex-column">
            <div class="row flex-column flex-lg-row">
                <div class="col col-12 col-md-12 col-lg-6 parceiros-div-1">
                    <img id="mainImage" src="{{url('assets/img/dynamo/sevenLogo.png')}}" alt="Imagem Principal"
                        class="main-image bg-white">
                </div>
                <div class="col col-12 col-md-12 col-lg-6 parceiros-div-2">
                    <p>Essas são nossos parceiros, empresas que colaboram para que seja possível fazermos
                        nossos projetos</p>
                </div>
            </div>
        </div>



        <div class="container btns-parceiros">
            <div class="row">
                <div class="col col-lg-2 col-md-3 col-4 box-img">
                    <img src="{{url('assets/img/dynamo/sevenLogo.png')}}" alt="Imagem 1" class="thumbnail"
                        onclick="changeImage('assets/img/dynamo/sevenLogo.png')">
                </div>

                <div class="col col-lg-2 col-md-3 col-4 box-img">
                    <img src="{{url('assets/img/dynamo/chronosLogo.png')}}" alt="Imagem 2" class="thumbnail"
                        onclick="changeImage('assets/img/dynamo/chronosLogo.png')">
                </div>


                <div class="col col-lg-2 col-md-3 col-4 box-img">
                    <img src="{{url('assets/img/dynamo/sunsetLogo.png')}}" alt="Imagem 3" class="thumbnail"
                        onclick="changeImage('assets/img/dynamo/sunsetLogo.png')">
                </div>

            </div>
        </div>

    </section>


    <section class="secao contato" id="contato">
    <div class="container h-100">
        <div class="row" style="height: 100%;">
            <div class="col contato-div-1"></div>
            <div class="col contato-div-2">
                <div class="box-wrap">
                    <h1 class="titulo-2">Fale Conosco!</h1>

                    <div class="box-contato flex-column">
                        <div class="wrap w-75 align-self-center">

                            @if(session('sucesso'))
                                <div class="alert alert-success mb-3">
                                    {{ session('sucesso') }}
                                </div>
                            @endif

                            <form action="/contato" method="POST">
                                @csrf
                                <div class="wrap flex-column">
                                    <span class="texto-form">Insira seu nome:</span>
                                    <input class="input-form" type="text" name="nome" required>
                                </div>

                                <div class="wrap flex-column">
                                    <span class="texto-form">Insira seu email:</span>
                                    <input class="input-form" type="email" name="email" required>
                                </div>

                                <div class="wrap flex-column w-100">
                                    <span class="texto">E sua mensagem:</span>
                                    <textarea class="input msg-box" name="mensagem" required></textarea>
                                </div>

                                <div class="d-flex justify-content-around py-3">
                                    <button class="btn-enviar" type="submit">Enviar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



</body>

</html>


<script src="{{url('assets/js/dynamo/dark-mode.js')}}"></script>
<script src="{{url('assets/js/dynamo/animacao.js')}}"></script>
<script src="{{url('assets/js/dynamo/card-equipe.js')}}"></script>
<script src="{{url('assets/js/dynamo/carrossel.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>


</body>

</html>