<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Auxiliar Contable</title>
    <!-- CSS Bootstrap v5-->
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous" />
    <!-- CSS Main -->
    <link rel="stylesheet" href="./css/main.css" />
    <!--Googgle ads-->
    <script data-ad-client="ca-pub-1037409571525040" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!--Icono barra-->
    <link rel="icon" type="image/png" href="./iconoAX.png" />
  </head>
  <body class="bg-light">
    <!--Anuncios-->
    <object type = "text/html" data = "./anuncios.html"></object>
     <!-- Navbar-->
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light navbar-main">
      <div class="container">
        <!--logo-->
      <a href="#" class="navbar-brand">
        <img src="./img/logo-g.png" alt="Brand Calculadoras Fiscales">
      </a>
      <!--Boton-->
      <button class="navbar-toggler" data-bs-toggle="collapse"
      data-bs-target="#mainNav" aria-controls="mainNav"
      aria-expanded="false" aria-label="Barra de navegacion">
      <span class="navbar-toggler-icon"></span>
      </button>
      <!--Items-->
      <div class="collapse navbar-collapse" id="mainNav">
        <div class="nav ms-auto text-dark flex-column flex-md-row">
          <a href="index.html" class="nav-link active">Home</a>
          <a href="index.html#secServicios" class="nav-link">Servicios</a>
        </div>
      </div>
      </div>
    </nav>
	<div class="container">
      <!--header-->
      <header class="row align-items-center header-main justify-content-center">
        <div class="col-md-7 text-center text-md-start">
			<!--Saludo-->
      <br><br>
			<h1 class="display-2">
            <span class="d-block">IVA</span>
          </h1>
		<div class="container-fluid">
		<form class="col-10 col-md-10 col-lg-10 bg-white rounded shadow p-3 fw-light mb-3 mb-md-0">
		<div class="form-row">
    	<div class="col">
		<div class="form-group">
			<label for="VB">Valor Base</label>
			<input type="text" class="form-control" id="VB" onchange="restaFechas()" placeholder="0">
		</div>
		<div class="form-group">
			<label for="IVA">IVA</label>
			<input type="text" class="form-control" id="IVA" placeholder="0" readonly>
		</div>
		<div class="form-group">
			<label for="Total">Total</label>
			<input type="text" class="form-control" id="Total" placeholder="0" readonly>
		</div>
		<div class="form-check">
		<input class="form-check-input" type="checkbox" value="" id="Retenciones">
		<label class="form-check-label" for="Retenciones">
			Retenciones
		</label>
		</div>
		</div>
  		</div>
		</form>
		<!--Sacar fecha-->
		<script type="text/javascript">
		// Función para calcular los días transcurridos entre dos fechas
		restaFechas = function() //"10/09/2014".split('/');// "15/10/2014".split('/');
		{
			document.getElementById("IVA").value= (document.getElementById("VB").value*.16).toFixed(2);
		document.getElementById("Total").value = document.getElementById("VB").value*.16 + parseInt(document.getElementById("VB").value);
		
		}

		</script>
			<!-- fin -->
		</p>
		</div>
        </div>
      </header>

</body>
</html>