<!DOCTYPE html>
<html lang="en">
<head>
<title>Taxi Service</title>
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
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="index.php"><img src="img/user.jpg" alt=""></a>
      <ul class="nav nav-collapse pull-right">
        <li><a href="index.php" class="active"> Home</a></li>
        <li><a href="realTime.php">Real Time</a></li>
        <li><a href="historic.php"> Historic</a></li>
        <li><a href="aboutUs.php"> About Us</a></li>
      </ul>
      <div class="nav-collapse collapse"></div>
    </div>
  </div>
</div>
<div class="container profile">
  <div class="span3"> <img src="img/mini.png" alt=""> </div>
  <div class="span5">
    <h1>Taxi Service</h1>
    <h3>Sistema De Telemetría De Un Vehículo</h3>
    <p> Con este proyecto se busca que el estudiante relacione los conocimientos de circuitos electrónicos analógicos y digitales con los sistemas de telecomunicaciones, y así, desarrolle una aplicación de telemetría teniendo en cuenta las especificaciones de diseño, y las restricciones de alcance, costo y tiempo; propias de la gestión de proyectos. </p>
    <a href="https://drive.google.com/file/d/1vjAHzRlFgjOrzvUlYwtxIpZWzTA-WBJg/view?usp=drivesdk" class="hire-me"><i class="icon-download"></i> Download app movil </a> </div>
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
<div class="footer" href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
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