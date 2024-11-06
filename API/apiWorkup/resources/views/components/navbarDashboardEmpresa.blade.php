<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

<header class="fixed-top">
    <div class="header-wrap">
        @if (Request::url() != url('/empresa/dashboard') && Request::url() != url('/home')) <!-- Verifica se não está em '/empresa/dashboard' e '/home' -->
        <button onclick="window.history.back()" class="d-flex p-1 align-items-center m-0" style="background-color: transparent; border:none">
            <span class="material-symbols-outlined text-light">
                arrow_back
            </span>
            <p class="m-0 text-light">Voltar</p>
        </button>
        @endif

        <div class="wrap-logo">
            <a href="{{ route('home.workup') }}">
            <img src="{{ url('assets/img/dashboardEmpresa/logo-reduzida.png') }}" alt="">
            </a>
        </div>
        @auth
        <ul>
            <a href="route('empresa.dashboard') }}" >Home</a>
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
                @guest
                <!-- Mostrar para visitantes (usuários não logados) -->

                <ul     >
                    <a href="{{ route('login') }}" class="text-light">Login</a>
                    <a href="{{ route('cadastrarEmpresa') }}" class="text-light">Cadastro</a>
                </ul>
                @endguest

            </div>
        </div>
    </div>
</header>