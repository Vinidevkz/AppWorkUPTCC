<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{url('assets/img/adminImages/WU-icon.png')}}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('assets/css/login.css')}}">
    <title>Bem-Vindo(a) a WorkUp</title>
</head>

<body>

    <section>
        <div class="row w-100 linha-index">
            <div class="col col-6 h-100 col-index-1 d-none d-md-block"> <!-- Esconde em telas menores -->
                <div class="container h-100 w-100">
                    <div class="row">
                        <div class="col-1-1">
                            <img src="{{url('assets/img/login/WorkUp-Logo.png')}}" alt="">
                            <p>Seja bem vindo ao nosso site</p>
                        </div>
                        <div class="col-1-2">
                            <img src="{{url('assets/img/login/notebook-teste-2.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-12 col-md-6 h-100 col-index-2">
                <div class="box-login">
                    <h2>Fazer Login</h2>
                    <form action="/login" method="POST">
                        @csrf
                        <div class="wrap-login">
                            <div class="inputs-login">
                                <div>
                                    <p>Email:<input type="email" name="email" required placeholder="Digite seu e-mail"></p>
                                </div>
                                <div>
                                    <p>Senha:<input type="password" name="password" required placeholder="Digite sua senha"></p>
                                </div>
                            </div>
                            <div class="botoes-login">

                                <input type="submit" href="/home" class="logar" value="Entrar">
                                <hr style="width: 100%; height: 0; border-width: 3px; color:#ccc; opacity: 1">
                    <a href="/cadastrarEmpresa" class="cadastrar">Cadastrar-se</a>

                    </form>
                </div>
            </div>

            @if(session('error'))
            <p>{{ session('error') }}</p>
            @endif
        </div>
        </div>
        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>