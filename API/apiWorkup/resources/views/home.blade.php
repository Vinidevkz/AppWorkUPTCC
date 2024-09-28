@extends('layouts.main')

@section('title', 'Dynamo')

@section('content')
<div class="d-flex flex-column align-items-center">
            <div class="wrap">
                <h1 class="titulo-1">DYNAMO</h1>
                <hr>
            </div>
        </div>

        <div class="container" style="width: 70vw;">
            <div class="row">

                <div class="col col-7 home-content home-div-1"></div>
                <div class="col col-5 home-content home-div-2 d-flex align-items-center">
                    
                    <a class="num fs-1">1°</a>

                    <div class="wrap w-75" id="intro">
                        <p class="fs-5" style="font-weight: var(--txt-leve);">Bem-vindo ao site da <a class="fw-semibold">Dynamo</a>. Continue e conheça um pouco sobre nós!</p>
                    </div>

                </div>
                <div class="d-flex justify-content-center">
                    <a href="#sobre" id="botao-home">Veja mais sobre nós</a>
                </div>
            </div>
        </div>

    </section>

    <section class="secao d-flex justify-content-center" id="sobre">

        <div class="container d-flex justify-content-center" id="wrap-sobre">
            <div class="row" style="width: 100%;">

                <div class="col col-5 sobre-content sobre-div-1">

                    <div class="wrap w-75">
                        <h1 class="titulo-2 py-3">
                            <span>Sobre</span> a Dynamo
                        </h1>
                        <p class="texto py-4">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit dicta doloribus sequi? Recusandae quos praesentium
                            facere dignissimos illo nostrum, nam, eligendi quo aliquam reprehenderit ipsa ipsam voluptatem eos veritatis temporibus.
                        </p>
                    </div>

                </div>

                <div class="col col-7 sobre-content sobre-div-2">
                    <div class="container d-flex align-items-center" style="height: 80vh;">
                        <div class="row d-flex justify-content-center flex-column caixa-sobre">

                            <div class="col">
                                <i class="bi bi-pencil-fill fs-2"></i>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus non placeat quam praesentium provident numquam exercitationem, iste fugit.</p>
                            </div>

                            <div class="col">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus non placeat quam praesentium provident numquam exercitationem, iste fugit.</p>
                                <i class="bi bi-lightbulb-fill fs-2"></i>
                            </div>

                            <div class="col">
                                <i class="bi bi-book-fill fs-2"></i>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus non placeat quam praesentium provident numquam exercitationem, iste fugit.</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section id="equipe" style="height: 100vh; padding: 0; margin: 0; align-content: center;">

        <div class="gallery-wrap">

            <img src= "{{url('assets/img/integrantes/bckBtn.png')}}" id="bckBtn">
            <div class="gallery">
                <div class="equipe">

                    <span>
                        <img src="{{url('assets/img/integrantes/feh.png')}}">
                        <div class="wrap-card">
                            <p class="title-txt">Fernanda Luiza</p>
                            <p class="sub-txt">Analista - Designer</p>
                            <div class="icones">
                                <i class="bi bi-instagram" style="color: #FD0051;"></i>
                                <i class="bi bi-linkedin" style="color: #FD0051;"></i>
                                <i class="bi bi-github" style="color: #FD0051;"></i>
                            </div>
                        </div>
                    </span>

                    <span>
                        <img src="{{url('assets/img/integrantes/edu.png')}}">
                        <div class="wrap-card">
                            <p class="title-txt">Eduardo Felipe</p>
                            <p class="sub-txt">Analista - Designer</p>
                            <div class="icones">
                                <i class="bi bi-instagram" style="color: #FD0051;"></i>
                                <i class="bi bi-linkedin" style="color: #FD0051;"></i>
                                <i class="bi bi-github" style="color: #FD0051;"></i>
                            </div>
                        </div>
                        
                    </span>

                    <span>
                        <img src="{{url('assets/img/integrantes/muh.png')}}">
                        <div class="wrap-card">
                            <p class="title-txt">Murilo Henrique</p>
                            <p class="sub-txt">Analista - Designer</p>
                            <div class="icones">
                                <i class="bi bi-instagram" style="color: #FD0051;"></i>
                                <i class="bi bi-linkedin" style="color: #FD0051;"></i>
                                <i class="bi bi-github" style="color: #FD0051;"></i>
                            </div>
                        </div>
                    </span>
                    

                    <span>
                        <img src="{{url('assets/img/integrantes/vini.png')}}">
                        <div class="wrap-card">
                            <p class="title-txt">Vinicius Eduardo</p>
                            <p class="sub-txt">Analista - Designer</p>
                            <div class="icones">
                                <i class="bi bi-instagram" style="color: #FD0051;"></i>
                                <i class="bi bi-linkedin" style="color: #FD0051;"></i>
                                <i class="bi bi-github" style="color: #FD0051;"></i>
                            </div>
                        </div>
                    </span>

                    <span>
                        <img src="{{url('assets/img/integrantes/felipe.png')}}">
                        <div class="wrap-card">
                            <p class="title-txt">Fernanda Luiza</p>
                            <p class="sub-txt">Analista - Designer</p>
                            <div class="icones">
                                <i class="bi bi-instagram" style="color: #FD0051;"></i>
                                <i class="bi bi-linkedin" style="color: #FD0051;"></i>
                                <i class="bi bi-github" style="color: #FD0051;"></i>
                            </div>
                        </div>
                    </span>
                    
                </div>
                <div class="equipe">
                    <span>
                        <img src="{{url('assets/img/integrantes/dan.png')}}">
                        <div class="wrap-card">
                            <p class="title-txt">Danilo da Silva</p>
                            <p class="sub-txt">Analista - Designer</p>
                            <div class="icones">
                                <i class="bi bi-instagram" style="color: #FD0051;"></i>
                                <i class="bi bi-linkedin" style="color: #FD0051;"></i>
                                <i class="bi bi-github" style="color: #FD0051;"></i>
                            </div>
                        </div>
                    </span>

                    <span>
                        <img src="{{url('assets/img/integrantes/ale.png')}}">
                        <div class="wrap-card">
                            <p class="title-txt">Alessandra Marins</p>
                            <p class="sub-txt">Analista - Designer</p>
                            <div class="icones">
                                <i class="bi bi-instagram" style="color: #FD0051;"></i>
                                <i class="bi bi-linkedin" style="color: #FD0051;"></i>
                                <i class="bi bi-github" style="color: #FD0051;"></i>
                            </div>
                        </div>
                    </span>

                    <span>
                        <img src="{{url('assets/img/integrantes/papi.png')}}">
                        <div class="wrap-card">
                            <p class="title-txt">Inácio Guey</p>
                            <p class="sub-txt">Analista - Designer</p>
                            <div class="icones">
                                <i class="bi bi-instagram" style="color: #FD0051;"></i>
                                <i class="bi bi-linkedin" style="color: #FD0051;"></i>
                                <i class="bi bi-github" style="color: #FD0051;"></i>
                            </div>
                        </div>
                    </span>

                    <span>
                        <img src="{{url('assets/img/integrantes/chad.png')}}">
                        <div class="wrap-card">
                            <p class="title-txt">Vitor Augusto</p>
                            <p class="sub-txt">Analista - Designer</p>
                            <div class="icones">
                                <i class="bi bi-instagram" style="color: #FD0051;"></i>
                                <i class="bi bi-linkedin" style="color: #FD0051;"></i>
                                <i class="bi bi-github" style="color: #FD0051;"></i>
                            </div>
                        </div>
                    </span>

                    <span>
                        <img src="{{url('assets/img/integrantes/daniel.png')}}">
                        <div class="wrap-card">
                            <p class="title-txt">Daniel Nogueira</p>
                            <p class="sub-txt">Analista - Designer</p>
                            <div class="icones">
                                <i class="bi bi-instagram" style="color: #FD0051;"></i>
                                <i class="bi bi-linkedin" style="color: #FD0051;"></i>
                                <i class="bi bi-github" style="color: #FD0051;"></i>
                            </div>
                        </div>
                    </span>

                </div>

            </div>
            <img src="{{url('assets/img/integrantes/nextBtn.png')}}" id="nextBtn">
        </div>

    </section>

    <script>

        let scrollContainer = document.querySelector(".gallery");
        let bckBtn = document.getElementById("bckBtn");
        let nextBtn = document.getElementById("nextBtn");
         
        nextBtn.addEventListener("click", ()=> {
            scrollContainer.style.scrollBehavior = "smooth";
            scrollContainer.scrollLeft += 1200;
        });

        bckBtn.addEventListener("click", ()=> {
            scrollContainer.style.scrollBehavior = "smooth";
            scrollContainer.scrollLeft -= 1200;
        });

    </script>
@endsection