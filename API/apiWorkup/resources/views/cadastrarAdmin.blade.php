<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário com Imagem</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
    <main class="cardsform">
        <div class="container mt-2 mb-3">
            <div class="row form-wrapper">
                <!-- Coluna do formulário -->
                <div class="col-md-8 form-container">
                    <div class="panel-heading text mb-5">
                        Cadastre um Administrador
                    </div>

                    <form method="POST" action="/formAdmin">
                        @csrf

                        <div class="row">
                            <!-- Primeira Coluna -->
                            <div class="col-md-6">
                                @error('nomeAdmin')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="form__group field">
                                    <input type="text" class="form-control custom-input" name="nomeAdmin" placeholder="Nome do Administrador" value="{{ old('nomeAdmin') }}" required>
                                    <label for="nomeAdmin" class="form__label">Nome do Administrador</label>
                                </div>

                                @error('usernameAdmin')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="form__group field">
                                    <input type="text" class="form-control custom-input" name="usernameAdmin" placeholder="Username" value="{{ old('usernameAdmin') }}" required>
                                    <label for="usernameAdmin" class="form__label">Username</label>
                                </div>

                                @error('emailAdmin')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="form__group field">
                                    <input type="text" class="form-control custom-input" name="emailAdmin" placeholder="Email" value="{{ old('emailAdmin') }}" required>
                                    <label for="emailAdmin" class="form__label">Email</label>
                                </div>

                                @error('contatoAdmin')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="form__group field">
                                    <input type="text" class="form-control custom-input" name="contatoAdmin" placeholder="Contato" value="{{ old('contatoAdmin') }}" required>
                                    <label for="contatoAdmin" class="form__label">Contato</label>
                                </div>
                            </div>

                            <!-- Segunda Coluna -->
                            <div class="col-md-6">
                                @error('senhaAdmin')
                                <div class="error-message">{{ $message }}</div>
                                @enderror
                                <div class="form__group field">
                                    <input type="text" class="form-control custom-input" name="senhaAdmin" placeholder="Senha" value="{{ old('senhaAdmin') }}" required>
                                    <label for="senhaAdmin" class="form__label">Senha</label>
                                </div>

                                <div class="form__group field">
                                    <input type="file" id="fileInput" class="form-control custom-input" name="fotoAdmin" placeholder="Foto" value="url" >
                                    <label for="fotoAdmin" class="form__label">Foto</label>
                                    <div id="preview">
                                        <img id="imagePreview" src="" alt="" style="display:none; max-width: 300px; max-height: 300px;">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <button class="btn btn-primary-custom btn-block" id="foto">
                            Registrar
                        </button>
                    </form>

                </div>

                <!-- Coluna da imagem -->
                <div class="col-md-4 image-container">
                    <img src="{{ url('/assets/img/home/workuplogo.png') }}" alt="Descrição da imagem">
                </div>
                
            </div>
        </div>
    </main>
     <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.13.2/firebase-app.js"></script>
    <!-- Firebase Storage -->
    <script src="https://www.gstatic.com/firebasejs/10.13.2/firebase-storage.js"></script>
    <!-- Firebase Analytics (opcional) -->
    <script src="https://www.gstatic.com/firebasejs/10.13.2/firebase-analytics.js"></script>
    <script type="module">
        // Import the functions you need from the SDKs you need
        import { initializeApp } from "https://www.gstatic.com/firebasejs/10.13.2/firebase-app.js";
        import { getStorage, ref, uploadBytes, getDownloadURL } from "https://www.gstatic.com/firebasejs/10.13.2/firebase-storage.js";
        import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.13.2/firebase-analytics.js";

        // Your web app's Firebase configuration
        const firebaseConfig = {
            apiKey: "AIzaSyA-QUFdmkri7tul4SYrErEivDaxBksa1Qc",
            authDomain: "workup-464af.firebaseapp.com",
            projectId: "workup-464af",
            storageBucket: "workup-464af.appspot.com",
            messagingSenderId: "623240730819",
            appId: "1:623240730819:web:28ca0c6e405ccd2d436a76",
            measurementId: "G-X1Y39ZHK8J"
        };

        // Initialize Firebase
        const app = initializeApp(firebaseConfig);
        const analytics = getAnalytics(app);
        const storage = getStorage(app); // Inicializa o Storage

        let selectedFile = null; // Variável para armazenar o arquivo selecionado

        document.getElementById('fileInput').addEventListener('change', function(event) {
            selectedFile = event.target.files[0]; // Armazena o arquivo selecionado
            if (selectedFile) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const img = document.getElementById('imagePreview');
                    img.src = e.target.result;
                    img.style.display = 'block'; // Exibe a imagem
                };

                reader.readAsDataURL(selectedFile); // Lê o conteúdo do arquivo como uma URL de dados
            }
            if (selectedFile) {
                const storageRef = ref(storage, `publicacao/${selectedFile.name}`); // Cria uma referência no Storage

                uploadBytes(storageRef, selectedFile).then(() => {
                    console.log('Arquivo enviado com sucesso!');

                    
                    getDownloadURL(storageRef)
                .then((url) => {
                    console.log('URL da imagem:', url);
                    const img = document.getElementById('imagePreview');
                    img.src = url; // Define a URL da imagem como src do elemento img
                    img.style.display = 'block'; // Exibe a imagem


                    const fotoEmpresaInput = document.createElement('input');
                    fotoEmpresaInput.type = 'hidden';
                    fotoEmpresaInput.name = 'fotoAdmin';
                    fotoEmpresaInput.value = url;
                    document.querySelector('form').appendChild(fotoEmpresaInput);
                    document.getElementById('foto').disabled = false;
                })
                .catch((error) => {
                    console.error('Erro ao obter a URL da imagem:', error);
                });

                }).catch((error) => {
                    console.error('Erro ao enviar o arquivo:', error);
                });
            } else {
                console.log('Nenhum arquivo selecionado para enviar.');
            }
        });

        document.getElementById('foto').addEventListener('click', function() {
          
        });
       
    </script>

</body>

</html>