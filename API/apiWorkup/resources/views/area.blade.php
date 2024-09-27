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
            <h1>Site para cadastrar um novo admin</h1>


            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <input type="submit" class="btn btn-light" value="Sair">
            </form>
        </section>



        <section class="formulario">
            <h2>Create Account</h2>
            <p>Or use your email for registration</p>

            <form method="POST" action="/formArea">
                @csrf

                @error('nomeArea')
                <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                @enderror
                <div class="input-container">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="nomeArea" placeholder="nomeArea" value="{{ old('nomeArea') }}">

                </div>


                <button class="btnRegister">
                    <p>Register</p>
                </button>


            </form>
        </section>
    </main>
</body>

</html>