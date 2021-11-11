<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
  <style>
    #map {
      width: 100%;
      height: 400px;
      box-shadow: 5px 5px 5px #888;
    }
  </style>

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"> </script>

  <title>Taxi Service | Historic</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="font/css/fontello.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen">
</head>
<style type="text/css">
      .tg {
        border-collapse: collapse;
        border-spacing: 0;
      }

      .tg td {
        border-color: black;
        border-style: solid;
        border-width: 1px;
        font-family: Arial, sans-serif;
        font-size: 14px;
        overflow: hidden;
        padding: 10px 5px;
        word-break: normal;
      }

      .tg th {
        border-color: black;
        border-style: solid;
        border-width: 1px;
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-weight: normal;
        overflow: hidden;
        padding: 10px 5px;
        word-break: normal;
      }

      .tg .tg-baqh {
        text-align: center;
        vertical-align: top
      }

      .tg .tg-0lax {
        text-align: left;
        vertical-align: top
      }
    </style>

<body>
  <div class="navbar">
    <div class="navbar-inner">
      <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="index.php"><img src="img/user.jpg" alt=""></a>
        <ul class="nav nav-collapse pull-right">
          <li><a href="index.php"> Home</a></li>
          <li><a href="realTime.php">Real Time</a></li>
          <li><a href="historic.php" class="active"> Historic</a></li>
          <li><a href="aboutUs.php"> About Us</a></li>
        </ul>
        <div class="nav-collapse collapse"></div>
      </div>
    </div>
  </div>
  <div class="container work">
    <h2>Historical Travels</h2>
    <div class="head">
      <center>
          <label for="start">Desde:</label>
          <input type="date" id="FechaIn" name="FechaIn" value="2021-10-07" min="2021-01-01" max="2022-12-31">

          <input type="time" id="MinIn" name="MinIn" value="02:30" min="00:00" max="24:00" required>

          <label for="appt">Hasta:</label>
          <input type="date" id="FechaFn" name="FechaFn" value="2021-10-07" min="2021-01-01" max="2022-12-31">

          <input type="time" id="MinFn" name="MinFn" value="23:30" min="00:00" max="24:00" required>

          <p><select id="Taxi" name="Taxi" style="height: 38px; width:75px;">  
            <option value="1">Taxi 1</option> 
            <option value="2">Taxi 2</option>
            <option value="3">Ambos</option> 
          </select></p>

          <p><button type="button" values="Enviar" name="btn1" id='enviar'>Enviar </button>
            <button type="button" id='Boton'>Centrar</button></p>
      </center>
    </div>
    <script>
      const FI = document.getElementById('FechaIn');
      FI.addEventListener('focusout', (event) => {
        document.getElementById('FechaFn').min = document.getElementById('FechaIn').value;

        if (document.getElementById('FechaFn').min > document.getElementById('FechaFn').value) {
          document.getElementById('FechaFn').value = document.getElementById('FechaFn').min;
        };
      });
      const HF = document.getElementById('MinFn');
      HF.addEventListener('focusin', (event) => {
        if (document.getElementById('FechaFn').value == document.getElementById('FechaIn').value) {
          document.getElementById('MinFn').min = document.getElementById('MinIn').value;
        }
      });
    </script>

<div style="margin: auto; width: 100%;">
  <div style="float: left; width: 33%;">
    <table align="center" , class="tg" width="100%" hidden id="TablaT1">
      <tbody>
        <tr>
          <td class="tg-baqh">Taxi 1</td>
        </tr>
        <tr>
 
          <td class="tg-baqh"><div id='dateid1'></div>, RPM: <div id='rpmid'></div></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div style="float: left; width: 33%;">
    <table align="center", class="tg" width="100%">
      <tbody>
        <tr>
          <td class="tg-9wq8">
              <div class="slider-wrapper" id = "range1div" hidden>
              <input type="range"  id = "range1" min="0" step="1" value="0"> Taxi 1</div>
              
              <div class="slider-wrapper" id = "range2div" hidden>
              <input type="range"  id = "range2" min="0" step="1" value="0"> Taxi 2</div>
          </td>
        </tr>
        
      </tbody>
    </table>
  </div>

  <div style="float: left; width: 33%;">
    <table align="center" , class="tg" width="100%" hidden id="TablaT2">
      <tbody>
        <tr>
          <td class="tg-baqh">Taxi 2 </td>
        </tr>
        <tr>
          <td class="tg-baqh"><div id='dateid2'>, RPM: NaN</td>
        </tr>
      </tbody>
    </table>
  </div>
    <div style="clear: both;"></div>
</div>
<br>

    <div class="mapa">
      <div id='map'></div>
    </div>
    <br>
    
    </div>
    <div class="footer">
    <div class="container">
      <p class="pull-left"><a href="https://github.com/mateostiven/Pagina"  target="_blank" class="icon-github-circled"> https://github.com</a></p>
      <p class="pull-right"><a href="#myModal" role="button" data-toggle="modal"> <i class="icon-mail"></i> CONTACT</a></p>
    </div>
  </div>

  <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3 id="myModalLabel"><i class="icon-mail"></i> Contact Me</h3>
    </div>
    <div class="modal-body">
      <form action="#">
        <input type="text" placeholder="Yopur Name">
        <input type="text" placeholder="Your Email">
        <input type="text" placeholder="Website (Optional)">
        <textarea rows="3" style="width:80%"></textarea>
        <br>
        <button type="submit" class="btn btn-large"><i class="icon-paper-plane"></i> SUBMIT</button>
      </form>
    </div>
  </div>
  <script src="js/jquery-1.10.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
    $('#myModal').modal('hidden')
  </script>
  <script src="js/jquery.fancybox.js?v=2.1.5"></script>
  <script>
    $(document).ready(function() {
      $(".fancybox-thumb").fancybox({
        helpers: {
          title: {
            type: 'inside'
          },
          overlay: {
            css: {
              'background': 'rgba(1,1,1,0.65)'
            }
          }
        }
      });
    });
  </script>  
  <br>
  <br>
  <br>
  <br>

  
</body>
<script src="Icons.js"></script>;
</html>

<script type="text/javascript">
  $(document).ready(function() {

    var map = L.map('map').setView([0, 0], 15);
    var OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });
    OpenStreetMap_Mapnik.addTo(map);

    Inicio1= new L.marker([0,0], {icon: inicio});
    Inicio2= new L.marker([0,0], {icon: inicio});
    Fin1=new L.marker([0,0], {icon: fin});
    Fin2=new L.marker([0,0], {icon: fin});
    Apuntador1 = new L.marker([0, 0], {icon: pointer});
    Apuntador2 = new L.marker([0, 0], {icon: pointer});
    
    polyline1= L.polyline([]); 
    polyline2= L.polyline([],{color:'red'}); 
    var Mensaje_date1 = new String("");
    var Mensaje_rpm1 = new String("");
    var Mensaje_date2 = new String("");

    const Enviar = document.getElementById('enviar');
    Enviar.addEventListener('click', (event) => {


    $.post('Consulta.php', {FechaIn: document.getElementById('FechaIn').value, MinIn:document.getElementById('MinIn').value,
      FechaFn: document.getElementById('FechaFn').value, MinIn:document.getElementById('MinFn').value}, function(data) {
      Marcadores1=[];
      Marcadores2=[];
      polyline1.setLatLng([]);
      polyline2.setLatLng([]);
      Tabla= JSON.parse(data);
      
      for(i=0;i<Tabla.length;i++){
        if(Tabla[i][4]==1){
          Marcadores1.push(Tabla[i]);
          polyline1.addLatLng([parseFloat(Tabla[i][0]), parseFloat(Tabla[i][1])]);
          
        }else{
          Marcadores2.push(Tabla[i]);
          polyline2.addLatLng([parseFloat(Tabla[i][0]), parseFloat(Tabla[i][1])]);
        }
      }

      Inicio1.setLatLng([parseFloat(Marcadores1[0][0]), parseFloat(Marcadores1[0][1])]);
        
      Inicio2.setLatLng([parseFloat(Marcadores2[0][0]), parseFloat(Marcadores2[0][1])]);

      Fin1.setLatlng([parseFloat(Marcadores1[Marcadores1.length - 1][0]), parseFloat(Marcadores1[Marcadores1.length - 1][1])]);

      Fin2.setLatlng([parseFloat(Marcadores2[Marcadores2.length - 1][0]), parseFloat(Marcadores2[Marcadores2.length - 1][1])]);
      
    });
    
    Ntaxi=document.getElementById('Taxi').value;
      if (Ntaxi==1){
          $('#TablaT1').show();
          $('#TablaT2').hide();
          $('#range1div').show();
          $('#range2div').hide();

          map.addLayer(polyline1);
          map.removeLayer(polyline2);
          map.addLayer(Fin1);
          map.removeLayer(Fin2);
          map.addLayer(Inicio1);
          map.removeLayer(Inicio2);
          map.addLayer(Apuntador1);
          map.removeLayer(Apuntador2);

      };
      if (Ntaxi==2){
          $('#TablaT1').hide();
          $('#TablaT2').show();
          $('#range1div').hide();
          $('#range2div').show();

          map.addLayer(polyline2);
          map.removeLayer(polyline1);
          map.addLayer(Fin2);
          map.removeLayer(Fin1);
          map.addLayer(Inicio2);
          map.removeLayer(Inicio1);
          map.addLayer(Apuntador2);
          map.removeLayer(Apuntador1);

      }; 
      if (Ntaxi==3){
          $('#TablaT1').show();
          $('#TablaT2').show();
          $('#range1div').show();
          $('#range2div').show();
          map.addLayer(polyline1);
          map.addLayer(Fin1);
          map.addLayer(Inicio1);
          map.addLayer(polyline2);
          map.addLayer(Fin2);
          map.addLayer(Inicio2);
          map.addLayer(Apuntador1);
          map.addLayer(Apuntador2);
      };
      
      var recorrido1 = document.getElementById('range1');
	    recorrido1.setAttribute("max", Marcadores1.length -1);

      var recorrido2 = document.getElementById('range2');
	    recorrido2.setAttribute("max", Marcadores2.length -1);

      var range1 = document.getElementById('range1div');
      range1.addEventListener('mousemove',function(){
        var valor1 = range1.value;
        Mensaje_date1 = Marcadores[valor1][2];
        Mensaje_rpm1 = Marcadores[valor1][3];
        Apuntador1.setLatLng([parseFloat(Marcadores1[valor1][0]), parseFloat(Marcadores1[valor1][1])]);          
        $("#rpmid").text(Mensaje_rpm1);
        $("#dateid1").text(Mensaje_date1);
      });
      range1.addEventListener('mousemove',function(){
        var valor1 = range1.value;
        Mensaje_date1 = Marcadores[valor1][2];
        Mensaje_rpm1 = Marcadores[valor1][3];
        Apuntador2.setLatLng([parseFloat(Marcadores1[valor1][0]), parseFloat(Marcadores1[valor1][1])]);          
        $("#rpmid").text(Mensaje_rpm1);
        $("#dateid1").text(Mensaje_date1);
      });

  });

    const boton = document.getElementById('Boton');
    boton.addEventListener('click', (event) => {
      if (document.getElementById('Taxi').value==1){
        map.fitBounds(polyline1.getBounds());
      };
      if (document.getElementById('Taxi').value==2){
        map.fitBounds(polyline2.getBounds());
      };
    });

  });
</script>