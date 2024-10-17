<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="{{url('assets/css/home.css')}}">
    
    <link rel="stylesheet" href="{{url('assets/css/styleContato.css')}}">

    <link rel="stylesheet" href="{{url('assets/css/styleCarrosel.css')}}">

   

    <title>@yield('title')</title>
</head>
<body class="dark-mode">
  
    <section class="secao" id="home">

        <header class="fixed-top">
            <a href="/">

           
            
            <img class="logo" src="{{url('assets/img/homepage/logo.png')}}">
            </a>
            <nav>
                <ul class="nav-itens">
                    <li><a href="/#home">Início</a></li>
                    <li><a href="/#sobre">Sobre</a></li>
                    <li><a href="">WorkUp</a></li>
                    <li><a href="">Parceiros</a></li>
                    <li><a href="/contato">Contato</a></li>
                    <li><a href="/home">Enquato nao tem a parte projetos</a></li>
                </ul>
            </nav>
            <nav id="botoes-nav" class="d-flex justify-content-around" style="width: 15%;">
                <a class="px-2"><i class="bi bi-globe-americas px-2"></i>pt-br</a>
                <input type="button" id="darkmode">
            </nav>
        </header>




        @yield('content')
    <script src="assets/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>