<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.min.css"
  rel="stylesheet"
/>
<link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('assets/css/admin.css')}}">
    <title>Suporte - Dynamo</title>
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

<div class="row ">
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
              <a href="{{ route('usuarios.index') }}" class=" d-flex flex-row align-items-center h6">
                <span class="material-symbols-outlined p-2">person</span>
                Usuários
              </a>
            </div>

            <div class="d-flex mb-4">
              <a href="{{ route('vagas.index') }}" class=" d-flex flex-row align-items-center h6">
                <span class="material-symbols-outlined p-2">work</span>
                Vagas
              </a>
            </div>

            <div class="d-flex mb-4">
              <a href="{{ route('empresas.index') }}" class="d-flex flex-row align-items-center h6">
                <span class="material-symbols-outlined p-2">apartment</span>
                Empresas
              </a>
            </div>

            <div class="mb-4">
              <a href="/infoAdmin" class="asisde-sidebar-active d-flex flex-row align-items-center h6">
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
   
    <div class="col">
    <div class="row">

<div class="col">
    <h1 class="fs-1 fw-light">Baixe e instale ou reinstale o WorkUp App em seu dispositivo</h1>
   <p class="fw-light"> Versão Windows, macOS e Mobile disponíveis. <a href="#" class="link-underline-primary">Mais...</a> </p>
</div>
<div class="col-1"></div>
<div class="col">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <div class="d-flex flex-row justify-content-between">
            <h5 class="card-title fw-bold text-danger">Dynamo</h5> <button type="button" class="btn-close" aria-label="Close"></button>
            </div>
           
            <p class="card-text fs-5 fw-normal">Você foi convidado a explorar o WorkUp App gratuitamente</p>
            <a href="#" class="card-link">Saiba mais</a>
        </div>
    </div>
</div>

</div>

<div class="row">
<div class="col-8">
<h2 class="fs-3 fw-light">Pronto para começar?</h2>
<p class="fs-5 fw-light">Antes de prosseguir, verifique se o seu dispositivo atende aos requisitos do sistema. Se você já possui uma chave de acesso ou está reinstalando o app, pode avançar diretamente para a seção de login e baixar o WorkUp. Caso seja sua primeira instalação, alguns passos adicionais podem ser necessários. Expanda a seção "Saiba mais" para mais informações. </p>

<p class="fw-bold">Nosso suporte guiado pode ajudar com a instalação do WorkUp diretamente no seu navegador</p>
<button type="button" class="btn btn-outline-dark">Experimente o suporte guiado</button>

<br>




</div>
</div>

<div class="row">
<div class="col-8">
    <h2>Acesse sua conta para baixar e instalar o WorkUp App</h2>
    <div class="alert alert-secondary" role="alert">
    Dica: Receba suporte especializado com o Dynamo Assist. Conecte-se com nossos consultores para garantir que o WorkUp funcione para você e para toda a sua equipe. Saiba mais.
</div>


    <!-- Pills navs -->
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Instalar em um PC</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Instalar em um Mac</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Precisa de ajuda?</button>
        </li>
    </ul>
    <!-- Pills navs -->

    <!-- Pills content -->
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row">
                <div class="col">
                    <h4>Faça login para continuar</h2>

                    <ul>
                        <li>1. Acesse www.workup.com.br e, se ainda não estiver logado, clique em Entrar.
                        <div class="alert alert-secondary" role="alert">
                            <div class="row">
                                <div class="col">
                                    <p>Observação: Se você está utilizando o WorkUp Enterprise, faça login com sua conta corporativa.</p>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li>
                            <p>2. Entre com a conta associada à sua versão do WorkUp. A conta pode ser corporativa ou pessoal.</p> 
                        </li>
                        <li><p>3. Após o login, siga as instruções para baixar e instalar o WorkUp conforme seu sistema operacional.</p>
                    

                            <div class="row">
                                <div class="col">
                                    <h3 class="underline">Login com conta pessoal</h3>
                                    <hr class="border border-black opacity-25">
                                    <img src="{{url('assets/img/adminImages/appWuInstalacao.png')}}" alt="">

                                </div>
                                <div class="col">
                                    <h3 class="underline">Login com conta corporativa</h3>
                                    <hr class="border border-black opacity-25">
                                    <img src="{{url('assets/img/adminImages/appWuInstalacao.png')}}" alt="">

                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="row">
                <div class="col">
                    <h4>Faça login para continuar</h2>

                    <ul>
                        <li>1. Acesse www.workup.com.br e, se ainda não estiver logado, clique em Entrar.
                        <div class="alert alert-secondary" role="alert">
                            <div class="row">
                                <div class="col">
                                    <p>Observação: Se você está utilizando o WorkUp Enterprise, faça login com sua conta corporativa.</p>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li>
                            <p>2. Entre com a conta associada à sua versão do WorkUp. A conta pode ser corporativa ou pessoal.</p> 
                        </li>
                        <li><p>3. Após o login, siga as instruções para baixar e instalar o WorkUp conforme seu sistema operacional.</p>
                    

                            <div class="row">
                                <div class="col">
                                    <h3 class="underline">Login com conta pessoal</h3>
                                    <hr class="border border-black opacity-25">

                                    <img src="{{url('assets/img/adminImages/appWuInstalacao.png')}}" alt="">
                                </div>
                                <div class="col">
                                    <h3 class="underline">Login com conta corporativa</h3>
                                    <hr class="border border-black opacity-25">
                                    <img src="{{url('assets/img/adminImages/appWuInstalacao.png')}}" alt="">

                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        <div class="row">
                <div class="col">
                    <h4>Faça login para continuar</h2>

                    <ul>
                        <li>1. Acesse www.workup.com.br e, se ainda não estiver logado, clique em Entrar.
                        <div class="alert alert-secondary" role="alert">
                            <div class="row">
                                <div class="col">
                                    <p>Observação: Se você está utilizando o WorkUp Enterprise, faça login com sua conta corporativa.</p>
                                </div>
                            </div>
                        </div>
                        </li>
                        <li>
                            <p>2. Entre com a conta associada à sua versão do WorkUp. A conta pode ser corporativa ou pessoal.</p> 
                        </li>
                        <li><p>3. Após o login, siga as instruções para baixar e instalar o WorkUp conforme seu sistema operacional.</p>
                    

                            <div class="row">
                                <div class="col">
                                    <h3 class="underline">Login com conta pessoal</h3>
                                    <hr class="border border-black opacity-25">
                                    <img src="{{url('assets/img/adminImages/appWuInstalacao.png')}}" alt="">

                                </div>
                                <div class="col">
                                    <h3 class="underline">Login com conta corporativa</h3>
                                    <hr class="border border-black opacity-25">
                                    <img src="{{url('assets/img/adminImages/appWuInstalacao.png')}}" alt="">

                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Pills content -->
</div>

<div class="col">
    <img src="{{url('assets/images/installing-device.png')}}" class="img-fluid rounded mx-auto d-block" alt="...">
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
});
</script> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.umd.min.js"
></script>
</body>

</html>
