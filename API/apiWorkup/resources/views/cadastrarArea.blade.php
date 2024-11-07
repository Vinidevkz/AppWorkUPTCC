<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário com Imagem</title>

    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="{{url('assets/img/adminImages/WU-icon.png')}}" type="image/x-icon">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="{{url('assets/css/admin.css')}}">
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
            background-color: #00ff75;
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
            width: auto;
            border: none;
            border-bottom: 2px solid #9b9b9b;
            outline: 0;
            font-size: 17px;
            color: #000;
            padding: 7px 0;
            background: transparent;
            transition: border-color 0.2s;
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
            font-weight: 500;
            border-width: 3px;
            border-image: linear-gradient(to right, #b30000, #ff4d4d);
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
  #preview{

font-size: 12rem;

  }

    /* Classe para remover a borda */
    .no-border {
        display: none;   
      
    }
    
    </style>
</head>
<body id="boo">

<div class="row">
@include('components.asideAdmin')
<div class="col-9">
<div class="p-0">

<div class="container">

    
<button onclick="window.history.back()" class="d-flex p-1 align-items-center m-0" style="background-color: transparent; border:none">
<i class="bi bi-skip-backward p-2"></i>
<p class="m-0">Voltar</p>
</button>

<div class="card m-5">
    <div class="card-header">
        <h3 class="text-light">Cadastrar área</h3>
    </div>
    <div class="card-body">
    <div class="row d-flex flex-row m-3">

    <div class="row align-items-center justify-content-center ">



 </div>

        </div>



        <form method="POST" action="/formArea">
@csrf

                            <!-- Primeira Coluna -->
                                @error('nomeArea')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="form__group field">
                                    <label for="nomeArea" class="form__label text-dark">Nome da Area</label>
                                    <input type="text" class="form-control mt-3" name="nomeArea" placeholder="Digite uma area..." value="{{ old('nomeArea') }}" required>
                                </div>

                            <!-- Segunda Coluna -->


  <div class="col-2 d-flex align-items-center">

  <button class="btn btn-primary-custom btn-block" id="foto">
                            Registrar
                        </button>
                       
    </div>


</form>


    </div>
</div>






</div>
</div>





   
                </div>
            </div>
        </div>

     <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </div>
    </div>
    </div>
</body>

</html>