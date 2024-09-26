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

  <title>Administrador | Vagas</title>
</head>

<body>
<header class="">


<p class="text-light fs-4 fw-bold">Work<span class="verde">Up</span></p>
<div class="d-flex flex-row align-items-center justify-content-center">
  <div class="d-flex flex-column justify-content-center align-items-start p-2">
<p class="text-light text-adm p-0 m-0">Técnico - admin</p>
<p class="text-light text-adm m-0">WorkUp - Ti</p>
</div>
<div class="dropdown d-flex flex-row">
 <img src="{{url('assets/img/adminImages/perfil.png')}}" alt="" class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
 <span class="material-symbols-outlined text-light ">
keyboard_arrow_down
</span>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="#">Log out</a></li>
  </ul>
</div>
</div>


</header>


<div class="container-fluid">
  <div class="row">
  <div class="col-2">
      <div class="aside-container">
        <aside>
          <div class="aside-sidebar d-flex flex-column">

            <div class="d-flex">
              <a href="/admin" class="aside-active d-flex flex-row align-items-center h6">
                <span class="material-symbols-outlined p-2">grid_view</span>
                Dashboard
              </a>
            </div>

            <div class="d-flex">
              <a href="/verUsuario" class="d-flex flex-row align-items-center h6">
                <span class="material-symbols-outlined p-2">person</span>
                Usuários
              </a>
            </div>

            <div class="d-flex">
              <a href="/verVaga" class="d-flex flex-row align-items-center h6">
                <span class="material-symbols-outlined p-2">work</span>
                Vagas
              </a>
            </div>

            <div class="d-flex">
              <a href="/verEmpresa" class="d-flex flex-row align-items-center h6">
                <span class="material-symbols-outlined p-2">apartment</span>
                Empresas
              </a>
            </div>

            <div class="">
              <a href="/infoAdmin" class="d-flex flex-row align-items-center h6">
              <span class="material-symbols-outlined p-2">info</span>
                Info
              </a>
            </div>

            <div class="d-flex">
              <a href="/SuporteAdmin" class="d-flex flex-row align-items-center h6" id="btn-support">
                <span class="material-symbols-outlined p-2">info</span>
                Suporte
              </a>
            </div>

            <div class="d-flex">
              <a href="" class="d-flex flex-row align-items-center h6" id="btn-exit">
                <span class="material-symbols-outlined p-2">logout</span>
                Sair
              </a>
            </div>
        </aside>
      </div>
    </div>

    <div class="col-md-9">

    <div class="">
        <ul class="nav-list list-group list-group-horizontal list-none p-2">
          <li class="p-1 d-flex flex-row justify-content-center"><span class="material-symbols-outlined p-1">
grid_view
</span><a href="#" class="text-dark p-1">Dashboard</a></li>
          <li class="p-2">/</li>
          <li class="p-1 d-flex flex-row justify-content-center"><span class="material-symbols-outlined p-1">
person
</span><a href="#" class="text-dark p-1">Usuários</a></li>
<li class="p-2">/</li>
<li class="p-1 d-flex flex-row justify-content-center"> <span class="material-symbols-outlined">work</span><a href="#" class="text-dark p-1">Vagas</a></li>
        </ul>
      </div>
      <div class="container md-4">
      <div class="card mt-3" style="--bs-bg-opacity: .8;">
   
    <div class="">
        <table class="table table-striped m-0 table-user">
            <thead>
                <tr>
                    <th class="fw-bold">ID</th>
                    <th class="fw-bold">NOME</th>
                    <th>
                        <div class="d-flex align-items-center">
                            <span class="material-symbols-outlined">alternate_email</span>
                            <p class="m-0 fw-bold">E-MAIL</p>
                        </div>
                    </th>
                    @if(request()->has('order') && request()->order == 'status')
                    <th>
                        <a href="{{ route('vagas.index') }}" class="btn btn-outline-primary">Status</a>
                    </th>
                    @else
                    <th>
                      <div class="d-flex flex-row align-items-center justify-content-center p-0">
                        <a href="{{ route('vagas.index', ['order' => 'status']) }}" class="btn btn-outline-primary d-flex flex-row p-1" style="border-radius: 0;" >
                        <span class="material-symbols-outlined">
filter_list
</span>  
<p class="p-0 m-0">Status
</p>                     
</a>
</div>
                    </th>
                    @endif
                    <th>
                        <div class="d-flex btn-acoes align-items-center">
                            <span class="material-symbols-outlined">keyboard_double_arrow_down</span>
                            <p class="m-0 fw-bold">Ações</p>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($vagas as $v) <!-- Usando um alias diferente -->
                <tr>
                    <td>{{ $v->idVaga }}</td>
                    <td>{{ $v->nomeVaga }}</td>
                    <td>{{ $v->modalidadeVaga }}</td>
                    <td>{{ $v->status->tipoStatus }}</td>
                    <td>
                        <a href="{{ route('vagas.show', $v->idVaga) }}" class="btn btn-outline-secondary btn-sm"><span class="bi-eye-fill"></span>&nbsp; Visualizar</a>
                        <a href="{{ route('vagas.edit', $v->idVaga) }}" class="btn btn-outline-success btn-sm"><span class="bi-pencil-fill"></span>&nbsp;Editar</a>
                        <form action="{{ route('vagas.delete', $v->idVaga) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Realmente deseja excluir esse usuário?')" type="submit" class="btn btn-outline-danger btn-sm"><span class="bi-trash-fill"></span>&nbsp;Deletar</button>
                        </form>

                        <form action="{{ route('vagas.aprovar', $v->idVaga) }}" method="POST" class="d-inline">
                            @csrf
                            @method('Post')
                            <button onclick="return confirm('Realmente deseja aprovar essa vaga?')" type="submit" class="btn btn-outline-danger btn-sm"><span class="bi-trash-fill"></span>&nbsp;Aprovar</button>
                        </form>
                        
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">Nenhum usuário encontrado.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>



          <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
           
           <!-- \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\ -->
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
