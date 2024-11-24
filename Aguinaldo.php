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
            <span class="d-block">Aguinaldo</span>
          </h1>
			<p class="alert alert-success" role="alert">Ayuda para Patrones y Trabajadores.</p>
		  <div class="container-fluid">
		  <form>
		<div class="form-row">
    	<div class="col">
		<!--<div class="form-group">
			<label for="SemPagPen">Semanas pendientes de pago.</label>
			<input type="text" class="form-control" id="SemPagPen" placeholder="0">
		</div>-->
		<div class="form-group">
			<label for="Aguinaldo">Aguinaldo</label>
			<input type="text" class="form-control" id="Aguinaldo" placeholder="0" readonly>
		</div>
		<div id="pagardias" class="form-group" style="display:none">
			<label for="PagD">Trabajo menor a 15 dias.¿Desea pagarlo?.</label>
			<input type="text" class="form-control" id="PagD" onchange="restaFechas()" placeholder="0 días">
		</div>
		</div>
		<div class="col">
		<div class="form-group">
			<label for="InicioT">Inicio de trabajo</label>
			<input type="date" class="form-control" id="InicioT" onchange="restaFechas()" placeholder="DD/MM/AAAA" required>
		</div>
		<div class="form-group">
			<label for="SueldoDiario">Sueldo Diario.</label>
			<input type="text" class="form-control" id="SueldoDiario" onchange="restaFechas()" placeholder="0" required>
		</div>
		</div>
  		</div>
		</form>
		<!--Sacar fecha-->
		<script type="text/javascript">
		// Función para calcular los días transcurridos entre dos fechas
		restaFechas = function() //"10/09/2014".split('/');// "15/10/2014".split('/');
		{
		var date1 = new Date(document.getElementById("InicioT").value);
		var hoyAno = new Date();
		var date2 = new Date(new Date("12/31/"+hoyAno.getFullYear()));

		var DateDiff = {
		inDays: function(d1, d2) {
			var t2 = d2.getTime();
			var t1 = d1.getTime();

			return parseInt((t2-t1)/(1000 * 60 * 60 * 24));
		},

		inWeeks: function(d1, d2) {
			var t2 = d2.getTime();
			var t1 = d1.getTime();

			return parseInt((t2-t1)/(24*3600*1000*7));
		},

		inMonths: function(d1, d2) {
			var d1Y = d1.getFullYear();
			var d2Y = d2.getFullYear();
			var d1M = d1.getMonth();
			var d2M = d2.getMonth();

			return (d2M+12*d2Y)-(d1M+12*d1Y);
		},

		inYears: function(d1, d2) {
			return d2.getFullYear()-d1.getFullYear();
		}
		}
		//alert(DateDiff.inDays(date1,date2));
		
		var dias = (DateDiff.inDays(date1,date2)+1);
		var hoy = new Date();
		var aguiDias = (DateDiff.inDays(new Date("01/01/"+hoy.getFullYear()),date2)+2);//diferencia de dias en entre el 1 de enero de año actual a los dias puestos

		var anos = DateDiff.inYears(date1,date2);

		//Aguinaldo
		var aguinaldo=0;
		var diasProporcionales = 0;
			if(hoy.getFullYear()==date1.getFullYear()){
				if(dias>=15){
				diasProporcionales = (15/365)*365;
				//aguinaldo
			aguinaldo = diasProporcionales * document.getElementById("SueldoDiario").value;
			document.getElementById("Aguinaldo").value=aguinaldo;
			document.getElementById("pagardias").style.display="none";

				}else{
				document.getElementById("Aguinaldo").value="Trabajo menor a 15 dias";
				document.getElementById("pagardias").style.display="";
				}
			}else{//Si esta fuera del año tomar desde el 1 de enero del año en curso
				if(aguiDias>=15){
				diasProporcionales = (15/365)*365;
				
			//aguinaldo
			aguinaldo = diasProporcionales * document.getElementById("SueldoDiario").value;
			document.getElementById("Aguinaldo").value=aguinaldo;
			document.getElementById("pagardias").style.display="none";

				}else{
				document.getElementById("Aguinaldo").value="Trabajo menor a 15 dias";
				document.getElementById("pagardias").style.display="";
				}
			}
			///
			if(document.getElementById("PagD").value !== ''){
				diasProporcionales = (15/365)*document.getElementById("PagD").value;
				
			//aguinaldo
			aguinaldo = diasProporcionales * document.getElementById("SueldoDiario").value;
			document.getElementById("Aguinaldo").value=aguinaldo;
			}
		}

		</script>
			<!-- fin -->
		  </div>

		  </div>
      </header>
</body>
</html>