<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

<header class="fixed-top">
    <div class="header-wrap">

        <div class="wrap-logo">
            <a href="{{ route('empresa.dashboard') }}">
            <img src="{{ url('assets/img/dashboardEmpresa/logo-reduzida.png') }}" alt="">
            </a>
        </div>
        @auth
        <ul>
            <a href="{{route('empresa.dashboard')}}" >Home</a>
            <a href="#vagas">Vagas</a>
            <a href="#publicacoes">Postagens</a>
        </ul>


        <div class="wrap-user">
            <div>
                <!-- Verifique se $empresa não é null antes de exibir os dados -->

                <a href="{{ route('empresas.edit', $empresa->idEmpresa) }}">{{ $empresa->usernameEmpresa }}
                <img src="/assets/img/perfil/empresa/{{$empresa->fotoEmpresa}}" alt="">
                </a>
                <form action="/logout" method="POST">
                    @csrf
                    <div>
                        <input type="submit" class="text-light" value="Sair" style="background-color: transparent; border:none;">
                        <span class="material-symbols-outlined text-light">
                            logout
                        </span>
                    </div>


                </form>
                @endauth

            </div>
        </div>
    </div>
</header>