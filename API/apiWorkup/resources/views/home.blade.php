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
            <h1>Site para fazer login</h1>

         
         <a class="btnSignIn" href="/cadastrarVaga" >cadastrar vaga</a>   
         <a class="btnSignIn" href="/cadastrarAdmin" >cadastrar Admin</a>   
         <a class="btnSignIn" href="/cadastrarEmpresa" >cadastrar Empresa</a>   
     
        </section>
        <section class="formulario">
            <h2>Login</h2>
            <p>Or use your email for registration</p>

            <form method="POST" action="">
                @csrf

                @error('nomeAdmin')
                        <div style="background-color: #fff;" class="error-message">{{ $message }}</div>
                    @enderror
                <div class="input-container">
                    <i class="fa-regular fa-user"></i>
                    <input type="text" name="nomeAdmin" placeholder="nomeAdmin" value="{{ old('nomeAdmin') }}">
                 
                </div>

                @error('usernameAdmin')
                        <div  style="background-color: #fff;" class="error-message">{{ $message }}</div>
                    @enderror
                <div class="input-container">
                    <i class="fa-regular fa-envelope"></i>
                    <input type="text" name="usernameAdmin" placeholder="usernameAdmin" value="{{ old('usernameAdmin') }}">
                  
                </div>



                <a class="btnSignIn" href="/cadastrarVaga" >cadastrar vaga</a>   
            
                
                <button class="btnRegister">
                    <p >Login</p>
                </button>
            </form>
        </section>

    </main>
</body>
</html>
