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
@include('components.asideAdmin')
            </aside>
  <div class="col-9 mt-4">
    <div class="container md-4 mt-3">

      <div class="d-flex  align-items-center">
<h1 class="p-0 m-0 fs-3">Usuários denunciados</h1>
<i class="bi bi-ban ms-2 text-danger fs-4"></i>
</div>

<div class="">
<div class="">
<table class="table table-hover  text-center align-middle">
          <thead class="table-light rounded-top">
            <tr>
              <th class="fw-bold">Id</th>
              <th class="fw-bold">Usuário</th>
              <th>Data da denúncia</th>
        
              <th>
                <div class="d-flex justify-content-center align-items-center">
                  <span class="material-symbols-outlined">keyboard_double_arrow_down</span>
                  <p class="m-0 fw-bold ms-1">Mais informações</p>
                </div>
              </th>
            </tr>
          </thead>
          <tbody>
   
              @forelse($denuncias as $denuncia)
                <tr class="" id="denuncia-{{ $denuncia->idDenunciaUsuario }}">
                  <td class="blink align-middle">{{ $denuncia->idDenunciaUsuario }}</td>
                  <td class="align-middle">
                  <!-- {{ route('denunciaUsuario.show', $denuncia->idDenunciaUsuario ) }} -->
                    <a href="#" class="text-black fw-bold">
                      {{ $denuncia->usuario->nomeUsuario }}
                    </a>
                  </td>
                  <td class="align-middle">{{ $denuncia->created_at }}</td>
          
             
          
                  <td class="p-0">
                    <i class="bi bi-info-circle fs-6 pe-2 text-warning" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
          
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sobre denúncias</h5>
                            <i class="bi bi-megaphone-fill text-danger fs-5 ps-1"></i>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body d-flex flex-column">
                            <h5 class="alert-heading">Atenção!</h5>
                            <p class="">
                              Esta seção é dedicada ao monitoramento de denúncias de usuários. Aqui, você pode visualizar os relatos de comportamentos inadequados ou abusivos dentro da plataforma. É fundamental que todas as denúncias sejam tratadas com seriedade e imparcialidade.
                            </p>
                              <p><span class="fw-bold">Denunciado:</span> {{ $denuncia->usuario->nomeUsuario }}</p>
                             <p>Motivo da denúncia: {{$denuncia->motivo}}</p>
                          </div>
                          <div class="modal-footer">
                          <a href="mailto:?subject=Advertência%20de%20comportamento inadequado&body=Este é um e-mail automárico da empresa: WorkUp%20%20por favor, não responda.">
    <button type="button" class="btn btn-outline-primary">Advertência</button>
</a>
                            <button type="button" class="btn btn-outline-danger">Tomar ação</button>
                          </div>
                        </div>
                      </div>
                    </div>
          
                    <form action="{{ route('usuarios.aprovar', $denuncia->usuario->idUsuario) }}" method="POST" class="d-inline">
                      @csrf
                      @method('POST')
                   
                    </form>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" class="text-center align-middle">Nenhum usuário encontrado.</td>
                </tr>
              @endforelse
          </tbody>
        </table>

  </div>
        </div>
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

