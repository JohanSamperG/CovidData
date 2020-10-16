<?php require'Model/datosObtenidos.php';
date_default_timezone_set('UTC');
date_default_timezone_set("America/Bogota");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CovidData</title>
    <link rel="shortcut icon" href="img/bacterias.png" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://mottie.github.io/tablesorter/js/jquery.tablesorter.js"></script>
</head>
<style>
  body{
    background: white;font-family: 'Roboto Mono', monospace;
  }
  .allUp{
    background: white;
    background-size: cover;
    background-attachment: fixed;
    background-position: 0 0px;
  }
  .article{
    background-size: cover;
    background-attachment: fixed;
    background-position: 0 0px;
  }
  #particles-js{
    width: 100%;
    height: 100%;
    position: absolute;
  }
  #page-loader {
position: fixed;
top: 0;
left: 0;
width: 100%;
height: 100%;
z-index: 1000;
background: #FFF none repeat scroll 0% 0%;
z-index: 99999;
}
#page-loader .preloader-interior {
    display: block;
    position: relative;
    left: 50%;
    top: 50%;
    width: 150px;
    height: 150px;
    margin: -75px 0 0 -75px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #3498db;

    -webkit-animation: spin 2s linear infinite; /* Chrome, Opera 15+, Safari 5+ */          animation: spin 2s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */}
#page-loader .preloader-interior:before {
    content: "";
    position: absolute;
    top: 5px;
    left: 5px;
    right: 5px;
    bottom: 5px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #e74c3c;

    -webkit-animation: spin 3s linear infinite; /* Chrome, Opera 15+, Safari 5+ */      animation: spin 3s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */}

#page-loader .preloader-interior:after {
    content: "";
    position: absolute;
    top: 15px;
    left: 15px;
    right: 15px;
    bottom: 15px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #f9c922;

    -webkit-animation: spin 1.5s linear infinite; /* Chrome, Opera 15+, Safari 5+ */      animation: spin 1.5s linear infinite; /* Chrome, Firefox 16+, IE 10+, Opera */}

@-webkit-keyframes spin {
    0%   { 
        -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */        -ms-transform: rotate(0deg);  /* IE 9 */        transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */    }
    100% {
        -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */        -ms-transform: rotate(360deg);  /* IE 9 */        transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */    }
}
@keyframes spin {
    0%   { 
        -webkit-transform: rotate(0deg);  /* Chrome, Opera 15+, Safari 3.1+ */        -ms-transform: rotate(0deg);  /* IE 9 */        transform: rotate(0deg);  /* Firefox 16+, IE 10+, Opera */    }
    100% {
        -webkit-transform: rotate(360deg);  /* Chrome, Opera 15+, Safari 3.1+ */        -ms-transform: rotate(360deg);  /* IE 9 */        transform: rotate(360deg);  /* Firefox 16+, IE 10+, Opera */    }
}
table tbody { display:block; height:450px; overflow: scroll; }
table thead, table tbody tr { display:table; width:100%; table-layout:fixed; }
</style>
<script>
$(window).load(function(){
    $('#page-loader').fadeOut(500);
});
</script>
<script>
$(document).ready(function() {
  $("#boton").click(function(event) {
    var pais = $("#pais").val();
    if (pais!='') {
      localStorage.setItem("pais",pais);
      $("#capa").load("busqueda.php #result",{pais:localStorage.getItem('pais')});
      goToByScroll('capa');
    }else{
      alert('Ingresa un nombre Valido')
    }

  });
  function goToByScroll(id) {
    // Remove "link" from the ID
    id = id.replace("link", "");
    // Scroll
    $('html,body').animate({
        scrollTop: $("#" + id).offset().top
    }, 'slow');
  }

});		
</script>
<body>
<div id="page-loader"><span class="preloader-interior"></span></div>
<div id="particles-js"></div>
<div class="allUp" id="home">
  <nav id="myNavbar" class="navbar fixed-top navbar-expand-md navbar-light bg-transparent">
    <a class="navbar-brand" href="#home" style="color: black;"><img src="img/bacterias.png" alt="" width="50px" height="50px"> CovidData</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto"></ul>
      <iframe name="enviar" style="display:none;"></iframe>
      <form class="form-inline my-2 my-lg-0" action="index.php" target="enviar">
        <div style="margin-top: 22px">
          <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" id="pais" required>
          <small id="passwordHelpBlock" class="form-text text-muted">Ej: Argentina</small>
        </div>
        <div>
          <button class="btn btn-warning my-2 my-sm-0" id="boton" type="submit"><img src="img/magnifying-glass (2).png" alt="" width="15px" height="15px" srcset=""></button>
        </div>
      </form>
    </div>
  </nav>
  <header style="height: 100vh;color: black;">
    <div class="container">
      <div class="row align-items-center justify-content-center vh-100">
          <div class="text-center">
            <img class="img-fluid" src="img/bacterias.png" width="30%" height="auto" alt="">
            <h1> CovidData</h1>
            <p>Aquí encontrarás información actualizada sobre el covid-19</p> 
          </div>       
      </div>
    </div>
  </header> 
</div>
<br>
<br>
<br> 
<div id="capa" class="text-center"></div> 
<div class="container" id="registros">
    <b><h2 style="color:black">Registros Totales</h2></b>
    <br><br>
    <?php
           $info = new info();
           $i=1;          
           $results = $info->getAllCountries();
           $results=$results->Global;
          $totalConfirmados= $results->TotalConfirmed;
          $totalFallecidos=$results->TotalDeaths;
          $totalRecuperado=$results->TotalRecovered;
        ?>
    <div class="row text-center text-white">
      <div class="col-sm-12 col-md-4" style="color: green">
        <h3>Recuperados</h3>
        <p><?=$totalRecuperado?></p>
      </div>
      <div class="col-sm-12 col-md-4" style="color: darkgrey">
        <h3>Confirmados</h3>
        <p><?=$totalConfirmados?></p>
      </div>
      <div class="col-sm-12 col-md-4" style="color: darkred">
        <h3>Fallecidos</h3>
        <p><?=$totalFallecidos?></p>
      </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <b><h2 style="color:black">Registros por Paises <b style="background: black; color:white;"><?=date('M/d/Y')?></b></h2></b>
    <div class="table-responsive">
      <table class="table table-striped text-center" id="tablaResult" >
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Pais</th>
            <th scope="col">Casos Totales</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $info = new info();
          $i=1;
          $results = $info->getAllCountries();
          foreach($results->Countries as $key):
              $pais = $key->Country;?>
          <tr>
            <th scope="row"><?=$i?></th>
            <td style="text-decoration: none; color:black;"><b><input type="hidden" id="pais2" value="<?=$pais?>">
              <img src="https://www.countryflags.io/<?=$key->CountryCode?>/flat/64.png" width="20px" height="20px"> <?=$pais?></a></b></td>
            <td><?=$key->TotalConfirmed?></td>
          </tr>
          <?php $i++; endforeach;?>
        </tbody>
      </table>
    </div>
</div>
<br>
<br>
<br>
<div class="container text-center">
  <div class="row">
    <div class="col-sm-12 col-md-6">
      <h2 style="background:#FFC107; color:white">Lo que comenta la OMS</h2>
      <a class="twitter-timeline" data-lang="es" data-width="400" data-height="900" data-theme="ligth" href="https://twitter.com/WHO?ref_src=twsrc%5Etfw">Tweets by WHO</a>
      <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>
    <div class="col-sm-12 col-md-6 text-left">
      <h2 class="text-center" style="background:#FFC107; color:white"> Línea del tiempo</h2>
      <div class="flourish-embed flourish-chart" data-src="story/230110"><script src="https://public.flourish.studio/resources/embed.js"></script></div>
      <h2 style="background:black;color:white "> Desglose de impactos por país</h2>
      <div class="flourish-embed flourish-chart" data-src="story/230085"><script src="https://public.flourish.studio/resources/embed.js"></script></div>
    </div>
  </div>
</div>
<br>
<br>
<br>
<div class="container-fluid text-white text-center" >
  <div class="row align-items-center justify-content-center " style="background:#FFC107;" >
    <div style="background: white;color:black; width: 80%;margin-top:50px;margin-bottom: 50px">
      <br><br><br>
      <b><h2>¿Qué es el COVID-19?</h2></b>
      <p>Los coronavirus (CoV) son virus que surgen periódicamente en diferentes áreas del mundo y que causan Infección Respiratoria Aguda (IRA), es decir gripa, que pueden llegar a ser leve, moderada o grave.
      <br><br>
       El nuevo Coronavirus (COVID-19) ha sido catalogado por la Organización Mundial de la Salud como una emergencia en salud pública de importancia internacional (ESPII). Se han identificado casos en todos los continentes y, el 6 de marzo se confirmó el primer caso en Colombia.</p>
      <br><br>
    </div>
  </div>
</body>

<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> 
<script type="text/javascript">
particlesJS("particles-js", {"particles":{"number":{"value":200,"density":{"enable":true,"value_area":800}},"color":{"value":"#000000"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":5},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":1,"random":true,"anim":{"enable":true,"speed":1,"opacity_min":0,"sync":false}},"size":{"value":3,"random":true,"anim":{"enable":false,"speed":4,"size_min":0.3,"sync":false}},"line_linked":{"enable":false,"distance":150,"color":"#ffffff","opacity":0.4,"width":1},"move":{"enable":true,"speed":1,"direction":"none","random":true,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":600}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":false,"mode":"bubble"},"onclick":{"enable":false,"mode":"repulse"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":250,"size":0,"duration":2,"opacity":0,"speed":3},"repulse":{"distance":400,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true});var count_particles, stats, update; stats = new Stats(); stats.setMode(0); stats.domElement.style.position = 'absolute'; stats.domElement.style.left = '0px'; stats.domElement.style.top = '0px'; document.body.appendChild(stats.domElement); count_particles = document.querySelector('.js-count-particles'); update = function() { stats.begin(); stats.end(); if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) { count_particles.innerText = window.pJSDom[0].pJS.particles.array.length; } requestAnimationFrame(update); }; requestAnimationFrame(update);;  </script>
<script>
  $(document).ready(function() 
    { 
        $("#tablaResult").tablesorter(); 

    }
);
$(document).scroll(function(){
  if ( $(window).scrollTop() > 50 ) {
            $("#myNavbar").removeClass('bg-transparent');
            $("#myNavbar").addClass('bg-light');
          }else{
            $("#myNavbar").addClass('bg-transparent');
          }
});
</script>
</html>