

<header class="fixed-top">
    <div class="header-wrap">
    @if (Request::url() != url('/empresa/dashboard') && Request::url() != url('/home')) <!-- Verifica se não está em '/empresa/dashboard' e '/home' -->
    <button onclick="window.history.back()" class="d-flex p-1 align-items-center m-0" style="background-color: transparent; border:none">
        <i class="bi bi-skip-backward p-2 text-light"></i>
        <p class="m-0 text-light">Voltar</p>
    </button>
@endif

        <div class="wrap-logo">
            <img src="{{ url('assets/img/dashboardEmpresa/logo-reduzida.png') }}" alt="">
        </div>
        @auth
        <ul>
            <a href="#vagas">Vagas</a>
            <a href="">Postagens</a>
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
                        <i class="bi bi-door-open text-light"></i>
                        <input type="submit" class="text-light" value="Sair" style="background-color: transparent; border:none;">
                    </form>
                @else
                    <!-- Mostrar para visitantes (usuários não logados) -->
                    <a href="{{ route('login') }}" class="text-light">Login</a>
                @endif
            </div>
        </div>
    </div>
</header>

