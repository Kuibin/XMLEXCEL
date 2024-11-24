<?php
require __DIR__ . "/vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;


$contadorXMLConvertidos = 0;

$documento = new Spreadsheet();
$documento
    ->getProperties()
    ->setCreator("AXCONTABLE")
    ->setLastModifiedBy('AXCONTABLE') // última vez modificado por
    ->setTitle('CFDI')
    ->setSubject('CFDI')
    ->setDescription('Este documento fue generado por axcontable.com')
    ->setKeywords('cfdi')
    ->setCategory('Doc');
$hoja = $documento->getActiveSheet();//hoja basica

$hojaAlmacen = $documento->createSheet();//Creamos nueva hoja

//Titulos de las hojas
$hoja->setTitle("Recibido");
$hojaAlmacen->setTitle("Almacen fiscal");
//////////// Encaabezados -  Nodos
//$hoja->setCellValueByColumnAndRow(1, 1, "Un valor en 1, 1");
//$hoja->setCellValue("B2", "Este va en B2");
//$hoja->setCellValue("A3", "Parzibyte");
//Timbre fiscal
$hoja->setCellValueByColumnAndRow(1, 1,"TimbreFiscalDigital");
//$hoja->setCellValueByColumnAndRow(1, 2,"UUID");
$hoja->setCellValueByColumnAndRow(1, 2,"SelloCFD");
//$hoja->setCellValueByColumnAndRow(3, 2,"FechaTimbrado");
$hoja->setCellValueByColumnAndRow(2, 2,"NoCertificadoSAT");
$hoja->setCellValueByColumnAndRow(3, 2,"Version");
$hoja->setCellValueByColumnAndRow(4, 2,"SelloSAT");
//Comprobante
$hoja->setCellValueByColumnAndRow(7, 1, "Comprobante");
$hoja->setCellValueByColumnAndRow(7, 2,"Version");
$hoja->setCellValueByColumnAndRow(8, 2,"Fecha");
//$hoja->setCellValueByColumnAndRow(9, 2,"Sello");
$hoja->setCellValueByColumnAndRow(9, 2,"Total");
$hoja->setCellValueByColumnAndRow(10, 2,"Subtotal");
//$hoja->setCellValueByColumnAndRow(12, 2,"Certificado");
$hoja->setCellValueByColumnAndRow(11, 2,"FormaDePago");
$hoja->setCellValueByColumnAndRow(12, 2,"MetodoPago");
//$hoja->setCellValueByColumnAndRow(15,2,"NoCertificado");
$hoja->setCellValueByColumnAndRow(13, 2,"TipoDeComprobante");
$hoja->setCellValueByColumnAndRow(14, 2,"LugarExpedicion");
$hoja->setCellValueByColumnAndRow(15, 2,"Moneda");
$hoja->setCellValueByColumnAndRow(16, 2,"Folio");
$hoja->setCellValueByColumnAndRow(17, 2,"Serie");
$hoja->setCellValueByColumnAndRow(18, 2,"CondicionesDePago");
$hoja->setCellValueByColumnAndRow(19, 2,"Descuento");
$hoja->setCellValueByColumnAndRow(20, 2,"TipoCambio");
$hoja->setCellValueByColumnAndRow(21, 2,"Confirmacion"); 
//Emisor
$hoja->setCellValueByColumnAndRow(25, 1, "Emisor");
$hoja->setCellValueByColumnAndRow(25, 2,"Rfc");
   $hoja->setCellValueByColumnAndRow(26, 2,"Nombre");
   $hoja->setCellValueByColumnAndRow(27, 2,"RegimenFiscal");
   //Domiciolio fiscal
$hoja->setCellValueByColumnAndRow(28, 1,"DomicilioFiscal");
$hoja->setCellValueByColumnAndRow(28, 2,"Pais");
$hoja->setCellValueByColumnAndRow(29, 2,"Calle");   
$hoja->setCellValueByColumnAndRow(30, 2,"Rfc");
$hoja->setCellValueByColumnAndRow(31, 2,"Estado");   
$hoja->setCellValueByColumnAndRow(32, 2,"Colonia");
$hoja->setCellValueByColumnAndRow(33, 2,"Municipio");
$hoja->setCellValueByColumnAndRow(34, 2,"NoExterior");
$hoja->setCellValueByColumnAndRow(35, 2,"CodigoPostal");
//Expedido en
$hoja->setCellValueByColumnAndRow(36, 1,"ExpedidoEn"); 
$hoja->setCellValueByColumnAndRow(36, 2,"Pais");
$hoja->setCellValueByColumnAndRow(37, 2,"Calle"); 
$hoja->setCellValueByColumnAndRow(38, 2,"Estado");   
$hoja->setCellValueByColumnAndRow(39, 2,"Colonia");
$hoja->setCellValueByColumnAndRow(40, 2,"NoExterior");
$hoja->setCellValueByColumnAndRow(41, 2,"CodigoPostal");
//Reeptor
$hoja->setCellValueByColumnAndRow(42, 1,"Receptor");
$hoja->setCellValueByColumnAndRow(42, 2,"Rfc");
$hoja->setCellValueByColumnAndRow(43, 2,"Nombre");
$hoja->setCellValueByColumnAndRow(44, 2,"UsoCFDI");
$hoja->setCellValueByColumnAndRow(45, 2,"ResidenciaFiscal");
$hoja->setCellValueByColumnAndRow(46, 2,"NumRegIdTrib");
//Domicilio
$hoja->setCellValueByColumnAndRow(47, 1,"Domicilio");
$hoja->setCellValueByColumnAndRow(47, 2,"Pais");
$hoja->setCellValueByColumnAndRow(48, 2,"Calle");
$hoja->setCellValueByColumnAndRow(49, 2,"Estado");
   $hoja->setCellValueByColumnAndRow(50, 2,"Colonia");
   $hoja->setCellValueByColumnAndRow(51, 2,"Municipio");
   $hoja->setCellValueByColumnAndRow(52, 2,"NoExterior");
   $hoja->setCellValueByColumnAndRow(53, 2,"NoInterior");
   $hoja->setCellValueByColumnAndRow(54, 2,"CodigoPostal");
   //Concepto
$hoja->setCellValueByColumnAndRow(55, 1,"Concepto");
$hoja->setCellValueByColumnAndRow(55, 2,"Unidad");
$hoja->setCellValueByColumnAndRow(56, 2,"Importe");
$hoja->setCellValueByColumnAndRow(57, 2,"Cantidad");
$hoja->setCellValueByColumnAndRow(58, 2,"Descripcion");
$hoja->setCellValueByColumnAndRow(59, 2,"ValorUnitario");
$hoja->setCellValueByColumnAndRow(60, 2,"ClaveProdServ");
$hoja->setCellValueByColumnAndRow(61, 2,"ClaveUnidad");
$hoja->setCellValueByColumnAndRow(62, 2,"NoIdentificacion");
$hoja->setCellValueByColumnAndRow(63, 2,"Descuento");
//Impuesto
$hoja->setCellValueByColumnAndRow(64, 1,"Impuestos");
$hoja->setCellValueByColumnAndRow(64, 2,"TotalImpuestosTrasladados");
$hoja->setCellValueByColumnAndRow(65, 2,"TotalImpuestosRetenidos");
//Traslado
$hoja->setCellValueByColumnAndRow(66, 1,"Traslado"); 
$hoja->setCellValueByColumnAndRow(66, 2,"TasaOCuota");
$hoja->setCellValueByColumnAndRow(67, 2,"Importe");
$hoja->setCellValueByColumnAndRow(68, 2,"Impuesto");
$hoja->setCellValueByColumnAndRow(69, 2,"Base");
$hoja->setCellValueByColumnAndRow(70, 2,"TipoFactor");
//Retencion
$hoja->setCellValueByColumnAndRow(71, 1,"Retencion");
$hoja->setCellValueByColumnAndRow(71, 2,"TasaOCuota");
$hoja->setCellValueByColumnAndRow(72, 2,"Importe");
$hoja->setCellValueByColumnAndRow(73, 2,"Impuesto");
$hoja->setCellValueByColumnAndRow(74, 2,"Base");
$hoja->setCellValueByColumnAndRow(75, 2,"TipoFactor");
//Info aduana
$hoja->setCellValueByColumnAndRow(76, 1,"InformacionAduanera");
$hoja->setCellValueByColumnAndRow(76, 2,"NumeroPedimento");
//Cuenta predial
$hoja->setCellValueByColumnAndRow(77, 1,"CuentaPredial");
$hoja->setCellValueByColumnAndRow(77, 2,"Numero");
//Parte
$hoja->setCellValueByColumnAndRow(78, 1,"Parte");
$hoja->setCellValueByColumnAndRow(78, 2,"ClaveProdServ");
$hoja->setCellValueByColumnAndRow(79, 2,"Cantidad");
$hoja->setCellValueByColumnAndRow(80, 2,"Descripcion");
$hoja->setCellValueByColumnAndRow(81, 2,"ValorUnitario");
$hoja->setCellValueByColumnAndRow(82, 2,"Importe");
$hoja->setCellValueByColumnAndRow(83, 2,"NoIdentificacion");
$hoja->setCellValueByColumnAndRow(84, 2,"Unidad");
///////////////////////////////
foreach($_FILES["miarchivo"]['tmp_name'] as $key => $tmp_name)
	{
		//condicional si el fuchero existe
		if($_FILES["miarchivo"]["name"][$key]) {
			// Nombres de archivos de temporales
			$archivonombre = $_FILES["miarchivo"]["name"][$key]; 
			$fuente = $_FILES["miarchivo"]["tmp_name"][$key];  
			
			$carpeta = 'ArchivosXML/'; //Declaramos el nombre de la carpeta que guardara los archivos
         $carpetaExcel = 'ArchivosExcel/';
			
			if(!file_exists($carpeta)){
				mkdir($carpeta, 0777); //or die("Hubo un error al crear el directorio de almacenamiento");	
			}
         if(!file_exists($carpetaExcel)){
				mkdir($carpetaExcel, 0777) or die("Hubo un error al crear el directorio de almacenamiento");	
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


//EMPIEZO A LEER LA INFORMACION DEL CFDI E IMPRIMIRLA 
foreach ($xml->xpath('//t:TimbreFiscalDigital') as $tfd) {
   
   //$hoja->setCellValueByColumnAndRow(1, 3+$contadorXMLConvertidos,$tfd['UUID']);
   $hoja->setCellValueByColumnAndRow(1, 3+$contadorXMLConvertidos,$tfd['SelloCFD']);
   //$hoja->setCellValueByColumnAndRow(3, 3+$contadorXMLConvertidos,$tfd['FechaTimbrado']);
   $hoja->setCellValueByColumnAndRow(2, 3+$contadorXMLConvertidos,$tfd['NoCertificadoSAT']);
   $hoja->setCellValueByColumnAndRow(3, 3+$contadorXMLConvertidos,$tfd['Version']);
   $hoja->setCellValueByColumnAndRow(4, 3+$contadorXMLConvertidos,$tfd['SelloSAT']);
}
foreach ($xml->xpath('//cfdi:Comprobante') as $cfdiComprobante){ 
      $hoja->setCellValueByColumnAndRow(7, 3+$contadorXMLConvertidos,$cfdiComprobante['Version']);
      $hoja->setCellValueByColumnAndRow(8, 3+$contadorXMLConvertidos,$cfdiComprobante['Fecha']);
      //$hoja->setCellValueByColumnAndRow(9, 3+$contadorXMLConvertidos,$cfdiComprobante['Sello']);
      $hoja->setCellValueByColumnAndRow(9, 3+$contadorXMLConvertidos,$cfdiComprobante['Total']);
      $hoja->setCellValueByColumnAndRow(10, 3+$contadorXMLConvertidos,$cfdiComprobante['SubTotal']);
      //$hoja->setCellValueByColumnAndRow(12, 3+$contadorXMLConvertidos,$cfdiComprobante['Certificado']);
      $hoja->setCellValueByColumnAndRow(11, 3+$contadorXMLConvertidos,$cfdiComprobante['FormaDePago']);
      $hoja->setCellValueByColumnAndRow(12, 3+$contadorXMLConvertidos,$cfdiComprobante['MetodoPago']);
      //$hoja->setCellValueByColumnAndRow(15,3+$contadorXMLConvertidos,$cfdiComprobante['NoCertificado']);
      $hoja->setCellValueByColumnAndRow(13, 3+$contadorXMLConvertidos,$cfdiComprobante['TipoDeComprobante']);
      $hoja->setCellValueByColumnAndRow(14, 3+$contadorXMLConvertidos,$cfdiComprobante['LugarExpedicion']);
      $hoja->setCellValueByColumnAndRow(15, 3+$contadorXMLConvertidos,$cfdiComprobante['Moneda']);
      $hoja->setCellValueByColumnAndRow(16, 3+$contadorXMLConvertidos,$cfdiComprobante['Folio']);
      $hoja->setCellValueByColumnAndRow(17, 3+$contadorXMLConvertidos,$cfdiComprobante['Serie']);
      $hoja->setCellValueByColumnAndRow(18, 3+$contadorXMLConvertidos,$cfdiComprobante['CondicionesDePago']);
      $hoja->setCellValueByColumnAndRow(19, 3+$contadorXMLConvertidos,$cfdiComprobante['Descuento']);
      $hoja->setCellValueByColumnAndRow(20, 3+$contadorXMLConvertidos,$cfdiComprobante['TipoCambio']);
      $hoja->setCellValueByColumnAndRow(21, 3+$contadorXMLConvertidos,$cfdiComprobante['Confirmacion']);
}
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $Emisor){      
   $hoja->setCellValueByColumnAndRow(25, 3+$contadorXMLConvertidos,$Emisor['Rfc']);
   $hoja->setCellValueByColumnAndRow(26, 3+$contadorXMLConvertidos,$Emisor['Nombre']);
   $hoja->setCellValueByColumnAndRow(27, 3+$contadorXMLConvertidos,$Emisor['RegimenFiscal']);
} 
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor//cfdi:DomicilioFiscal') as $DomicilioFiscal){ 
   $hoja->setCellValueByColumnAndRow(28, 3+$contadorXMLConvertidos,$DomicilioFiscal['Pais']);
   $hoja->setCellValueByColumnAndRow(29, 3+$contadorXMLConvertidos,$DomicilioFiscal['Calle']);   
   $hoja->setCellValueByColumnAndRow(30, 3+$contadorXMLConvertidos,$DomicilioFiscal['Rfc']);
   $hoja->setCellValueByColumnAndRow(31, 3+$contadorXMLConvertidos,$DomicilioFiscal['Estado']);   
   $hoja->setCellValueByColumnAndRow(32, 3+$contadorXMLConvertidos,$DomicilioFiscal['Colonia']);
   $hoja->setCellValueByColumnAndRow(33, 3+$contadorXMLConvertidos,$DomicilioFiscal['Municipio']);
   $hoja->setCellValueByColumnAndRow(34, 3+$contadorXMLConvertidos,$DomicilioFiscal['NoExterior']);
   $hoja->setCellValueByColumnAndRow(35, 3+$contadorXMLConvertidos,$DomicilioFiscal['CodigoPostal']);
}
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor//cfdi:ExpedidoEn') as $ExpedidoEn){ 
   $hoja->setCellValueByColumnAndRow(36, 3+$contadorXMLConvertidos,$ExpedidoEn['Pais']);
   $hoja->setCellValueByColumnAndRow(37, 3+$contadorXMLConvertidos,$ExpedidoEn['Calle']); 
   $hoja->setCellValueByColumnAndRow(38, 3+$contadorXMLConvertidos,$ExpedidoEn['Estado']);   
   $hoja->setCellValueByColumnAndRow(39, 3+$contadorXMLConvertidos,$ExpedidoEn['Colonia']);
   $hoja->setCellValueByColumnAndRow(40, 3+$contadorXMLConvertidos,$ExpedidoEn['NoExterior']);
   $hoja->setCellValueByColumnAndRow(41, 3+$contadorXMLConvertidos,$ExpedidoEn['CodigoPostal']);
} 
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor') as $Receptor){ 
   $hoja->setCellValueByColumnAndRow(42, 3+$contadorXMLConvertidos,$Receptor['Rfc']);
   $hoja->setCellValueByColumnAndRow(43, 3+$contadorXMLConvertidos,$Receptor['Nombre']);
   $hoja->setCellValueByColumnAndRow(44, 3+$contadorXMLConvertidos,$Receptor['UsoCFDI']);
   $hoja->setCellValueByColumnAndRow(45, 3+$contadorXMLConvertidos,$Receptor['ResidenciaFiscal']);
   $hoja->setCellValueByColumnAndRow(46, 3+$contadorXMLConvertidos,$Receptor['NumRegIdTrib']);
} 
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor//cfdi:Domicilio') as $ReceptorDomicilio){ 
   $hoja->setCellValueByColumnAndRow(47, 3+$contadorXMLConvertidos,$ReceptorDomicilio['Pais']);
   $hoja->setCellValueByColumnAndRow(48, 3+$contadorXMLConvertidos,$ReceptorDomicilio['Calle']);
   $hoja->setCellValueByColumnAndRow(49, 3+$contadorXMLConvertidos,$ReceptorDomicilio['Estado']);
   $hoja->setCellValueByColumnAndRow(50, 3+$contadorXMLConvertidos,$ReceptorDomicilio['Colonia']);
   $hoja->setCellValueByColumnAndRow(51, 3+$contadorXMLConvertidos,$ReceptorDomicilio['Municipio']);
   $hoja->setCellValueByColumnAndRow(52, 3+$contadorXMLConvertidos,$ReceptorDomicilio['NoExterior']);
   $hoja->setCellValueByColumnAndRow(53, 3+$contadorXMLConvertidos,$ReceptorDomicilio['NoInterior']);
   $hoja->setCellValueByColumnAndRow(54, 3+$contadorXMLConvertidos,$ReceptorDomicilio['CodigoPostal']);
} 
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Concepto') as $Concepto){ 
   $hoja->setCellValueByColumnAndRow(55, 3+$contadorXMLConvertidos,$Concepto['Unidad']);
   $hoja->setCellValueByColumnAndRow(56, 3+$contadorXMLConvertidos,$Concepto['Importe']);
   $hoja->setCellValueByColumnAndRow(57, 3+$contadorXMLConvertidos,$Concepto['Cantidad']);
   $hoja->setCellValueByColumnAndRow(58, 3+$contadorXMLConvertidos,$Concepto['Descripcion']);
   $hoja->setCellValueByColumnAndRow(59, 3+$contadorXMLConvertidos,$Concepto['ValorUnitario']);
   $hoja->setCellValueByColumnAndRow(60, 3+$contadorXMLConvertidos,$Concepto['ClaveProdServ']);
   $hoja->setCellValueByColumnAndRow(61, 3+$contadorXMLConvertidos,$Concepto['ClaveUnidad']);
   $hoja->setCellValueByColumnAndRow(62, 3+$contadorXMLConvertidos,$Concepto['NoIdentificacion']);
   $hoja->setCellValueByColumnAndRow(63, 3+$contadorXMLConvertidos,$Concepto['Descuento']);
}
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Concepto//cfdi:Impuestos') as $Impuestos){ 
   $hoja->setCellValueByColumnAndRow(64, 3+$contadorXMLConvertidos,$Impuestos['TotalImpuestosTrasladados']);
   $hoja->setCellValueByColumnAndRow(65, 3+$contadorXMLConvertidos,$Impuestos['TotalImpuestosRetenidos']);
}
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Impuestos//cfdi:Traslados//cfdi:Traslado') as $Traslado){ 
   $hoja->setCellValueByColumnAndRow(66, 3+$contadorXMLConvertidos,$Traslado['TasaOCuota']);
   $hoja->setCellValueByColumnAndRow(67, 3+$contadorXMLConvertidos,$Traslado['Importe']);
   $hoja->setCellValueByColumnAndRow(68, 3+$contadorXMLConvertidos,$Traslado['Impuesto']);
   $hoja->setCellValueByColumnAndRow(69, 3+$contadorXMLConvertidos,$Traslado['Base']);
   $hoja->setCellValueByColumnAndRow(70, 3+$contadorXMLConvertidos,$Traslado['TipoFactor']);
} 
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Impuestos//cfdi:Retenciones//cfdi:Retencion') as $Retencion){ 
   $hoja->setCellValueByColumnAndRow(71, 3+$contadorXMLConvertidos,$Retencion['TasaOCuota']);
   $hoja->setCellValueByColumnAndRow(72, 3+$contadorXMLConvertidos,$Retencion['Importe']);
   $hoja->setCellValueByColumnAndRow(73, 3+$contadorXMLConvertidos,$Retencion['Impuesto']);
   $hoja->setCellValueByColumnAndRow(74, 3+$contadorXMLConvertidos,$Retencion['Base']);
   $hoja->setCellValueByColumnAndRow(75, 3+$contadorXMLConvertidos,$Retencion['TipoFactor']);
}
foreach ($xml->xpath('//cfdi:InformacionAduanera') as $InformacionAduanera){ 
   $hoja->setCellValueByColumnAndRow(76, 3+$contadorXMLConvertidos,$InformacionAduanera['NumeroPedimento']);
}
foreach ($xml->xpath('//cfdi:CuentaPredial') as $CuentaPredial){ 
   $hoja->setCellValueByColumnAndRow(77, 3+$contadorXMLConvertidos,$CuentaPredial['Numero']);
}
foreach ($xml->xpath('//cfdi:Parte') as $Parte){ 
   $hoja->setCellValueByColumnAndRow(78, 3+$contadorXMLConvertidos,$Parte['ClaveProdServ']);
   $hoja->setCellValueByColumnAndRow(79, 3+$contadorXMLConvertidos,$Parte['Cantidad']);
   $hoja->setCellValueByColumnAndRow(80, 3+$contadorXMLConvertidos,$Parte['Descripcion']);
   $hoja->setCellValueByColumnAndRow(81, 3+$contadorXMLConvertidos,$Parte['ValorUnitario']);
   $hoja->setCellValueByColumnAndRow(82, 3+$contadorXMLConvertidos,$Parte['Importe']);
   $hoja->setCellValueByColumnAndRow(83, 3+$contadorXMLConvertidos,$Parte['NoIdentificacion']);
   $hoja->setCellValueByColumnAndRow(84, 3+$contadorXMLConvertidos,$Parte['Unidad']);
}
/////Inicia Almacen fiscal
/*$hojaAlmacen->setCellValueByColumnAndRow(1, 2, "UUID");
$hojaAlmacen->setCellValueByColumnAndRow(2, 2,"FechaTimbrado");
foreach ($xml->xpath('//t:TimbreFiscalDigital') as $tfd) {
   $hojaAlmacen->setCellValueByColumnAndRow(1, 3+$contadorXMLConvertidos,$tfd['UUID']);
   $hojaAlmacen->setCellValueByColumnAndRow(2, 3+$contadorXMLConvertidos,$tfd['FechaTimbrado']);
}*/
$hojaAlmacen->setCellValueByColumnAndRow(1, 2,"Fecha");
$hojaAlmacen->setCellValueByColumnAndRow(2, 2,"Serie");
$hojaAlmacen->setCellValueByColumnAndRow(3, 2,"Folio");
$hojaAlmacen->setCellValueByColumnAndRow(4, 2,"LugarExpedicion");
$hojaAlmacen->setCellValueByColumnAndRow(5, 2,"Confirmacion");
$hojaAlmacen->setCellValueByColumnAndRow(6, 2,"FormaDePago");
$hojaAlmacen->setCellValueByColumnAndRow(7, 2,"MetodoPago");
$hojaAlmacen->setCellValueByColumnAndRow(8, 2,"CondicionesDePago");
$hojaAlmacen->setCellValueByColumnAndRow(9, 2,"TipoCambio");
$hojaAlmacen->setCellValueByColumnAndRow(10, 2,"Moneda");
$hojaAlmacen->setCellValueByColumnAndRow(11, 2,"SubTotal");
$hojaAlmacen->setCellValueByColumnAndRow(12, 2,"Descuento");
$hojaAlmacen->setCellValueByColumnAndRow(13, 2,"Total");
foreach ($xml->xpath('//cfdi:Comprobante') as $cfdiComprobante){ 
   $hojaAlmacen->setCellValueByColumnAndRow(1, 3+$contadorXMLConvertidos,$cfdiComprobante['Fecha']);
   $hojaAlmacen->setCellValueByColumnAndRow(2, 3+$contadorXMLConvertidos,$cfdiComprobante['Serie']);
   $hojaAlmacen->setCellValueByColumnAndRow(3, 3+$contadorXMLConvertidos,$cfdiComprobante['Folio']);
   $hojaAlmacen->setCellValueByColumnAndRow(4, 3+$contadorXMLConvertidos,$cfdiComprobante['LugarExpedicion']);
   $hojaAlmacen->setCellValueByColumnAndRow(5, 3+$contadorXMLConvertidos,$cfdiComprobante['Confirmacion']);
   $hojaAlmacen->setCellValueByColumnAndRow(6, 3+$contadorXMLConvertidos,$cfdiComprobante['FormaDePago']);
   $hojaAlmacen->setCellValueByColumnAndRow(7, 3+$contadorXMLConvertidos,$cfdiComprobante['MetodoPago']);
   $hojaAlmacen->setCellValueByColumnAndRow(8, 3+$contadorXMLConvertidos,$cfdiComprobante['CondicionesDePago']);
   $hojaAlmacen->setCellValueByColumnAndRow(0, 3+$contadorXMLConvertidos,$cfdiComprobante['TipoCambio']);
   $hojaAlmacen->setCellValueByColumnAndRow(10, 3+$contadorXMLConvertidos,$cfdiComprobante['Moneda']);
   $hojaAlmacen->setCellValueByColumnAndRow(11, 3+$contadorXMLConvertidos,$cfdiComprobante['SubTotal']);
   $hojaAlmacen->setCellValueByColumnAndRow(12, 3+$contadorXMLConvertidos,$cfdiComprobante['Descuento']);
   $hojaAlmacen->setCellValueByColumnAndRow(13, 3+$contadorXMLConvertidos,$cfdiComprobante['Total']);
}
$hojaAlmacen->setCellValueByColumnAndRow(16, 2,"TotalImpuestosTrasladados");
$hojaAlmacen->setCellValueByColumnAndRow(17, 2,"TotalImpuestosRetenidos");
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Concepto//cfdi:Impuestos') as $Impuestos){ 
   $hojaAlmacen->setCellValueByColumnAndRow(16, 3+$contadorXMLConvertidos,$Impuestos['TotalImpuestosTrasladados']);
   $hojaAlmacen->setCellValueByColumnAndRow(17, 3+$contadorXMLConvertidos,$Impuestos['TotalImpuestosRetenidos']);
}
$hojaAlmacen->setCellValueByColumnAndRow(18, 1,"Traslado");
$hojaAlmacen->setCellValueByColumnAndRow(18, 2,"TasaOCuota");
$hojaAlmacen->setCellValueByColumnAndRow(19, 2,"Importe");
$hojaAlmacen->setCellValueByColumnAndRow(20, 2,"Impuesto");
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Impuestos//cfdi:Traslados//cfdi:Traslado') as $Traslado){ 
   $hojaAlmacen->setCellValueByColumnAndRow(18, 3+$contadorXMLConvertidos,$Traslado['TasaOCuota']);
   $hojaAlmacen->setCellValueByColumnAndRow(19, 3+$contadorXMLConvertidos,$Traslado['Importe']);
   $hojaAlmacen->setCellValueByColumnAndRow(20, 3+$contadorXMLConvertidos,$Traslado['Impuesto']);
}    
$hojaAlmacen->setCellValueByColumnAndRow(21, 1,"Retencion");
$hojaAlmacen->setCellValueByColumnAndRow(21, 2,"TasaOCuota");
$hojaAlmacen->setCellValueByColumnAndRow(22, 2,"Importe");
$hojaAlmacen->setCellValueByColumnAndRow(23, 2,"Impuesto");
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Impuestos//cfdi:Retenciones//cfdi:Retencion') as $Retencion){ 
   $hojaAlmacen->setCellValueByColumnAndRow(21, 3+$contadorXMLConvertidos,$Retencion['TasaOCuota']);
   $hojaAlmacen->setCellValueByColumnAndRow(22, 3+$contadorXMLConvertidos,$Retencion['Importe']);
   $hojaAlmacen->setCellValueByColumnAndRow(23, 3+$contadorXMLConvertidos,$Retencion['Impuesto']);
}
$hojaAlmacen->setCellValueByColumnAndRow(24, 1,"Emisor");
$hojaAlmacen->setCellValueByColumnAndRow(24, 2,"Rfc");
$hojaAlmacen->setCellValueByColumnAndRow(25, 2,"Nombre");
$hojaAlmacen->setCellValueByColumnAndRow(26, 2,"RegimenFiscal");
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $Emisor){      
   $hojaAlmacen->setCellValueByColumnAndRow(24, 3+$contadorXMLConvertidos,$Emisor['Rfc']);
   $hojaAlmacen->setCellValueByColumnAndRow(25, 3+$contadorXMLConvertidos,$Emisor['Nombre']);
   $hojaAlmacen->setCellValueByColumnAndRow(26, 3+$contadorXMLConvertidos,$Emisor['RegimenFiscal']);
} 
$hojaAlmacen->setCellValueByColumnAndRow(27, 1,"Receptor");
$hojaAlmacen->setCellValueByColumnAndRow(27, 2,"Rfc");
$hojaAlmacen->setCellValueByColumnAndRow(28, 2,"Nombre");
$hojaAlmacen->setCellValueByColumnAndRow(29, 2,"UsoCFDI");
$hojaAlmacen->setCellValueByColumnAndRow(30, 2,"ResidenciaFiscal");
$hojaAlmacen->setCellValueByColumnAndRow(31, 2,"NumRegIdTrib");
foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor') as $Receptor){ 
   $hojaAlmacen->setCellValueByColumnAndRow(27, 3+$contadorXMLConvertidos,$Receptor['Rfc']);
   $hojaAlmacen->setCellValueByColumnAndRow(28, 3+$contadorXMLConvertidos,$Receptor['Nombre']);
   $hojaAlmacen->setCellValueByColumnAndRow(29, 3+$contadorXMLConvertidos,$Receptor['UsoCFDI']);
   $hojaAlmacen->setCellValueByColumnAndRow(30, 3+$contadorXMLConvertidos,$Receptor['ResidenciaFiscal']);
   $hojaAlmacen->setCellValueByColumnAndRow(31, 3+$contadorXMLConvertidos,$Receptor['NumRegIdTrib']);
} 
///Termina lamacen fiscal
$contadorXMLConvertidos++;//aumentamos el contador de xml convertidos
         //////////////////
}
			closedir($dir); //Cerramos la conexion con la carpeta destino
   }
}
/*
$hoja = $documento->getActiveSheet();
$hoja->setTitle("El título de la hoja");
$hoja->setCellValueByColumnAndRow(1, 1, "Un valor en 1, 1");
$hoja->setCellValue("B2", "Este va en B2");
$hoja->setCellValue("A3", "Parzibyte");*/
//$writer = new Xlsx($documento);
 
# Le pasamos la ruta de guardado
//$writer->save('ArchivosExcel/Excel.xlsx');
$nombreDelDocumento = "CFDI.xlsx";
/**
 * Los siguientes encabezados son necesarios para que
 * el navegador entienda que no le estamos mandando
 * simple HTML
 * Por cierto: no hagas ningún echo ni cosas de esas; es decir, no imprimas nada
 */

$writer = new Xlsx($documento);
$writer->save($carpetaExcel.'/'.$nombreDelDocumento);

echo "<script language='javascript'>";
echo "window.open('http://docs.google.com/gview?url=https://axcontable.com/ArchivosExcel/CFDI.xlsx', '_blank');";
echo "window.history.back();";
echo "</script>"; 
PRINT <<<HERE

HERE;

///Limpiamos carpeta de XMLs
$rutaDelDirectorio = __DIR__ . "/ArchivosExcel";
$rutaDelDirectorioXML = __DIR__ . "/ArchivosXML";
// Crear un iterador recursivo que tendrá un iterador recursivo del directorio
$archivos = new RecursiveIteratorIterator(
   new RecursiveDirectoryIterator($rutaDelDirectorio),
   RecursiveIteratorIterator::LEAVES_ONLY
);
//Borrar Excels de carpeta
/*foreach ($archivos as $archivo) {
   // No queremos agregar los directorios, pues los nombres
   // de estos se agregarán cuando se agreguen los archivos
   if ($archivo->isDir()) {
       continue;
   }
   $rutaAbsoluta = $archivo->getRealPath();
unlink($rutaAbsoluta);
}*/

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
exit;
?>