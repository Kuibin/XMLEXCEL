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

    $sentencia = $ruta->prepare("select nombre, telefono, facturas, idConekta from usuarios where email = ?");
    $sentencia->execute([$email]);
    $usuario = $sentencia->fetchObject();

    echo $data = json_encode($usuario, JSON_PRETTY_PRINT);
} catch (Exception $e) {
    echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}

?>