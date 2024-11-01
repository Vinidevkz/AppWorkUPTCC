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
            <img src="{{ url('assets/img/dashboardEmpresa/logo-reduzida.png') }}" alt="">
        </div>
        @auth
        <ul>
        <a href="{{ route('empresas.edit', $empresa->idEmpresa) }}" class="btn btn-outline-primary btn-sm m-0"><span class="bi-pencil-fill"></span>&nbsp;Editar</a>
            <a href="#vagas">Vagas</a>
            <a href="#publicacoes">Postagens</a>
        </ul>
        @endauth

        <div class="wrap-user">
            <div>
                <!-- Verifique se $empresa não é null antes de exibir os dados -->
                @if($empresa !== null)
                    <a href="{{ route('empresas.edit', $empresa->idEmpresa) }}">{{ $empresa->usernameEmpresa }}</a>
                    <img src="{{ $empresa->fotoEmpresa   }}" alt="">
                    <form action="/logout" method="POST">
                        @csrf
                        <div>
                        <input type="submit" class="text-light" value="Sair" style="background-color: transparent; border:none;">
                        <span class="material-symbols-outlined text-light">
                        logout
                        </span>
                        </div>

                     
                    </form>
                @else
                    <!-- Mostrar para visitantes (usuários não logados) -->
                    <a href="{{ route('login') }}" class="text-light">Login</a>
                @endif
            </div>
        </div>
    </div>
</header>

