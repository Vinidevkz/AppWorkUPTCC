<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{url('assets/img/adminImages/WU-icon.png')}}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.css">
    <link rel="stylesheet" href="{{ url('assets/css/homeEmpresa.css') }}">
    <title>Home</title>
</head>

<body>
    @extends('layouts.homeEmpresa')

    @section('content')
    @include('components.navbar')

    <section class="card">
        <div class="row">
            <div class="col txt-card">
                <h1>Vagas da Empresa</h1>

                @if($vagas->isEmpty())
                    <p>Nenhuma vaga encontrada para sua empresa.</p>
                @else
                    <ul>
                        @foreach($vagas as $vaga)
                            <li>
                                {{ $vaga->nomeVaga }} - {{ $vaga->salarioVaga }} - {{ $vaga->estadoVaga }}
                                <a href="{{ route('verVagaCadastrada', $vaga->idVaga) }}"
                                    class="btn btn-outline-primary btn-sm"><span class="bi-pencil-fill"></span>Ver
                                    candidatos</a>
                                <a href="{{ route('vagas.edit', $vaga->idVaga) }}" class="btn btn-outline-primary btn-sm"><span
                                        class="bi-pencil-fill"></span>Editar Vaga</a>
                            </li>
                        @endforeach
                    </ul>
                @endif

            </div>



            <div class="col">
                <div class="row row-card flex flex-column justify-content-around align-items-center">
                    <button class="botao-card botao-vaga"> <a href="/vaga/cadastrar" class="text-light"> Criar vaga <i
                                class="fa-solid fa-plus"></i></a></button>

                    <button class="botao-card botao-vaga"> <a href="/mensagens" class="text-light"> Ver mensagens<i
                                class="fa-solid fa-plus"></i></a></button>
                    <button class="botao-card botao-vaga"> <a href="/posts" class="text-light"> Ver Posts<i
                                class="fa-solid fa-plus"></i></a></button>
                    <button class="botao-card botao-vaga">
                        <form action="/logout" method="POST">
                            @csrf
                            <input type="submit" class="botao-card botao-vaga" value="Sair">
                        </form>
                    </button>
                    <button class="botao-card botao-post">
                        @if (Auth::guard('empresa')->check())
                            @php
                                $empresa = Auth::guard('empresa')->user();
                            @endphp
                            <a href="{{ route('post.create', $empresa->idEmpresa) }}" class="text-light">Fazer post</a>
                        @endif


                    </button>
                </div>
            </div>
        </div>
    </section>
    @endsection

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>