<!DOCTYPE html>
<html lang="en">

<head>
  <div hidden id='time1'></div>
  <div hidden id='coordenadas1'></div>
  <div hidden id='time2'></div>
  <div hidden id='coordenadas2'></div>



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

    <div id="TablaT1">
    <table  align="center" , class="tg", >
        <tbody>
            <tr>
                <td class="tg-9wq8" rowspan=2> TAXI 1</td>
                <td class="tg-baqh">FECHA</td>
                <td class="tg-baqh">HORA</td>
                <td class="tg-baqh">LONGITUD</td>
                <td class="tg-baqh">LATITUD</td>
                <td class="tg-baqh">RPM</td>
            </tr>
            <tr>
                <td class="tg-0lax"><div id='Fecha1'></div></td>
                <td class="tg-0lax"><div id='Hora1'></div></td>
                <td class="tg-0lax"><div id='Longitud1'></div></td>
                <td class="tg-0lax"><div id='Latitud1'></div></td>
                <td class="tg-0lax"> No disponible para Taxi 1</td>
            </tr>
        </tbody>
    </table>
    </div>
    <br>
    <div id="TablaT2" hidden>
    <table  align="center" , class="tg", >
        <tbody>
            <tr>
                <td class="tg-9wq8" rowspan=2> TAXI 2</td>
                <td class="tg-baqh"> FECHA</td>
                <td class="tg-baqh">HORA</td>
                <td class="tg-baqh">LONGITUD</td>
                <td class="tg-baqh">LATITUD</td>
                <td class="tg-baqh">RPM</td>
            </tr>
            <tr>
                <td class="tg-0lax"><div id='Fecha2'></div></td>
                <td class="tg-0lax"><div id='Hora2'></div></td>
                <td class="tg-0lax"><div id='Longitud2'></div></td>
                <td class="tg-0lax"><div id='Latitud2'></div></td>
                <td class="tg-0lax"><div id='rpmid2'></td>
            </tr>
        </tbody>
    </table>
    </div>

    <br>
    <div class="form">
    </div>
    <center>
    <select id="Taxi" style="height: 50px; width:100px;">  
      <option value=1>  Taxi 1    </option> 
      <option value=2>  Taxi 2    </option>
      <option value=3>  Ambos     </option>
    </select> 
    </center> 
    <br>

    <div class="mapa">
      <div id='map'></div>
    </div>
  </div>

  <br>
  <br>
  <br>
  <br>
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
</body>

</html>

<script src="RT.js"></script>