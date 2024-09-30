<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="{{ url('assets/css/navbarAdmin.css') }}">
  <link rel="stylesheet" href="{{ url('assets/css/admin.css') }}">

  <title>Administrador | Empresas</title>
</head>

<body>
<header class="">

<div class="d-flex ms-5">
<p class="text-light fs-4 fw-bold m-1">Work<span class="verde">Up</span></p>
</div>

<div class="dropdown">
  <div class="section-adm dropdown-toggle d-flex flex-row align-items-center text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
  <div class="img-adm " >VA</div>  
  <p class="m-0 text-white">Colaborador</p>
  </div>    
  <!-- <img src="{{url('assets/img/adminImages/perfil.png')}}" alt="" class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"> -->
  <ul class="dropdown-menu p-0 m-0 list-section">
  
    <div class="d-flex flex-column">
    <li class="titulo-section-adm"><span>Usuário:</span> vitor.souza</li>
   
    <div class="d-flex align-items-center justify-content-start">
    <span class=" material-symbols-outlined">
key
</span>

    
    <li class="corpo-section-adm p-0 m-0"><a href="">Alterar senha</a></li>
    </div>


    </div>

    <div class="d-flex flex-column justify-content-center">
    <li class="titulo-section-adm">Papéis</li>

    <div class="d-flex  flex-column justify-content-start">
      <div class="d-flex flex-row">
    <span class="material-symbols-outlined">
check
</span>
    <li class="corpo-section-adm m-0 p-0">Colaborador</li>
    </div>

<div class="d-flex flex-row">
        <span class="material-symbols-outlined">
check
</span>
    <li class="corpo-section-adm m-0 p-0">Gestor</li>
    </div>
    </div>
    </div>
  </ul>
</div>


</header>

<div class="">
  <div class="row">
  <aside class="col-2 p-4"  id="sidebar">
    <div class="col-2 h-auto col-aside">


   
      <div class="aside-container">
       
          <div class="aside-sidebar d-flex flex-column h-auto text-white p-2">

            <div class="d-flex mb-4">
              <a  href="/admin" class="d-flex flex-row align-items-center h6">
                <span class="material-symbols-outlined p-2">grid_view</span>
                Dashboard
              </a>
            </div>

            <div class="d-flex mb-4">
              <a href="/verUsuario" class=" d-flex flex-row align-items-center h6">
                <span class="material-symbols-outlined p-2">person</span>
                Usuários
              </a>
            </div>

            <div class="d-flex mb-4">
              <a href="/verVaga" class=" d-flex flex-row align-items-center h6">
                <span class="material-symbols-outlined p-2">work</span>
                Vagas
              </a>
            </div>

            <div class="d-flex mb-4">
              <a href="/verEmpresa" class="asisde-sidebar-active d-flex flex-row align-items-center h6">
                <span class="material-symbols-outlined p-2">apartment</span>
                Empresas
              </a>
            </div>

            <div class="mb-4">
              <a href="/infoAdmin" class=" d-flex flex-row align-items-center h6">
              <span class="material-symbols-outlined p-2">info</span>
                Info
              </a>
            </div>

            <div class="d-flex mb-4">
              <a href="/SuporteAdmin" class=" d-flex flex-row align-items-center h6" id="btn-support">
                <span class="material-symbols-outlined p-2">info</span>
                Suporte
              </a>
            </div>

            <div class="d-flex mb-4">
              <a href="" class=" d-flex flex-row align-items-center h6" id="btn-exit">
                <span class="material-symbols-outlined p-2">logout</span>
                Sair
              </a>
            </div>
       
      </div>
     
    </div>
    </aside>

    <div class="col-md-9">

    <div class="d-flex flex-row align-items-center">
        <ul class="nav-list list-group list-group-horizontal list-none p-2">
          <li class="p-1 d-flex flex-row justify-content-center"><span class="material-symbols-outlined p-1">
grid_view
</span><a href="#" class="text-dark p-1">Dashboard</a></li>

          <li class="p-2">/</li>

          <li class="p-1 d-flex flex-row justify-content-center"><span class="material-symbols-outlined p-1">
person
</span><a href="#" class="text-dark p-1">Usuários</a></li>

<li class="p-2">/</li>

<li class="p-1 d-flex flex-row justify-content-center"> <span class="material-symbols-outlined p-1">work</span><a href="#" class="text-dark p-1">Vagas</a></li>

<li class="p-2">/</li>

<li class="p-1 d-flex flex-row justify-content-center"><span class="material-symbols-outlined p-1">apartment</span><a href="#" class="text-dark p-1">Empresas</a></li>

        </ul>
      </div>
      <div class="container md-4">
        <div >
         
          <div class="tabela-container" style="max-height: 700px; overflow-y: auto; overflow-x: hidden;">


          <div class="search-container">
          <span class="material-symbols-outlined search-icon">
search
</span>
    <input type="text" id="searchInput" placeholder="Buscar..." onkeyup="filterTable()">
</div>

            <table class="table table-striped" id="myTable">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>NOME</th>
                  <th>E-MAIL</th>

                  <!-- para procurar pelo status -->
                  @if(request()->has('order') && request()->order == 'status')
                  <th><a href="{{ route('empresas.index') }}" class="btn btn-outline-primary">status</th>
                  @else
                  <th><a href="{{ route('empresas.index', ['order' => 'status']) }}" class="btn btn-outline-primary">Status</a>
                  @endif

<th>Ações</th>
                </tr>
              </thead>
              <tbody>
                @forelse($empresas as $em) <!-- Usando um alias diferente -->
                  <tr>
                    <td>{{ $em->idEmpresa }}</td>
                    <td>{{ $em->nomeEmpresa }}</td>
                    <td>{{ $em->usernameEmpresa }}</td>
                    <td>{{ $em->status->tipoStatus}}</td>
                    <td>
                      <a href="{{ route('empresas.show', $em->idEmpresa) }}" class="btn btn-outline-secondary btn-sm"><span class="bi-eye-fill"></span>&nbsp; Visualizar</a>
                      <a href="{{ route('empresas.edit', $em->idEmpresa) }}" class="btn btn-outline-success btn-sm"><span class="bi-pencil-fill"></span>&nbsp;Editar</a>

                      <form action="{{ route('empresas.delete', $em->idEmpresa) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Realmente deseja excluir esse usuário?')" type="submit" class="btn btn-outline-danger btn-sm"><span class="bi-trash-fill"></span>&nbsp;Deletar</button>
                      </form>

                      <form action="{{ route('empresas.aprovar', $em->idEmpresa) }}" method="POST" class="d-inline">
                            @csrf
                            @method('Post')
                            <button onclick="return confirm('Realmente deseja aprovar essa Empresa?')" type="submit" class="btn btn-outline-danger btn-sm"><span class="bi-trash-fill"></span>&nbsp;Aprovar</button>
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
</div>

<script>
  const sidebarlinks = document.querySelectorAll('.h6');

// Adicionando eventos
sidebarlinks.forEach(link => {
  link.addEventListener('click', function() {
    // Removendo classe
    sidebarlinks.forEach(item => item.classList.remove('asisde-sidebar-active'));


    this.classList.add('asisde-sidebar-active')
  })
})




function filterTable() {
        const input = document.getElementById('searchInput');
        const filter = input.value.toLowerCase();
        const table = document.getElementById('myTable');
        const tr = table.getElementsByTagName('tr');
        const noResultsMessage = document.getElementById('noResults');

        let hasResults = false; // Flag para verificar se há resultados

        for (let i = 1; i < tr.length; i++) {
            let found = false;
            const td = tr[i].getElementsByTagName('td');
            for (let j = 0; j < td.length; j++) {
                if (td[j]) {
                    const txtValue = td[j].textContent || td[j].innerText;
                    if (txtValue.toLowerCase().indexOf(filter) > -1) {
                        found = true;
                        hasResults = true; // Se encontrado, altera a flag
                        break;
                    }
                }
            }
            tr[i].style.display = found ? "" : "none"; // Exibe ou esconde a linha
        }

        // Exibe a mensagem se não houver resultados
        noResultsMessage.style.display = hasResults ? "none" : "block";
    }
</script>

<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
