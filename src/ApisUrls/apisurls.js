// ApisUrls.js
const ApisUrls = {
  //login
  apiNgrok: "6eaf-2804-388-c346-3f35-1c6b-e2e1-f374-b115.ngrok-free.app/api/usuario/login",
  apiEmulador: "http://10.0.2.2:8000/api/usuario/login",
  apiNgrokUsuario: "6eaf-2804-388-c346-3f35-1c6b-e2e1-f374-b115.ngrok-free.app/api/usuario/",
  apiEmuladorUsuario: "http://10.0.2.2:8000/api/usuario/",
  apiNgrokAlterar: "",
  //cadastro
  apiNgrokCad: "6eaf-2804-388-c346-3f35-1c6b-e2e1-f374-b115.ngrok-free.app/api/usuario",
  apiEmuladorCad: "http://10.0.2.2:8000/api/usuario",
  //pegar vagas
  apiNgrokVaga: "6eaf-2804-388-c346-3f35-1c6b-e2e1-f374-b115.ngrok-free.app/api/vagaApp/",
  apiEmuladorVaga: "http://10.0.2.2:8000/api/vagaApp/",
  //pegar area de interesse
  apiNgrokArea: "6eaf-2804-388-c346-3f35-1c6b-e2e1-f374-b115.ngrok-free.app/api/areavaga",
  apiEmuladorArea: "http://10.0.2.2:8000/api/areavaga",
  //pegar id
  apiNgrokId: "6eaf-2804-388-c346-3f35-1c6b-e2e1-f374-b115.ngrok-free.app/api/usuario/",
  apiEmuladorId: "http://10.0.2.2:8000/api/usuario/",

  //pesquisa
  apiEmuladorVagaPesquisa: "http://10.0.2.2:8000/api/vaga/busca/",
  apiNgrokVagaPesquisa:
    "6eaf-2804-388-c346-3f35-1c6b-e2e1-f374-b115.ngrok-free.app/api/vaga/busca/",

  //usuario se candidatar
  apiEmuladorUsuarioVaga: "http://10.0.2.2:8000/api/vagaUsuario",
  apiNgrokUsuarioVaga:
    "6eaf-2804-388-c346-3f35-1c6b-e2e1-f374-b115.ngrok-free.app/api/vagaUsuario",
  apiNgrokVerificarCandidatura: "6eaf-2804-388-c346-3f35-1c6b-e2e1-f374-b115.ngrok-free.app/api/verificarCandidatura/",
  apiEmuladorVerificarCandidatura: "http://10.0.2.2:8000/api/verificarCandidatura/",
  
  apiEmuladorUsuarioVagaCancelar: "http://10.0.2.2:8000/api/vagaUsuario",
  apiNgrokUsuarioVagaCancelar:
    "6eaf-2804-388-c346-3f35-1c6b-e2e1-f374-b115.ngrok-free.app/api/vagaUsuario",

    
  //Salvar, cancelar e pegar salvamento da vaga

  apiEmuladorSalvarVaga: "http://10.0.2.2:8000/api/salvarVaga/",
  apiNgrokSalvarVaga:
    "6eaf-2804-388-c346-3f35-1c6b-e2e1-f374-b115.ngrok-free.app/api/salvarVaga/",

    apiEmuladorCancelSalvarVaga: "http://10.0.2.2:8000/api/salvarVaga/",
    apiNgrokCancelSalvarVaga:
      "6eaf-2804-388-c346-3f35-1c6b-e2e1-f374-b115.ngrok-free.app/api/salvarVaga/",

    apiEmuladorPegarVagasSalvas: "http://10.0.2.2:8000/api/salvarVaga",
    apiNgrokPegarVagasSalvas:
        "6eaf-2804-388-c346-3f35-1c6b-e2e1-f374-b115.ngrok-free.app/api/salvarVaga",

    apiNgrokVerificarSalvarVaga: "6eaf-2804-388-c346-3f35-1c6b-e2e1-f374-b115.ngrok-free.app/api/verificarSalvarVaga",


    //Urls Empresa
    apiNgrokEmpresa: "6eaf-2804-388-c346-3f35-1c6b-e2e1-f374-b115.ngrok-free.app/api/showempresa/",
    apiEmuladorEmpresa: "http://10.0.2.2:8000/api/showempresa/",

    //Urls Linguas
    apiEmuladorLinguas: "http://10.0.2.2:8000/api/linguas",
    apiNgrokLinguas: "6eaf-2804-388-c346-3f35-1c6b-e2e1-f374-b115.ngrok-free.app/api/linguas",

    //Urls Escolas
    apiEmuladorEscolas: "http://10.0.2.2:8000/api/escolas",
    apiNgrokEscolas: "6eaf-2804-388-c346-3f35-1c6b-e2e1-f374-b115.ngrok-free.app/api/escolas",

    //Urls Denuncias
    apiNgrokDenunciarVaga: "6eaf-2804-388-c346-3f35-1c6b-e2e1-f374-b115.ngrok-free.app/api/denunciarVaga",
    apiEmuladorDenunciarVaga: "http://10.0.2.2:8000/api/denunciarVaga",
    apiNgrokDenunciarEmpresa: "6eaf-2804-388-c346-3f35-1c6b-e2e1-f374-b115.ngrok-free.app/api/denunciaempresa",
    apiEmuladorDenunciarEmpresa: "http://10.0.2.2:8000/api/denunciaempresa",

    //Urls ver candidaturas do usuario
    apiNgrokMinhasVagas: "6eaf-2804-388-c346-3f35-1c6b-e2e1-f374-b115.ngrok-free.app/api/minhasvagas",
    apiEmuladorMinhasVagas: "http://10.0.2.2:8000/api/minhasvagas",

    //Urls ver vaga pro id da empresa
    apiNgrokVagaEmpresa: '6eaf-2804-388-c346-3f35-1c6b-e2e1-f374-b115.ngrok-free.app/api/showvagaempresa/',
    apiEmuladorVagaEmpresa: 'http://10.0.2.2:8000/api/showvagaempresa/',

    //Urls ver vaga baseado na área de interesse
    apiEmuladorVagaPorArea: 'http://10.0.2.2:8000/api/vagaporarea',
    apiNgrokVagaPorArea: '6eaf-2804-388-c346-3f35-1c6b-e2e1-f374-b115.ngrok-free.app/api/vagaporarea',
    

    //Urls ver vaga baseado na área de interesse
    apiEmuladorOutrasVagas: 'http://10.0.2.2:8000/api/outrasvagas',
    apiNgrokOutrasVagas: '6eaf-2804-388-c346-3f35-1c6b-e2e1-f374-b115.ngrok-free.app/api/outrasvagas'
};

export default ApisUrls;
