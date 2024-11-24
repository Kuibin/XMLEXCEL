<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Allow-Headers: *");

$contraseña = "";
$usuario = "root";
$ServerDB="localhost";
$nombre_base_de_datos = "erestaurant";

$json = json_decode(file_get_contents("php://input"));

try {
    $ruta = new PDO("mysql:host=".$ServerDB.";dbname=". $nombre_base_de_datos, $usuario, $contraseña);


    $inicioSus = date("Y-m-d");
    //sumo 1 mes
    $finSus = date("Y-m-d",strtotime($inicioSus."+ 1 month")); 
    //sumo 3 días de tolerancia para que pague la suscripcion
    $tolerarSus = date("Y-m-d",strtotime($finSus."+ 3 days")); 
    //resto 3 día, para empezar a notificar q se va a vencer
    $notificarSus = date("Y-m-d",strtotime($finSus."- 3 days")); 

    $sentencia = $ruta->prepare("UPDATE usuarios SET inicioSuscripcion = ?, finSuscripcion = ?, notificarSuscripcion = ?, tolerarSuscripcion = ? WHERE idConekta = ?");
    $resultado = $sentencia->execute([$inicioSus, $finSus, $notificarSus, $tolerarSus, "cus_2qvKkbB9Snhkw7oGB"]);

    echo $data = json_encode($resultado, JSON_PRETTY_PRINT);
    echo $inicioSus, $finSus;
    $us = preg_replace('/[&\/\\#,+()$~%.":*?<>{}@;]/', '', 'bboykuibin@gmail.com');
    echo $us;
} catch (Exception $e) {
    echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}

?>