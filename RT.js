
  $(document).ready(function() {

    Ntaxi=1;
    var map = L.map('map').setView([0, 0], 15);
    var OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 19,
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });
    OpenStreetMap_Mapnik.addTo(map);
    polyline1= L.polyline([]).addTo(map); 
    polyline2= L.polyline([],{color:'red'}); 

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


    Marcador1 = L.marker([0, 0], {
      icon: fin
    }).addTo(map)
    Marcador2 = L.marker([0, 0], {
        icon: fin
      })

   
    $('#coordenadas1').load("./Latitud1.php", function() {

        var coordenadas1 = ($("#coordenadas1").text());

        var coordenadas_1 = coordenadas1.split("_");

        var Latitud1 = "" + coordenadas_1[1] + "";

        var Longitud1 = "" + coordenadas_1[0] + "";
  
        Inicio1 = L.marker([parseFloat(Latitud1), parseFloat(Longitud1)], {
          icon: inicio
        }).addTo(map);
  
      });

    $('#coordenadas2').load("./Latitud2.php", function() {

        var coordenadas2 = ($("#coordenadas2").text());

        var coordenadas_2 = coordenadas2.split("_");

        var Latitud2 = "" + coordenadas_2[1] + "";

        var Longitud2 = "" + coordenadas_2[0] + "";
  
        Inicio2 = L.marker([parseFloat(Latitud2), parseFloat(Longitud2)], {
          icon: inicio
        })
  
      });

    setInterval(

      function() {
        $('#rpmid').load("rpm.php");

        i=2;
        
        $('#time'+i).load("./Fecha"+i+".php", function() {
           
          var date = new Date(parseFloat($("#time"+i).text()));

          var date2 = date.toString();

          var Fecha_Hora = date2.split(" ");

          var Fecha = "" + Fecha_Hora[0] + " - " + Fecha_Hora[1] + " - " + Fecha_Hora[2] + " - " + Fecha_Hora[3] + "";

          var Hora= "" + Fecha_Hora[4] + "";

          $('#Fecha'+i).text(Fecha);
          $('#Hora'+i).text(Hora);

        });

        $('#coordenadas'+i).load("./Latitud"+i+".php", function() {

          var coordenadas = ($("#coordenadas"+i).text());

          var coordenadas_1 = coordenadas.split("_");

          var Latitud = "" + coordenadas_1[1] + "";

          var Longitud = "" + coordenadas_1[0] + "";

          $('#Latitud'+i).text(Latitud);
          $('#Longitud'+i).text(Longitud);
          
          polyline2.addLatLng([parseFloat($('#Latitud2').text()), parseFloat($('#Longitud2').text())]);
          Marcador2.setLatLng([parseFloat($('#Latitud2').text()), parseFloat($('#Longitud2').text())]);
          });

        if(Ntaxi!=3){
        map.panTo(new L.LatLng(parseFloat($('#Latitud'+Ntaxi).text()), parseFloat($('#Longitud'+Ntaxi).text())));
        }

      }, 3000
    );

  });


  const taxi = document.getElementById('Taxi');
      taxi.addEventListener('change', (event) => {
        Ntaxi=document.getElementById('Taxi').value;
        if (Ntaxi==1){
            $('#TablaT1').show();
            $('#TablaT2').hide();
            polyline1.addTo(map);
            map.removeLayer(polyline2);
            Marcador1.addTo(map);
            map.removeLayer(Marcador2);
            Inicio1.addTo(map);
            map.removeLayer(Inicio2);
        };
        if (Ntaxi==2){
            $('#TablaT1').hide();
            $('#TablaT2').show();

            polyline2.addTo(map);
            map.removeLayer(polyline1);
            Marcador2.addTo(map);
            map.removeLayer(Marcador1);
            Inicio2.addTo(map);
            map.removeLayer(Inicio1);

        }; 
        if (Ntaxi==3){
            $('#TablaT1').show();
            $('#TablaT2').show();
            polyline1.addTo(map);
            polyline2.addTo(map);
            Marcador1.addTo(map);
            Marcador2.addTo(map);
            Inicio1.addTo(map);
            Inicio2.addTo(map);
        };
        
      });
