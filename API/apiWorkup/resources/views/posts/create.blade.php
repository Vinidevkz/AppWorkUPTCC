<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Postagem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Criar Postagem</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="detalhePublicacao" class="form-label">Detalhe da Publicação</label>
                <textarea id="detalhePublicacao" name="detalhePublicacao" class="form-control" required></textarea>
            </div>
            <div class="mb-3">

            <div class="form__group field">
            <label for="fotoEmpresa" class="form__label">Foto da Publicação</label>
                                <input type="file" id="fileInput" class="form-control custom-input"  value="url">

                                <div id="preview">
                                        <img id="imagePreview" src="" alt="" style="display:none; max-width: 300px; max-height: 300px;">
                                    </div>
                            </div>
                    
            </div>
            @if (Auth::guard('empresa')->check())
                        @php
        $empresa = Auth::guard('empresa')->user();
    @endphp
            <input type="hidden" name="idEmpresa" value="{{ $empresa->idEmpresa }}">
            @endif
            <input type="hidden" name="idVaga" value="1"> <!-- Altere conforme necessário -->

         
            <button disabled type="submit" id="foto" class="btn btn-success-custom btn-custom" >Enviar</button>
        </form>
    </div>


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
                    fotoEmpresaInput.name = 'foto';
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
