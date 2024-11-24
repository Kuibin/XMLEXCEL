<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Calculadoras Fiscales</title>
    <!-- CSS Bootstrap v5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" 
    crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" 
    crossorigin="anonymous"></script>
    <!-- CSS Main -->
    <link rel="stylesheet" href="../css/main.css" />
  </head>
  <body class="bg-light">
     <!-- Navbar-->
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light navbar-main">
      <div class="container">
        <!--logo-->
      <a href="#" class="navbar-brand">
        <img src="../img/logo-g.png" alt="Brand Calculadoras Fiscales">
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
          <a href="#secServicios" class="nav-link">Servicios</a>
          <a href="#secPortafolio" class="nav-link">Portafolio</a>
          <a href="#secContacto" class="nav-link">Contacto</a>
        </div>
      </div>
      </div>
    </nav>
        
	<div class="container">
      <!--header-->
      <header class="row align-items-center header-main justify-content-center">
        <div class="col-md-7 text-center text-md-start">
			<!--Saludo-->
			<h1 class="display-2">
        <br><br>
            <span class="d-block">Tarjeta de Almacen (Beta)</span>
          </h1>
          <br><br>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen" >
    <div class="modal-content" id="contenedor">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Escanea el codigo de barras</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    </div>
  </div>
</div>

          <div class="container-fluid">
          <form class="row g-2 col-10 col-md-10 col-lg-10 bg-white rounded shadow p-3 fw-light mb-3 mb-md-0">
        <div class="col-auto">
        <label for="articulo">Articulo</label>
            <input type="text" class="form-control" id="articulo" onchange="lecturaBarras()" placeholder="0">
        </div>
        <div class="col-auto">
          <label for="ClaveArt">Clave de Articulo</label>
          <input type="text" class="form-control" id="ClaveArt" placeholder="0" readonly>
          <button id="btnEscanear">Escanear</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="escanear()">BTn Scane</button>
        </div>
        
        <!--Salto en el mismo form -->
        <div class="col-auto">
        <label for="almacen">Almacen</label>
            <input type="text" class="form-control" id="almacen" placeholder="0">
        </div>
        <div class="col-auto">
          <label for="CasilleroNo">Casillero No</label>
          <input type="text" class="form-control" id="CasilleroNo" placeholder="0">
        </div>
        <div class="col-auto">
        <label for="unidad">Unidad</label>
            <input type="text" class="form-control" id="unidad" placeholder="0">
        </div>
      </form>
      </div>
<br>
<br>
      <div class="container-fluid">
          <form class="row g-2 col-10 col-md-10 col-lg-10 bg-white rounded shadow p-3 fw-light mb-3 mb-md-0">
          <div class="col-auto">
        <label for="fechaArt">Fecha</label>
            <input type="text" class="form-control" id="fechaArt" placeholder="0">
        </div>
        <div class="col-auto">
          <label for="FacturaNo">Factura No</label>
          <input type="text" class="form-control" id="FacturaNo" placeholder="0">
        </div>
      </form>
      </div>
<br>
<br>
      <div class="container-fluid">
      <div class="col-auto">
        <label>Unidades</label>
        </div>
          <form class="row g-3 col-10 col-md-10 col-lg-10 bg-white rounded shadow p-3 fw-light mb-3 mb-md-0">
          <div class="col-auto">
        <label for="entrada">Entrada</label>
            <input type="text" class="form-control" id="entrada" placeholder="0">
        </div>
        <div class="col-auto">
          <label for="salida">Salida</label>
          <input type="text" class="form-control" id="salida" placeholder="0">
        </div>
        <div class="col-auto">
          <label for="existencia">Existencia</label>
          <input type="text" class="form-control" id="existencia" placeholder="0">
        </div>
      </form>
      </div>
<br>
<br>
      <div class="container-fluid">
      <div class="col-auto">
        <label>Costos</label>
        </div>
          <form class="row g-2 col-10 col-md-10 col-lg-10 bg-white rounded shadow p-3 fw-light mb-3 mb-md-0">
          <div class="col-auto">
        <label for="unitario">Unitario</label>
            <input type="text" class="form-control" id="unitario" placeholder="0">
        </div>
        <div class="col-auto">
          <label for="medio">Medio</label>
          <input type="text" class="form-control" id="medio" placeholder="0">
        </div>
      </form>
      </div>
<br>
<br>
      <div class="container-fluid">
      <div class="col-auto">
        <label>Valores</label>
        </div>
          <form class="row g-3 col-10 col-md-10 col-lg-10 bg-white rounded shadow p-3 fw-light mb-3 mb-md-0">
          <div class="col-auto">
        <label for="debe">Debe</label>
            <input type="text" class="form-control" id="debe" placeholder="0">
        </div>
        <div class="col-auto">
          <label for="haber">Haber</label>
          <input type="text" class="form-control" id="haber" placeholder="0">
        </div>
        <div class="col-auto">
          <label for="saldo">Saldo</label>
          <input type="text" class="form-control" id="saldo" placeholder="0">
        </div>
      </form>
      </div>
      

		<!--Sacar fecha-->
    <!--<script src="https://unpkg.com/quagga@0.12.1/dist/quagga.min.js"></script>-->
    <script src="quagga.min.js"></script>
 <!--<script src="scriptLeer.js"></script>-->
		<script type="text/javascript">
    $input = document.querySelector("#ClaveArt");
function escanear(){
  //window.open("leer.html");
                //alert("deberia abrir otro nodal");
                var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
                  keyboard: false
                });
                var modalToggle = document.getElementById('exampleModal'); // relatedTarget
                myModal.show(modalToggle);
              }
    //ventana
    document.addEventListener("DOMContentLoaded", () => {
    const $btnEscanear = document.querySelector("#btnEscanear"),
    $input = document.querySelector("#ClaveArt");
    $btnEscanear.addEventListener("click", ()=>{
      /*var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
                  keyboard: false
                });
                var modalToggle = document.getElementById('exampleModal'); // relatedTarget
                myModal.show(modalToggle);*/
                //alert("deberia abrir otro nodal");
      window.open("leer.html");
    });

    window.onCodigoLeido = datosCodigo => {
      console.log("Oh sí, código leído: ")
      console.log(datosCodigo)
      $input.value = datosCodigo.codeResult.code;
      
			var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
				keyboard: false
			  });
			  var modalToggle = document.getElementById('exampleModal'); // relatedTarget
			  myModal.hide(modalToggle);
    }
  });
		
  var exampleModal = document.getElementById('exampleModal')
exampleModal.addEventListener('show.bs.modal', function (event) 
{
//document.addEventListener("DOMContentLoaded", () => {
	const $resultados = document.querySelector("#ClaveArt");
	Quagga.init({
		inputStream: {
			constraints: {
				width: 1920,
				height: 1080,
			},
			name: "Live",
			type: "LiveStream",
			target: document.querySelector('#contenedor')    // Or '#yourElement' (optional)
		},
		decoder: {
			readers: ["ean_reader"]
		}
	}, function (err) {
		if (err) {
			console.log(err);
			return
		}
		console.log("Initialization finished. Ready to start");
		Quagga.start();
	});

	Quagga.onDetected((data) => {
		if(window.opener){
			window.opener.onCodigoLeido(data);
			//window.close();
        Quagga.stop();
		}
	});

	Quagga.onProcessed(function (result) {
		var drawingCtx = Quagga.canvas.ctx.overlay,
			drawingCanvas = Quagga.canvas.dom.overlay;

		if (result) {
			if (result.boxes) {
				drawingCtx.clearRect(0, 0, parseInt(drawingCanvas.getAttribute("width")), parseInt(drawingCanvas.getAttribute("height")));
				result.boxes.filter(function (box) {
					return box !== result.box;
				}).forEach(function (box) {
					Quagga.ImageDebug.drawPath(box, { x: 0, y: 1 }, drawingCtx, { color: "green", lineWidth: 2 });
				});
			}

			if (result.box) {
				Quagga.ImageDebug.drawPath(result.box, { x: 0, y: 1 }, drawingCtx, { color: "#00F", lineWidth: 2 });
			}

			if (result.codeResult && result.codeResult.code) {
				Quagga.ImageDebug.drawPath(result.line, { x: 'x', y: 'y' }, drawingCtx, { color: 'red', lineWidth: 3 });
			}
		}

    exampleModal.addEventListener('hide.bs.modal', function (event) 
    {
      Quagga.stop();
      return;
    });

	});
});



		</script>
			<!-- fin -->
		</p>
		</div>
        </div>
      </header>

</body>
</html>