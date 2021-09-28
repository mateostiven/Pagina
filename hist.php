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
            $FIn=strval(strtotime ($_POST['Fecha'].$_POST['MinIn'])*1000);
            $FFn=strval(strtotime ($_POST['Fecha'].$_POST['MinFn'])*1000);            
            
            $sql = "SELECT * FROM datos WHERE Fecha BETWEEN $FIn AND $FFn ORDER BY Fecha DESC";
            $result = $conexion->query($sql);
            
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()){
                    $Poly[]= array ($row['Longitud'],$row['Latitud']);
                    $Fecha= date( 'Y-m-d H:i:s', doubleval($row['Fecha'])/1000);
                    $Marcadores[]=array ($row['Longitud'],$row['Latitud'],$Fecha);
                };  
            } 
            
        ?>




        var polylineH = L.polyline(<?php echo json_encode($Poly) ?>).addTo(map);

        var Marcadores = <?php echo json_encode($Marcadores)?>;

        for ($i=0; $i < Marcadores.length ; $i++) { 
            marker= new L.marker([parseFloat(Marcadores[$i][0]),parseFloat(Marcadores[$i][1])]).bindPopup(Marcadores[$i][2]).addTo(map)
        }; 
        PromedioLat= (parseFloat(Marcadores[0][1])+parseFloat(Marcadores[Marcadores.length-1][1]))/2;
        PromedioLog= (parseFloat(Marcadores[0][0])+parseFloat(Marcadores[Marcadores.length-1][0]))/2;
        setTimeout(() => { map.panTo([PromedioLog,PromedioLat]); }, 500);
            
       



});
</script>