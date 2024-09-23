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
        <section class="cadastro">
            <h1>Site para cadastrar uma nova empresa</h1>


            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <input type="submit" class="btn btn-light" value="Sair">
            </form>
        </section>
        <section class="formulario">
            <h2>Create Account</h2>
            <p>Or use your email for registration</p>

            <form method="POST" action="/formEmpresa">

                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                @csrf

                @error('usernameEmpresa')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror
                <div class="input-container">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="usernameEmpresa" placeholder="usernameEmpresa" value="{{ old('usernameEmpresa') }}">

                </div>

                @error('nomeEmpresa')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror
                <div class="input-container">
                    <i class="fa-regular fa-envelope"></i>
                    <input type="text" name="nomeEmpresa" placeholder="nomeEmpresa" value="{{ old('nomeEmpresa') }}">

                </div>

                @error('emailEmpresa')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror
                <div class="input-container">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="emailEmpresa" placeholder="emailEmpresa" value="{{ old('emailEmpresa') }}">
                </div>

                @error('fotoEmpresa')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror
                <div class="input-container">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="fotoEmpresa" placeholder="fotoEmpresa" value="{{ old('fotoEmpresa') }}">
                </div>


                @error('sobreEmpresa')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror
                <div class="input-container">
                    <i class="fa-regular fa-credit-card"></i>
                    <input type="text" name="sobreEmpresa" placeholder="sobreEmpresa" value="{{ old('sobreEmpresa') }}">

                </div>

                @error('cnpjEmpresa')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror

                <div class="input-container">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="cnpjEmpresa" placeholder="cnpjEmpresa" value="{{ old('cnpjEmpresa') }}">

                </div>


                @error('contatoEmpresa')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror
                <div class="input-container">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="contatoEmpresa" placeholder="contatoEmpresa" value="{{ old('contatoEmpresa') }}">

                </div>

                @error('senhaEmpresa')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror
                <div class="input-container">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="senhaEmpresa" placeholder="senhaEmpresa" value="{{ old('senhaEmpresa') }}">

                </div>


                @error('cidadeEmpresa')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror
                <div class="input-container">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="cidadeEmpresa" placeholder="cidadeEmpresa" value="{{ old('cidadeEmpresa') }}">

                </div>


                @error('estadoEmpresa')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror
                <div class="input-container">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="estadoEmpresa" placeholder="estadoEmpresa" value="{{ old('estadoEmpresa') }}">

                </div>

                @error('LogradouroEmpresa')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror

                <div class="input-container">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="LogradouroEmpresa" placeholder="LogradouroEmpresa" value="{{ old('LogradouroEmpresa') }}">

                </div>


                @error('cepEmpresa')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror
                <div class="input-container">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="cepEmpresa" placeholder="cepEmpresa" value="{{ old('cepEmpresa') }}">

                </div>

                @error('numeroLograEmpresa')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror

                <div class="input-container">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="numeroLograEmpresa" placeholder="numeroLograEmpresa" value="{{ old('numeroLograEmpresa') }}">

                </div>




                <button class="btnRegister">
                    <p>Register</p>
                </button>
            </form>
        </section>
    </main>
</body>

</html>