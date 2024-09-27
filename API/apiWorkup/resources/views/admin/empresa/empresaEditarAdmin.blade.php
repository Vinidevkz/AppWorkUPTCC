<?php

/*
|--------------------------------------------------------------------------
| Precisa ajustar css
|--------------------------------------------------------------------------

*/
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <style>
        .error-message {
            color: red;
            font-size: 0.875rem;
        }

        .input-container {
            margin-bottom: 1rem;
        }

        .input-container i {
            margin-right: 0.5rem;
        }

        .btnRegister a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>

<body>


    <main>




        <section class="formulario">
            <h2>Create Account</h2>
            <p>Or use your email for registration</p>

            <form method="POST" action="{{ route('empresas.update', $empresa->idEmpresa) }}">
                @csrf
                @method('PUT')

                @error('nomeEmpresa')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror
                <div class="input-container">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="nomeEmpresa" placeholder="{{ $empresa->nomeEmpresa }}" value="{{ $empresa->nomeEmpresa }}">

                </div>

                @error('usernameEmpresa')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror
                <div class="input-container">
                    <i class="fa-regular fa-envelope"></i>
                    <input type="text" name="usernameEmpresa" placeholder="{{ $empresa->usernameEmpresa }}" value="{{ $empresa->usernameEmpresa }}">

                </div>

                @error('emailEmpresa')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror
                <div class="input-container">
                    <i class="fa-regular fa-credit-card"></i>
                    <input type="text" name="emailEmpresa" placeholder="{{ $empresa->emailEmpresa }}" value="{{ $empresa->emailEmpresa }}">

                </div>


                @error('contatoEmpresa')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror

                <div class="input-container">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="contatoEmpresa" placeholder="{{ $empresa->contatoEmpresa }}" value="{{ $empresa->contatoEmpresa }}">

                </div>


                <div class="input-container">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="sobreEmpresa" placeholder="{{ $empresa->sobreEmpresa }}" value="{{ $empresa->sobreEmpresa }}">
                </div>



                <button class="btnRegister">
                    <p>Register</p>
                </button>


            </form>
        </section>
    </main>
</body>

</html>