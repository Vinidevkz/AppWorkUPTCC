<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário com Imagem</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
<div class="container">

    
<button onclick="window.history.back()" class="d-flex p-1 align-items-center m-0" style="background-color: transparent; border:none">
<i class="bi bi-skip-backward p-2"></i>
<p class="m-0">Voltar</p>
</button>

<div class="card m-5">
    <div class="card-header">
        <h3 class="">Cadastrar administrador</h3>
    </div>
    <div class="card-body">
    <div class="row d-flex flex-row m-3">

<div class="col-12 fundo-form p-2">
    <div class="row align-items-center justify-content-center ">

        <div class="col-12 d-flex align-items-center justify-content-center  ">

        <div class="col-2">
        <div class="col-2 p-0 m-0 d-flex align-items-center justify-content-center" id="">
 <div  class="d-flex align-items-center justify-content-center">

 <i class="bi bi-person-square" id="preview"></i>
 </div>
  <img id="imagePreview" src="" alt="" style="display:none; max-width: 200px; max-height: 200px;">

 </div>

        </div>



        <form method="POST" action="/formAdmin" enctype="multipart/form-data">
@csrf

  <div class="form-row">

  @error('nomeAdmin')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
    <div class="form-group col-md-4 form__group field">
      <label for="inputEmail4" class="form_label">Nome do administrador</label>
      <input type="text" class="form-control custom-input" id="inputEmail4" placeholder="Nome do ADM" name="nomeAdmin" value="{{ old('nomeAdmin') }}" required>
    </div>

    @error('usernameAdmin')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
    <div class="form-group col-md-4 form__group field ">
    <label for="inputAddress" class="form_label">Nome de usuário</label>
    <input type="text" class="form-control custom-input" id="inputAddress" placeholder="nome.sobrenome" value="{{ old('usernameAdmin') }}"  name="usernameAdmin" required>
  </div>


  @error('senhaAdmin')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
  <div class="form-group col-md-4 form__group field">
      <label for="inputPassword4" class="form_label">Senha</label>
      <input type="password" class="form-control  custom-input" id="inputPassword4" placeholder="Senha" value="{{ old('senhaAdmin') }}"  name="senhaAdmin" required>
    </div>

  </div>


 <div class="form-row">

 @error('emailAdmin')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
  <div class="form-group col-md-5 form__group field">
    <label for="inputAddress2" class="form__label">E-mail</label>
    <input type="email" class="form-control custom-input" id="inputAddress2" name="emailAdmin" placeholder="email" value="{{ old('emailAdmin') }}">
  </div>

 
  
  @error('contatoAdmin')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
    <div class="form-group col-md-3 form__group field">
      <label for="inputCity" class="form__label" class="">Contato</label>
      <input type="number" class="form-control custom-input custom-input" id="inputPhone" name="contatoAdmin" value="{{ old('contatoAdmin') }}" placeholder="(00) 0000-0000" required>

  </div>
    </div>

    <div class="row d-flex justify-content-around m-0">
        <div class="col-10 p-0">
    <div class="form-group mb-3">
    <label for="exampleFormControlFile1">Imagem do administrador</label>
    <input type="file" name="fotoAdmin" id="fotoAdmin" class="form-control custom-input" accept="img/*" value="url">

  </div>



  </div>

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
</div>





   
                </div>
            </div>
        </div>

     <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>