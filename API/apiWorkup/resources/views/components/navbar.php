<header class="fixed-top">
    <img src="{{url('assets/img/homeEmpresa/logo.png')}}" alt="">
    <ul>
    <a href="{{ route('verVagaCadastrada', ['id' => Auth::guard('empresas')->user()->id]) }}">Vagas postadas</a>
        <a href="/cadastrarVaga">Criar Vaga</a>
    </ul>
    <div class="wrap-user">
        <div>
            <a href="placeholder">user</a>
            <img src="{{url('assets/img/homeEmpresa/user.png')}}" alt="">
        </div>
    </div>
</header>