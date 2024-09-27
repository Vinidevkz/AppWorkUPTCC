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

            <form method="POST" action="{{ route('usuarios.update', $usuario->idUsuario) }}">
                @csrf
                @method('PUT')

                @error('nomeUsuario')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror
                <div class="input-container">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="nomeUsuario" placeholder="{{ $usuario->nomeUsuario }}" value="{{ $usuario->nomeUsuario }}">

                </div>

                @error('usernameUsuario')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror
                <div class="input-container">
                    <i class="fa-regular fa-envelope"></i>
                    <input type="text" name="usernameUsuario" placeholder="{{ $usuario->usernameUsuario }}" value="{{ $usuario->usernameUsuario }}">

                </div>

                @error('nascUsuario')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror
                <div class="input-container">
                    <i class="fa-regular fa-credit-card"></i>
                    <input type="text" name="nascUsuario" placeholder="{{ $usuario->nascUsuario }}" value="{{ $usuario->nascUsuario }}">

                </div>


                @error('contatoUsuario')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror

                <div class="input-container">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="contatoUsuario" placeholder="{{ $usuario->contatoUsuario }}" value="{{ $usuario->contatoUsuario }}">

                </div>


                <div class="input-container">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="sobreUsuario" placeholder="{{ $usuario->sobreUsuario }}" value="{{ $usuario->sobreUsuario }}">
                </div>



                <button class="btnRegister">
                    <p>Register</p>
                </button>


            </form>
        </section>
    </main>
</body>

</html>