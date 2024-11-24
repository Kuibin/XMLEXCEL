<?php
  // require __DIR__ . '/cfdiutils/vendor/autoload.php';
  require_once "vendor/Autoload.php";
  require "vendor/autoload.php";
  // use PHPUnit\Framework\TestCase;
  require "lib/Certificados.php";
  require "lib/DocDigitales.php";

  $openssl = new CfdiUtils\OpenSSL\OpenSSL;
// use PhpOffice\PhpSpreadsheet\Spreadsheet;
  // use  CfdiUtils\OpenSSL\OpenSSL;

  $rutaCer = null;
  $rutaKey = null;
  $keyPass = $_POST['contrasena'];
  $emailU = $_POST['emailUser'];

  $serie = $_POST['Serie'];;
  $tipo_comprobante = $_POST['tipo_comprobante'];
  $lugar_expedicion = $_POST['lugar_expedicion'];
  $forma_pago = $_POST['forma_pago'];
  $metodo_pago = $_POST['metodo_pago'];
  $moneda = $_POST['moneda'];
  $tipo_cambio = $_POST['tipo_cambio'];
  $condiciones_pago = $_POST['condiciones_pago'];
  $subtotal = $_POST['subtotal'];
  $total = $_POST['total'];

  $rfc_emisor = $_POST['rfc_emisor'];
  $nombre_emisor = $_POST['Nombre'];
  $regimen_fiscal = $_POST['regimen_fiscal'];
  
  $rfc_receptor = $_POST['rfc_receptor'];
  $nombre_receptor = $_POST['Nombre_Receptor'];
  $uso_cfdi = $_POST['uso_cfdi'];

  $clave_producto_servicio = $_POST['clave_producto_servicio'];
  $clave_unidad = $_POST['clave_unidad'];
  $cantidad = $_POST['cantidad'];
  $descripcion = $_POST['descripcion'];
  $valor_unitario = $_POST['valor_unitario'];
  $importe = $_POST['importe'];
  $unidad = $_POST['unidad'];
  $no_identificacion = $_POST['no_identificacion'];

  $DomicilioFiscalReceptor = $_POST['DomicilioFiscalReceptor'];
  $RegimenFiscalReceptor = $_POST['regimen_fiscal_Receptor'];
  $DescuentoComprobante = $_POST['DescuentoComprobante'];
  $DescuentoConcepto = $_POST['Descuento'];
  $objetoimp = $_POST['objetoimp'];

  // $base = $_POST['base'];
  // $impuesto = $_POST['impuesto'];
  // $tipo_factor = $_POST['tipo_factor'];

  #guardar formulario
  header("Access-Control-Allow-Origin: http://localhost:4200");
    header("Access-Control-Allow-Headers: *");

    $contraseña = "";
    $usuario = "root";
    $ServerDB="localhost";
    $nombre_base_de_datos = "axcontable";
    // $contraseña = "Gangstar556677";
    // $usuario = "erestaur_Kuibin";
    // $ServerDB="localhost";
    // $nombre_base_de_datos = "erestaur_Usuarios";

    // $nombre = $_POST['nombre'];
    // $email = $_POST['email'];

    try {
        $ruta = new PDO("mysql:host=".$ServerDB.";dbname=". $nombre_base_de_datos, $usuario, $contraseña);

        $sentenciaComp = $ruta->prepare("SELECT email FROM formulario WHERE email = ? LIMIT 1;");
        $sentenciaComp->execute([$emailU]);

        $numeroDeFilas = $sentenciaComp->rowCount();
        # Si son 0 o menos, significa que no existe
        if ($numeroDeFilas <= 0) {
            // echo "El usuario con nombre $nombre NO existe";
            //Aqui colocas el código que tu deseas realizar cuando el dato NO existe en la base de datos
            $sentencia = $ruta->prepare("insert into formulario(rfc_emisor, nombre_emisor, regimen_fiscal_emisor, rfc_receptor, nombre_receptor, uso_cfdi_receptor, serie, tipo_comprobante, lugar_expedicion, forma_pago, metodo_pago, moneda, tipo_cambio, condiciones_pago, subtotal, total, clave_producto_servicio, clave_unidad, cantidad, descripcion, valor_unitario, importe, unidad, no_identificacion, email, DomicilioFiscalReceptor, RegimenFiscalReceptor, DescuentoConcepto, objetoimp, DescuentoComprobante)
            VALUES (:rfc_emisor, :nombre_emisor, :regimen_fiscal_emisor, :rfc_receptor, :nombre_receptor, :uso_cfdi_receptor, :serie, :tipo_comprobante, :lugar_expedicion, :forma_pago, :metodo_pago, :moneda, :tipo_cambio, :condiciones_pago, :subtotal, :total, :clave_producto_servicio, :clave_unidad, :cantidad, :descripcion, :valor_unitario, :importe, :unidad, :no_identificacion, :email, :DomicilioFiscalReceptor, :RegimenFiscalReceptor, :DescuentoConcepto, :objetoimp, :DescuentoComprobante)");
                // prepare y ":" para evitar el inyeccion

            $resultado = $sentencia->execute([
              "rfc_emisor" => $rfc_emisor, 
              "nombre_emisor" => $nombre_emisor,
              "regimen_fiscal_emisor" => $regimen_fiscal, 
              "rfc_receptor" => $rfc_receptor, 
              "nombre_receptor" => $nombre_receptor, 
              "uso_cfdi_receptor" => $uso_cfdi, 
              "serie" => $serie, 
              "tipo_comprobante" => $tipo_comprobante, 
              "lugar_expedicion" => $lugar_expedicion, 
              "forma_pago" => $forma_pago, 
              "metodo_pago" => $metodo_pago, 
              "moneda" => $moneda, 
              "tipo_cambio" => $tipo_cambio, 
              "condiciones_pago" => $condiciones_pago, 
              "subtotal" => $subtotal, 
              "total" => $total, 
              "clave_producto_servicio" => $clave_producto_servicio, 
              "clave_unidad" => $clave_unidad, 
              "cantidad" => $cantidad, 
              "descripcion" => $descripcion, 
              "valor_unitario" => $valor_unitario, 
              "importe" => $importe, 
              "unidad" => $unidad, 
              "no_identificacion" => $no_identificacion, 
              "email" => $emailU,
              "DomicilioFiscalReceptor" => $DomicilioFiscalReceptor,
              "RegimenFiscalReceptor" => $RegimenFiscalReceptor,
              "DescuentoConcepto" => $DescuentoConcepto,
              "objetoimp" => $objetoimp,
              "DescuentoComprobante" => $DescuentoComprobante
  
            ]);
            // echo $data = json_encode($resultado, JSON_PRETTY_PRINT);
        } else {
            // echo "El usuario con nombre $email SÍ existe";
            $sentencia = $ruta->prepare("UPDATE formulario SET rfc_emisor = ?, nombre_emisor = ?, regimen_fiscal_emisor = ?, rfc_receptor = ?, nombre_receptor = ?, uso_cfdi_receptor = ?, serie = ?, tipo_comprobante = ?, lugar_expedicion = ?, forma_pago = ?, metodo_pago = ?, moneda = ?, tipo_cambio = ?, condiciones_pago = ?, subtotal = ?, total = ?, clave_producto_servicio = ?, clave_unidad = ?, cantidad = ?, descripcion = ?, valor_unitario = ?, importe = ?, unidad = ?, no_identificacion = ? WHERE email = ?");
            $resultado = $sentencia->execute([$rfc_emisor, $nombre_emisor, $regimen_fiscal, $rfc_receptor, $nombre_receptor, $uso_cfdi, $serie, $tipo_comprobante, $lugar_expedicion, $forma_pago, $metodo_pago, $moneda, $tipo_cambio, $condiciones_pago, $subtotal, $total, $clave_producto_servicio, $clave_unidad, $cantidad, $descripcion, $valor_unitario, $importe, $unidad, $no_identificacion, $emailU]);

        }
         
            
    } catch (Exception $e) {
        echo "Ocurrió algo con la base de datos: " . $e->getMessage();
    }
    #fin guaradar formulario

  //guardar pass
  $ruta_destino_pass = null;
  if (isset($keyPass) && !empty($keyPass)) {
    $carpeta = 'Usuario/'; //Declaramos el nombre de la carpeta que guardara los archivos
			
    if(!file_exists($carpeta)){
      mkdir($carpeta, 0777); //or die("Hubo un error al crear el directorio de almacenamiento");	
    }
        
    $ruta_destino_pass = "{$carpeta}password.txt";
    file_put_contents($ruta_destino_pass, $keyPass);
  }

  //guarda el .cer
  $archivo = (isset($_FILES['Certificado'])) ? $_FILES['Certificado'] : null;
    $ruta_destino_archivo = null;
    if ($archivo) {
    $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
    $extension = strtolower($extension);
    $extension_correcta = ($extension == 'cer');
    if ($extension_correcta) {

        $carpeta = 'Usuario/'; //Declaramos el nombre de la carpeta que guardara los archivos
			
        if(!file_exists($carpeta)){
          mkdir($carpeta, 0777); //or die("Hubo un error al crear el directorio de almacenamiento");	
        }
        
        $ruta_destino_archivo = "{$carpeta}{$archivo['name']}";
        
        if(move_uploaded_file($archivo['tmp_name'], $ruta_destino_archivo)) {	
          // echo "correr siguiente funcion:".$ruta_destino_archivo;
          $rutaCer = $ruta_destino_archivo;
        }
    }
  }
  //guarda el .key y convierte a .pem
  $archivo = (isset($_FILES['key'])) ? $_FILES['key'] : null;
    $ruta_destino_archivo = null;
    if ($archivo) {
    $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
    $extension = strtolower($extension);
    $extension_correcta = ($extension == 'key');
    if ($extension_correcta) {

        $carpeta = 'Usuario/'; //Declaramos el nombre de la carpeta que guardara los archivos
			
        if(!file_exists($carpeta)){
          mkdir($carpeta, 0777); //or die("Hubo un error al crear el directorio de almacenamiento");	
        }
        
        $ruta_destino_archivo = "{$carpeta}{$archivo['name']}";
        
        if(move_uploaded_file($archivo['tmp_name'], $ruta_destino_archivo)) {	
          // echo "correr siguiente funcion:".$ruta_destino_archivo;
          // convertirPEM($ruta_destino_archivo, $keyPass);
          $rutaKey = $ruta_destino_archivo;
        }
    }
  }

    if ($rutaCer !== null && $rutaKey !== null){
      $api  = new DocDigitales();
      $cert = new Certificados();
      $json = '{  
        "meta":{  
            "empresa_uid":"39bc8c7176",
            "empresa_api_key":"Z7aodcmS9vbFx7ob6Mml6Q",
            "ambiente":"S",
            "objeto":"factura"
        },
        "data":
                [  
                    {  
                        "datos_fiscales":{  
                            "certificado_pem":"",
                            "llave_pem":"",
                            "llave_password":""
                        },
                        "cfdi":{  
                            "cfdi__comprobante":{  
                              "serie":"'.$serie.'",
                              "fecha":"2018-03-25T12:12:12",
                              "tipo_comprobante":"'.$tipo_comprobante.'",
                              "lugar_expedicion":"'.$lugar_expedicion.'",
                              "forma_pago":"'.$forma_pago.'",
                              "metodo_pago":"'.$metodo_pago.'",
                              "moneda":"'.$moneda.'",
                              "tipo_cambio":"'.$tipo_cambio.'",
                              "condiciones_pago":"'.$condiciones_pago.'",
                              "subtotal":"'.$subtotal.'",
                              "total":"'.$total.'",
                              "cfdi__emisor":{  
                                  "rfc":"'.$rfc_emisor.'",
                                  "nombre":"'.$nombre_emisor.'",
                                  "regimen_fiscal":"'.$regimen_fiscal.'"
                              },
                              "cfdi__receptor":{  
                                  "rfc":"'.$rfc_receptor.'",
                                  "nombre":"'.$nombre_receptor.'",
                                  "DomicilioFiscalReceptor":"'.$DomicilioFiscalReceptor.'",
                                  "RegimenFiscalReceptor":"'.$RegimenFiscalReceptor.'",
                                  "uso_cfdi":"'.$uso_cfdi.'"
                              },
                            "cfdi__conceptos": '.$_POST['estructuraConceptos'].'
                            }
                        }
                    }
                ]
            }';

            // echo $json;

      $factura = json_decode($json, true);
      
      # Llenar los datos fiscales y ponerle fecha presente al comprobante
      $factura["data"][0]["datos_fiscales"]["certificado_pem"]  = $cert->contenidoCertificado($rutaCer);//contenidoCertificado("./certificados/certificado.cer");
      $factura["data"][0]["datos_fiscales"]["llave_pem"]        = $cert->der2pem($rutaKey);//der2pem("./certificados/llave.key");
      $factura["data"][0]["datos_fiscales"]["llave_password"]   = $cert->passwordLlave($ruta_destino_pass);//passwordLlave("./certificados/password.txt"); 

      // $factura["data"][0]["cfdi"]["cfdi__comprobante"]["serie"] = $Serie;
      $factura["data"][0]["cfdi"]["cfdi__comprobante"]["fecha"] = date('Y-m-d\TH:i:s', time());
      // $factura["data"][0]["cfdi"]["cfdi__comprobante"]["tipo_comprobante"] = $tipo_comprobante;
      // $factura["data"][0]["cfdi"]["cfdi__comprobante"]["lugar_expedicion"] = $lugar_expedicion;
      // $factura["data"][0]["cfdi"]["cfdi__comprobante"]["forma_pago"] = $forma_pago;
      // $factura["data"][0]["cfdi"]["cfdi__comprobante"]["metodo_pago"] = $metodo_pago;
      // $factura["data"][0]["cfdi"]["cfdi__comprobante"]["moneda"] = $moneda;
      // $factura["data"][0]["cfdi"]["cfdi__comprobante"]["tipo_cambio"] = $tipo_cambio;
      // $factura["data"][0]["cfdi"]["cfdi__comprobante"]["condiciones_pago"] = $condiciones_pago;
      // $factura["data"][0]["cfdi"]["cfdi__comprobante"]["subtotal"] = $subtotal;
      // $factura["data"][0]["cfdi"]["cfdi__comprobante"]["total"] = $total;

      // $factura["data"][0]["cfdi"]["cfdi__comprobante"]["cfdi__emisor"]["rfc"] = $rfc_emisor;
      // $factura["data"][0]["cfdi"]["cfdi__comprobante"]["cfdi__emisor"]["nombre"] = $Nombre;
      // $factura["data"][0]["cfdi"]["cfdi__comprobante"]["cfdi__emisor"]["regimen_fiscal"] = $regimen_fiscal;

      // $factura["data"][0]["cfdi"]["cfdi__comprobante"]["cfdi__receptor"]["rfc"] = $rfc_receptor;
      // $factura["data"][0]["cfdi"]["cfdi__comprobante"]["cfdi__receptor"]["nombre"] = $Nombre_Receptor;
      // $factura["data"][0]["cfdi"]["cfdi__comprobante"]["cfdi__receptor"]["uso_cfdi"] = $uso_cfdi;

      // $factura["data"][0]["cfdi"]["cfdi__comprobante"]["cfdi__conceptos"]["cfdi__concepto"][0]["clave_producto_servicio"] = $clave_producto_servicio;
      // $factura["data"][0]["cfdi"]["cfdi__comprobante"]["cfdi__conceptos"]["cfdi__concepto"][0]["clave_unidad"] = $clave_unidad;
      // $factura["data"][0]["cfdi"]["cfdi__comprobante"]["cfdi__conceptos"]["cfdi__concepto"][0]["cantidad"] = $cantidad;
      // $factura["data"][0]["cfdi"]["cfdi__comprobante"]["cfdi__conceptos"]["cfdi__concepto"][0]["descripcion"] = $descripcion;
      // $factura["data"][0]["cfdi"]["cfdi__comprobante"]["cfdi__conceptos"]["cfdi__concepto"][0]["valor_unitario"] = $valor_unitario;
      // $factura["data"][0]["cfdi"]["cfdi__comprobante"]["cfdi__conceptos"]["cfdi__concepto"][0]["importe"] = $importe;
      // $factura["data"][0]["cfdi"]["cfdi__comprobante"]["cfdi__conceptos"]["cfdi__concepto"][0]["unidad"] = $unidad;
      // $factura["data"][0]["cfdi"]["cfdi__comprobante"]["cfdi__conceptos"]["cfdi__concepto"][0]["no_identificacion"] = $no_identificacion;

      // $factura["data"][0]["cfdi"]["cfdi__comprobante"]["cfdi__conceptos"]["cfdi__concepto"][0]["cfdi__impuestos"]["cfdi__traslados"]["cfdi__traslado"][0]["base"] = $base;
      // $factura["data"][0]["cfdi"]["cfdi__comprobante"]["cfdi__conceptos"]["cfdi__concepto"][0]["cfdi__impuestos"]["cfdi__traslados"]["cfdi__traslado"][0]["impuesto"] = $impuesto;
      // $factura["data"][0]["cfdi"]["cfdi__comprobante"]["cfdi__conceptos"]["cfdi__concepto"][0]["cfdi__impuestos"]["cfdi__traslados"]["cfdi__traslado"][0]["tipo_factor"] = $tipo_factor;

      # Generar
      $facturaGenerada = $api->generacionFactura($factura);
      # Validar que el uuid venga en la respuesta
      // $uuid = $facturaGenerada["data"][0]["cfdi_complemento"]["uuid"];
      // $this->assertNotNull($uuid);
      echo $json;
      echo '----------------------------------------';
      echo $facturaGenerada;

  //     // header("Location:index.html");
  }

  ///Limpiamos carpeta de USUARIO
  /*
  $rutaDelDirectorio = __DIR__ . "/Usuario";
// Crear un iterador recursivo que tendrá un iterador recursivo del directorio
$archivosCFDI = new RecursiveIteratorIterator(
  new RecursiveDirectoryIterator($rutaDelDirectorio),
  RecursiveIteratorIterator::LEAVES_ONLY
);
//Borrar XMLs de carpeta
foreach ($archivosCFDI as $archivo) {
  // No queremos agregar los directorios, pues los nombres
  // de estos se agregarán cuando se agreguen los archivos
  if ($archivo->isDir()) {
      continue;
  }
  $rutaAbsoluta = $archivo->getRealPath();
// Si quieres puedes eliminarlo después:
unlink($rutaAbsoluta);
}*/
  ?>