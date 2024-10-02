<!-- resources/views/emails/mensagem.blade.php -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Mensagem</title>
</head>
<body>
    <h1>Mensagem de {{ $dados['nome'] }}</h1>
    <p>Email: {{ $dados['email'] }}</p>
    <p>Mensagem: {{ $dados['mensagem'] }}</p>
    
</body>
</html>
