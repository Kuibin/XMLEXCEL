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
            <span class="d-block">Conversor XML CFDI 3.3</span>
            Excel/PDF
          </h1>
		<div class="container-fluid">
      <form class="col-xs-12 col-md-8 col-lg-10 bg-white rounded shadow p-3 fw-light mb-3 mb-md-0" name="MiForm" id="MiForm" method="post" action="xmlPDF.php" enctype="multipart/form-data">
        <div class="form-group">
          <div class="col-sm-8">
          <label class="form-label">Archivos XML (50 max)</label>
            <input class="form-control form-control-lg" type="file" accept=".xml" id="miarchivo[]" name="miarchivo[]" multiple="">
          </div>
		  <div>
		  <br>
      <button type="submit" class="btn btn-success" formaction="xmlExcelVista.php"><img src="excel.png" alt="axcontable.com" width="32" height="32" style="vertical-align: middle">Vista Previa de EXCEL</button>
          <button type="submit" class="btn btn-success" formaction="xmlExcel.php"><img src="excel.png" alt="axcontable.com" width="32" height="32" style="vertical-align: middle">Convertir a EXCEL</button>
		  <hr>
          <button type="submit" class="btn btn-danger" formaction="xmlPDF.php"><img src="pdf.png" alt="axcontable.com" width="32" height="32" style="vertical-align: middle">Convertir a PDF</button>
		  </div>
		</div>
		</p>
		</div>
    </div>
        </div>
      </header>
</div>
</body>
</html>