<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="{{url('assets/img/adminImages/WU-icon.png')}}" type="image/x-icon">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="{{ url('assets/css/navbarAdmin.css') }}">
  <link rel="stylesheet" href="{{ url('assets/css/admin.css') }}">

  <title>Administrador | Empresas</title>
</head>

<body>


<div class="">
  <div class="row">
  @include('components.asideAdmin')
            

    <div class="col-md-9">

    <div class="d-flex flex-row align-items-center">
        <ul class="nav-list list-group list-group-horizontal list-none p-2">
          <li class="p-1 d-flex flex-row justify-content-center"><span class="material-symbols-outlined p-1">
grid_view
</span><a href="{{ route('admin.dashboard') }}" class="text-dark p-1">Dashboard</a></li>

          <li class="p-2">/</li>

          <li class="p-1 d-flex flex-row justify-content-center"><span class="material-symbols-outlined p-1">
person
</span><a href="{{ route('usuarios.index') }}" class="text-dark p-1">Usuários</a></li>

<li class="p-2">/</li>

<li class="p-1 d-flex flex-row justify-content-center"> <span class="material-symbols-outlined p-1">work</span><a href="{{ route('vagas.index') }}" class="text-dark p-1">Vagas</a></li>

<li class="p-2">/</li>

<li class="p-1 d-flex flex-row justify-content-center"><span class="material-symbols-outlined p-1">apartment</span><a href="{{ route('empresas.index') }}" class="text-dark p-1">Empresas</a></li>

        </ul>
      </div>
      <div class="container md-4">
        <div >

          <div class="tabela-container" style="max-height: 700px; overflow-y: auto; overflow-x: hidden;">


          <div class="search-container mt-3">
          <span class="material-symbols-outlined search-icon">search</span>
          <input type="text" id="searchInput" placeholder="Buscar...">
        </div>

            <table class="table table-striped" id="myTable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>NOME</th>
                  <th>E-MAIL</th>

                  <!-- para procurar pelo status -->
                  @if(request()->has('order') && request()->order == 'status')
                  <th>
                    <a href="{{ route('empresas.index') }}" class="">
                        <a href="{{ route('vagas.index') }}" class="d-flex flex-row p-1" style="border-radius: 0;" >
<p class="p-0 m-0 ">Status
</p>                     
</a>
                    </th>
                  @else
                  <th><a href="{{ route('empresas.index', ['order' => 'status']) }}" class=" d-flex flex-row p-1" style="border-radius: 0;">Status</a>
                  @endif

<th>Ações</th>
                </tr>
              </thead>
              <tbody>
                @forelse($empresas as $em) <!-- Usando um alias diferente -->
                  <tr>
                    <td>{{ $em-> idEmpresa }}</td>
                    <td>

                    <a href="#" class="visualizar-link mb-3" data-bs-toggle="modal" data-bs-target="#visualizarModal"
       data-id="{{ $em->idEmpresa }}"
       data-nome="{{$em->nomeEmpresa }}"
       data-username="{{ $em->usernameEmpresa  }}"
       data-email="{{ $em->emailEmpresa }}"
       data-sobre="{{ $em->sobreEmpresa  }}"
       data-cnpj="{{ $em->cnpjEmpresa }}"
       data-contato="{{  $em->contatoEmpresa }}"
       data-cidade="{{ $em->cidadeEmpresa  }}"
       data-estado="{{ $em->estadoEmpresa }}"
       data-logradouro="{{ $em->logradouroEmpresa }}"
       data-cep="{{ $em->cepEmpresa }}"
       data-numLogr="{{ $em->numeroLograEmpresa }}"
    >
        {{ $em->nomeEmpresa }}
    </a>


                    </td>
                    <td>{{ $em->usernameEmpresa }}</td>
                    <td>
  <span class="badge rounded-pill d-inline 
    @switch($em->status->tipoStatus)
      @case('Ativo')
        badge-ativo
        @break
      @case('Pendente')
        badge-pendente
        @break
      @case('Bloqueado')
        badge-bloqueado
        @break
      @default
        badge-default
    @endswitch">
    {{ $em->status->tipoStatus }}
  </span>
</td>
                    <td>

                      <form action="{{ route('empresas.delete', $em->idEmpresa) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Realmente deseja excluir esse usuário?')" type="submit" class="btn btn-outline-danger btn-sm"><span class="bi-trash-fill"></span>&nbsp;Bloquear</button>
                      </form>

                      <form action="{{ route('empresas.aprovar', $em->idEmpresa) }}" method="POST" class="d-inline">
                            @csrf
                            @method('Post')
                            <button onclick="return confirm('Realmente deseja aprovar essa Empresa?')" type="submit" class="btn btn-outline-success btn-sm"><span class="bi bi-check2"></span>&nbsp;Ativar</button>
                        </form>

                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="4">Nenhuma Empresa encontrado.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
            <div class="no-results" id="noResults">
              <img src="{{url('assets/img/adminImages/not-found.png')}}" alt="">
              <p>Nenhum registro encontrado.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Modal -->
<div class="modal" id="visualizarModal" tabindex="-1" aria-labelledby="visualizarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content modal-width-content">
            <div class="modal-header">
                <h5 class="modal-title" id="visualizarModalLabel">Detalhes da Empresa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Seção de Identificação -->
                <div class="row mb-3">
                  <div class="d-flex">
                  <h6 class="me-2">Identificação </h6>

                  <i class="bi bi-file-person-fill"></i>
                  </div>
                    <div class="col-md-6">
                        <p><strong>ID:</strong> <span id="idEmpresa"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Nome:</strong> <span id="nomeEmpresa"></span></p>
                    </div>
                </div>
                <!-- Seção de Contato -->
                <div class="row mb-3">
                  <div class="d-flex">
                <h6 class="me-2">Contato</h6>

                <i class="bi bi-telephone-fill"></i>
                </div>

                    <div class="col-md-6">
                        <p><strong>Username:</strong> <span id="usernameEmpresa"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>E-mail:</strong> <span id="emailEmpresa"></span></p>
                    </div>
                </div>
                <!-- Seção de Informações Adicionais -->
                <div class="row mb-3">
                <div class="d-flex">
                <h6 class="me-2">INFO. ADICIONAIS</h6>

                <i class="bi bi-info-square-fill"></i>
                </div>
                    <div class="col-md-6">
                        <p><strong>Sobre:</strong> <span id="sobreEmpresa"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>CNPJ:</strong> <span id="cnpjEmpresa"></span></p>
                    </div>
                </div>
                <!-- Seção de Localização -->
                <div class="row mb-3">
                <div class="d-flex">
                <h6 class="me-2">LOCALIZAÇÕAO</h6>

                <i class="bi bi-geo-alt-fill"></i>
                </div>
                    <div class="col-md-6">
                        <p><strong>Contato:</strong> <span id="contatoEmpresa"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Cidade:</strong> <span id="cidadeEmpresa"></span></p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>Estado:</strong> <span id="estadoEmpresa"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Logradouro:</strong> <span id="logradouroEmpresa"></span></p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>CEP:</strong> <span id="cepEmpresa"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Número logradouro:</strong> <span id="numeroLograEmpresa"></span></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>





</div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('.visualizar-link');
    links.forEach(link => {
      link.addEventListener('click', function(event) {
        const id = link.getAttribute('data-id');
        const nome = link.getAttribute('data-nome');
        const username = link.getAttribute('data-username');
        const email = link.getAttribute('data-email');
        const sobre = link.getAttribute('data-sobre');
        const cnpj = link.getAttribute('data-cnpj');
        const contato = link.getAttribute('data-contato');
        const cidade = link.getAttribute('data-cidade');
        const estado = link.getAttribute('data-estado');
        const logradouro = link.getAttribute('data-logradouro');
        const cep = link.getAttribute('data-cep');
        const numLogr = link.getAttribute('data-numLogr');
     ;
        
        document.getElementById('idEmpresa').textContent = id;
        document.getElementById('nomeEmpresa').textContent = nome;
        document.getElementById('usernameEmpresa').textContent = username;
        document.getElementById('emailEmpresa').textContent = email;
        document.getElementById('sobreEmpresa').textContent = sobre;
        document.getElementById('cnpjEmpresa').textContent = cnpj;
        document.getElementById('contatoEmpresa').textContent = contato;
        document.getElementById('cidadeEmpresa').textContent = cidade;
        document.getElementById('estadoEmpresa').textContent = estado;
        document.getElementById('logradouroEmpresa').textContent = logradouro;
        document.getElementById('cepEmpresa').textContent = cep;
        document.getElementById('numeroLograEmpresa').textContent = numLogr;
      });
    });
  });
</script>
<script>
const sidebarlinks = document.querySelectorAll('.item-nav');
// Adicionando eventos
sidebarlinks.forEach(link => {
  link.addEventListener('click', function() {
    // Removendo classe
    sidebarlinks.forEach(item => item.classList.remove('link-aside-active'));
    this.classList.add('link-aside-active')
  })
})
  // Adiciona um evento de entrada ao campo de busca
  document.getElementById('searchInput').addEventListener('input', function() {
    const filter = this.value.toLowerCase(); // Valor digitado na barra de busca
    const rows = document.querySelectorAll('#myTable tbody tr'); // Todas as linhas da tabela
    let visibleRows = 0; // Contador de linhas visíveis
    const noResults = document.getElementById('noResults');
    // Itera por todas as linhas da tabela para verificar se devem ser exibidas ou ocultadas
    rows.forEach(row => {
      const textContent = row.textContent.toLowerCase();
      if (textContent.includes(filter)) {
        row.style.display = ''; // Exibe a linha
        visibleRows++; // Incrementa o contador de linhas visíveis
        
      } else {
        row.style.display = 'none'; // Oculta a linha
         
      }  
      noResults.style.display = (visibleRows > 0) ? 'none' : 'block';
    });
  });
</script>

<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
</html>