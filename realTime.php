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

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous">

  </script>

  <title>Taxi Service | Real Time</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="font/css/fontello.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
</head>

<body>
  <div class="navbar">
    <div class="navbar-inner">
      <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="index.html"><img src="img/user.jpg" alt=""></a>
        <ul class="nav nav-collapse pull-right">
          <li><a href="index.php"> Home</a></li>
          <li><a href="realTime.php" class="active">Real Time</a></li>
          <li><a href="historic.php"> Historic</a></li>
          <li><a href="aboutUs.php"> About Us</a></li>
        </ul>
        <div class="nav-collapse collapse"></div>
      </div>
    </div>
  </div>
  <div class="container skills">
    <h2>Real time Location </h2>
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
    <div class="table">
      <table align="center" , class="tg">
        <thead>
          <tr>
            <th class="tg-baqh">Fecha</th>
            <th class="tg-0lax">
              <div id='Fecha'></div>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="tg-baqh">Hora</td>
            <td class="tg-0lax">
              <div id='Hora'></div>
            </td>
          </tr>
          <tr>
            <td class="tg-baqh">Longitud</td>
            <td class="tg-0lax">
              <div id='Longitud'></div>
            </td>
          </tr>
          <tr>
            <td class="tg-baqh">Latitud</td>
            <td class="tg-0lax">
              <div id='Latitud'></div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="form">
      <form method="POST" action="historic.php">
        <center>
          <label for="start">Desde:</label>
          <input type="date" id="FechaIn" name="FechaIn" value="2021-09-23" min="2021-01-01" max="2022-12-31">

          <input type="time" id="MinIn" name="MinIn" value="02:30" min="00:00" max="24:00" required>

          <label for="appt">Hasta:</label>
          <input type="date" id="FechaFn" name="FechaFn" value="2021-09-23" min="2021-01-01" max="2022-12-31">

          <input type="time" id="MinFn" name="MinFn" value="23:30" min="00:00" max="24:00" required>

          <p><input type="submit" values="Enviar" name="btn1"></p>

        </center>
      </form>
    </div>
    <div class="mapa">
      <div id='map'></div>
    </div>
  </div>
  <div class="row social">
    <ul class="social-icons">
      <li><a href="#"><img src="img/fb.png" alt=""></a></li>
      <li><a href="#"><img src="img/tw.png" alt=""></a></li>
      <li><a href="#"><img src="img/go.png" alt=""></a></li>
      <li><a href="#"><img src="img/pin.png" alt=""></a></li>
      <li><a href="#"><img src="img/st.png" alt=""></a></li>
      <li><a href="#"><img src="img/dr.png" alt=""></a></li>
    </ul>
  </div>
  <div class="footer">
    <div class="container">
      <p class="pull-left"><a href="https://github.com/mateostiven/Pagina" class="icon-github-circled"> https://github.com</a></p>
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
</body>

</html>

<script type="text/javascript">
  $(document).ready(function() {

    var map = L.map('map').setView([0, 0], 20);
    var OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });
    OpenStreetMap_Mapnik.addTo(map);
    polyline = L.polyline([]).addTo(map); //

    var inicio = new L.Icon({
      iconUrl: 'startpoint.png',
      shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
      iconSize: [40, 40],
      iconAnchor: [10, 20],
      popupAnchor: [0, 0],
      shadowSize: [41, 41]
    });

    var fin = new L.Icon({
      iconUrl: 'finalpoint.png',
      shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
      iconSize: [40, 40],
      iconAnchor: [12, 30],
      popupAnchor: [1, -34],
      shadowSize: [41, 41]
    });


    Marcador = L.marker([0, 0], {
      icon: inicio
    }).addTo(map)

    $('#coordenadas').load("./Latitud.php", function() {

      var coordenadas = ($("#coordenadas").text());

      var coordenadas_1 = coordenadas.split("_");

      var Latitud = "" + coordenadas_1[1] + "";

      var Longitud = "" + coordenadas_1[0] + "";

      Inicio = L.marker([parseFloat(Latitud), parseFloat(Longitud)], {
        icon: fin
      }).addTo(map);

    });


    setInterval(

      function() {

        $('#time').load("./Fecha.php", function() {


          var Time = parseFloat($("#time").text());

          var date = new Date(Time);

          var date2 = date.toString();

          var Fecha_Hora_1 = date2.split(" ");

          var Fecha = "" + Fecha_Hora_1[0] + " - " + Fecha_Hora_1[1] + " - " + Fecha_Hora_1[2] + " - " + Fecha_Hora_1[3] + "";

          var Hora = "" + Fecha_Hora_1[4] + "";

          $('#Fecha').text(Fecha);
          $('#Hora').text(Hora);

        })

        $('#coordenadas').load("./Latitud.php", function() {

          var coordenadas = ($("#coordenadas").text());

          var coordenadas_1 = coordenadas.split("_");

          var Latitud = "" + coordenadas_1[1] + "";

          var Longitud = "" + coordenadas_1[0] + "";

          $('#Latitud').text(Latitud);
          $('#Longitud').text(Longitud);

          map.panTo(new L.LatLng(parseFloat($('#Latitud').text()), parseFloat($('#Longitud').text())));
          polyline.addLatLng([parseFloat($('#Latitud').text()), parseFloat($('#Longitud').text())]);
          Marcador.setLatLng([parseFloat($('#Latitud').text()), parseFloat($('#Longitud').text())]);


        });

      }, 1000
    );

  });
</script>