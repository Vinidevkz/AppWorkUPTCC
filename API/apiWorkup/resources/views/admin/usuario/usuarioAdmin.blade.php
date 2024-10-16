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


<div class="row">



  <div class="col-9 mt-4">
    <div class="container md-4 mt-3">


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
                  <div class="user-initials  rounded-circle bg-primary text-white d-flex justify-content-center align-items-center" style="width: 45px; height: 45px;">
                    {{ strtoupper(substr($u->nomeUsuario, 0, 1)) }}{{ strtoupper(substr(explode(' ', $u->nomeUsuario)[1] ?? '', 0, 1)) }}
                  </div>  
                  <a href="{{ route('usuarios.show', $u->idUsuario) }}" class="visualizar-link">
                    {{ $u->nomeUsuario }}
                  </a>
                </td>
                <td>{{ $u->usernameUsuario }}</td>
                <td>
  <span class="badge rounded-pill d-inline 
    @switch($u->status->tipoStatus)
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
    {{ $u->status->tipoStatus }}
  </span>
</td>




                <td>
          
                  <form action="{{ route('usuarios.delete', $u->idUsuario) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Realmente deseja excluir esse usuário?')" type="submit" class="btn btn-outline-danger btn-sm"><span class="bi-trash-fill"></span>&nbsp;Bloquear</button>
                  </form>
                  <form action="{{ route('usuarios.aprovar', $u->idUsuario) }}" method="POST" class="d-inline">
                    @csrf
                    @method('POST')
                    <button onclick="return confirm('Realmente deseja aprovar esse usuário?')" type="submit" class="btn btn-outline-success btn-sm"><span class="bi bi-check2"></span>&nbsp;Ativar</button>
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>
