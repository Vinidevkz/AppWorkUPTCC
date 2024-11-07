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
  <link rel="shortcut icon" href="{{url('assets/img/adminImages/WU-icon.png')}}" type="image/x-icon">
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link
    rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="{{url('assets/css/admin.css')}}">


  <title>Administrador | Dashboard</title>
</head>

<body>



  <div class="row">
@include('components.asideAdmin')

    <div class="col-9">
      <div class="p-0">


        <div class="container">

        <div class="mb-2 mt-2 d-flex flex-row align-items-center">
<h3 class="m-0">Olá, {{ $nomeAdmin }}! </h3>

<span class="material-symbols-outlined text-warning">
hand_gesture
</span>
        </div>
        <div class="row d-flex justify-content-between">
          <div class="col-3">
            <div class="card rounded card-data-job shadow-sm">
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
            <div class="  card rounded card-data-user shadow-sm ">
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
            <div class=" card rounded card-data-company shadow-sm ">
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
          <!-- <div class="col-3 ">
            <div class="relogio d-flex justify-content-center">
              <span id="hour">00</span>
              <span class="reg-point">:</span>
              <span id="min">00</span>
              <span class="reg-point">:</span>
              <span id="sec">00</span>
            </div>
            
          </div> -->

        </div>


  <!-- <div class="">
  <table>
    <tbody>
      <tr class="p-3">
        <td class="">
     
        </td>
        <td id="gambiarra">aa</td>
        <td>
   
        </td>
      </tr>
      <tr>
        <td>
    
        </td>
        <td class="gambiarra">aa</td>
        <td> 
          <h3>GRÁFICO</h3>
        </td>
      </tr>
    </tbody>
  </table> -->

  <div class="container mt-5  h-100 w-100 " >
        <div class="row">
            <div class="col-md-6 shadow rounded">
                <div id="piechart_3d" style="height: 230px;"></div>
            </div>
            <div class="col-sm-1 p-0"></div>
            <div class="col-md-5 bg-white shadow rounded">
                <div id="donutchart" style="height: 230px;"></div>
            </div>
        </div>
        <div class="row mt-5 pb-5">

            <div class="bg-white shadow rounded" >
                <canvas id="myBarChart" class="col" style="height: 338px;" ></canvas>
            </div>
        </div>
  </div>
  </div>







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
// const totalVagaGatronomia = {{$totalVagaGastronomia}};
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
const totalVagaGatronomia = {{$totalVagaGastronomia}};
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
          title: 'Percentual de vagas por setor',
          // is3D: true,
          backgroundColor: 'transparent',
          titleTextStyle: {
        fontSize: 14 // Aumenta o tamanho da fonte do título
      },
      legend: {
        textStyle: {
          fontSize: 11 // Aumenta o tamanho da fonte da legenda
        }},
        slices: {
          0: { color: '#1E90FF' }, // Azul
        1: { color: '#32CD32' }, // Verde
        2: { color: '#FFA500' }, // Laranja
        3: { color: '#8A2BE2' }, // Roxo
        4: { color: '#FF4500' }  // Vermelho
      }
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
    // GRÁFICO DE PIZZA PARA OS STATUS
    const ativos = {{$statusAtivo}};
const bloqueados = {{$statusBloqueado}};
google.charts.load("current", {packages:["corechart"]});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Ativos',     ativos],
        ['Bloqueados',  bloqueados]
    ]);
    var options = {
        title: 'Situação dos usuários',
        pieHole: 0,
        backgroundColor: 'transparent',
        titleTextStyle: {
        fontSize: 14 // Aumenta o tamanho da fonte do título
      },
      legend: {
        textStyle: {
          fontSize: 11 // Aumenta o tamanho da fonte da legenda
        }},
        slices: {
          0: { color: '#1E90FF' }, // Azul
          1: { color: '#FF4500' }  // Vermelho
      }
      
    };
    var donutChart = new google.visualization.PieChart(document.getElementById('donutchart'));
    donutChart.draw(data, options);
}
// document.getElementById('toggle-aside').addEventListener('click', function() {
//   const sidebar = document.getElementById('aside-text');
//   sidebar.classList.toggle('hidden esconder-texto');
// }); 
const sidebarlinks = document.querySelectorAll('.item-nav');
// Adicionando eventos
sidebarlinks.forEach(link => {
  link.addEventListener('click', function() {
    // Removendo classe
    sidebarlinks.forEach(item => item.classList.remove('link-aside-active'));
    this.classList.add('link-aside-active')
  })
})
  </script>



  <script src="script.js"></script>
  <!-- <script src="../../../public/assets/js/relogio.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>