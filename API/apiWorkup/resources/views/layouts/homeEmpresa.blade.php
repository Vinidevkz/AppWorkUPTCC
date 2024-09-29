
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Aplicação</title>
    <link rel="stylesheet" href="{{url('assets/css/homeEmpresa.css')}}">
</head>
<body>
    <header>
        <h1>Bem-vindo à Minha Aplicação</h1>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <p>&copy; 2024 Minha Aplicação</p>
    </footer>
</body>
</html>
