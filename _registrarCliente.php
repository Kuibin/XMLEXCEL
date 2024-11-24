<?php

    header("Access-Control-Allow-Origin: http://localhost:4200");
    header("Access-Control-Allow-Headers: *");
    // require_once("lib/Conekta.php");
    // \Conekta\Conekta::setApiKey("key_n8sSxXsCAjuzdTPji7gysQ");
    // \Conekta\Conekta::setApiVersion("2.0.0");

    // $contraseña = "";
    // $usuario = "root";
    // $ServerDB="localhost";
    // $nombre_base_de_datos = "axcontable";
    $contraseña = "Gangstar556677";
    $usuario = "axcontab_Kuibin";
    $ServerDB="localhost";
    $nombre_base_de_datos = "axcontab_axcontable";

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    try {
        //primero registramos en conekta
        // $customer = \Conekta\Customer::create(
        //     array(
        //         'name'  => $nombre,
        //         'email' => $email,
        //         'phone' => $telefono
        //     )
        //   );
        //   $data = json_encode($customer, JSON_PRETTY_PRINT);
        // //registramos en bd
        // $json = json_decode($data);

        $ruta = new PDO("mysql:host=".$ServerDB.";dbname=". $nombre_base_de_datos, $usuario, $contraseña);

        $sentenciaComp = $ruta->prepare("SELECT email FROM usuarios WHERE email = ? LIMIT 1;");
        $sentenciaComp->execute([$email]);

        $numeroDeFilas = $sentenciaComp->rowCount();
        # Si son 0 o menos, significa que no existe
        if ($numeroDeFilas <= 0) {
            // echo "El usuario con nombre $nombre NO existe";
            //Aqui colocas el código que tu deseas realizar cuando el dato NO existe en la base de datos
            $sentencia = $ruta->prepare("insert into usuarios(nombre, email, telefono, facturas, idConekta) 
                Values (:nombre, :email, :telefono, :facturas, :idConekta)");
                // prepare y ":" para evitar el inyeccion

            $resultado = $sentencia->execute([
                "nombre" => $nombre,
                "email" => $email,
                "telefono" => $telefono, 
                "facturas" => 50,
                "idConekta" => 0
            ]);
            echo $data = json_encode($resultado, JSON_PRETTY_PRINT);
        } else {
            echo "El usuario con nombre $email SÍ existe";
        }
         
            
    } catch (Exception $e) {
        echo "Ocurrió algo con la base de datos: " . $e->getMessage();
    }
    
    ?>