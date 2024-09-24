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
<nav class="navbar">
  <div class="d-flex align-items-center justify-content-center">
    <a class="navbar-brand text-light" href="#">Work<span class="verde">Up</span></a>
  </div>
</nav>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
      <div class="aside-container container">
        <aside>
          <div class="aside-sidebar">
            <a href="index.php" class="aside-active">
              <span class="material-symbols-outlined">grid_view</span>
              <h3>Dashboard</h3>
            </a>
            <a href="/verUsuario">
              <span class="material-symbols-outlined">person</span>
              <h3>Usuários</h3>
            </a>
            <a href="./verVaga">
              <span class="material-symbols-outlined">work</span>
              <h3>Vagas</h3>
            </a>
            <a href="/verEmpresa">
              <span class="material-symbols-outlined">apartment</span>
              <h3>Empresas</h3>
            </a>
            <a href="">
              <span class="material-symbols-outlined">settings</span>
              <h3>Configurações</h3>
            </a>
            <a href="">
              <span class="material-symbols-outlined">info</span>
              <h3>Suporte</h3>
            </a>
            <a href="">
              <span class="material-symbols-outlined">logout</span>
              <h3>Sair</h3>
            </a>
          </div>
        </aside>
      </div>
    </div>

    <div class="col-md-9">
      <div class="container md-4">
        <div class="card bg-dark" style="--bs-bg-opacity: .8;">
          <div class="card-header">
            <h1>Empresas <span class="bi bi-people"></span></h1>
            <a href="/cadastrarEmpresa" class="btn btn-outline-info float-end"><span class="bi bi-plus-circle"></span>&nbsp;Acho que pode tirar</a>
            <a href="/Area" class="btn btn-outline-info float-end"><span class="bi bi-plus-circle"></span>&nbsp;cadastrar Area precisa ficar em outro lugar</a>
          </div>
          <div class="card-body">

            <table class="table table-dark table-striped">
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
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="4">Nenhuma Empresa encontrado.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
