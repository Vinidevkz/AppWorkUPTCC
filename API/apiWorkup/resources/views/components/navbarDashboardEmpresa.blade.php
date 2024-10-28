<!--
<header class="fixed-top">
    <div class="header-wrap">
        <div class="wrap-logo">
            <img src="../assets/img/dashboardEmpresa/logo-reduzida.png" alt="">
        </div>
        <ul>
            <a href="/#vaga">Vagas</a>
            <a href="">Postagens</a>

            <form action="/logout" method="POST">
                @csrf
                <input type="submit" class="text-light" value="Sair" style="background-color: transparent; border:none;">
            </form>
        </ul>
        <div class="wrap-user">
            <div>
                <a href="placeholder">{{ $empresa->nomeEmpresa }}</a>
                <img src="../assets/img/dashboardEmpresa/user.png" alt="">
            </div>
        </div>
    </div>
</header>
-->

<header class="fixed-top">
    <div class="header-wrap">
        <div class="wrap-logo">
            <img src="{{url('assets/img/dashboardEmpresa/logo-reduzida.png')}}" alt="">
        </div>
        <ul>
            <a href="#vagas">Vagas</a>
            <a href="">Postagens</a>
        </ul>
        <div class="wrap-user">
            <div>
                <a href="placeholder">{{ $empresa->nomeEmpresa }}</a>
                <img src="../assets/img/dashboardEmpresa/user.png" alt="">
                <form action="/logout" method="POST">
                    @csrf
                    <input type="submit" class="text-light" value="Sair" style="background-color: transparent; border:none;">
                </form>
            </div>
        </div>
    </div>
</header>