<aside class="col-2 p-4">
                <div class="aside-section">

                    <!-- CABEÇALHO DO ASIDE -->
                    <div class="header-aside d-flex flex-column align-items-center justify-content-center">
                        <div class="img-header d-flex align-items-center justify-content-center">
    <img src="/assets/img/perfil/admin/{{ $admin->fotoAdmin }}" class="img-header" alt="Imagem de perfil" data-bs-toggle="modal" data-bs-target="#imagemModal" style="cursor:pointer;">
</div>

<!-- Modal Bootstrap -->
<div class="modal fade defocar-img-fundo" id="imagemModal" tabindex="" aria-labelledby="imagemModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content modal-fundo-cor">
      <div class="modal-body d-flex justify-content-center">
        <img src="/assets/img/perfil/admin/{{ $admin->fotoAdmin }}" class="img-fluid" alt="Imagem ampliada">
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
                        <div class="d-flex link-aside-active flex-row item-nav" >
                           
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
      <a href="{{ route('usuarios.index') }}" class="p-1 h6">
                                <i class="bi bi-people p-1"></i>
                                Usuários</a>
      </li>
      <li class="dropdown-item">
      <a href="{{ route('vagas.index') }}" class="p-1 h6">
                                <i class="bi bi-person-vcard p-1"></i>
                                Vagas</a>
      </li>
         <li class="dropdown-item">
         <a href="{{ route('empresas.index') }}" class="p-1 h6">
                                <i class="bi bi-buildings p-1"></i>
                                Empresas</a>
         </li>
     </ul> 
 </div>

</div>


<div class="li-menu">

<p class="" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDenuncia" aria-expanded="false" >
</a> Denuncias<span class="badge text-bg-danger m-1">{{ $dadosDenuncias['totalDenunciasGeral'] }}</span>
    <i class="bi bi-caret-down"></i>
</p>
 </p>
 <div class="collapse" id="collapseDenuncia">
 
     <ul class="dropdown-menu card sub-menu-dropdown">
      <li class="dropdown-item t p-0">
      <a href="{{ route('denunciar.usuario') }}" class="p-1 h6">
                                <i class="bi bi-people p-1"></i>
                                Usuários <span class="badge text-bg-danger p-1">{{ $dadosDenuncias['totalDenuncias'] }}</span></a>
      </li>
      <li class="dropdown-item p-0">
      <a href="{{ route('denunciar.vaga') }}" class="p-1 h6">
                                <i class="bi bi-person-vcard p-1"></i>
                                Vagas <span class="badge text-bg-danger p-1">{{ $dadosDenuncias['totalDenunciasVagas'] }}</span></a>
      </li>
         <li class="dropdown-item p-0">
         <a href="{{ route('denunciar.empresa') }}" class="p-1 h6">
                                <i class="bi bi-buildings p-1"></i>
                                Empresas <span class="badge text-bg-danger p-1">{{ $dadosDenuncias['totalDenunciasEmpresa'] }}</span></a>
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
      <a href="#" class="p-0 h6" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class="bi bi-people p-0"></i>
                                Criar Admin.</a>
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

            