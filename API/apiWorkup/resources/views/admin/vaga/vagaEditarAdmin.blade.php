<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário com Imagem</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .error-message {
            color: red;
            font-size: 0.875rem;
        }

        .input-container {
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }

        .input-container i {
            margin-right: 0.5rem;
        }

        .form-container {
            background-color: #f9f9f9;
            border-radius: 10px;
            padding: 1rem;
            box-shadow: 0 4px 65px rgba(0, 0, 0, 1);
            max-width: 600px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .image-container img {
            max-width: 100%;
            border-radius: 10px;
            margin-left: 50px;
        }
        .form-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 50px;
        }

        .btn-custom {
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 16px;
            transition: background-color 0.3s ease;
            height: 40px;
            
        }

        .btn-primary-custom {
            background-color: #00eb00;
            color: rgb(14, 14, 14);
            border: none;
        }

        .btn-primary-custom:hover {
            background-color: #c8ec8d;
        }

        .btn-success-custom {
            background-color: #00ff00;
            color: rgb(0, 0, 0);
            border: none;
            margin-top: 10px;
        }

        .cardsform {
            background-image: url('/assets/img/login/formss.png');
        }

        .text {
            font-weight: 600;
            margin-left: 20px;
        }

        .panel-heading {
            background-color: #18e47e;
            height: 10px;
            color: rgb(26, 25, 25);
            padding: 5px;
        }

        .btn-block {
            width: 120px;
            margin-left: 30px;
            margin-top: 10px;
        }

        /* Estilo de placeholder */
        .form__group {
            position: relative;
            padding: 20px 0 0;
            width: 100%;
        }

        .custom-input {
            font-family: inherit;
            width: 100%;
            border: none;
            border-bottom: 2px solid #9b9b9b;
            outline: 0;
            font-size: 17px;
            color: #000;
            padding: 7px 0;
            background: transparent;
            transition: border-color 0.2s;
        }

        .custom-input::placeholder {
            color: transparent;
        }

        .custom-input:placeholder-shown ~ .form__label {
            font-size: 17px;
            cursor: text;
            top: 20px;
        }
        .form__label {
            position: absolute;
            top: 0;
            display: block;
            transition: 0.2s;
            font-size: 17px;
            color: #9b9b9b;
            pointer-events: none;
        }

        .custom-input:focus {
            padding-bottom: 6px;
            font-weight: 700;
            border-width: 3px;
            border-image: linear-gradient(to right, #116399, #38caef);
            border-image-slice: 1;
        }

        .custom-input:focus ~ .form__label {
            position: absolute;
            top: 0;
            display: block;
            transition: 0.2s;
            font-size: 17px;
            color: #38caef;
            font-weight: 700;
        }

        /* reset input */
        .custom-input:required,
        .custom-input:invalid {
            box-shadow: none;
        }
    </style>
</head>
<body id="boo">
    <main class="cardsform">
        <div class="container mt-2 mb-3">
            <div class="row form-wrapper">
                <!-- Coluna do formulário -->
                <div class="col-md-8 form-container">
                    <div class="panel-heading text mb-5">
                        Editar vaga
                    </div>

                    <form method="POST" action="{{ route('vagas.update', $vaga->idVaga) }}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Primeira Coluna -->
                            <div class="col-md-6">
                                @error('nomeVaga')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="form__group field">
                                    <input type="text" class="form-control custom-input" name="nomeVaga" placeholder="{{ $vaga->nomeVaga }}" value="{{ $vaga->nomeVaga }}" required>
                                    <label for="nomeVaga" class="form__label">Nome da Vaga</label>
                                </div>

                                @error('estadoVaga')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="form__group field">
                                    <input type="text" class="form-control custom-input" name="estadoVaga" placeholder="{{ $vaga->estadoVaga }}" value="{{ $vaga->estadoVaga }}" required>
                                    <label for="estadoVaga" class="form__label">Estado</label>
                                </div>

                                @error('prazoVaga')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="form__group field">
                                    <input type="text" class="form-control custom-input" name="prazoVaga" placeholder="{{ $vaga->prazoVaga }}" value="{{ $vaga->prazoVaga }}" required>
                                    <label for="prazoVaga" class="form__label">Prazo</label>
                                </div>

                                @error('idModalidadeVaga')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="form__group field">
                                <select name="idModalidadeVaga">
                                    <option value="">Selecione a Modalidade</option>
                                    @foreach($modalidades as $modalidade)
                                        <option value="{{ $modalidade->idModalidadeVaga }}" {{ old('idModalidadeVaga') == $modalidade->idModalidadeVaga ? 'selected' : '' }}>
                                            {{ $modalidade->descModalidadeVaga }} <!-- Supondo que há um campo nomeModalidade na tabela -->
                                        </option>
                                    @endforeach
                                    <!-- Esta parte precisa ficar -->
                                </select>
                                </div>
                            

                            @error('salarioVaga')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="form__group field">
                                    <input type="text" class="form-control custom-input" name="salarioVaga" placeholder="{{ $vaga->salarioVaga }}" value="{{ $vaga->salarioVaga }}" required>
                                    <label for="salarioVaga" class="form__label">Salario</label>
                                </div>
                            </div>
                            
                                <div class="col-md-6">
                            @error('cidadeVaga')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="form__group field">
                                    <input type="text" class="form-control custom-input" name="cidadeVaga" placeholder="{{ $vaga->cidadeVaga }}" value="{{ $vaga->cidadeVaga }}" required>
                                    <label for="cidadeVaga" class="form__label">Cidade</label>
                                </div>
                            

                            @error('estadoVaga')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="form__group field">
                                    <input type="text" class="form-control custom-input" name="estadoVaga" placeholder="{{ $vaga->estadoVaga }}" value="{{ $vaga->estadoVaga }}" required>
                                    <label for="estadoVaga" class="form__label">Estado</label>
                                </div>
                          

                            @error('diferencialVaga')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="form__group field">
                                    <input type="text" class="form-control custom-input" name="diferencialVaga" placeholder="{{ $vaga->diferencialVaga }}" value="{{ $vaga->diferencialVaga }}" required>
                                    <label for="diferencialVaga" class="form__label">Diferencial</label>
                                </div>
 

                            @error('beneficiosVaga')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="form__group field">
                                    <input type="text" class="form-control custom-input" name="beneficiosVaga" placeholder="{{ $vaga->beneficiosVaga }}" value="{{ $vaga->beneficiosVaga }}" required>
                                    <label for="beneficiosVaga" class="form__label">Beneficios</label>
                                </div>



                            @error('idVaga')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="form__group field">
                                <select name="idArea">
                                        <option value="">Selecione a Area</option>

                                        @foreach($areas as $area)
                                            <option value="{{ $area->idArea }}" {{ old('idArea') == $area->idArea ? 'selected' : '' }}>
                                                {{ $area->nomeArea }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>

                        <button class="btn btn-primary-custom btn-block">
                            Registrar
                        </button>
                    </form>

                </div>

                
            </div>
        </div>
    </main>
     <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

</html>