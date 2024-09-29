// ApisUrls.js
const ApisUrls = {
  //login
  apiNgrok: "http://d571-200-53-197-8.ngrok-free.app/api/usuario/login",
  apiEmulador: "http://10.0.2.2:8000/api/usuario/login",
  apiNgrokUsuario: "http://d571-200-53-197-8.ngrok-free.app/api/usuario/",
  apiEmuladorUsuario: "http://10.0.2.2:8000/api/usuario/",
  apiNgrokAlterar: "",
  //cadastro
  apiNgrokCad: "http://d571-200-53-197-8.ngrok-free.app/api/usuario",
  apiEmuladorCad: "http://10.0.2.2:8000/api/usuario",
  //pegar vagas
  apiNgrokVaga: "http://d571-200-53-197-8.ngrok-free.app/api/vaga/",
  apiEmuladorVaga: "http://10.0.2.2:8000/api/vaga/",
  //pegar area de interesse
  apiNgrokArea: "http://d571-200-53-197-8.ngrok-free.app/api/areavaga",
  apiEmuladorArea: "http://10.0.2.2:8000/api/areavaga",
  //pegar id
  apiNgrokId: "http://d571-200-53-197-8.ngrok-free.app/api/usuario/",
  apiEmuladorId: "http://10.0.2.2:8000/api/usuario/",

  //pesquisa
  apiEmuladorVagaPesquisa: "http://10.0.2.2:8000/api/vaga/busca/",
  apiNgrokVagaPesquisa:
    "http://d571-200-53-197-8.ngrok-free.app/api/vaga/busca/",

  //usuario se candidatar
  apiEmuladorUsuarioVaga: "http://10.0.2.2:8000/api/vagaUsuario",
  apiNgrokUsuarioVaga:
    "http://d571-200-53-197-8.ngrok-free.app/api/vagaUsuario",

  apiEmuladorUsuarioVagaCancelar: "http://10.0.2.2:8000/api/vagaUsuario",
  apiNgrokUsuarioVagaCancelar:
    "http://d571-200-53-197-8.ngrok-free.app/api/vagaUsuario",
};

export default ApisUrls;
