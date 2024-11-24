<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Headers: *");

$contraseña = "";
$usuario = "root";
$ServerDB="localhost";
$nombre_base_de_datos = "erestaurant";

$json = json_decode(file_get_contents("php://input"));

try {
    $ruta = new PDO("mysql:host=".$ServerDB.";dbname=". $nombre_base_de_datos, $usuario, $contraseña);

    // if (empty($_GET["idUsuario"])) {
    //     exit("No hay id de usuario");
    // }
    $idUsuario = $json->idSuscriptor;
    $sentencia = $ruta->prepare("select idUsuario, nombre, email, telefono, idConekta, suscripcion, inicioSuscripcion, finSuscripcion, notificarSuscripcion, tolerarSuscripcion, procesoPago from usuarios where idUsuario = ?");
    $sentencia->execute([$idUsuario]);
    $mascota = $sentencia->fetchObject();

    echo $data = json_encode($mascota, JSON_PRETTY_PRINT);
} catch (Exception $e) {
    echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}

?>