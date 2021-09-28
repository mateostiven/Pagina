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
        <center>
        <h2> Hora de inicio: <?php echo $_POST['Fecha']." ".$_POST['MinIn'].":00" ?> </h2>
        <h2> Hora de fin: <?php echo $_POST['Fecha']." ".$_POST['MinFn'].":00"  ?> </h2>  
        <br> 
        <div id='map'></div>
        </center>

        <form method="POST" action="Index.php">
        <br> 
        <center>
          <input type="submit" values="Regresar" class="btn btn-sucess" name="btn1">    
        </center>
      </form> 

    </body>   

</html>



<script type="text/javascript">
    $(document).ready(function(){

        

        var map = L.map('map').setView([0,0],15);
        var OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });
        OpenStreetMap_Mapnik.addTo(map);
        

        <?php
            include '../../Config.php';
            $conexion=new mysqli($Host,$Usuario,$Clave,'taxi');
            $FIn=DateTime::createFromFormat('Y-m-d H:i:s', $_POST['Fecha']." ".$_POST['MinIn'].':00', new DateTimeZone('GMT-5'))->getTimestamp();
            $FIn=strval($FIn*1000);
            $FFn=DateTime::createFromFormat('Y-m-d H:i:s', $_POST['Fecha']." ".$_POST['MinFn'].':00', new DateTimeZone('GMT-5'))->getTimestamp();
            $FFn=strval($FFn*1000);

            date_default_timezone_set("America/Bogota");
            
            $sql = "SELECT * FROM datos WHERE Fecha BETWEEN $FIn AND $FFn ORDER BY Fecha DESC";
            $result = $conexion->query($sql);
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()){
                    $Poly[]= array ($row['Longitud'],$row['Latitud']);
                    $Fecha= date( 'Y-m-d H:i:s', doubleval($row['Fecha'])/1000);
                    $Marcadores[]=array ($row['Longitud'],$row['Latitud'],$Fecha);
                };  
            }else{
                $Poly[]=[];
                $Marcadores[]=[];
            } 
            
        ?>
        var polylineH = L.polyline(<?php echo json_encode($Poly)?>).addTo(map);

        var Marcadores = <?php echo json_encode($Marcadores)?>;

        var greenIcon = new L.Icon({
        iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
        });

        var RedIcon = new L.Icon({
        iconUrl: 'blackpoint.png',

        iconSize: [10,10],
        iconAnchor: [5,5],
        popupAnchor: [0,0]
        });

        marker= new L.marker([parseFloat(Marcadores[0][0]),parseFloat(Marcadores[0][1])],{icon: greenIcon}).bindPopup(Marcadores[0][2]).addTo(map)
        for ($i=1; $i < Marcadores.length-2 ; $i++) {
            marker= new L.marker([parseFloat(Marcadores[$i][0]),parseFloat(Marcadores[$i][1])]).bindPopup(Marcadores[$i][2]).addTo(map)
        };
        marker= new L.marker([parseFloat(Marcadores[Marcadores.length-1][0]),parseFloat(Marcadores[Marcadores.length-1][1])]).bindPopup(Marcadores[Marcadores.length-1][2]).addTo(map)
        PromedioLat= (parseFloat(Marcadores[0][1])+parseFloat(Marcadores[Marcadores.length-1][1]))/2;
        PromedioLog= (parseFloat(Marcadores[0][0])+parseFloat(Marcadores[Marcadores.length-1][0]))/2;
        setTimeout(() => { map.panTo([PromedioLog,PromedioLat]); }, 500);

       



});
</script>
