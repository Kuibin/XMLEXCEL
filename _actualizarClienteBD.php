<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Methods: PUT");
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
    $tel = $_POST['telefono'];
    $conekta = $_POST['conektaID'];

try {
    $ruta = new PDO("mysql:host=".$ServerDB.";dbname=". $nombre_base_de_datos, $usuario, $contraseña);

    $sentencia = $ruta->prepare("UPDATE usuarios SET telefono = ?, idConekta = ? WHERE  email = ?");
    $resultado = $sentencia->execute([$tel, $conekta, $email]);

    echo $data = json_encode($resultado, JSON_PRETTY_PRINT);
} catch (Exception $e) {
    echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}

?>