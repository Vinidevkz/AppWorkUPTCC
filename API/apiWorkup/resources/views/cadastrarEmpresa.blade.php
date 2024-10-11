<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Empresa</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
   
</head>

<body class="background">
    <main class="cardsform">
        <div class="container">
            <div class="row form-wrapper">
                <!-- Coluna do formulário -->
                <div class="col-md-8 form-container">
                    <div class="panel-heading">
                        Cadastre sua Empresa
                    </div>

                    <form method="POST" action="/formEmpresa" id="registerForm">
                        @csrf
                        <div class="form-step">
                            @error('usernameEmpresa')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                            <div class="form__group field">
                                <input type="text" class="form-control custom-input" name="usernameEmpresa" placeholder="Nome de Usuário da Empresa" value="{{ old('usernameEmpresa') }}">
                                <label for="usernameEmpresa" class="form__label">Nome de Usuário da Empresa</label>
                            </div>

                            @error('emailEmpresa')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                            <div class="form__group field">
                                <input type="email" class="form-control custom-input" name="emailEmpresa" placeholder="E-mail da Empresa" value="{{ old('emailEmpresa') }}">
                                <label for="emailEmpresa" class="form__label">E-mail da Empresa</label>
                            </div>

                            @error('senhaEmpresa')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                            <div class="form__group field">
                                <input type="password" class="form-control custom-input" name="senhaEmpresa" placeholder="Senha da Empresa" value="{{ old('senhaEmpresa') }}">
                                <label for="senhaEmpresa" class="form__label">Senha da Empresa</label>
                            </div>
                            <button type="button" class="btn btn-primary-custom btn-custom" onclick="nextStep()">Próximo</button>
                        </div>

                        <div class="form-step" style="display: none;">
                            @error('nomeEmpresa')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                            <div class="form__group field">
                                <input type="text" class="form-control custom-input" name="nomeEmpresa" placeholder="Nome da Empresa" value="{{ old('nomeEmpresa') }}">
                                <label for="nomeEmpresa" class="form__label">Nome da Empresa</label>
                            </div>

                            @error('sobreEmpresa')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                            <div class="form__group field">
                                <input type="text" class="form-control custom-input" name="sobreEmpresa" placeholder="Sobre a Empresa" value="{{ old('sobreEmpresa') }}">
                                <label for="sobreEmpresa" class="form__label">Sobre a Empresa</label>
                            </div>
                            
                            <button type="button" class="btn btn-secondary-custom btn-custom" onclick="prevStep()">Anterior</button>
                            <button type="button" class="btn btn-primary-custom btn-custom" onclick="nextStep()">Próximo</button>
                        </div>

                        <div class="form-step" style="display: none;">
                            @error('cnpjEmpresa')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                            <div class="form__group field">
                                <input type="text" class="form-control custom-input" name="cnpjEmpresa" placeholder="CNPJ da Empresa" value="{{ old('cnpjEmpresa') }}">
                                <label for="cnpjEmpresa" class="form__label">CNPJ da Empresa</label>
                            </div>

                            @error('contatoEmpresa')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                            <div class="form__group field">
                                <input type="text" class="form-control custom-input" name="contatoEmpresa" placeholder="Contato da Empresa" value="{{ old('contatoEmpresa') }}">
                                <label for="contatoEmpresa" class="form__label">Contato da Empresa</label>
                            </div>

                            @error('cidadeEmpresa')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                            <div class="form__group field">
                                <input type="text" class="form-control custom-input" name="cidadeEmpresa" placeholder="Cidade da Empresa" value="{{ old('cidadeEmpresa') }}">
                                <label for="cidadeEmpresa" class="form__label">Cidade da Empresa</label>
                            </div>
                            <button type="button" class="btn btn-secondary-custom btn-custom" onclick="prevStep()">Anterior</button>
                            <button type="button" class="btn btn-primary-custom btn-custom" onclick="nextStep()">Próximo</button>
                        </div>

                        <div class="form-step" style="display: none;">
                            @error('estadoEmpresa')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                            <div class="form__group field">
                                <input type="text" class="form-control custom-input" name="estadoEmpresa" placeholder="Estado da Empresa" value="{{ old('estadoEmpresa') }}">
                                <label for="estadoEmpresa" class="form__label">Estado da Empresa</label>
                            </div>

                            @error('LogradouroEmpresa')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                            <div class="form__group field">
                                <input type="text" class="form-control custom-input" name="LogradouroEmpresa" placeholder="Logradouro da Empresa" value="{{ old('LogradouroEmpresa') }}">
                                <label for="LogradouroEmpresa" class="form__label">Logradouro da Empresa</label>
                            </div>

                            @error('cepEmpresa')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                            <div class="form__group field">
                                <input type="text" class="form-control custom-input" name="cepEmpresa" placeholder="CEP da Empresa" value="{{ old('cepEmpresa') }}">
                                <label for="cepEmpresa" class="form__label">CEP da Empresa</label>
                            </div>

                            @error('numeroLograEmpresa')
                            <div class="error-message">{{ $message }}</div>
                            @enderror
                            <div class="form__group field">
                                <input type="text" class="form-control custom-input" name="numeroLograEmpresa" placeholder="Número do Logradouro da Empresa" value="{{ old('numeroLograEmpresa') }}">
                                <label for="numeroLograEmpresa" class="form__label">Número do Logradouro da Empresa</label>
                            </div>

                            <div class="form__group field">
                                <input type="file" id="fileInput" class="form-control custom-input" name="fotoEmpresa" placeholder="Foto da Empresa" value="url">
                                <label for="fotoEmpresa" class="form__label">Foto da Empresa</label>
                                <div id="preview">
                                        <img id="imagePreview" src="" alt="" style="display:none; max-width: 300px; max-height: 300px;">
                                    </div>
                            </div>

                            <button type="button" class="btn btn-secondary-custom btn-custom" onclick="prevStep()">Anterior</button>
                            <input type="submit" id="foto" class="btn btn-success-custom btn-custom" value="Enviar">
                        </div>
                    </form>
                </div>

                <!-- Coluna da imagem -->
                <div class="col-md-4 image-container">
                    <img src="https://via.placeholder.com/300" alt="Imagem da Empresa" class="form-image">
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        const formSteps = document.querySelectorAll('.form-step');
        let currentStep = 0;

        function showStep(step) {
            formSteps.forEach((formStep, index) => {
                formStep.style.display = index === step ? 'block' : 'none';
            });
        }

        function nextStep() {
            if (currentStep < formSteps.length - 1) {
                currentStep++;
                showStep(currentStep);
            }
        }

        function prevStep() {
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        }

        showStep(currentStep);
    </script>

        <!-- Firebase App (SDK) -->
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
                    fotoEmpresaInput.name = 'fotoEmpresa';
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