<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('assets/css/login.css')}}">
    <title>Cadastrar Áreas da Empresa</title>
</head>
<body>

<section>
    <div class="container">
        <h2>Cadastrar Áreas para a Empresa</h2>

        <!-- Formulário para cadastrar áreas -->
        <form method="POST" action="/empresa/areaAtuacao">
            @csrf
            <input type="hidden" name="idEmpresa" value="{{ $empresa->idEmpresa }}">
            
            <div class="form__group field">
                <label class="form__label">Escolha as Áreas</label>
                <div class="checkbox-container" style="max-height: 200px; overflow-y: auto; border: 1px solid #ccc; padding: 10px;">
                    @foreach($areas as $area)
                        <div>
                            <input type="checkbox" name="idArea[]" value="{{ $area->idArea }}" id="area_{{ $area->idArea }}">
                            <label for="area_{{ $area->idArea }}">{{ $area->nomeArea }}</label>
                        </div>
                    @endforeach
                </div>
                @error('idArea')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>

        @if(session('error'))
            <p class="text-danger">{{ session('error') }}</p>
        @endif
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>
