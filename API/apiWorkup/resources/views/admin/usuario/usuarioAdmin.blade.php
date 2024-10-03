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
  
  <title>Administrador | Usuários</title>
</head>

<body>
<header class="">
  <div class="d-flex ms-5">
    <p class="text-light fs-4 fw-bold m-1">Work<span class="verde">Up</span></p>
  </div>
  <div class="dropdown">
    <div class="section-adm dropdown-toggle d-flex flex-row align-items-center text-white" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      <div class="img-adm">VA</div>  
      <p class="m-0 text-white">Colaborador</p>
    </div>    
    <ul class="dropdown-menu p-0 m-0 list-section">
      <div class="d-flex flex-column">
        <li class="titulo-section-adm"><span>Usuário:</span> vitor.souza</li>
        <div class="d-flex align-items-center justify-content-start">
          <span class="material-symbols-outlined">key</span>
          <li class="corpo-section-adm p-0 m-0"><a href="">Alterar senha</a></li>
        </div>
      </div>
      <div class="d-flex flex-column justify-content-center">
        <li class="titulo-section-adm">Papéis</li>
        <div class="d-flex flex-column justify-content-start">
          <div class="d-flex flex-row">
            <span class="material-symbols-outlined">check</span>
            <li class="corpo-section-adm m-0 p-0">Colaborador</li>
          </div>
          <div class="d-flex flex-row">
            <span class="material-symbols-outlined">check</span>
            <li class="corpo-section-adm m-0 p-0">Gestor</li>
          </div>
        </div>
      </div>
    </ul>
  </div>
</header>

<div class="row">
  <aside class="col-2 p-4" id="sidebar">
    <div class="col-2 h-auto col-aside">
      <div class="aside-container">
        <div class="aside-sidebar d-flex flex-column h-auto text-white p-2">
          <div class="d-flex mb-4">
            <a href="/admin" class="d-flex flex-row align-items-center h6">
              <span class="material-symbols-outlined p-2">grid_view</span> Dashboard
            </a>
          </div>
          <div class="d-flex mb-4">
            <a href="/verUsuario" class="asisde-sidebar-active d-flex flex-row align-items-center h6">
              <span class="material-symbols-outlined p-2">person</span> Usuários
            </a>
          </div>
          <div class="d-flex mb-4">
            <a href="/verVaga" class="d-flex flex-row align-items-center h6">
              <span class="material-symbols-outlined p-2">work</span> Vagas
            </a>
          </div>
          <div class="d-flex mb-4">
            <a href="/verEmpresa" class="d-flex flex-row align-items-center h6">
              <span class="material-symbols-outlined p-2">apartment</span> Empresas
            </a>
          </div>
          <div class="mb-4">
            <a href="/infoAdmin" class="d-flex flex-row align-items-center h6">
              <span class="material-symbols-outlined p-2">info</span> Info
            </a>
          </div>
        </div>
      </div>
    </div>
  </aside>

  <div class="col-9 mt-4">
    <div class="container md-4 mt-3">
      <div class="d-flex flex-row">
        <div class="blue d-flex align-items-center justify-content-center">
          <p class="m-0 fw-bold text-center">Ação</p>
        </div>
        <div class="btn btn-acoes-add p-0 m-0 d-flex flex-row">
          <span class="material-symbols-outlined m-1">person_add</span>
          <p class="m-0 p-0 m-1">Adicionar usuários</p>
        </div>
      </div>

      <div class="tabela-container" style="max-height: 700px; overflow-y: auto; overflow-x: hidden;">
        <div class="search-container mt-3">
          <span class="material-symbols-outlined search-icon">search</span>
          <input type="text" id="searchInput" placeholder="Buscar...">
        </div>

        <table class="table table-striped m-0 table-user" id="myTable">
          <thead>
            <tr>
              <th class="fw-bold">Id</th>
              <th class="fw-bold">Usuário</th>
              <th>
                <div class="d-flex align-items-center">
                  <span class="material-symbols-outlined">alternate_email</span>
                  <p class="m-0 fw-bold">E-mail</p>
                </div>
              </th>
              <th>
                <div class="d-flex flex-row">
                  <span class="material-symbols-outlined">autorenew</span>
                  <p class="m-0 fw-bold">Status</p>
                </div>
              </th>
              <th>
                <div class="d-flex btn-acoes align-items-center">
                  <span class="material-symbols-outlined">keyboard_double_arrow_down</span>
                  <p class="m-0 fw-bold">Ações</p>
                </div>
              </th>
            </tr>
          </thead>
          <tbody>
            @forelse($usuarios as $u) 
              <tr>
                <td>{{ $u->idUsuario }}</td>
                <td class="d-flex flex-row">
                  <div class="user-initials">
                    {{ strtoupper(substr($u->nomeUsuario, 0, 1)) }}{{ strtoupper(substr(explode(' ', $u->nomeUsuario)[1] ?? '', 0, 1)) }}
                  </div>  
                  <a href="{{ route('usuarios.show', $u->idUsuario) }}" class="visualizar-link">
                    {{ $u->nomeUsuario }}
                  </a>
                </td>
                <td>{{ $u->usernameUsuario }}</td>
                <td>{{ $u->status->tipoStatus }}</td>
                <td>
                  <a href="{{ route('usuarios.edit', $u->idUsuario) }}" class="btn btn-outline-primary btn-sm"><span class="bi-pencil-fill"></span>&nbsp;</a>
                  <form action="{{ route('usuarios.delete', $u->idUsuario) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Realmente deseja excluir esse usuário?')" type="submit" class="btn btn-outline-danger btn-sm"><span class="bi-trash-fill"></span>&nbsp;</button>
                  </form>
                  <form action="{{ route('usuarios.aprovar', $u->idUsuario) }}" method="POST" class="d-inline">
                    @csrf
                    @method('POST')
                    <button onclick="return confirm('Realmente deseja aprovar esse usuário?')" type="submit" class="btn btn-outline-success btn-sm"><span class="bi bi-check2"></span>&nbsp;</button>
                  </form>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="text-center">Nenhum usuário encontrado.</td>
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

<script>
  const sidebarlinks = document.querySelectorAll('.h6');

  // Adicionando eventos
  sidebarlinks.forEach(link => {
    link.addEventListener('click', function() {
      sidebarlinks.forEach(item => item.classList.remove('asisde-sidebar-active'));
      this.classList.add('asisde-sidebar-active');
    });
  });

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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>
