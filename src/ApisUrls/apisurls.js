// ApisUrls.js
const ApisUrls = {
  //login
  apiNgrok: "http://3775-200-53-197-92.ngrok-free.app/api/usuario/login",
  apiEmulador: "http://10.0.2.2:8000/api/usuario/login",
  apiNgrokUsuario: "http://3775-200-53-197-92.ngrok-free.app/api/usuario/",
  apiEmuladorUsuario: "http://10.0.2.2:8000/api/usuario/",
  apiNgrokAlterar: "",
  //cadastro
  apiNgrokCad: "http://3775-200-53-197-92.ngrok-free.app/api/usuario",
  apiEmuladorCad: "http://10.0.2.2:8000/api/usuario",
  //pegar vagas
  apiNgrokVaga: "http://3775-200-53-197-92.ngrok-free.app/api/vagaApp/",
  apiEmuladorVaga: "http://10.0.2.2:8000/api/vagaApp/",
  //pegar area de interesse
  apiNgrokArea: "http://3775-200-53-197-92.ngrok-free.app/api/areavaga",
  apiEmuladorArea: "http://10.0.2.2:8000/api/areavaga",
  //pegar id
  apiNgrokId: "http://3775-200-53-197-92.ngrok-free.app/api/usuario/",
  apiEmuladorId: "http://10.0.2.2:8000/api/usuario/",

  //pesquisa
  apiEmuladorVagaPesquisa: "http://10.0.2.2:8000/api/vaga/busca/",
  apiNgrokVagaPesquisa:
    "http://3775-200-53-197-92.ngrok-free.app/api/vaga/busca/",

  //usuario se candidatar
  apiEmuladorUsuarioVaga: "http://10.0.2.2:8000/api/vagaUsuario",
  apiNgrokUsuarioVaga:
    "http://3775-200-53-197-92.ngrok-free.app/api/vagaUsuario",
  apiNgrokVerificarCandidatura: "http://3775-200-53-197-92.ngrok-free.app/api/verificarCandidatura/",
  apiEmuladorVerificarCandidatura: "http://10.0.2.2:8000/api/verificarCandidatura/",
  
  apiEmuladorUsuarioVagaCancelar: "http://10.0.2.2:8000/api/vagaUsuario",
  apiNgrokUsuarioVagaCancelar:
    "http://3775-200-53-197-92.ngrok-free.app/api/vagaUsuario",

    
  //Salvar, cancelar e pegar salvamento da vaga

  apiEmuladorSalvarVaga: "http://10.0.2.2:8000/api/salvarVaga/",
  apiNgrokSalvarVaga:
    "http://3775-200-53-197-92.ngrok-free.app/api/salvarVaga/",

    apiEmuladorCancelSalvarVaga: "http://10.0.2.2:8000/api/salvarVaga/",
    apiNgrokCancelSalvarVaga:
      "http://3775-200-53-197-92.ngrok-free.app/api/salvarVaga/",

    apiEmuladorPegarVagasSalvas: "http://10.0.2.2:8000/api/salvarVaga",
    apiNgrokPegarVagasSalvas:
        "http://3775-200-53-197-92.ngrok-free.app/api/salvarVaga",

    apiNgrokVerificarSalvarVaga: "http://3775-200-53-197-92.ngrok-free.app/api/verificarSalvarVaga",


    //Urls Empresa
    apiNgrokEmpresa: "http://3775-200-53-197-92.ngrok-free.app/api/showempresa/",

    //Urls Linguas
    apiEmuladorLinguas: "http://10.0.2.2:8000/api/linguas",
    apiNgrokLinguas: "http://3775-200-53-197-92.ngrok-free.app/api/linguas",

    //Urls Escolas
    apiEmuladorEscolas: "http://10.0.2.2:8000/api/escolas",
    apiNgrokEscolas: "http://3775-200-53-197-92.ngrok-free.app/api/escolas",

    //Urls Denuncias
    apiNgrokDenunciarVaga: "http://3775-200-53-197-92.ngrok-free.app/api/denunciarVaga",

    //Urls ver candidaturas do usuario
    apiNgrokMinhasVagas: "http://3775-200-53-197-92.ngrok-free.app/api/minhasvagas"
};

export default ApisUrls;
