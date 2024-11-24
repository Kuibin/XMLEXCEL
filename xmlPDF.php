<?php
include_once "./vendor/autoload.php";
use Dompdf\Dompdf;

//leemos
foreach($_FILES["miarchivo"]['tmp_name'] as $key => $tmp_name)
	{
		//condicional si el fuchero existe
		if($_FILES["miarchivo"]["name"][$key]) {
			// Nombres de archivos de temporales
			$archivonombre = $_FILES["miarchivo"]["name"][$key]; 
			$fuente = $_FILES["miarchivo"]["tmp_name"][$key];  
			
			$carpeta = 'ArchivosXML/'; //Declaramos el nombre de la carpeta que guardara los archivos
         $carpetaPDF = 'ArchivosPDF/';
			
			if(!file_exists($carpeta)){
				mkdir($carpeta, 0777) or die("Hubo un error al crear el directorio de almacenamiento");	
			}
         if(!file_exists($carpetaPDF)){
				mkdir($carpetaPDF, 0777) or die("Hubo un error al crear el directorio de almacenamiento");	
			}

			$dir=opendir($carpeta);
			$target_path = $carpeta.'/'.$archivonombre; //indicamos la ruta de destino de los archivos
			
			if(move_uploaded_file($fuente, $target_path)) {	
				//echo "Los archivos $tipo_archivo se han cargado de forma correcta.<br>";
				//Al descargar no debe mostrar nada, ningun echo, o se corrompe
$xml = simplexml_load_file($target_path); 
$ns = $xml->getNamespaces(true);
$xml->registerXPathNamespace('cfdi', $ns['cfdi']);
$xml->registerXPathNamespace('t', $ns['tfd']);

//Var timbre
$selloCFDI;
$fechaTimbrado;
$UUID;
foreach ($xml->xpath('//t:TimbreFiscalDigital') as $tfd) {
   $selloCFDI = $tfd['SelloCFD'];
   $fechaTimbrado = $tfd['FechaTimbrado'];
   $UUID = $tfd['UUID'];
}
//Var emisor
$rfcEmisor;
$nombreEmisor;
$regimenFiscal;
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $Emisor){      
   $rfcEmisor = $Emisor['Rfc'];
   $nombreEmisor = $Emisor['Nombre'];
   $regimenFiscal = $Emisor['RegimenFiscal'];
} 
//var Receptor
$rfcReceptor;
$nombreReceptor;
$usoCFDI;
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor') as $Receptor){ 
   $rfcReceptor = $Receptor['Rfc'];
   $rfcReceptor = $Receptor['Nombre'];
   $usoCFDI = $Receptor['UsoCFDI'];
} 
//var Concepto
$ClaveProdServ;
$Cantidad;
$ClaveUnidad;
$ValorUnitario;
$Importe;
$Descuento;
$Descripcion;
foreach ($xml->xpath('//cfdi:Conceptos//cfdi:Concepto') as $Concepto){ 
   $ClaveProdServ = $Concepto['ClaveProdServ'];
   $Cantidad = $Concepto['Cantidad'];
   $ClaveUnidad = $Concepto['ClaveUnidad'];
   $ValorUnitario = $Concepto['ValorUnitario'];
   $Importe = $Concepto['Importe'];
   $Descuento = $Concepto['Descuento'];
   $Descripcion = $Concepto['Descripcion'];
} 
//var Impuestos 
$Impuesto;
$Base;
$TipoFactor;
$TasaOCuota;
$CImporte;
foreach ($xml->xpath('//cfdi:Conceptos//cfdi:Concepto//cfdi:Impuestos//cfdi:Traslados//cfdi:Traslado') as $ConceptoImpuesto){ 
   $Impuesto = $ConceptoImpuesto['Impuesto'];
   $Base = $ConceptoImpuesto['Base'];
   $TipoFactor = $ConceptoImpuesto['TipoFactor'];
   $TasaOCuota = $ConceptoImpuesto['TasaOCuota'];
   $CImporte = $ConceptoImpuesto['Importe'];
} 
//Var comprobante
$fechaComprobante;
$totalComprobante;
$subtotalComprobante;
$numCertificadoComprobante;
$formaPagoComprobante;
$metodoPagoComprobante;
$lugarExpedicionComprobante;
$monedaComprobante;
$folioComprobante;
$descuentoComprobante;
foreach ($xml->xpath('//cfdi:Comprobante') as $cfdiComprobante){ 
   $fechaComprobante = $cfdiComprobante['Fecha'];
   $totalComprobante = $cfdiComprobante['Total'];
   $subtotalComprobante = $cfdiComprobante['SubTotal'];
   $formaPagoComprobante = $cfdiComprobante['FormaPago'];
   $metodoPagoComprobante = $cfdiComprobante['MetodoPago'];
   $numCertificadoComprobante = $cfdiComprobante['NoCertificado'];
   $lugarExpedicionComprobante = $cfdiComprobante['LugarExpedicion'];
   $monedaComprobante = $cfdiComprobante['Moneda'];
   $folioComprobante = $cfdiComprobante['Folio'];
   $descuentoComprobante = $cfdiComprobante['Descuento'];
}
//var impuestos
$totalImpuestosTraslados;
$totalImpuestosRetenidos;
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Concepto//cfdi:Impuestos') as $Impuestos){ 
   $totalImpuestosTraslados = $Impuestos['TotalImpuestosTrasladados'];
   $totalImpuestosRetenidos = $Impuestos['TotalImpuestosRetenidos'];
}
//crea pdf inicio
$dompdf = new Dompdf();
$dompdf->loadHtml(//Inicia html que creara el pdf
"
<style>
table {
   font-size: 10px;
    font-family: arial, helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
.tableEn {
    background-color: white;
    text-align: left;
    font-size: 10px;
     font-family: arial, helvetica, sans-serif;
     border-collapse: collapse;
     width: 100%;
 }
td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}
/*tr:nth-child(even) {
    background-color: #dddddd;
}*/
.tdEn, .thEn {
    border: 1px solid white;
    text-align: left;
    padding: 10px;
}
.trEn: {
    background-color: #FF4000;
}
p {
   font-size: 10px;
   font-family: Helvetica, Arial, sans-serif;
   text-align: justify;
 }
 footer {
    font-size: 20px;
    font-family: Helvetica, Arial, sans-serif;
    text-align: center;
 }
</style>
<table class='tableEn'>
  <tr class='trEn'>
    <th class='thEn'>RFC Emisor:</th>
    <td class='tdEn'>$rfcEmisor</td>
    <th class='thEn'>Folio:</th>
    <td class='tdEn'> $folioComprobante</td>
  </tr>
  <tr class='trEn'>
      <th class='thEn'>Nombre Emisor:</th>
      <td class='tdEn'>$nombreEmisor</td>
      <th class='thEn'>No de Certificado:</th>
      <td class='tdEn'>$numCertificadoComprobante</td>
  </tr>
  <tr class='trEn'>
      <th class='thEn'>RFC Receptor:</th>
      <td class='tdEn'>$rfcReceptor</td>
      <th class='thEn'>Fecha:</th>
      <td class='tdEn'>$fechaComprobante</td>
  </tr>
  <tr class='trEn'>
      <th class='thEn'>Uso CFDI:</th>
      <td class='tdEn'>$usoCFDI</td>
      <th class='thEn'>Regimen Fiscal:</th>
      <td class='tdEn'>$regimenFiscal</td>
  </tr>
</table>
<p>Conceptos</p>
<table>
<tr>
      <th>Clave de Producto y/0 Servicios</th>
      <th>No. Identificación</th>
      <th>Cantidad</th>
      <th>Clave de Unidad</th>
      <th>Unidad</th>
      <th>Valor Unitario</th>
      <th>Importe</th>
      <th>Descuento</th>
      <th>No. de Pedimento</th>
      <th>No. de Cuenta Predial</th>
  </tr>
   <tr>
      <td>$ClaveProdServ</td>
      <td> </td>
      <td>$Cantidad</td>
      <td>$ClaveUnidad</td>
      <td> </td>
      <td>$ValorUnitario</td>
      <td>$Importe</td>
      <td>$Descuento</td>
      <td> </td>
      <td> </td>
  </tr>
  <tr>
      <th>Descripcion</th>
      <td>$Descripcion</td>
  </tr>
  <tr>
      <td>Impuesto</td>
      <td>Tipo</td>
      <td>Base</td>
      <td>Tipo Factor</td>
      <td>Tasa o Cuota</td>
      <td>Importe</td>
  </tr>
  <tr>
      <td>$Impuesto</td>
      <td>Traslado</td>
      <td>$Base</td>
      <td>$TipoFactor</td>
      <td>$TasaOCuota</td>
      <td>$CImporte</td>
  </tr>
</table>
<br>
<table>
<tr>
      <th>Moneda:</th>
      <td>$monedaComprobante</td>
      <th>Subtotal:</th>
      <td>$ $subtotalComprobante</td>
  </tr>
  <tr>
      <th>Forma de Pago:</th>
      <td>$formaPagoComprobante</td>
      <th>Impuestos Traslado:</th>
      <td>$ $totalImpuestosTraslados</td>
  </tr>
  <tr>
      <th>Metodo de Pago:</th>
      <td>$metodoPagoComprobante</td>
      <th>Total:</th>
      <td>$ $totalComprobante</td>
  </tr>
  <tr>
      <th>Condiciones de Pago:</th>
      <td></td>
  </tr>
</table>
<br>
<h6>Sello Digital del CFDI</h6>
<p>$selloCFDI</p>
<br>
<h6>Fecha de Timbrado</h6>
<p>$fechaTimbrado</p>
<br>
<footer>
<h6>Este documento es una representación impresa de un CFDI</h6>
</footer>

");//fin de html del pdf
$dompdf->setPaper('A4','portroit');
$dompdf->render();
//$dompdf->stream();//solo con esta si se quiere descargar
$contenido = $dompdf->output();
$nombreDelDocumento = $carpetaPDF.'/'.$archivonombre.".pdf";//Ruta de guardado PDF
$bytes = file_put_contents($nombreDelDocumento, $contenido);
         }//Fin move_uploaded_file
      }//fin //condicional si el fuchero existe
   }//fin lectura de archivo subido

//creamos un zip para  descarga
$zip = new ZipArchive();
// Ruta absoluta
$nombreArchivoZip = __DIR__ . "/simple.zip";
$rutaDelDirectorio = __DIR__ . "/ArchivosPDF";
$rutaDelDirectorioXML = __DIR__ . "/ArchivosXML";

if (!$zip->open($nombreArchivoZip, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {
    exit("Error abriendo ZIP en $nombreArchivoZip");
}
// Crear un iterador recursivo que tendrá un iterador recursivo del directorio
$archivos = new RecursiveIteratorIterator(
   new RecursiveDirectoryIterator($rutaDelDirectorio),
   RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($archivos as $archivo) {
   // No queremos agregar los directorios, pues los nombres
   // de estos se agregarán cuando se agreguen los archivos
   if ($archivo->isDir()) {
       continue;
   }

   $rutaAbsoluta = $archivo->getRealPath();
   // Cortamos para que, suponiendo que la ruta base es: C:\imágenes ...
   // [C:\imágenes\perro.png] se convierta en [perro.png]
   // Y no, no es el basename porque:
   // [C:\imágenes\vacaciones\familia.png] se convierte en [vacaciones\familia.png]
   $nombreArchivo = substr($rutaAbsoluta, strlen($rutaDelDirectorio) + 1);
   $zip->addFile($rutaAbsoluta, $nombreArchivo);
}
// No olvides cerrar el archivo
$resultado = $zip->close();
// Ahora que ya tenemos el archivo lo enviamos como respuesta
// para su descarga
// El nombre con el que se descarga
$nombreAmigable = "CDFI 3.3.zip";
header('Content-Type: application/octet-stream');
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=$nombreAmigable");
// Leer el contenido binario del zip y enviarlo
readfile($nombreArchivoZip);

// Si quieres puedes eliminarlo después:
unlink($nombreArchivoZip);

//Borrar PDFs de carpeta
foreach ($archivos as $archivo) {
   // No queremos agregar los directorios, pues los nombres
   // de estos se agregarán cuando se agreguen los archivos
   if ($archivo->isDir()) {
       continue;
   }
   $rutaAbsoluta = $archivo->getRealPath();
unlink($rutaAbsoluta);
}
///Limpiamos carpeta de XMLs
// Crear un iterador recursivo que tendrá un iterador recursivo del directorio
$archivosXML = new RecursiveIteratorIterator(
   new RecursiveDirectoryIterator($rutaDelDirectorioXML),
   RecursiveIteratorIterator::LEAVES_ONLY
);
//Borrar XMLs de carpeta
foreach ($archivosXML as $archivo) {
   // No queremos agregar los directorios, pues los nombres
   // de estos se agregarán cuando se agreguen los archivos
   if ($archivo->isDir()) {
       continue;
   }
   $rutaAbsoluta = $archivo->getRealPath();
// Si quieres puedes eliminarlo después:
unlink($rutaAbsoluta);
}
?>