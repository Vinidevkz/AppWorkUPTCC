<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário com Imagem</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


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

        .form-container {
            background-color: #f9f9f9;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin-left: auto;
        }

        .form-section {
            display: none;
        }

        .form-section.active {
            display: block;
        }
    </style>


</head>

<body class="d-flex align-items-center justify-content-center" style="background-color: #c4c4c4; height: 100vh;">

    <div class="cadastroVaga">
        <form class="h-100" action="">
            <div class="form-section container bg-light py-5 px-5" style="width: 80vw;">
                <h1 class="mb-5">Cadastrar vaga</h1>
                <div class="row h-100 d-flex flex-column align-items-center mb-5">
                    <div class="col col-8 py-3 d-flex flex-column">
                        <label for="salarioVaga" class="form__label">Salário da Vaga</label>
                        <input type="text" class="p-2" name="salarioVaga" placeholder="Salário da Vaga"
                            value="{{ old('salarioVaga') }}">
                        @error('prazoVaga')
                            <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col col-8 py-3 d-flex flex-column">
                        <label for="nomeVaga" class="form__label">Nome da Vaga</label>
                        <input type="text" class="p-2" name="nomeVaga" placeholder="Nome da Vaga"
                            value="{{ old('nomeVaga') }}">
                        @error('nomeVaga')
                            <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col col-8 py-3 d-flex flex-column">
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
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary-custom btn-custom prev ml-4"
                        style="visibility: hidden;">Anterior</button>
                    <button type="button" class="btn btn-primary-custom btn-custom next">Próximo</button>
                </div>
            </div>

            <div class="form-section container bg-light py-5 px-5" style="width: 80vw;">
                @error('estadoVaga')
                    <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror
                <div class="form__group field">
                    <label for="estadoVaga" class="form__label">Estado da Vaga</label>
                    <input type="text" class="form-control custom-input" name="estadoVaga" placeholder="Estado da Vaga"
                        value="{{ old('estadoVaga') }}">
                </div>

                @error('idArea')
                    <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror
                <select name="idArea">
                    <option value="">Selecione a Area</option>

                    @foreach($areas as $area)
                        <option value="{{ $area->idArea }}" {{ old('idArea') == $area->idArea ? 'selected' : '' }}>
                            {{ $area->nomeArea }}
                        </option>
                    @endforeach
                </select>

                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary-custom btn-custom prev ml-4"
                        style="visibility: hidden;">Anterior</button>
                    <button type="button" class="btn btn-primary-custom btn-custom next">Próximo</button>
                </div>

            </div>
        </form>
    </div>

        <!-- Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script>
            $(document).ready(function () {
                let currentSection = 0;
                const sections = $('.form-section');

                function updateFormSection() {
                    sections.removeClass('active').eq(currentSection).addClass('active');
                    $('.prev').css('visibility', currentSection === 0 ? 'hidden' : 'visible');
                }

                $('.next').click(function () {
                    if (currentSection < sections.length - 1) {
                        currentSection++;
                        updateFormSection();
                    }
                });

                $('.prev').click(function () {
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