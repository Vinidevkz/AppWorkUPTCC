<?php

/*
|--------------------------------------------------------------------------
| Precisa ajustar css
|--------------------------------------------------------------------------

*/
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="{{url('assets/css/admin.css')}}">


  <title>Administrador | Dashboard</title>
</head>

<body>

  <header class="">


    <p class="text-light fs-4 fw-bold">Work<span class="verde">Up</span></p>

    <div class="dropdown">
      <img src="{{url('assets/img/adminImages/perfil.png')}}" alt="" class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Log out</a></li>
      </ul>
    </div>


  </header>

  <div class="row">
    <div class="col-2">
      <div class="aside-container">
        <aside>
          <div class="aside-sidebar d-flex flex-column">

            <div class="d-flex">
              <a href="/admin" class="aside-active d-flex flex-row align-items-center h6">
                <span class="material-symbols-outlined p-2">grid_view</span>
                Dashboard
              </a>
            </div>

            <div class="d-flex">
              <a href="/verUsuario" class="d-flex flex-row align-items-center h6">
                <span class="material-symbols-outlined p-2">person</span>
                Usuários
              </a>
            </div>

            <div class="d-flex">
              <a href="/verVaga" class="d-flex flex-row align-items-center h6">
                <span class="material-symbols-outlined p-2">work</span>
                Vagas
              </a>
            </div>

            <div class="d-flex">
              <a href="/verEmpresa" class="d-flex flex-row align-items-center h6">
                <span class="material-symbols-outlined p-2">apartment</span>
                Empresas
              </a>
            </div>

            <div class="">
              <a href="/infoAdmin" class="d-flex flex-row align-items-center h6">
              <span class="material-symbols-outlined p-2">info</span>
                Info
              </a>
            </div>

            <div class="d-flex">
              <a href="/SuporteAdmin" class="d-flex flex-row align-items-center h6" id="btn-support">
                <span class="material-symbols-outlined p-2">info</span>
                Suporte
              </a>
            </div>

            <div class="d-flex">
              <a href="" class="d-flex flex-row align-items-center h6" id="btn-exit">
                <span class="material-symbols-outlined p-2">logout</span>
                Sair
              </a>
            </div>
        </aside>
      </div>
    </div>
    <div class="col-9">
      <div class="p-0">
        <div class="align-text d-flex flex-row align-items-center">
        <span class="material-symbols-outlined">
database
</span>
<h2>Dashboard</h1>
        </div>
       

        <div class="row">
          <div class="col-3">
            <div class="card rounded card-data-job ">
              <div class="card-header bg-light centralizar-dados d-flex  align-items-center flex-row">
              <span class="material-symbols-outlined">
                badge
              </span>
              <p class="text-black m-0">Vagas no sistema</p>
              </div>
              <div class="card-body d-flex justify-content-center">
              <h2 class="text-black">{{ $totalRegistrosVaga }}</h2>
              </div>
            </div>

          </div>
          <div class="col-3">
            <div class="  card rounded card-data-user ">
              <div class="card-header bg-light centralizar-dados d-flex  align-items-center flex-row">
              <span class="material-symbols-outlined">
bar_chart
</span>
                <p class="text-black m-0">Usuários no sistema</p>
              </div>
              <div class="card-body d-flex justify-content-center">
              <h2 class="text-black">{{ $totalRegistrosUsuario }}</h2>
              </div>
            </div>
          </div>
          <div class="col-3">
            <div class=" card rounded card-data-company ">
              <div class=" card-header bg-light centralizar-dados d-flex  align-items-center flex-row">
              <span class="material-symbols-outlined">
location_city
</span>
                <p class="text-black m-0">Empresas no sistema</p>
              </div>
              <div class="card-body d-flex justify-content-center">
              <h2 class="text-black">{{ $totalRegistrosEmpresa }}</h2>
              </div>
            </div>

          </div>
          <div class="col-3 ">
            <div class="relogio d-flex justify-content-center">
              <span id="hour">00</span>
              <span class="reg-point">:</span>
              <span id="min">00</span>
              <span class="reg-point">:</span>
              <span id="sec">00</span>
            </div>
          </div>
        </div>

  <div class="container align-graph d-flex justify-content-center">

  <table>
    <tbody>
      <tr class="p-3">
        <td class="">
        <div class="grafico-barras d-flex flex-row justify-content-center align-items-center">
          <!-- <canvas id="pizzaGraph"></canvas> -->
          <div id="piechart_3d"></div>
     
        </div>
        </td>
        <td id="gambiarra">aa</td>
        <td>
        <div class="grafico-barras d-flex align-items-center justify-content-center">
        <canvas id="myBarChart"></canvas>
</div>
        </td>
      </tr>

    </tbody>
  </table>


        


            <!-- <div class="col-1"></div>
      
             <div class="col-3">
            <div class="card group-list-users border border-0" style="top: 15%;">
              <div class="card-header text-black">Usuários ativos</div>
              <ul class="group-list-users overflow-auto-hidden" style="max-height: 170px; overflow-y: auto;">
                @foreach ($usuarios as $usuario) 
                <li class="list-group-item pb-1">
                      <div class="d-flex flex-row align-items-center">
                      <img src="{{url('assets/img/adminImages/letter-v.png')}}"  class="rounded-pill" width="30px" height="30px">
                      <p class="m-0 fs-5 px-1">{{ $usuario -> nomeUsuario }}</p>
                      </div>
                </li>
                @endforeach
              
              </ul>
          
          </div>
        </div> -->
        </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- GRÁFICOS COM CHART.JS -->
  <script src="path/to/chartjs/dist/chart.umd.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <!-- GRÁFICOS DO GOOGLE -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <script>
    // // Dados e configuração do gráfico Polar Area
    // const dataPolarArea = {
    //   labels: ['Red', 'Green', 'Yellow', 'Grey', 'Blue'],
    //   datasets: [{
    //     label: 'My First Dataset',
    //     data: [11, 16, 7, 3, 14],
    //     backgroundColor: [
    //       'rgb(255, 99, 132)',
    //       'rgb(75, 192, 192)',
    //       'rgb(255, 205, 86)',
    //       'rgb(201, 203, 207)',
    //       'rgb(54, 162, 235)'
    //     ]
    //   }]
    // };

    // const configPolarArea = {
    //   type: 'polarArea',
    //   data: dataPolarArea,
    //   options: {}
    // };

    // var myPolarAreaChart = new Chart(
    //   document.getElementById('myPolarAreaChart'),
    //   configPolarArea
    // );

    // // Dados e configuração do gráfico de Linha
    // const labelsLine = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
    // const dataLine = {
    //   labels: labelsLine,
    //   datasets: [{
    //     label: 'My First Dataset',
    //     data: [65, 59, 80, 81, 56, 55, 40],
    //     fill: false,
    //     borderColor: 'rgb(75, 192, 192)',
    //     tension: 0.1
    //   }]
    // };

    // const configLine = {
    //   type: 'line',
    //   data: dataLine,
    //   options: {}
    // };

    // var myLineChart = new Chart(
    //   document.getElementById('myLineChart'),
    //   configLine
    // );


    // CONFIGURAÇÕES DO GRÁFICO DE BARRAS
// CONFIGURAÇÕES DO GRÁFICO DE BARRAS

const labelsBarChart = ['Tecnologia', 'Marketing', 'Gestão', 'Gastronomia', 'Administração', 'Medicina', 'Educação', 'Finança', 'Recursos Humanos', 'Logística', 'Alimentação', 'Serviços Gerais', 'Higienização', 'Enegenharia', 'Meio Ambiente'];
const totalUsuarioTecnologia = {{$totalUsuariosTecnologia}};
const totalUsuarioMarketing = {{$totalUsuariosMarketing}};
const totalUsuarioGestao = {{$totalUsuariosGestao}};
const totalUsuarioGastronomia = {{$totalUsuarioGastronomia}};
const totalUsuariosAdministracao = {{$totalUsuariosAdministracao}};
const totalUsuarioMedicina = {{$totalUsuarioMedicina}};
const totalUsuarioEducacao = {{$totalUsuariosEducacao}};
const totalUsuarioFinanca = {{$totalUsuariosFinancas}};
const totalUsuarioRecursosHumanos = {{$totalUsuariosRecursosHumanos}};
const totalUsuarioLogistica = {{$totalUsuariosLogistica}};
const totalUsuarioAlimentacao = {{$totalUsuariosAlimentacao}};
const totalUsuarioServicosGerais = {{$totalUsuariosServicosGerais}};
const totalUsuarioHigienizacao = {{$totalUsuarioHigienizacao}};
const totalUsuarioEngenharia = {{$totalUsuariosEngenharia}};
const totalUsuariosMeioAmbiente = {{$totalUsuariosMeioAmbiente}};
 // Corrigido
const dataBarChart = {
  labels: labelsBarChart,
  datasets: [{
    label: 'Interesse dos usuário por áreas',
    data: [
  totalUsuarioTecnologia,
  totalUsuarioMarketing,
  totalUsuarioGestao,
  totalUsuarioGastronomia,
  totalUsuariosAdministracao,
  totalUsuarioMedicina,
  totalUsuarioEducacao,
  totalUsuarioFinanca,
  totalUsuarioRecursosHumanos,
  totalUsuarioLogistica,
  totalUsuarioAlimentacao,
  totalUsuarioServicosGerais,
  totalUsuarioHigienizacao,
  totalUsuarioEngenharia,
  totalUsuariosMeioAmbiente
],
backgroundColor: [
  '#20dd77',    // Tecnologia
  '#1b1b1b',    // Alimentação
  '#20dd77',    // Meio Ambiente
  '#1b1b1b',    // Engenharia
  '#20dd77',    // Administração
  '#1b1b1b',   // Marketing
  '#20dd77',   // Saúde
  '#1b1b1b',    // Educação
  '#20dd77',    // Finanças
  '#1b1b1b',    // Recursos Humanos
  '#20dd77',   // Logística
  '#1b1b1b'    // Design
],

    // borderColor: [
    //   'rgb(255, 99, 132)',
    //   'rgb(255, 159, 64)',
    //   'rgb(255, 205, 86)',
    //   'rgb(75, 192, 192)',
    //   'rgb(54, 162, 235)',
    //   'rgb(153, 102, 255)',
    //   'rgb(201, 203, 207)'
    // ],
    borderWidth: 1
  }]
};

const configBarChart = {
  type: 'bar',
  data: dataBarChart,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};

var myBarChart = new Chart(
  document.getElementById('myBarChart'),
  configBarChart
);





// // GRÁFICO DE PIZAA

// const totalVagaTecnologia = {{ $totalVagaTecnologia }};
// const totalVagaGatronomia = {{$totalVagaGatronomia}};
// const totalVagaEngenharia = {{$totalVagaEngenharia}};
// const totalVagaAdministracao = {{$totalVagaAdministracao}};
// const totalVagaMarketing = {{$totalVagaMarketing}};
// const totalVagaMedicina = {{$totalVagaMedicina}};
// const totalVagaEducacao = {{$totalVagaEducacao}};
// const totalVagaFinanca = {{$totalVagaFinanca}};
// const totalVagaRh = {{$totalVagaRh}};
// const totalVagaLogistica = {{$totalVagaLogistica}};
// const totalVagaAlimentacao = {{$totalVagaAlimentacao}};
// // const dataPizza = {
// //   labels: [
//    'Tecnologia',
//    'Gastronomia',
//    'Designer',
//    'Engenharia',
//    'Administração',
//    'Marketing',
//    'Medicina',
//    'Educação',
//    'Finaças',
//    'Recursos Humanos',
//    'Logística',
//    'Alimentação'
//   ],
//   datasets: [{
//     label: 'My First Dataset',
//         data: [
//       totalVagaTecnologia,
//       totalVagaGatronomia, // Corrigido
//       totalVagaDesigner,
//       totalVagaEngenharia,
//       totalVagaAdministracao,
//       totalVagaMarketing,   // Corrigido
//       totalVagaMedicina,
//       totalVagaEducacao,
//       totalVagaFinanca,
//       totalVagaRh,
//       totalVagaLogistica,
//       totalVagaAlimentacao
//     ],
//     backgroundColor: [
//       '#303030', // Tecnologia
//   '#1b1b1b', // Alimentação
//   '#20dd77', // Meio Ambiente
//   '#33f88e', // Engenharia
//   '#444444', // Administração
//   '#555555', // Marketing
//   '#66ff99', // Saúde
//   '#77ffbb', // Educação
//   '#888888', // Finanças
//   '#999999', // Recursos Humanos
//   '#00bfae', // Logística
//   '#00cc66'  // Design
//     ],
//     hoverOffset: 4
//   }]
// };

// const configPizza = {
//   type: 'pie',
//   data: dataPizza,
//   options: {
//     responsive: true,
//     plugins: {
//       legend: {
//         display: false
//       },
//       title: {
//         display: true,
//         text: 'Vagas por áreas'
//       }
//     }
//   }
// };

// var pizzaGraph = new Chart(
//   document.getElementById('pizzaGraph'),
//   configPizza
// );



// // GRÁFICO DE BARRA LATERAL
// // Dados das vagas


// // Labels para o gráfico
// const labels = [
//   'Tecnologia',
//   'Gastronomia',
//   'Designer',
//   'Engenharia',
//   'Administração',
//   'Marketing',
//   'Medicina',
//   'Educação',
//   'Finanças',
//   'Recursos Humanos',
//   'Logística',
//   'Alimentação'
// ];

// // Dados para o gráfico
// const dataLateral = {
//   labels: labels,
//   datasets: [{
//     axis: 'y',
//     label: 'Vagas por áreas',
//     data: [
//       totalVagaTecnologia,
//       totalVagaGatronomia,
//       totalVagaDesigner,
//       totalVagaEngenharia,
//       totalVagaAdministracao,
//       totalVagaMarketing,
//       totalVagaMedicina,
//       totalVagaEducacao,
//       totalVagaFinanca,
//       totalVagaRh,
//       totalVagaLogistica,
//       totalVagaAlimentacao
//     ],
//     fill: false,
//     backgroundColor: [
//       'rgba(255, 99, 132, 0.2)',
//       'rgba(54, 162, 235, 0.2)',
//       'rgba(255, 205, 86, 0.2)',
//       'rgba(75, 192, 192, 0.2)',
//       'rgba(153, 102, 255, 0.2)',
//       'rgba(255, 159, 64, 0.2)',
//       'rgba(255, 99, 71, 0.2)',
//       'rgba(46, 204, 113, 0.2)',
//       'rgba(241, 196, 15, 0.2)',
//       'rgba(231, 76, 60, 0.2)',
//       'rgba(52, 152, 219, 0.2)',
//       'rgba(155, 89, 182, 0.2)'
//     ],
//     borderColor: [
//       'rgb(255, 99, 132)',
//       'rgb(54, 162, 235)',
//       'rgb(255, 205, 86)',
//       'rgb(75, 192, 192)',
//       'rgb(153, 102, 255)',
//       'rgb(255, 159, 64)',
//       'rgb(255, 99, 71)',
//       'rgb(46, 204, 113)',
//       'rgb(241, 196, 15)',
//       'rgb(231, 76, 60)',
//       'rgb(52, 152, 219)',
//       'rgb(155, 89, 182)'
//     ],
//     borderWidth: 1
//   }]
// };

// // Configuração do gráfico
// const configLateral = {
//   type: 'bar',
//   data: dataLateral,
//   options: {
//     indexAxis: 'y', // Exibe as barras horizontalmente
//   }
// };

// // Criação do gráfico
// var barGraph = new Chart(
//   document.getElementById('barGraph'), // ID do elemento canvas
//   configLateral
// );


// GRÁFICO DE ROSCA DO GOOGLE
const totalVagaTecnologia = {{ $totalVagaTecnologia }};
const totalVagaGatronomia = {{$totalVagaGatronomia}};
const totalVagaEngenharia = {{$totalVagaEngenharia}};
const totalVagaAdministracao = {{$totalVagaAdministracao}};
const totalVagaMarketing = {{$totalVagaMarketing}};
const totalVagaMedicina = {{$totalVagaMedicina}};
const totalVagaEducacao = {{$totalVagaEducacao}};
const totalVagaFinanca = {{$totalVagaFinanca}};
const totalVagaRh = {{$totalVagaRh}};
const totalVagaLogistica = {{$totalVagaLogistica}};
const totalVagaAlimentacao = {{$totalVagaAlimentacao}};
const totalVagaGestao = {{$totalVagaGestao}};
const totalVagaHigienizacao = {{$totalVagaHigienizacao}};
const totalVagaServiçosGerais = {{$totalVagaServiçosGerais}};
const totalVagaMeioAmbiente = {{$totalVagaMeioAmbiente}};
google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Total de vagas por setor'],
          ['Tecnologia',     totalVagaTecnologia],
          ['Marketing',      totalVagaMarketing],
          ['Gestão',  totalVagaGestao],
          ['Gastronomia', totalVagaGatronomia],
          ['Administração',    totalVagaAdministracao],
          ['Medicina', totalVagaMedicina],
          ['Educação', totalVagaEducacao],
          ['Finança', totalVagaFinanca],
          ['Recursos Humanos', totalVagaRh],
          ['Logística', totalVagaLogistica],
          ['Alimentação', totalVagaAlimentacao],
          ['Serviços Gerais', totalVagaServiçosGerais],
          ['Higienização', totalVagaHigienizacao],
          ['Engenharia', totalVagaEngenharia],
          ['Meio Ambiente', totalVagaLogistica],
        ]);

        var options = {
          title: 'Total de vagas por setor',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }

  </script>

  <script>
    const hour = document.querySelector('#hour')
    const min = document.querySelector('#min')
    const sec = document.querySelector('#sec')

    setInterval(() => {
      let date = new Date()
      let dHour = date.getHours()
      let dMinute = date.getMinutes()
      let dSec = date.getSeconds()

      hour.innerHTML = `${formatTime(dHour)}`
      min.innerHTML = `${formatTime(dMinute)}`
      sec.innerHTML = `${formatTime(dSec)}`

    }, 1000)

    function formatTime(time) {
      return time < 10 ? '0' + time : time
    }
  </script>



  <script src="script.js"></script>
  <!-- <script src="../../../public/assets/js/relogio.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>