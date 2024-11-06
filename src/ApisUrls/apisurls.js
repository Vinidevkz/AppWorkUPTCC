// ApisUrls.js
const ApisUrls = {
  //login
  apiNgrok: "http://cff4-200-53-195-156.ngrok-free.app/api/usuario/login",
  apiEmulador: "http://10.0.2.2:8000/api/usuario/login",
  apiNgrokUsuario: "http://cff4-200-53-195-156.ngrok-free.app/api/usuario/",
  apiEmuladorUsuario: "http://10.0.2.2:8000/api/usuario/",
  apiNgrokAlterar: "",
  //cadastro
  apiNgrokCad: "http://cff4-200-53-195-156.ngrok-free.app/api/usuario",
  apiEmuladorCad: "http://10.0.2.2:8000/api/usuario",
  //pegar vagas
  apiNgrokVaga: "http://cff4-200-53-195-156.ngrok-free.app/api/vagaApp/",
  apiEmuladorVaga: "http://10.0.2.2:8000/api/vagaApp/",
  //pegar area de interesse
  apiNgrokArea: "http://cff4-200-53-195-156.ngrok-free.app/api/areavaga",
  apiEmuladorArea: "http://10.0.2.2:8000/api/areavaga",
  //pegar id
  apiNgrokId: "http://cff4-200-53-195-156.ngrok-free.app/api/usuario/",
  apiEmuladorId: "http://10.0.2.2:8000/api/usuario/",

  //pesquisa
  apiEmuladorVagaPesquisa: "http://10.0.2.2:8000/api/vaga/busca/",
  apiNgrokVagaPesquisa:
    "http://cff4-200-53-195-156.ngrok-free.app/api/vaga/busca/",

  //usuario se candidatar
  apiEmuladorUsuarioVaga: "http://10.0.2.2:8000/api/vagaUsuario",
  apiNgrokUsuarioVaga:
    "http://cff4-200-53-195-156.ngrok-free.app/api/vagaUsuario",
  apiNgrokVerificarCandidatura: "http://cff4-200-53-195-156.ngrok-free.app/api/verificarCandidatura/",
  apiEmuladorVerificarCandidatura: "http://10.0.2.2:8000/api/verificarCandidatura/",
  
  apiEmuladorUsuarioVagaCancelar: "http://10.0.2.2:8000/api/vagaUsuario",
  apiNgrokUsuarioVagaCancelar:
    "http://cff4-200-53-195-156.ngrok-free.app/api/vagaUsuario",

    
  //Salvar, cancelar e pegar salvamento da vaga

  apiEmuladorSalvarVaga: "http://10.0.2.2:8000/api/salvarVaga/",
  apiNgrokSalvarVaga:
    "http://cff4-200-53-195-156.ngrok-free.app/api/salvarVaga/",

    apiEmuladorCancelSalvarVaga: "http://10.0.2.2:8000/api/salvarVaga/",
    apiNgrokCancelSalvarVaga:
      "http://cff4-200-53-195-156.ngrok-free.app/api/salvarVaga/",

    apiEmuladorPegarVagasSalvas: "http://10.0.2.2:8000/api/salvarVaga",
    apiNgrokPegarVagasSalvas:
        "http://cff4-200-53-195-156.ngrok-free.app/api/salvarVaga",

    apiNgrokVerificarSalvarVaga: "http://cff4-200-53-195-156.ngrok-free.app/api/verificarSalvarVaga",


    //Urls Empresa
    apiNgrokEmpresa: "http://cff4-200-53-195-156.ngrok-free.app/api/showempresa/",
    apiEmuladorEmpresa: "http://10.0.2.2:8000/api/showempresa/",

    //Urls Linguas
    apiEmuladorLinguas: "http://10.0.2.2:8000/api/linguas",
    apiNgrokLinguas: "http://cff4-200-53-195-156.ngrok-free.app/api/linguas",

    //Urls Escolas
    apiEmuladorEscolas: "http://10.0.2.2:8000/api/escolas",
    apiNgrokEscolas: "http://cff4-200-53-195-156.ngrok-free.app/api/escolas",

    //Urls Denuncias
    apiNgrokDenunciarVaga: "http://cff4-200-53-195-156.ngrok-free.app/api/denunciarVaga",
    apiEmuladorDenunciarVaga: "http://10.0.2.2:8000/api/denunciarVaga",
    apiNgrokDenunciarEmpresa: "http://cff4-200-53-195-156.ngrok-free.app/api/denunciaempresa",
    apiEmuladorDenunciarEmpresa: "http://10.0.2.2:8000/api/denunciaempresa",

    //Urls ver candidaturas do usuario
    apiNgrokMinhasVagas: "http://cff4-200-53-195-156.ngrok-free.app/api/minhasvagas",
    apiEmuladorMinhasVagas: "http://10.0.2.2:8000/api/minhasvagas",

    //Urls ver vaga pro id da empresa
    apiNgrokVagaEmpresa: 'http://cff4-200-53-195-156.ngrok-free.app/api/showvagaempresa/',
    apiEmuladorVagaEmpresa: 'http://10.0.2.2:8000/api/showvagaempresa/',

    //Urls ver vaga baseado na área de interess
};

export default ApisUrls;
