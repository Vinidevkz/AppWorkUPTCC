// ApisUrls.js
const ApisUrls = {
  //login
  apiNgrok: "http://157e-200-53-198-206.ngrok-free.app/api/usuario/login",
  apiEmulador: "http://10.0.2.2:8000/api/usuario/login",
  apiNgrokUsuario: "http://157e-200-53-198-206.ngrok-free.app/api/usuario/",
  apiEmuladorUsuario: "http://10.0.2.2:8000/api/usuario/",
  apiNgrokAlterar: "",
  //cadastro
  apiNgrokCad: "http://157e-200-53-198-206.ngrok-free.app/api/usuario",
  apiEmuladorCad: "http://10.0.2.2:8000/api/usuario",
  //pegar vagas
  apiNgrokVaga: "http://157e-200-53-198-206.ngrok-free.app/api/vagaApp/",
  apiEmuladorVaga: "http://10.0.2.2:8000/api/vagaApp/",
  //pegar area de interesse
  apiNgrokArea: "http://157e-200-53-198-206.ngrok-free.app/api/areavaga",
  apiEmuladorArea: "http://10.0.2.2:8000/api/areavaga",
  //pegar id
  apiNgrokId: "http://157e-200-53-198-206.ngrok-free.app/api/usuario/",
  apiEmuladorId: "http://10.0.2.2:8000/api/usuario/",

  //pesquisa
  apiEmuladorVagaPesquisa: "http://10.0.2.2:8000/api/vaga/busca/",
  apiNgrokVagaPesquisa:
    "http://157e-200-53-198-206.ngrok-free.app/api/vaga/busca/",

  //usuario se candidatar
  apiEmuladorUsuarioVaga: "http://10.0.2.2:8000/api/vagaUsuario",
  apiNgrokUsuarioVaga:
    "http://157e-200-53-198-206.ngrok-free.app/api/vagaUsuario",
  apiNgrokVerificarCandidatura: "http://157e-200-53-198-206.ngrok-free.app/api/verificarCandidatura/",
  apiEmuladorVerificarCandidatura: "http://10.0.2.2:8000/api/verificarCandidatura/",
  
  apiEmuladorUsuarioVagaCancelar: "http://10.0.2.2:8000/api/vagaUsuario",
  apiNgrokUsuarioVagaCancelar:
    "http://157e-200-53-198-206.ngrok-free.app/api/vagaUsuario",

    
  //Salvar, cancelar e pegar salvamento da vaga

  apiEmuladorSalvarVaga: "http://10.0.2.2:8000/api/salvarVaga/",
  apiNgrokSalvarVaga:
    "http://157e-200-53-198-206.ngrok-free.app/api/salvarVaga/",

    apiEmuladorCancelSalvarVaga: "http://10.0.2.2:8000/api/salvarVaga/",
    apiNgrokCancelSalvarVaga:
      "http://157e-200-53-198-206.ngrok-free.app/api/salvarVaga/",

    apiEmuladorPegarVagasSalvas: "http://10.0.2.2:8000/api/salvarVaga",
    apiNgrokPegarVagasSalvas:
        "http://157e-200-53-198-206.ngrok-free.app/api/salvarVaga",

    apiNgrokVerificarSalvarVaga: "http://157e-200-53-198-206.ngrok-free.app/api/verificarSalvarVaga",


    //Urls Empresa
    apiNgrokEmpresa: "http://157e-200-53-198-206.ngrok-free.app/api/showempresa/",
    apiEmuladorEmpresa: "http://10.0.2.2:8000/api/showempresa/",

    //Urls Linguas
    apiEmuladorLinguas: "http://10.0.2.2:8000/api/linguas",
    apiNgrokLinguas: "http://157e-200-53-198-206.ngrok-free.app/api/linguas",

    //Urls Escolas
    apiEmuladorEscolas: "http://10.0.2.2:8000/api/escolas",
    apiNgrokEscolas: "http://157e-200-53-198-206.ngrok-free.app/api/escolas",

    //Urls Denuncias
    apiNgrokDenunciarVaga: "http://157e-200-53-198-206.ngrok-free.app/api/denunciarVaga",
    apiEmuladorDenunciarVaga: "http://10.0.2.2:8000/api/denunciarVaga",
    apiNgrokDenunciarEmpresa: "http://157e-200-53-198-206.ngrok-free.app/api/denunciaempresa",
    apiEmuladorDenunciarEmpresa: "http://10.0.2.2:8000/api/denunciaempresa",

    //Urls ver candidaturas do usuario
    apiNgrokMinhasVagas: "http://157e-200-53-198-206.ngrok-free.app/api/minhasvagas",
    apiEmuladorMinhasVagas: "http://10.0.2.2:8000/api/minhasvagas",

    //Urls ver vaga pro id da empresa
    apiNgrokVagaEmpresa: 'http://157e-200-53-198-206.ngrok-free.app/api/showvagaempresa/',
    apiEmuladorVagaEmpresa: 'http://10.0.2.2:8000/api/showvagaempresa/',

    //Urls ver vaga baseado na área de interesse
    apiEmuladorVagaPorArea: 'http://10.0.2.2:8000/api/vagaporarea',
    apiNgrokVagaPorArea: 'http://157e-200-53-198-206.ngrok-free.app/api/vagaporarea',
    

    //Urls ver vaga baseado na área de interesse
    apiEmuladorOutrasVagas: 'http://10.0.2.2:8000/api/outrasvagas',
    apiNgrokOutrasVagas: 'http://157e-200-53-198-206.ngrok-free.app/api/outrasvagas',

    //Urls Notificacoes
    apiNgrokNotificacoes: 'http://157e-200-53-198-206.ngrok-free.app/api/notificacoes',
    apiEmuladorNotificacoes: 'http://10.0.2.2:8000/api/notificacoes',

    //Urls chats
    apiNgrokChats: 'http://157e-200-53-198-206.ngrok-free.app/api/chatsusuario',
    apiEmuladorChats: 'http://10.0.2.2:8000:/api/chatsusuario ',

    //Urls Mensagens
    apiNgrokMensagens: 'http://157e-200-53-198-206.ngrok-free.app/api/mensagens',
    apiEmuladorMensagens: 'http://10.0.2.2:8000/api/mensagens',

    apiNgrokMandarMensagem: 'http://157e-200-53-198-206.ngrok-free.app/api/mandarMensagem',
    apiEmuladorMandarMensagem: 'http://10.0.2.2:8000/api/mandarMensagem',
};

export default ApisUrls;
