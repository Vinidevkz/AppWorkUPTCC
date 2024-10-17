<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('assets/css/estilo-cadastro-empresa.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/estilo-padrao-workup.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Cadastrar Empresa</title>
</head>

<body>


    <!--
    <div class="box-cadastro">
        @csrf
        <form class="wrap-cadastro" action="">
            
            <div class="wrap-header">
                <h2>Cadastro de empresa</h2>
                <p>Primeiro, vamos preencher o básico</p>
            </div>

            <div class="row d-flex flex-column w-75 h-75 align-items-center justify-content-between inputs-txt">
                <div class="col col-12 h-50">
                    <label for="nome-empresa">Nome da empresa:</label>
                    <input type="text">
                </div>
                <div class="col col-12 h-50">
                    <label for="nome-empresa">Representante da empresa:</label>
                    <input type="text">
                </div>
            </div>

            <div class="row d-flex flex-row h-50 w-75 inputs-txt">
                <div class="col d-flex col-6 h-100">
                    <label for="nome-empresa">Email:</label>
                    <input type="text">
                </div>
                <div class="col d-flex col-6 h-100">
                    <label for="nome-empresa">Senha:</label>
                    <input type="text">
                </div>
            </div>

            <div class="botoes-cadastro mt-4">
                <button type="button" class="voltar" onclick="prevStep()">Voltar</button>
                <button type="button" class="avancar" onclick="nextStep()">Avançar</button>
            </div>

        </form>
    </div>
-->

    <div class="box-cadastro">
        <form class="" method="POST" action="/formEmpresa" id="registerForm">
            @csrf
            <div class="form-step wrap-cadastro">

                <div class="wrap-header">
                    <h2>Cadastro de empresa</h2>
                    <p>Primeiro, vamos preencher o básico</p>
                </div>

                <div class="row d-flex flex-column align-items-center justify-content-between inputs-txt" style="height: 10rem">

                    <div class="col col-12 h-50">
                        <label for="nomeEmpresa">Nome da empresa:</label>
                        <input type="text" class="form-control custom-input" name="nomeEmpresa" value="{{old('nomeEmpresa')}}">
                        @error('nomeEmpresa')
                            <div class="error-message">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="col col-12 h-50">
                        <label for="usernameEmpresa">Nome de usuário:</label>
                        <input type="text" class="form-control custom-input" name="usernameEmpresa" value="{{old('usernameEmpresa')}}">
                        @error('usernameEmpresa')
                            <div class="error-message">{{$message}}</div>
                        @enderror
                    </div>

                </div>

                <div class="row d-flex flex-row h-50 inputs-txt">

                    <div class="col d-flex col-6 h-100">
                        <label for="emailEmpresa">Email:</label>
                        <input type="email" class="form-control custom-input" name="emailEmpresa" placeholder="exemplo@gmail.com" value="{{old('emailEmpresa')}}">
                        @error('emailEmpresa')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col d-flex col-6 h-100">
                        <label for="senhaEmpresa">Senha:</label>
                        <input type="password" class="form-control custom-input" name="senhaEmpresa" value="{{old('senhaEmpresa')}}">
                        @error('senhaEmpresa')
                            <div class="error-message">{{$message}}</div>
                        @enderror
                    </div>

                </div>

                <div class="botoes-cadastro mt-4">
                    <button type="button" class="voltar" onclick="prevStep()">Voltar</button>
                    <button type="button" class="avancar" onclick="nextStep()">Avançar</button>
                </div>

            </div>

            <div class="form-step wrap-cadastro">

                <div class="wrap-header">
                    <h2>Cadastro de empresa</h2>
                    <p>Mostre um pouco mais sobre sua empresa</p>
                </div>

                <div class="row d-flex flex-column align-items-center justify-content-between inputs-txt" style="height: 21rem">

                    <div class="col col-12 h-50">
                        <label for="sobreEmpresa">Sobre:</label>
                        <textarea class="form-control custom-input" id="sobreEmpresa" name="sobreEmpresa" placeholder="Escreva um pouco sobre vocês!" style="min-height: 70%;" value="{{old('sobreEmpresa')}}"></textarea>
                        @error('sobreEmpresa')
                            <div class="error-message">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="col col-12">
                        <label for="fotoEmpresa">Foto de perfil:</label>
                        <input type="file" id="fileInput" class="form-control custom-input" name="fotoEmpresa" placeholder="Foto da Empresa" value="url">
                        @error('fotoEmpresa')
                            <div class="error-message">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="col col-12">
                        <label for="contatoempresa">Contato:</label>
                        <input type="text" class="form-control custom-input" name="contatoEmpresa" placeholder="telefone comercial, email, etc." value="{{old('contatoEmpresa')}}">
                        @error('contatoEmpresa')
                            <div class="error-message">{{$message}}</div>
                        @enderror
                    </div>


                </div>

                <div class="botoes-cadastro mt-4">
                    <button type="button" class="voltar" onclick="prevStep()">Voltar</button>
                    <button type="button" class="avancar" onclick="nextStep()">Avançar</button>
                </div>

            </div>

            <div class="form-step wrap-cadastro">

                <div class="wrap-header">
                    <h2>Cadastro de empresa</h2>
                    <p>Por último, nos mostre de onde estão nos apoiando</p>
                </div>

                <div class="row d-flex flex-row inputs-txt mb-2">

                    <div class="col d-flex col-6">
                        <label for="cepEmpresa">CEP:</label>
                        <input type="text" class="form-control custom-input" name="cepEmpresa" placeholder="12345-000" value="{{old('cepEmpresa')}}">
                        @error('cepEmpresa')
                            <div class="error-message">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="col d-flex col-6">
                        <label for="cnpjEmpresa">CNPJ:</label>
                        <input type="text" class="form-control custom-input" name="cnpjEmpresa" placeholder="XXX/0001-XX" value="{{old('cnpjEmpresa')}}">
                        @error('cnpjEmpresa')
                            <div class="error-message">{{$message}}</div>
                        @enderror
                    </div>

                </div>

                <div class="row d-flex flex-column align-items-center justify-content-between inputs-txt my-2" style="min-height: 7.5rem; max-height: 10rem">

                    <div class="col col-12">
                        <label for="cidadeEmpresa">Cidade:</label>
                        <input type="text" class="form-control custom-input" name="cidadeEmpresa" placeholder="Ex: São Paulo" value="{{old('cidadeEmpresa')}}">
                        @error('cidadeEmpresa')
                            <div class="error-message">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="col col-12">
                        <label for="estadoEmpresa">Estado:</label>
                        <input type="text" class="form-control custom-input" name="estadoEmpresa" placeholder="Ex: São Paulo - SP" value="{{old('estadoEmpresa')}}">
                        @error('estadoEmpresa')
                            <div class="error-message">{{$message}}</div>
                        @enderror
                    </div>

                </div>

                <div class="row d-flex flex-row h-50 inputs-txt">

                    <div class="col d-flex col-8 h-100">
                        <label for="LogradouroEmpresa">Endere:</label>
                        <input type="text" class="form-control custom-input" name="LogradouroEmpresa" placeholder="Logradouro da Empresa" value="{{old('LogradouroEmpresa')}}">
                        @error('LogradouroEmpresa')
                            <div class="error-message">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="col d-flex col-4 h-100">
                        <label for="numeroLograEmpresa">N° do logradouro:</label>
                        <input type="text" class="form-control custom-input" name="numeroLograEmpresa" placeholder="N° do Logradouro" value="{{old('numeroLograEmpresa')}}">
                        @error('numeroLograEmpresa')
                            <div class="error-message">{{$message}}</div>
                        @enderror
                    </div>

                </div>

                <div class="botoes-cadastro mt-4">
                    <button type="button" class="voltar" onclick="prevStep()">Voltar</button>
                    <input type="submit" class="avancar" value="Enviar">
                </div>

            </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>


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

        document.getElementById('fileInput').addEventListener('change', function (event) {
            selectedFile = event.target.files[0]; // Armazena o arquivo selecionado
            if (selectedFile) {
                const reader = new FileReader();

                reader.onload = function (e) {
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

        document.getElementById('foto').addEventListener('click', function () {

        });

    </script>

</body>

</html>