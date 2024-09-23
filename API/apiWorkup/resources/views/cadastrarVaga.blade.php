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
            <h1>Site para cadastrar uma nova vaga</h1>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <input type="submit" class="btn btn-light" value="Sair">
            </form>
        </section>
        <section class="formulario">
            <h2>Create Account</h2>
            <p>Or use your email for registration</p>



            <form method="POST" action="/formVaga">
                @csrf

                @error('nomeVaga')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror
                <div class="input-container">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="nomeVaga" placeholder="nomeVaga" value="{{ old('nomeVaga') }}">

                </div>


                @error('prazoVaga')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror
                <div class="input-container">
                    <i class="fa-regular fa-credit-card"></i>
                    <input type="text" name="prazoVaga" placeholder="prazoVaga" value="{{ old('prazoVaga') }}">

                </div>



                @error('salarioVaga')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror

                <div class="input-container">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="salarioVaga" placeholder="salarioVaga" value="{{ old('salarioVaga') }}">

                </div>


                @error('cidadeVaga')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror
                <div class="input-container">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="cidadeVaga" placeholder="cidadeVaga" value="{{ old('cidadeVaga') }}">

                </div>


                @error('estadoVaga')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror
                <div class="input-container">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="estadoVaga" placeholder="estadoVaga" value="{{ old('estadoVaga') }}">

                </div>


                @error('beneficiosVaga')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror

                <div class="input-container">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="beneficiosVaga" placeholder="beneficiosVaga" value="{{ old('beneficiosVaga') }}">

                </div>


                @error('diferencialVaga')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror
                <div class="input-container">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="diferencialVaga" placeholder="diferencialVaga" value="{{ old('diferencialVaga') }}">

                </div>

                @error('idEmpresa')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror

                <div class="input-container">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="idEmpresa" placeholder="idEmpresa" value="{{ old('idEmpresa') }}">

                </div>

                @error('idArea')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror
                <div class="input-container">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="idArea" placeholder="idArea" value="{{ old('idArea') }}">

                </div>

                @error('idModalidadeVaga')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror
                <div class="input-container">
                    <i class="fa-solid fa-lock"></i>
                    <input type="text" name="idModalidadeVaga" placeholder="idModalidadeVaga" value="{{ old('idModalidadeVaga') }}">

                </div>

                <button class="btnRegister">
                    <p>Register</p>
                </button>



            </form>
        </section>
    </main>
</body>

</html>