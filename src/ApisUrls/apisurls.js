// ApisUrls.js
const ApisUrls = {
  //login
  apiNgrok: "http://a67f-200-53-192-195.ngrok-free.app/api/usuario/login",
  apiEmulador: "http://10.0.2.2:8000/api/usuario/login",
  apiNgrokUsuario: "http://a67f-200-53-192-195.ngrok-free.app/api/usuario/",
  apiEmuladorUsuario: "http://10.0.2.2:8000/api/usuario/",
  apiNgrokAlterar: "",
  //cadastro
  apiNgrokCad: "http://a67f-200-53-192-195.ngrok-free.app/api/usuario",
  apiEmuladorCad: "http://10.0.2.2:8000/api/usuario",
  //pegar vagas
  apiNgrokVaga: "http://a67f-200-53-192-195.ngrok-free.app/api/vaga/",
  apiEmuladorVaga: "http://10.0.2.2:8000/api/vaga/",
  //pegar area de interesse
  apiNgrokArea: "http://a67f-200-53-192-195.ngrok-free.app/api/areavaga",
  apiEmuladorArea: "http://10.0.2.2:8000/api/areavaga",
  //pegar id
  apiNgrokId: "http://a67f-200-53-192-195.ngrok-free.app/api/usuario/",
  apiEmuladorId: "http://10.0.2.2:8000/api/usuario/",

  //pesquisa
  apiEmuladorVagaPesquisa: "http://10.0.2.2:8000/api/vaga/busca/",
  apiNgrokVagaPesquisa:
    "http://a67f-200-53-192-195.ngrok-free.app/api/vaga/busca/",

  //usuario se candidatar
  apiEmuladorUsuarioVaga: "http://10.0.2.2:8000/api/vagaUsuario",
  apiNgrokUsuarioVaga:
    "http://a67f-200-53-192-195.ngrok-free.app/api/vagaUsuario",

  apiEmuladorUsuarioVagaCancelar: "http://10.0.2.2:8000/api/vagaUsuario",
  apiNgrokUsuarioVagaCancelar:
    "http://a67f-200-53-192-195.ngrok-free.app/api/vagaUsuario",
};

export default ApisUrls;
