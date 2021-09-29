<!DOCTYPE html> 

<html>
    <head>

      <div hidden id='time'></div>

      <div hidden id='coordenadas'></div>

      <title> </title>

      <script src="https://unpkg.com/leaflet@1.0.2/dist/leaflet.js"></script>
      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.2/dist/leaflet.css" />
      <style>
        #map { 
          width: 100%;
          height: 400px;
          box-shadow: 5px 5px 5px #888;
       }
      </style>

        <script 
            src="https://code.jquery.com/jquery-3.6.0.js" 
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" 
            crossorigin="anonymous">

        </script>


    </head>

    <body>
        <h1 align ="center">Taxi GPS</h1>
        <style type="text/css">
            .tg  {border-collapse:collapse;border-spacing:0;}
            .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
              overflow:hidden;padding:10px 5px;word-break:normal;}
            .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
              font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
            .tg .tg-baqh{text-align:center;vertical-align:top}
            .tg .tg-0lax{text-align:left;vertical-align:top}
            </style>
        <table align ="center", class="tg">
            <thead>
              <tr>
                <th class="tg-baqh">Fecha</th>
                <th class="tg-0lax"> <div id='Fecha'></div></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="tg-baqh">Hora</td>
                <td class="tg-0lax"> <div id='Hora'></div></td>
              </tr>
              <tr>
                <td class="tg-baqh">Longitud</td>
                <td class="tg-0lax"><div id='Longitud'></div></td>
              </tr>
              <tr>
                <td class="tg-baqh">Latitud</td>
                <td class="tg-0lax"><div id='Latitud'></div></td>
              </tr>
            </tbody>
            </table>
            <br>
            
      
      <form method="POST" action="hist.php">
      <center>
      <label for="start">Seleccione la fecha:</label>

      <input type="date" id="Fecha" name="Fecha"
      value="2021-09-01"
      min="2021-01-01" max="2022-12-31">

      <label for="appt">Seleccione la hora de inicio:</label>

      <input type="time" id="MinIn" name="MinIn"
      min="01:00" max="24:00" required>

      <label for="appt">Seleccione la hora de final:</label>

      <input type="time" id="MinFn" name="MinFn"
      min="01:00" max="24:00" required>
        
      <p><input type="submit" values="Enviar" name="btn1"></p>  
          
        </center>
      </form> 

      <br>

      <div id='map'></div>


    </body>
</html>

<script type="text/javascript">

    $(document).ready(function(){

                var map = L.map('map').setView([0,0],20);
                var OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                  maxZoom: 19,
                  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                });
                OpenStreetMap_Mapnik.addTo(map);
                polyline = L.polyline([]).addTo(map); //
                var greenIcon = new L.Icon({
                    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
                    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                    iconSize: [25, 41],
                    iconAnchor: [12, 41],
                    popupAnchor: [1, -34],
                    shadowSize: [41, 41]
                    });

                Marcador= L.marker([0,0],{icon: greenIcon}).addTo(map)
                
              $('#coordenadas').load("./Latitud.php", function(){

                var coordenadas = ($("#coordenadas").text());

                var coordenadas_1 = coordenadas.split("_");

                var Latitud = ""+coordenadas_1[1]+"";

                var Longitud = ""+coordenadas_1[0]+"";

                Inicio= L.marker([parseFloat(Latitud),parseFloat(Longitud)]).addTo(map); 
               
              });

        

                

                
        setInterval(

            function(){

                $('#time').load("./Fecha.php",function(){


                var Time = parseFloat($("#time").text());

                var date = new Date(Time);

                var date2 = date.toString();

                var Fecha_Hora_1 = date2.split(" ");

                var Fecha = ""+Fecha_Hora_1[0]+" - "+Fecha_Hora_1[1]+" - "+Fecha_Hora_1[2]+" - "+Fecha_Hora_1[3]+""; 

                var Hora = ""+Fecha_Hora_1[4]+"";

                $('#Fecha').text(Fecha);
                $('#Hora').text(Hora);

                })

                $('#coordenadas').load("./Latitud.php", function(){

                  var coordenadas = ($("#coordenadas").text());

                  var coordenadas_1 = coordenadas.split("_");

                  var Latitud = ""+coordenadas_1[1]+"";

                  var Longitud = ""+coordenadas_1[0]+"";
                
                  $('#Latitud').text(Latitud);
                  $('#Longitud').text(Longitud);

                  map.panTo(new L.LatLng(parseFloat($('#Latitud').text()),parseFloat($('#Longitud').text())));
                  polyline.addLatLng([parseFloat($('#Latitud').text()),parseFloat($('#Longitud').text())]); 
                  Marcador.setLatLng([parseFloat($('#Latitud').text()),parseFloat($('#Longitud').text())]); 
                  

                });

            },1000
        );

    });

</script>