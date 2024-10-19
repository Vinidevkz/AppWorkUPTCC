// ApisUrls.js
const ApisUrls = {
  //login
  apiNgrok: "http://bad6-200-53-199-247.ngrok-free.app/api/usuario/login",
  apiEmulador: "http://10.0.2.2:8000/api/usuario/login",
  apiNgrokUsuario: "http://bad6-200-53-199-247.ngrok-free.app/api/usuario/",
  apiEmuladorUsuario: "http://10.0.2.2:8000/api/usuario/",
  apiNgrokAlterar: "",
  //cadastro
  apiNgrokCad: "http://bad6-200-53-199-247.ngrok-free.app/api/usuario",
  apiEmuladorCad: "http://10.0.2.2:8000/api/usuario",
  //pegar vagas
  apiNgrokVaga: "http://bad6-200-53-199-247.ngrok-free.app/api/vagaApp/",
  apiEmuladorVaga: "http://10.0.2.2:8000/api/vagaApp/",
  //pegar area de interesse
  apiNgrokArea: "http://bad6-200-53-199-247.ngrok-free.app/api/areavaga",
  apiEmuladorArea: "http://10.0.2.2:8000/api/areavaga",
  //pegar id
  apiNgrokId: "http://bad6-200-53-199-247.ngrok-free.app/api/usuario/",
  apiEmuladorId: "http://10.0.2.2:8000/api/usuario/",

  //pesquisa
  apiEmuladorVagaPesquisa: "http://10.0.2.2:8000/api/vaga/busca/",
  apiNgrokVagaPesquisa:
    "http://bad6-200-53-199-247.ngrok-free.app/api/vaga/busca/",

  //usuario se candidatar
  apiEmuladorUsuarioVaga: "http://10.0.2.2:8000/api/vagaUsuario",
  apiNgrokUsuarioVaga:
    "http://bad6-200-53-199-247.ngrok-free.app/api/vagaUsuario",
  apiNgrokVerificarCandidatura: "http://bad6-200-53-199-247.ngrok-free.app/api/verificarCandidatura/",
  apiEmuladorVerificarCandidatura: "http://10.0.2.2:8000/api/verificarCandidatura/",
  
  apiEmuladorUsuarioVagaCancelar: "http://10.0.2.2:8000/api/vagaUsuario",
  apiNgrokUsuarioVagaCancelar:
    "http://bad6-200-53-199-247.ngrok-free.app/api/vagaUsuario",

    
  //Salvar, cancelar e pegar salvamento da vaga

  apiEmuladorSalvarVaga: "http://10.0.2.2:8000/api/salvarVaga/",
  apiNgrokSalvarVaga:
    "http://bad6-200-53-199-247.ngrok-free.app/api/salvarVaga/",

    apiEmuladorCancelSalvarVaga: "http://10.0.2.2:8000/api/salvarVaga/",
    apiNgrokCancelSalvarVaga:
      "http://bad6-200-53-199-247.ngrok-free.app/api/salvarVaga/",

    apiEmuladorPegarVagasSalvas: "http://10.0.2.2:8000/api/salvarVaga",
    apiNgrokPegarVagasSalvas:
        "http://bad6-200-53-199-247.ngrok-free.app/api/salvarVaga",

    apiNgrokVerificarSalvarVaga: "http://bad6-200-53-199-247.ngrok-free.app/api/verificarSalvarVaga",


    //Urls Empresa
    apiNgrokEmpresa: "http://bad6-200-53-199-247.ngrok-free.app/api/showempresa/",

    apiEmuladorLinguas: "http://10.0.2.2:8000/api/linguas",
    apiNgrokLinguas: "http://bad6-200-53-199-247.ngrok-free.app/api/linguas",
};

export default ApisUrls;
