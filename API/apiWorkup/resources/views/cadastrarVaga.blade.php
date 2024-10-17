<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário com Imagem</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/forms.css">

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
            padding: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin-left: auto;
        }

        .custom-input {
            padding: 10px;
            border: 4px solid #3f4b45;
            border-radius: 6px;
            transition: all 0.3s ease;
            background-color: #ffffff;
            width: 100%;
        }

        .form-section {
            display: none;
        }

        .form-section.active {
            display: block;
        }

        .image-container img {
            max-width: 100%;
            border-radius: 10px;
            margin-top: 50px;
        }

        .cardsform {
            background-image: url('/assets/img/login/formss.png');
            padding-top: 50px;
            padding-bottom: 50px;
            border-radius: 10px;
            margin-top: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .panel-heading {
            background-color: #18e47e;
            color: rgb(26, 25, 25);
            padding: 5px;
            text-align: left;
            border-radius: 10px;
            font-weight: 600;
        }

        .btn-custom {
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn-primary-custom {
            background-color: #00eb00;
            color: rgb(14, 14, 14);
            border: none;
            margin-top: 20px;
        }

        .btn-primary-custom:hover {
            background-color: #c8ec8d;
            margin-top: 20px;
        }

        .btn-secondary-custom {
            background-color: #33ff00;
            color: rgb(0, 0, 0);
            border: none;
            margin-top: 20px;
        }

        .btn-secondary-custom:hover {
            background-color: #20f10d;
            margin-top: 20px;
            
        }

        .btn-success-custom {
            background-color: #00ff00;
            color: rgb(0, 0, 0);
            border: none;
            margin-top: 20px;
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
            border-image: linear-gradient(to right, #fff, #fff);
            border-image-slice: 1;
        }

        .custom-input:focus  .form__label {
            position: absolute;
            top: 0;
            display: block;
            transition: 0.2s;
            font-size: 17px;
            color: #fff;
            font-weight: 700;
        }

        /* reset input */
        .custom-input:required,
        .custom-input:invalid {
            box-shadow: none;
        }
    </style>
</head>

<body>
    <main class="cardsform">
        <div class="container mt-2 mb-3">
            <div class="row justify-content-end">
                <!-- Coluna para Imagem -->
                <div class="col-md-4 image-container">
                    <img src="{{url('/assets/img/login/formsssgif.gif')}}" alt="Descrição da imagem" class="img-fluid">
                </div>

                <!-- Coluna do Formulário -->
                <div class="col-md-8 form-container">
                    <div class="panel-heading text-center mb-5">
                        Cadastre uma Vaga
                    </div>

                    <form method="POST" action="/vaga/form">
                        @csrf

                        

                        <div class="form-section active">
                            @error('nomeVaga')
                                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                            @enderror
                            <div class="form__group field">

                                <input type="text" class="form-control custom-input" name="nomeVaga" placeholder="Nome da Vaga" value="{{ old('nomeVaga') }}">
                                <label for="nomeVaga" class="form__label">Nome da Vaga</label>
                            </div>


                            @error('prazoVaga')
                                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                            @enderror
                            <div class="form__group field">
                                <input type="text" class="form-control custom-input" name="prazoVaga" placeholder="Prazo da Vaga" value="{{ old('prazoVaga') }}">
                                <label for="prazoVaga" class="form__label">Prazo da Vaga</label>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary-custom btn-custom prev" style="visibility: hidden;">Anterior</button>
                                <button type="button" class="btn btn-primary-custom btn-custom next">Próximo</button>
                            </div>
                        </div>

                        <div class="form-section">
                            <div class="form__group field">
                            @error('idModalidadeVaga')
                                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                            @enderror
                                <div class="input-container">
                                <i class="fa-solid fa-lock"></i>
                                <!-- Esta parte precisa ficar pode tirar o select contato que de o mesmo nome ao campo -->
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
                            </div>

                            @error('salarioVaga')
                                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                            @enderror
                            <div class="form__group field">
                                <input type="text" class="form-control custom-input" name="salarioVaga" placeholder="Salário da Vaga" value="{{ old('salarioVaga') }}">
                                <label for="salarioVaga" class="form__label">Salário da Vaga</label>
                            </div>

                            @error('cidadeVaga')
                                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                            @enderror
                            <div class="form__group field">
                                <input type="text" class="form-control custom-input" name="cidadeVaga" placeholder="Cidade da Vaga" value="{{ old('cidadeVaga') }}">
                                <label for="cidadeVaga" class="form__label">Cidade da Vaga</label>
                            </div>

                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary-custom btn-custom prev ml-4" style="visibility: hidden;">Anterior</button>
                                <button type="button" class="btn btn-primary-custom btn-custom next">Próximo</button>
                            </div>
                        </div>

                        <div class="form-section">

                            @error('estadoVaga')
                                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                            @enderror
                            <div class="form__group field">
                                <input type="text" class="form-control custom-input" name="estadoVaga" placeholder="Estado da Vaga" value="{{ old('estadoVaga') }}">
                                <label for="estadoVaga" class="form__label">Estado da Vaga</label>
                            </div>


                            <div class="form__group field">
                                @error('idArea')
                                    <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                                @enderror

                                    <i class="fa-solid fa-lock"></i>
                                <!-- Esta parte precisa ficar pode tirar o select contato que de o mesmo nome ao campo -->
                                    <select name="idArea">
                                        <option value="">Selecione a Area</option>

                                        @foreach($areas as $area)
                                            <option value="{{ $area->idArea }}" {{ old('idArea') == $area->idArea ? 'selected' : '' }}>
                                                {{ $area->nomeArea }}
                                            </option>
                                        @endforeach
                                    </select>
                                <!-- Esta parte precisa ficar -->

                            </div>

                            @error('diferencialVaga')
                                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                            @enderror
                            <div class="form__group field">
                                <input type="text" class="form-control custom-input" name="diferencialVaga" placeholder="Diferencial Vaga" value="{{ old('diferencialVaga') }}">
                                <label for="diferencialVaga" class="form__label">Diferencial Vaga</label>
                            </div>

                            @error('beneficiosVaga')
                                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                            @enderror
                            <div class="form__group field">
                                <input type="text" class="form-control custom-input" name="beneficiosVaga" placeholder="Benefícios da Vaga" value="{{ old('beneficiosVaga') }}">
                                <label for="beneficiosVaga" class="form__label">Benefícios da Vaga</label>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary-custom btn-custom prev ml-4" style="visibility: hidden;">Anterior</button>
                                <button type="submit" class="btn btn-success-custom btn-custom">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $(document).ready(function() {
            let currentSection = 0;
            const sections = $('.form-section');

            function updateFormSection() {
                sections.removeClass('active').eq(currentSection).addClass('active');
                $('.prev').css('visibility', currentSection === 0 ? 'hidden' : 'visible');
            }

            $('.next').click(function() {
                if (currentSection < sections.length - 1) {
                    currentSection++;
                    updateFormSection();
                }
            });

            $('.prev').click(function() {
                if (currentSection > 0) {
                    currentSection--;
                    updateFormSection();
                }
            });

            updateFormSection();
        });
    </script>
</body>

</html>