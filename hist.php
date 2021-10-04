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
        <h2> Hora de inicio: <?php echo $_POST['FechaIn']." ".$_POST['MinIn'].":00" ?> </h2>
        <h2> Hora de fin: <?php echo $_POST['FechaFn']." ".$_POST['MinFn'].":00"  ?> </h2>  
        <p> <button type="button" id='Boton'>Centrar</button></p>
        


        <div id='map'></div>
        </center>

        <form method="POST" action="index.php">
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
            $FIn=DateTime::createFromFormat('Y-m-d H:i:s', $_POST['FechaIn']." ".$_POST['MinIn'].':00', new DateTimeZone('GMT-5'))->getTimestamp();
            $FIn=strval($FIn*1000);
            $FFn=DateTime::createFromFormat('Y-m-d H:i:s', $_POST['FechaFn']." ".$_POST['MinFn'].':00', new DateTimeZone('GMT-5'))->getTimestamp();
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

        iconSize: [40,40],
        iconAnchor: [10,20],
        popupAnchor: [0,0]
        });

        marker= new L.marker([parseFloat(Marcadores[0][0]),parseFloat(Marcadores[0][1])],{icon: fin}).bindPopup(Marcadores[0][2]).addTo(map)
       
        marker= new L.marker([parseFloat(Marcadores[Marcadores.length-1][0]),parseFloat(Marcadores[Marcadores.length-1][1])],{icon: inicio}).bindPopup(Marcadores[Marcadores.length-1][2]).addTo(map)
       

   var popup = L.popup();

        function onMapClick(e) {
            Mensaje=new String ("");
            Fi=0;
            latb=(Math.round(e.latlng.lat*1000.0)/1000.0);
            lngb=(Math.round(e.latlng.lng*1000.0)/1000.0);;

           

            for ($i=0; $i < Marcadores.length-1 ; $i++) {
                latM=parseFloat(Marcadores[$i][0]);
                lngM=parseFloat(Marcadores[$i][1]);

                if ((lngb-0.001)<lngM && lngM<(lngb+0.001) && (latb-0.001)<latM && latM<(latb+0.001)){
                    
                    if ((Marcadores[$i][2].slice(0, -3) != Marcadores[Fi][2].slice(0, -3))||(Mensaje=="")){
                        Mensaje=Mensaje+"<br> "+Marcadores[$i][2];

                    }

                    Fi=$i;
                };
            };
            
            popup.setLatLng(e.latlng).setContent("Pasó a las: "+Mensaje).openOn(map);
        }

        map.on('click', onMapClick); 





        map.fitBounds(polylineH.getBounds());
        
        const boton = document.getElementById('Boton');
        boton.addEventListener('click', (event) => {
            map.fitBounds(polylineH.getBounds());
 
        });
        
});
</script>
