<!DOCTYPE html>
<html lang="en">

<head>
  <div hidden id='time'></div>
  <div hidden id='coordenadas'></div>

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
        <form method="POST" action="historic.php">

          <label for="start">Desde:</label>
          <input type="date" id="FechaIn" name="FechaIn" value="2021-10-07" min="2021-01-01" max="2022-12-31">

          <input type="time" id="MinIn" name="MinIn" value="02:30" min="00:00" max="24:00" required>

          <label for="appt">Hasta:</label>
          <input type="date" id="FechaFn" name="FechaFn" value="2021-10-07" min="2021-01-01" max="2022-12-31">

          <input type="time" id="MinFn" name="MinFn" value="23:30" min="00:00" max="24:00" required>

          <p><input type="submit" values="Enviar" name="btn1"> <button type="button" id='Boton'>Centrar</button></p>

        <select id="Taxi" style="height: 38px; width:75px;">  
          <option value=1>Taxi 1</option> 
          <option value=2>Taxi 2</option>
        </select> 
        
        </form>
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
    <div class="mapa">
      <div id='map'></div>
    </div>
    <div class="tail">
      <form method="POST" action="realTime.php">
        <center>
          <br>
          <input type="submit" value="Regresar" name="btnback">
        </center>
      </form>
    </div>
  </div>
  <br>
  <br>
  <!-- <div class="row social">
    <ul class="social-icons">
    <li><a href="#"><img src="img/facebook.png" alt=""></a></li>
    <li><a href="#"><img src="img/instagram.png" alt=""></a></li>
    <li><a href="#"><img src="img/twitter.png" alt=""></a></li>
    <li><a href="#"><img src="img/github.png" alt=""></a></li>
    <li><a href="#"><img src="img/linkedin.png" alt=""></a></li>
    </ul>
  </div> -->
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
</body>

</html>

<script type="text/javascript">
  $(document).ready(function() {



    var map = L.map('map').setView([0, 0], 15);
    var OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });
    OpenStreetMap_Mapnik.addTo(map);


    <?php
    include '../../Config.php';
    $conexion = new mysqli($Host, $Usuario, $Clave, 'taxi');
    $FIn = DateTime::createFromFormat('Y-m-d H:i:s', $_POST['FechaIn'] . " " . $_POST['MinIn'] . ':00', new DateTimeZone('GMT-5'))->getTimestamp();
    $FIn = strval($FIn * 1000);
    $FFn = DateTime::createFromFormat('Y-m-d H:i:s', $_POST['FechaFn'] . " " . $_POST['MinFn'] . ':00', new DateTimeZone('GMT-5'))->getTimestamp();
    $FFn = strval($FFn * 1000);
    $Taxi=$_POST['Taxi'];
    date_default_timezone_set("America/Bogota");

    $sql = "SELECT * FROM datos WHERE Taxi=$Taxi Fecha BETWEEN $FIn AND $FFn ORDER BY Fecha DESC";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $Poly[] = array($row['Longitud'], $row['Latitud']);
        $Fecha = date('Y-m-d H:i:s', doubleval($row['Fecha']) / 1000);
        $Marcadores[] = array($row['Longitud'], $row['Latitud'], $Fecha);
      };
    } else {
      $Poly[] = [];
      $Marcadores[] = [];
    }

    ?>
    console.log(<?php $Taxi ?>);
    var polylineH = L.polyline(<?php echo json_encode($Poly) ?>).addTo(map);

    var Marcadores = <?php echo json_encode($Marcadores) ?>;

    var fin = new L.Icon({
      iconUrl: 'finalpoint.png',
      shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
      iconSize: [40, 40],
      iconAnchor: [12, 30],
      popupAnchor: [1, -34],
      shadowSize: [41, 41]
    });

    var inicio = new L.Icon({
      iconUrl: 'startpoint.png',

      iconSize: [40, 40],
      iconAnchor: [10, 20],
      popupAnchor: [0, 0]
    });

    marker = new L.marker([parseFloat(Marcadores[0][0]), parseFloat(Marcadores[0][1])], {
      icon: fin
    }).bindPopup(Marcadores[0][2]).addTo(map)

    marker = new L.marker([parseFloat(Marcadores[Marcadores.length - 1][0]), parseFloat(Marcadores[Marcadores.length - 1][1])], {
      icon: inicio
    }).bindPopup(Marcadores[Marcadores.length - 1][2]).addTo(map)


    var popup = L.popup();

    function onMapClick(e) {
      Mensaje = new String("");
      Fi = 0;
      latb = (Math.round(e.latlng.lat * 1000.0) / 1000.0);
      lngb = (Math.round(e.latlng.lng * 1000.0) / 1000.0);;


      for ($i = 0; $i < Marcadores.length - 1; $i++) {
        latM = parseFloat(Marcadores[$i][0]);
        lngM = parseFloat(Marcadores[$i][1]);

        if ((lngb - 0.001) < lngM && lngM < (lngb + 0.001) && (latb - 0.001) < latM && latM < (latb + 0.001)) {

          if ((Marcadores[$i][2].slice(0, -3) != Marcadores[Fi][2].slice(0, -3)) || (Mensaje == "")) {
            Mensaje = Mensaje + "<br> " + Marcadores[$i][2];

          }

          Fi = $i;
        };
      };

      popup.setLatLng(e.latlng).setContent("Pasó a las: " + Mensaje).openOn(map);
    }

    map.on('click', onMapClick);

    map.fitBounds(polylineH.getBounds());

    const boton = document.getElementById('Boton');
    boton.addEventListener('click', (event) => {
      map.fitBounds(polylineH.getBounds());

    });

  });
</script>
