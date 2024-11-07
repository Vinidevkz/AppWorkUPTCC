<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('assets/css/style-visualVaga.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{url('assets/img/adminImages/WU-icon.png')}}" type="image/x-icon">
    <title>Empresa | Editar Vaga</title></head>

<body>

    <form method="POST" action="{{ route('vagas.update', $vaga->idVaga) }}">
        @csrf
        @method('PUT')


        <div class="box-vaga">
            <form class="wrap-vaga" method="POST" action="{{ route('vagas.update', $vaga->idVaga) }}">
                @csrf
                @method('PUT')

                <h4>Editando a vaga</h4>
                <div class="body-vaga">
                    <div class="row">
                        <div class="col col-6">
                            <div>
                                <label for="nomeVaga">Título da vaga:</label>
                                <input type="text" name="nomeVaga" placeholder="{{ $vaga->nomeVaga }}" value="{{ $vaga->nomeVaga }}" required>
                            </div>
                            @error('nomeVaga')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col col-6">
                            <div>
                                <label for="">Modalidade:</label>
                                <select name="idModalidadeVaga">
                                    <option value="">Selecione a Modalidade</option>
                                    @foreach($modalidades as $modalidade)
                                    <option value="{{ $modalidade->idModalidadeVaga }}" {{ old('idModalidadeVaga', $vaga->idModalidadeVaga) == $modalidade->idModalidadeVaga ? 'selected' : '' }}>
                                        {{ $modalidade->descModalidadeVaga }}
                                    </option>
                                    @endforeach
                                </select>

                            </div>
                            @error('idModalidadeVaga')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @error('idModalidadeVaga')
                    <div class="error-message">{{ $message }}</div>
                    @enderror

                    <div class="row">
                        <div class="col col-6">
                            <div>
                                <label for="salarioVaga">Salário:</label>
                                <input type="text" name="salarioVaga" placeholder="{{ $vaga->salarioVaga }}" value="{{ $vaga->salarioVaga }}" required>
                            </div>
                            @error('salarioVaga')
                            <div class="error-message">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="col col-6">
                            <div>
                                <label for="">Área:</label>
                                <select name="idArea">
                                    <option value="">Selecione a Área</option>
                                    @foreach($areas as $area)
                                    <option value="{{ $area->idArea }}" {{ old('idArea', $vaga->idArea) == $area->idArea ? 'selected' : '' }}>
                                        {{ $area->nomeArea }}
                                    </option>
                                    @endforeach
                                </select>

                            </div>
                            @error('idVaga')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-6">
                            <div>
                                <label for="cidadeVaga">Cidade:</label>
                                <input type="text" name="cidadeVaga" placeholder="{{ $vaga->cidadeVaga }}" value="{{ $vaga->cidadeVaga }}" required>
                            </div>
                            @error('cidadeVaga')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col col-6">
                            <div>
                                <label for="estadoVaga">Estado:</label>
                                <input type="text" name="estadoVaga" placeholder="{{ $vaga->estadoVaga }}" value="{{ $vaga->estadoVaga }}" required>
                            </div>
                            @error('estadoVaga')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-6">
                            <div>
                                <label for="diferencialVaga">Diferencial:</label>
                                <input type="text" name="diferencialVaga" placeholder="{{ $vaga->diferencialVaga }}" value="{{ $vaga->diferencialVaga }}" required>
                            </div>
                            @error('diferencialVaga')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col col-6">
                            <div>
                                <label for="prazoVaga">Prazo</label>
                                <input type="text" name="prazoVaga" placeholder="{{ $vaga->prazoVaga }}" value="{{ $vaga->prazoVaga }}" required>
                            </div>
                            @error('prazoVaga')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-12">
                            <div style="width: 85%">
                                <label for="">Benefícios:</label>
                                <input type="text" class="form-control custom-input" name="beneficiosVaga" placeholder="{{ $vaga->beneficiosVaga }}" value="{{ $vaga->beneficiosVaga }}" required>
                            </div>
                            @error('beneficiosVaga')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between" style="width: 65%">
                    <button class="botoes voltar" style="width: 40%" onclick="window.history.back()">Voltar</button>
                    <button class="botoes registrar" style="width: 40%">Registrar</button>
                </div>
            </form>
        </div>


        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>