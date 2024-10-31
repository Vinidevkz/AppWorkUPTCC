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

  <script>
                function goBack() {
            window.history.back()
        }
       
    </script>
</head>

<body>


<div class="row">
@include('components.asideAdmin')


  <div class="col-9 mt-4">
  <button onclick="goBack()" class="d-flex p-1 align-items-center m-0" style="background-color: transparent; border:none">
        <i class="bi bi-skip-backward p-2"></i>
        <p class="m-0">Voltar</p>
        </button>
    <div class="container md-4 mt-3">
      <h1 class="ms-2 fs-3">Áreas cadastradas</h1>

    <table class="table table-hover table-bordered text-center align-middle">
          <thead class="table-light rounded-top">
            <tr>
              <th class="fw-bold">Id</th>
              <th class="fw-bold">Área</th>
            </tr>
          </thead>
          <tbody>
   
              @forelse($areas as $area)
                <tr class="blink" id="denuncia-{{ $area->idArea }}">
                  <td class="align-middle">{{ $area->idArea }}</td>
                  <td class="align-middle">
               
                    <a href="#" class="text-black fw-bold">
                      {{ $area->nomeArea }}
                    </a>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" class="text-center align-middle">Nenhuma area encontrada.</td>
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

