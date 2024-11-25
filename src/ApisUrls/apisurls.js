// ApisUrls.js
const ApisUrls = {
  //login
  apiNgrok: "http://ff75-200-53-199-197.ngrok-free.app/api/usuario/login",
  apiEmulador: "http://10.0.2.2:8000/api/usuario/login",
  apiNgrokUsuario: "https://ff75-200-53-199-197.ngrok-free.app/api/usuario/",
  apiEmuladorUsuario: "http://10.0.2.2:8000/api/usuario/",
  apiNgrokAlterar: "",
  //cadastro
  apiNgrokCad: "https://ff75-200-53-199-197.ngrok-free.app/api/usuario",
  apiEmuladorCad: "http://10.0.2.2:8000/api/usuario",
  //pegar vagas
  apiNgrokVaga: "https://ff75-200-53-199-197.ngrok-free.app/api/vagaApp/",
  apiEmuladorVaga: "http://10.0.2.2:8000/api/vagaApp/",
  //pegar area de interesse
  apiNgrokArea: "https://ff75-200-53-199-197.ngrok-free.app/api/areavaga",
  apiEmuladorArea: "http://10.0.2.2:8000/api/areavaga",
  //pegar id
  apiNgrokId: "https://ff75-200-53-199-197.ngrok-free.app/api/usuario/",
  apiEmuladorId: "http://10.0.2.2:8000/api/usuario/",

  //pesquisa
  apiEmuladorVagaPesquisa: "http://10.0.2.2:8000/api/vaga/busca/",
  apiNgrokVagaPesquisa:
    "https://ff75-200-53-199-197.ngrok-free.app/api/vaga/busca/",

  //usuario se candidatar
  apiEmuladorUsuarioVaga: "http://10.0.2.2:8000/api/vagaUsuario",
  apiNgrokUsuarioVaga:
    "https://ff75-200-53-199-197.ngrok-free.app/api/vagaUsuario",
  apiNgrokVerificarCandidatura: "https://ff75-200-53-199-197.ngrok-free.app/api/verificarCandidatura/",
  apiEmuladorVerificarCandidatura: "http://10.0.2.2:8000/api/verificarCandidatura/",
  
  apiEmuladorUsuarioVagaCancelar: "http://10.0.2.2:8000/api/vagaUsuario",
  apiNgrokUsuarioVagaCancelar:
    "https://ff75-200-53-199-197.ngrok-free.app/api/vagaUsuario",

    
  //Salvar, cancelar e pegar salvamento da vaga

  apiEmuladorSalvarVaga: "http://10.0.2.2:8000/api/salvarVaga/",
  apiNgrokSalvarVaga:
    "https://ff75-200-53-199-197.ngrok-free.app/api/salvarVaga/",

    apiEmuladorCancelSalvarVaga: "http://10.0.2.2:8000/api/salvarVaga/",
    apiNgrokCancelSalvarVaga:
      "https://ff75-200-53-199-197.ngrok-free.app/api/salvarVaga/",

    apiEmuladorPegarVagasSalvas: "http://10.0.2.2:8000/api/salvarVaga",
    apiNgrokPegarVagasSalvas:
        "https://ff75-200-53-199-197.ngrok-free.app/api/salvarVaga",

    apiNgrokVerificarSalvarVaga: "https://ff75-200-53-199-197.ngrok-free.app/api/verificarSalvarVaga",


    //Urls Empresa
    apiNgrokEmpresa: "https://ff75-200-53-199-197.ngrok-free.app/api/showempresa/",
    apiEmuladorEmpresa: "http://10.0.2.2:8000/api/showempresa/",

    //Urls Linguas
    apiEmuladorLinguas: "http://10.0.2.2:8000/api/linguas",
    apiNgrokLinguas: "https://ff75-200-53-199-197.ngrok-free.app/api/linguas",

    //Urls Escolas
    apiEmuladorEscolas: "http://10.0.2.2:8000/api/escolas",
    apiNgrokEscolas: "https://ff75-200-53-199-197.ngrok-free.app/api/escolas",

    //Urls Denuncias
    apiNgrokDenunciarVaga: "https://ff75-200-53-199-197.ngrok-free.app/api/denunciarVaga",
    apiEmuladorDenunciarVaga: "http://10.0.2.2:8000/api/denunciarVaga",
    apiNgrokDenunciarEmpresa: "https://ff75-200-53-199-197.ngrok-free.app/api/denunciaempresa",
    apiEmuladorDenunciarEmpresa: "http://10.0.2.2:8000/api/denunciaempresa",

    //Urls ver candidaturas do usuario
    apiNgrokMinhasVagas: "https://ff75-200-53-199-197.ngrok-free.app/api/minhasvagas",
    apiEmuladorMinhasVagas: "http://10.0.2.2:8000/api/minhasvagas",

    //Urls ver vaga pro id da empresa
    apiNgrokVagaEmpresa: 'https://ff75-200-53-199-197.ngrok-free.app/api/showvagaempresa/',
    apiEmuladorVagaEmpresa: 'http://10.0.2.2:8000/api/showvagaempresa/',

    //Urls ver vaga baseado na área de interesse
    apiEmuladorVagaPorArea: 'http://10.0.2.2:8000/api/vagaporarea',
    apiNgrokVagaPorArea: 'https://ff75-200-53-199-197.ngrok-free.app/api/vagaporarea',
    

    //Urls ver vaga baseado na área de interesse
    apiEmuladorOutrasVagas: 'http://10.0.2.2:8000/api/outrasvagas',
    apiNgrokOutrasVagas: 'https://ff75-200-53-199-197.ngrok-free.app/api/outrasvagas',

    //Urls Notificacoes
    apiNgrokNotificacoes: 'https://ff75-200-53-199-197.ngrok-free.app/api/notificacoes',
    apiEmuladorNotificacoes: 'http://10.0.2.2:8000/api/notificacoes',

    //Urls chats
    apiNgrokChats: 'https://ff75-200-53-199-197.ngrok-free.app/api/chatsusuario',
    apiEmuladorChats: 'http://10.0.2.2:8000:/api/chatsusuario ',

    //Urls Mensagens
    apiNgrokMensagens: 'https://ff75-200-53-199-197.ngrok-free.app/api/mensagens',
    apiEmuladorMensagens: 'http://10.0.2.2:8000/api/mensagens',

    apiNgrokMandarMensagem: 'https://ff75-200-53-199-197.ngrok-free.app/api/mandarMensagem',
    apiEmuladorMandarMensagem: 'http://10.0.2.2:8000/api/mandarMensagem',

    apiNgrokMensagemMaisRecente: 'https://ff75-200-53-199-197.ngrok-free.app/api/mensagemMaisRecente',
    apiEmuladorMensagemMaisRecente: 'http://10.0.2.2:8000/api/mensagemMaisRecente',

    //Urls Posts
    apiNgrokPosts: 'https://ff75-200-53-199-197.ngrok-free.app/api/todosPosts',
    apiEmuladorPosts: 'http://10.0.2.2:8000/api/todosPosts',

    apiNgrokPostsEmpresa: 'https://ff75-200-53-199-197.ngrok-free.app/api/postsempresa',
    apiEmuladorPostsEmpresa: 'https://10.0.2.2:8000/api/postsempresa',

    //Urls Tags de Habilidades
    apiNgrokTags: 'http://ff75-200-53-199-197.ngrok-free.app/api/habilidades',
    apiEmuladorTags: 'http://10.0.2.2:8000/api/habilidades'
    //Ctrl F2 seleciona tudo de uma vez :D
};

export default ApisUrls;
