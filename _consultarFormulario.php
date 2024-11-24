<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Headers: *");

$contraseña = "";
$usuario = "root";
$ServerDB="localhost";
$nombre_base_de_datos = "axcontable";

// $contraseña = "Gangstar556677";
// $usuario = "axcontab_Kuibin";
// $ServerDB="localhost";
// $nombre_base_de_datos = "axcontab_axcontable";

$email = $_POST['email'];

try {
    $ruta = new PDO("mysql:host=".$ServerDB.";dbname=". $nombre_base_de_datos, $usuario, $contraseña);

    $sentencia = $ruta->prepare("select rfc_emisor, nombre_emisor, regimen_fiscal_emisor, rfc_receptor, nombre_receptor, uso_cfdi_receptor, serie, tipo_comprobante, lugar_expedicion, forma_pago, metodo_pago, moneda, tipo_cambio, condiciones_pago, subtotal, total, clave_producto_servicio, clave_unidad, cantidad, descripcion, valor_unitario, importe, unidad, no_identificacion from formulario where email = ?");
    $sentencia->execute([$email]);
    $usuario = $sentencia->fetchObject();

    echo $data = json_encode($usuario, JSON_PRETTY_PRINT);
} catch (Exception $e) {
    echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}

?>