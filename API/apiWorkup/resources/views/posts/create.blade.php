<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Postagem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Criar Postagem</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="detalhePublicacao" class="form-label">Detalhe da Publicação</label>
                <textarea id="detalhePublicacao" name="detalhePublicacao" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="fotoPublicacao" class="form-label">Foto da Publicação</label>
                <input type="file" id="fotoPublicacao" name="fotoPublicacao" class="form-control" accept="image/*">
            </div>
            <input type="hidden" name="idEmpresa" value="{{ Auth::guard('empresa')->user()->id }}">
            <input type="hidden" name="idVaga" value="1"> <!-- Altere conforme necessário -->

            <button type="submit" class="btn btn-primary">Criar Postagem</button>
        </form>
    </div>
</body>
</html>
