<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('..assets/css/style-vaga.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <section id="vaga">
        <div class="row" style="height: 100%">
            <div class="col col-vaga-1">
                <div class="box-vaga">
                <form action="">
                        <div class="vaga-wrap">
                            <div class="wrap-header">
                                <h3>Cadastro de vaga</h3>
                            </div>
                            <div class="wrap-body">
                                <div class="row">
                                    <div class="col col-8">
                                        <label for="nomeVaga" class="form__label">Nome da Vaga</label>
                                        <input type="text" class="p-2" name="nomeVaga" placeholder="Nome da Vaga"
                                            value="{{ old('nomeVaga') }}">
                                        @error('nomeVaga')
                                            <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col col-4">
                                        <div class="form__group field">
                                            @error('idModalidadeVaga')
                                                <div style="background-color: #fff;" class="error-message">{{ $message }}
                                                </div>
                                            @enderror
                                            <div class="input-container">
                                                <i class="fa-solid fa-lock"></i>
                                                <!-- Esta parte precisa ficar pode tirar o select contato que de o mesmo nome ao campo -->
                                                <select name="idModalidadeVaga">
                                                    <option value="">Selecione a Modalidade</option>
                                                    @foreach($modalidades as $modalidade)
                                                        <option value="{{ $modalidade->idModalidadeVaga }}" {{ old('idModalidadeVaga') == $modalidade->idModalidadeVaga ? 'selected' : '' }}>
                                                            {{ $modalidade->descModalidadeVaga }}
                                                            <!-- Supondo que há um campo nomeModalidade na tabela -->
                                                        </option>
                                                    @endforeach
                                                    <!-- Esta parte precisa ficar -->
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-7">
                                        <label for="">Cidade:</label>
                                        <input type="text">
                                    </div>
                                    <div class="col col-5">
                                        @error('estadoVaga')
                                            <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                                        @enderror
                                        <label for="estadoVaga" class="form__label">Estado da Vaga</label>
                                        <input type="text" class="form-control custom-input" name="estadoVaga"
                                            placeholder="Estado da Vaga" value="{{ old('estadoVaga') }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-12">
                                        <label for="">Diferencial:</label>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-5">
                                        <label for="salarioVaga" class="form__label">Salário da Vaga</label>
                                        <input type="text" class="p-2" name="salarioVaga" placeholder="Salário da Vaga"
                                            value="{{ old('salarioVaga') }}">
                                        @error('prazoVaga')
                                            <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col col-7">
                                        <label for="">Benefícios:</label>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="wrap-footer">
                                <input class="enviar" type="submit" value="Enviar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col col-vaga-2">
                <div class="box-lembrete">
                    <h4>Lembre-se!</h4>
                    <p class="w-75" style="font-size: 0.8rem">Todas e quaisquer características da vaga podem ser
                        editadas posteriormente! Então não se preocupe
                        caso algum dado seja preenchido incorretamente</p>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>

</body>

</html>