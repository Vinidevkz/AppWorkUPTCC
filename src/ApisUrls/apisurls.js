// ApisUrls.js
const ApisUrls = {
  //login
  apiNgrok: "http://da58-200-53-199-247.ngrok-free.app/api/usuario/login",
  apiEmulador: "http://10.0.2.2:8000/api/usuario/login",
  apiNgrokUsuario: "http://da58-200-53-199-247.ngrok-free.app/api/usuario/",
  apiEmuladorUsuario: "http://10.0.2.2:8000/api/usuario/",
  apiNgrokAlterar: "",
  //cadastro
  apiNgrokCad: "http://da58-200-53-199-247.ngrok-free.app/api/usuario",
  apiEmuladorCad: "http://10.0.2.2:8000/api/usuario",
  //pegar vagas
  apiNgrokVaga: "http://da58-200-53-199-247.ngrok-free.app/api/vagaApp/",
  apiEmuladorVaga: "http://10.0.2.2:8000/api/vagaApp/",
  //pegar area de interesse
  apiNgrokArea: "http://da58-200-53-199-247.ngrok-free.app/api/areavaga",
  apiEmuladorArea: "http://10.0.2.2:8000/api/areavaga",
  //pegar id
  apiNgrokId: "http://da58-200-53-199-247.ngrok-free.app/api/usuario/",
  apiEmuladorId: "http://10.0.2.2:8000/api/usuario/",

  //pesquisa
  apiEmuladorVagaPesquisa: "http://10.0.2.2:8000/api/vaga/busca/",
  apiNgrokVagaPesquisa:
    "http://da58-200-53-199-247.ngrok-free.app/api/vaga/busca/",

  //usuario se candidatar
  apiEmuladorUsuarioVaga: "http://10.0.2.2:8000/api/vagaUsuario",
  apiNgrokUsuarioVaga:
    "http://da58-200-53-199-247.ngrok-free.app/api/vagaUsuario",
  apiNgrokVerificarCandidatura: "http://da58-200-53-199-247.ngrok-free.app/api/verificarCandidatura/",
  apiEmuladorVerificarCandidatura: "http://10.0.2.2:8000/api/verificarCandidatura/",
  
  apiEmuladorUsuarioVagaCancelar: "http://10.0.2.2:8000/api/vagaUsuario",
  apiNgrokUsuarioVagaCancelar:
    "http://da58-200-53-199-247.ngrok-free.app/api/vagaUsuario",

    
  //Salvar, cancelar e pegar salvamento da vaga

  apiEmuladorSalvarVaga: "http://10.0.2.2:8000/api/salvarVaga/",
  apiNgrokSalvarVaga:
    "http://da58-200-53-199-247.ngrok-free.app/api/salvarVaga/",

    apiEmuladorCancelSalvarVaga: "http://10.0.2.2:8000/api/salvarVaga/",
    apiNgrokCancelSalvarVaga:
      "http://da58-200-53-199-247.ngrok-free.app/api/salvarVaga/",

    apiEmuladorPegarVagasSalvas: "http://10.0.2.2:8000/api/salvarVaga",
    apiNgrokPegarVagasSalvas:
        "http://da58-200-53-199-247.ngrok-free.app/api/salvarVaga",

    apiNgrokVerificarSalvarVaga: "http://da58-200-53-199-247.ngrok-free.app/api/verificarSalvarVaga",


    //Urls Empresa
    apiNgrokEmpresa: "http://da58-200-53-199-247.ngrok-free.app/api/showempresa/",

    //Urls Linguas
    apiEmuladorLinguas: "http://10.0.2.2:8000/api/linguas",
    apiNgrokLinguas: "http://da58-200-53-199-247.ngrok-free.app/api/linguas",

    //Urls Escolas
    apiEmuladorEscolas: "http://10.0.2.2:8000/api/escolas",
    apiNgrokEscolas: "http://da58-200-53-199-247.ngrok-free.app/api/escolas",

    //Urls Denuncias
    apiNgrokDenunciarVaga: "http://da58-200-53-199-247.ngrok-free.app/api/denunciarVaga",

    //Urls ver candidaturas do usuario
    apiNgrokMinhasVagas: "http://da58-200-53-199-247.ngrok-free.app/api/minhasvagas"
};

export default ApisUrls;
