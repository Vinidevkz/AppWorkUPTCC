<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário com Imagem</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{url('../assets/css/dashboardEmpresa.css')}}">
    
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
@include('components.navbarDashboardEmpresa')
    <main class="cardsform">
        <div class="container mt-2 mb-3">
            <div class="row form-wrapper">
                <!-- Coluna do formulário -->
                <div class="col-md-8 form-container">
                    <div class="panel-heading text mb-5">
                        Editar dados
                    </div>

                    <form method="POST" action="{{ route('empresas.update', $empresa->idEmpresa) }}">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Primeira Coluna -->
                            <div class="col-md-6">
                                @error('nomeEmpresa')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="form__group field">
                                    <input type="text" class="form-control custom-input" name="nomeEmpresa" placeholder="{{ $empresa->nomeEmpresa }}" value="{{ $empresa->nomeEmpresa }}" required>
                                    <label for="nomeEmpresa" class="form__label">Nome da Empresa</label>
                                </div>

                                @error('usernameEmpresa')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="form__group field">
                                    <input type="text" class="form-control custom-input" name="usernameEmpresa" placeholder="{{ $empresa->usernameEmpresa }}" value="{{ $empresa->usernameEmpresa }}" required>
                                    <label for="usernameEmpresa" class="form__label">User Name</label>
                                </div>

                                @error('emailEmpresa')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="form__group field">
                                    <input type="text" class="form-control custom-input" name="emailEmpresa" placeholder="{{ $empresa->emailEmpresa }}" value="{{ $empresa->emailEmpresa }}" required>
                                    <label for="emailEmpresa" class="form__label">Email</label>
                                </div>


                            

                            @error('contatoEmpresa')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="form__group field">
                                    <input type="text" class="form-control custom-input" name="contatoEmpresa" placeholder="{{ $empresa->contatoEmpresa }}" value="{{ $empresa->contatoEmpresa }}" required>
                                    <label for="contatoEmpresa" class="form__label">Contato</label>
                                </div>
                            

                                <div class="form__group field">
                                    <input type="text" class="form-control custom-input" name="sobreEmpresa" placeholder="{{ $empresa->sobreEmpresa }}" value="{{ $empresa->sobreEmpresa }}" required>
                                    <label for="sobreEmpresa" class="form__label">Sobre</label>
                                </div>
                            </div>
                            <div class="col-md-6">

                            @error('estadoEmpresa')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="form__group field">
                                    <input type="text" class="form-control custom-input" name="estadoEmpresa" placeholder="{{ $empresa->estadoEmpresa }}" value="{{ $empresa->estadoEmpresa }}" required>
                                    <label for="estadoEmpresa" class="form__label">Estado</label>
                                </div>
                           

                            @error('cidadeEmpresa')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="form__group field">
                                    <input type="text" class="form-control custom-input" name="cidadeEmpresa" placeholder="{{ $empresa->cidadeEmpresa }}" value="{{ $empresa->cidadeEmpresa }}" required>
                                    <label for="cidadeEmpresa" class="form__label">Cidade</label>
                                </div>
                            

                            @error('LogradouroEmpresa')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="form__group field">
                                    <input type="text" class="form-control custom-input" name="LogradouroEmpresa" placeholder="{{ $empresa->LogradouroEmpresa }}" value="{{ $empresa->LogradouroEmpresa }}" required>
                                    <label for="LogradouroEmpresa" class="form__label">Logradouro</label>
                                </div>
                            

                            @error('cepEmpresa')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="form__group field">
                                    <input type="text" class="form-control custom-input" name="cepEmpresa" placeholder="{{ $empresa->cepEmpresa }}" value="{{ $empresa->cepEmpresa }}" required>
                                    <label for="cepEmpresa" class="form__label">Cep</label>
                                </div>
                            

                            @error('numeroLograEmpresa')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="form__group field">
                                    <input type="text" class="form-control custom-input" name="numeroLograEmpresa" placeholder="{{ $empresa->numeroLograEmpresa }}" value="{{ $empresa->numeroLograEmpresa }}" required>
                                    <label for="numeroLograEmpresa" class="form__label">Numero</label>
                                </div>

                            </div>
    

                            <!-- Segunda Coluna -->

                        

                        <button class="btn btn-primary-custom btn-block" >
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