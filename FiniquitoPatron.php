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
			<br><br><br>
			<h1 class="display-2">
            <span class="d-block">Finiquito y</span>
            Liquidacion
		</h1>
		<div class="container-fluid">
		<form class="col-10 col-md-10 col-lg-10 bg-white rounded shadow p-3 fw-light mb-3 mb-md-0">
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
		<div class="form-group">
			<label for="PropVac">Proporcional Vacaciones</label>
			<input type="text" class="form-control" id="PropVac" placeholder="0" readonly>
		</div>
		<div class="form-group">
			<label for="PrimVac">Prima Vacacional</label>
			<input type="text" class="form-control" id="PrimVac" placeholder="0" readonly>
		</div>
		<div class="form-group">
			<label for="antiguedad">Antiguedad</label>
			<input type="text" class="form-control" id="antiguedad" placeholder="0" readonly>
		</div>
		</div>
		<div class="col">
		<div class="form-group">
			<label for="InicioT">Inicio de trabajo</label>
			<input type="date" class="form-control" id="InicioT" onchange="restaFechas()" placeholder="DD/MM/AAAA" required>
		</div>
		<div class="form-group">
			<label for="FinT">Fin de trabajo</label>
			<input type="date" class="form-control" id="FinT" onchange="restaFechas()" placeholder="DD/MM/AAAA" required>
		</div>
		<div class="form-group">
			<label for="SueldoDiario">Sueldo Diario.</label>
			<input type="text" class="form-control" id="SueldoDiario" onchange="restaFechas()" placeholder="0" required>
		</div>
		</div>
  		</div>
		</form>
		<hr class="my-4">
		<h5 class="card-title"><p>Total.</p></h5>
		<div class="form-group"> 
			<input type="text" class="form-control" id="total" placeholder="$0" readonly>
		</div>
		<!--Test
		<div class="form-group"> 
			<input type="text" class="form-control" id="test" placeholder="$0" readonly>
		</div>
		<div class="form-group"> 
			<input type="text" class="form-control" id="test2" placeholder="$0" readonly>
		</div>-->
		<!--Sacar fecha-->
		<script type="text/javascript">
		document.getElementById("antiguedad").value= localStorage.getItem("tipoRenuncia");
		// Función para calcular los días transcurridos entre dos fechas
		restaFechas = function() //"10/09/2014".split('/');// "15/10/2014".split('/');
		{
		var date1 = new Date(document.getElementById("InicioT").value);
		var date2 = new Date(document.getElementById("FinT").value);

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

		//sacar biciesto
		const esBisiesto = (year) => {
		return (year % 400 === 0) ? true : 
					(year % 100 === 0) ? false : 
						year % 4 === 0;
		};
		
		var hoy = new Date();
		var dias;// = (DateDiff.inDays(date1,date2))+1;//(DateDiff.inDays(date1,date2)+1);
		if (esBisiesto(date2.getFullYear()) == true){dias = (DateDiff.inDays(date1,date2));}else{
			dias = (DateDiff.inDays(date1,date2))+1;
		}

		var aguiDias = (DateDiff.inDays(new Date("01/01/"+hoy.getFullYear()),date2)+2);//diferencia de dias en entre el 1 de enero de año actual a los dias puestos

		var anos = DateDiff.inYears(date1,date2);

		var vacProporcionales=0;
		var diasVacProp= dias;

		if(document.getElementById("SueldoDiario").value === null || document.getElementById("SueldoDiario").value === '' || date1 === null || date1 === '' || date2 === null || date2 === ''){
			event.preventDefault();
          event.stopPropagation();
		  form.classList.add('was-validated');
		}else{
			if (diasVacProp > 365){diasVacProp=365;}
		//Vacaciones Proporcional
		if(anos<=1){
			vacProporcionales = ((6/365)*diasVacProp)*document.getElementById("SueldoDiario").value;
		}else
		if(anos==2){
			vacProporcionales = ((8/365)*diasVacProp)*document.getElementById("SueldoDiario").value;
		}else
		if(anos==3){
			vacProporcionales = ((10/365)*diasVacProp)*document.getElementById("SueldoDiario").value;
		}else
		if(anos==4){
			vacProporcionales = ((12/365)*diasVacProp)*document.getElementById("SueldoDiario").value;
		}else
		if(anos>=5 && anos<=9){
			vacProporcionales = ((14/365)*diasVacProp)*document.getElementById("SueldoDiario").value;
		}else
		if(anos>=10 && anos<=14){
			vacProporcionales = ((16/365)*diasVacProp)*document.getElementById("SueldoDiario").value;
		}else
		if(anos>=15 && anos<=19){
			vacProporcionales = ((18/365)*diasVacProp)*document.getElementById("SueldoDiario").value;
		}else
		if(anos>=20 && anos<=24){
			vacProporcionales = ((20/365)*diasVacProp)*document.getElementById("SueldoDiario").value;
		}else
		if(anos>=25 && anos<=29){
			vacProporcionales = ((22/365)*diasVacProp)*document.getElementById("SueldoDiario").value;
		}else
		if(anos>=30 && anos<=34){
			vacProporcionales = ((24/365)*diasVacProp)*document.getElementById("SueldoDiario").value;
		}
		
		document.getElementById("PropVac").value=(vacProporcionales).toFixed(2);

		//Prima vacacional
		var primaVacacional = vacProporcionales*.25;
		document.getElementById("PrimVac").value=(primaVacacional).toFixed(2);

		//Antiguedad
		var tipoRenuncia =localStorage.getItem("tipoRenuncia");
		var antiguedad;
		if (anos>=15 && tipoRenuncia == "Renuncia"){
			antiguedad = anos * 12;
		}else {
			antiguedad = 0;
		}
		if (tipoRenuncia == "DesJustificado" || tipoRenuncia == "DesInjustificado"){
			antiguedad = anos * 12; 
		}
		document.getElementById("antiguedad").value= anos + " años, " + antiguedad + " dias de trabajo";
		
		//Aguinaldo
		var aguinaldo=0;
		var diasProporcionales = 0;

		if (dias>=365){
				//aguinaldo
			aguinaldo = 15 * document.getElementById("SueldoDiario").value;
			document.getElementById("Aguinaldo").value=(aguinaldo).toFixed(2);
			document.getElementById("pagardias").style.display="none";

		}
		else{
			if(hoy.getFullYear()==date1.getFullYear()){
				diasProporcionales = (15/365)*dias;
				//aguinaldo
			aguinaldo = diasProporcionales * document.getElementById("SueldoDiario").value;
			document.getElementById("Aguinaldo").value=(aguinaldo).toFixed(2);
			document.getElementById("pagardias").style.display="none";

			}else{//Si esta fuera del año tomar desde el 1 de enero del año en curso
				diasProporcionales = (15/365)*aguiDias;
				
			//aguinaldo
			aguinaldo = diasProporcionales * document.getElementById("SueldoDiario").value;
			document.getElementById("Aguinaldo").value=(aguinaldo).toFixed(2);
			document.getElementById("pagardias").style.display="none";
			}
		}
			///
			if(document.getElementById("PagD").value !== ''){
				diasProporcionales = (15/365)*document.getElementById("PagD").value;
				
			//aguinaldo
			aguinaldo = diasProporcionales * document.getElementById("SueldoDiario").value;
			document.getElementById("Aguinaldo").value= (aguinaldo).toFixed(2);
			}

		
			var total=aguinaldo;
		document.getElementById("total").value= (aguinaldo+primaVacacional+vacProporcionales).toFixed(2);

		//testear
		//document.getElementById("test").value= esBisiesto(date1.getFullYear());
		//document.getElementById("test2").value= esBisiesto(date2.getFullYear());
		}
		}

		</script>
			<!-- fin -->
		</p>
</div>
        </div>
      </header>

</body>
</html>