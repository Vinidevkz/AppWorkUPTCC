<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('assets/css/dynamo.css')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
</head>
<body class="dark-mode">

    <section class="secao" id="home">

        <header class="fixed-top">
            <img class="logo" src="{{url('assets/img/dynamo/logo.png')}}">
            <nav>
                <ul class="nav-itens">
                    <li><a href="#home">Início</a></li>
                    <li><a href="#sobre">Sobre</a></li>
                    <li><a href="#equipe">Equipe</a></li>
                    <li><a href="/home">Projetos</a></li>
                    <li><a href="#parceiros">Parceiros</a></li>
                    <li><a href="#contato">Contato</a></li>
                </ul>
            </nav>
            <nav id="botoes-nav" class="d-flex justify-content-around" style="width: 15%;">
                <a class="px-2"><i class="bi bi-globe-americas px-2"></i>pt-br</a>
                <input type="button" id="darkmode">
            </nav>
        </header>



        <div class="d-flex flex-column align-items-center">
            <div class="wrap">
                <h1 class="titulo-1 oculto">DYNAMO</h1>
                <hr class="oculto">
            </div>
        </div>

        <div class="container oculto" style="width: 70vw;">
            <div class="row">

                <div class="col col-7 home-content home-div-1"></div>
                <div class="col col-5 home-content home-div-2 d-flex align-items-center">
                    
                    <a class="num fs-1">1°</a>

                    <div class="wrap w-75" id="intro">
                        <p class="texto-1" style="font-weight: var(--txt-leve);">Bem-vindo ao site da <a class="fw-semibold">Dynamo</a>. Continue e conheça um pouco sobre nós!</p>
                    </div>

                </div>
                <div class="d-flex justify-content-center">
                    <a href="#sobre" id="botao-home">Veja mais sobre nós</a>
                </div>
            </div>
        </div>

    </section>


@extends('layouts.dynamo')

@section('content')
    @include('components.sobre')
    @include('components.equipe')
    @include('components.parceiros')
    @include('components.contato')
@endsection

    <script src="{{url('assets/js/dynamo/dark-mode.js')}}"></script>
    <script src="{{url('assets/js/dynamo/animacao.js')}}"></script>
    <script src="{{url('assets/js/dynamo/card-equipe.js')}}"></script>
    <script src="{{url('assets/js/dynamo/carrossel.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>