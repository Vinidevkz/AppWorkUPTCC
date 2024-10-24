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
<aside class="col-2 p-4">
                <div class="aside-section">

                    <!-- CABEÇALHO DO ASIDE -->
                    <div class="header-aside d-flex flex-column align-items-center justify-content-center">
                        <div class="img-header d-flex align-items-center justify-content-center">
    <img src="{{url('assets/img/adminImages/vr7Perfil.jpeg')}}" class="img-header" alt="Imagem de perfil" data-bs-toggle="modal" data-bs-target="#imagemModal" style="cursor:pointer;">
</div>

<!-- Modal Bootstrap -->
<div class="modal fade defocar-img-fundo" id="imagemModal" tabindex="" aria-labelledby="imagemModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content modal-fundo-cor">
      <div class="modal-body d-flex justify-content-center">
        <img src="{{url('assets/img/adminImages/vr7Perfil.jpeg')}}" class="img-fluid" alt="Imagem ampliada">
      </div>
      <div class="btn-group d-flex flex-row justify-content-around">
      <div class="box-btn-alter">
      <button type="button" class="btn btn-outline-light">
      <i class="bi bi-pencil"></i>  
      Alterar</button>
      </div>

      <div class="box-btn-del">
      <button type="button" class="btn btn-outline-danger">
      <i class="bi bi-x-lg"></i>  
      Excluir</button>
      </div>
      </div>
    </div>

  
  
  </div>

  </header>
  <div class="row">
 
  
</div>

</div>
        
                    <div class="aside-body">

                    <div class="search-container-2 mt-3 mb-3">
          <span class="material-symbols-outlined search-icon2">search</span>
          <input type="text" id="searchInput2" placeholder="Buscar...">
        </div>
                        <div class="d-flex  flex-row item-nav" >
                           
                            <a href="/admin" class="p-0 h6">
                                <i class="bi bi-grid " ></i>
                                Dashboard</a>
                        </div>
        
                        <div class="li-menu">

<p class="" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Administração
    <i class="bi bi-caret-down"></i>
</p>
 </p>
 <div class="collapse" id="collapseExample">
 
     <ul class="dropdown-menu card sub-menu-dropdown">
      <li class="dropdown-item">
      <a href="/admin/usuario/listar" class="p-1 h6">
                                <i class="bi bi-people p-1"></i>
                                Usuários</a>
      </li>
      <li class="dropdown-item">
      <a href="/admin/vaga/listar" class="p-1 h6">
                                <i class="bi bi-person-vcard p-1"></i>
                                Vagas</a>
      </li>
         <li class="dropdown-item">
         <a href="/admin/empresa/listar" class="p-1 h6">
                                <i class="bi bi-buildings p-1"></i>
                                Empresas</a>
         </li>
     </ul> 
 </div>

</div>


<div class="li-menu">

<p class="" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDenuncia" aria-expanded="false" >
</a> Denuncias<span class="badge text-bg-danger m-1"> </span>
    <i class="bi bi-caret-down"></i>
</p>
 </p>
 <div class="collapse" id="collapseDenuncia">
 
     <ul class="dropdown-menu card sub-menu-dropdown">
      <li class="dropdown-item t p-0">
      <a href="/admin/denuncia/usuario" class="p-1 h6">
                                <i class="bi bi-people p-1"></i>
                                Usuários <span class="badge text-bg-danger p-1"></span></a>
      </li>
      <li class="dropdown-item p-0">
      <a href="/admin/vaga/listar" class="p-1 h6">
                                <i class="bi bi-person-vcard p-1"></i>
                                Vagas</a>
      </li>
         <li class="dropdown-item p-0">
         <a href="/admin/empresa/listar" class="p-1 h6">
                                <i class="bi bi-buildings p-1"></i>
                                Empresas</a>
         </li>
     </ul> 
 </div>

</div>




<div class="li-menu">

<p class="" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAdm" aria-expanded="false" aria-controls="#collapseAdm">
    Gerenciar ADM
    <i class="bi bi-caret-down"></i>
</p>
 </p>
 <div class="collapse" id="collapseAdm">
 
     <ul class="dropdown-menu card sub-menu-dropdown">
      <li class="dropdown-item">
      <a href="/admin/cadastrar" class="p-0 h6">
                                <i class="bi bi-people p-0"></i>
                                Criar Admin.</a>
      </li>

      <li class="dropdown-item">
      <a href="/admin/cadastrar" class="p-0 h6">
                                <i class="bi bi-people p-0"></i>
                                listagem</a>
      </li>
     </ul> 
 </div>

</div>


                        <div class="d-flex item-nav-logout">
                        
                      <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="p-1 h6" style="background-color: transparent; border:none">
                        <i class="bi bi-door-open"></i>Sair
                      </button>
                      </form>
                
                        </div>

                    
                    </div>
        
        

        </div>
                
            </aside>
  <div class="col-9 mt-4">
    <div class="container md-4 mt-3">



        <table class="table table-striped m-0 table-user" id="myTable" >
          <thead class="table-light">
            <tr>
              <th class="fw-bold">Id</th>
              <th class="fw-bold">Usuário</th>
           
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
           
          
    @forelse($denuncias as $denuncia)
    <tr class="table-danger blink" id="denuncia-{{ $denuncia->idDenunciaUsuario }}">
    <td>{{ $denuncia->idDenunciaUsuario }}</td>
    <td>
        <a href="{{ route('denuncia.show', $denuncia->idDenunciaUsuario ) }}" class="visualizar-link">
            {{ $denuncia->usuario->nomeUsuario }}
        </a>
    </td>

    <td>{{ $denuncia->status->tipoStatus ?? 'Não Associado' }}</td>
    <td>


<i class="bi bi-info-circle fs-6  pe-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
 


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sobre denúncias</h5> <i class="bi bi-megaphone-fill text-danger fs-5 ps-1"></i>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
    <h5 class="alert-heading">Atenção!</h5>
    <p>
        Esta seção é dedicada ao monitoramento de denúncias de usuários. Aqui, você pode visualizar os relatos de comportamentos inadequados ou abusivos dentro da plataforma. É fundamental que todas as denúncias sejam tratadas com seriedade e imparcialidade.
    </p>
  <ul>
    <li><span class="fw-bold">Denunciado:</span> {{ $denuncia->usuario->nomeUsuario }}</li>
    <li><span class="fw-bold">Data da denúncia:</span> {{ $denuncia->created_at }}</li>
  </ul>
</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary">Salvar mudanças</button>
            </div>
        </div>
    </div>
</div>

        <form action="{{ route('usuarios.aprovar', $denuncia->usuario->idUsuario) }}" method="POST" class="d-inline">
                    @csrf
                    @method('POST')
                    <button onclick="return confirm('Realmente deseja aprovar esse usuário?')" type="submit" class="btn btn-outline-success btn-sm"><span class="bi bi-check2"></span>&nbsp;Reativar</button>
                  </form>
    </td>
</tr>







          


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




    document.addEventListener('DOMContentLoaded', function() {
            // Todas as linhas com a classe table-danger já têm a classe blink aplicada
            const rows = document.querySelectorAll('tr.table-danger');
    rows.forEach(row => {
        row.classList.add('blink'); 
        });
;
});

</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>

