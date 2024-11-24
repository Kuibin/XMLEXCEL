<?php

     function alert($msg) 
    {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }   

    function Registra()
    {
        $contraseña = "";
        $usuario = "root";
        $ServerDB="localhost";
        $nombre_base_de_datos = "inventarios";
        //TRY CATCH ES SOLO PARA PREVENRI ALFUN ERROR
      try {
          $ruta = new PDO("mysql:host=".$ServerDB.";dbname=". $nombre_base_de_datos, $usuario, $contraseña);
      
          $sentencia = $ruta->prepare("insert into productos (articulo) 
            Values (:articulo)");
            // prepare y ":" para evitar el inyeccion

          $resultado = $sentencia->execute([
              "articulo" => $_POST["articulo"]
          ]);
          //borramos el valor de la variable
          unset($_POST);
          $_POST = array();

          echo "<script type='text/javascript'>alert('SE REGISTRO!');</script>";

      } catch (Exception $e) {
          echo "Ocurrió algo con la base de datos: " . $e->getMessage();
      }
    }

    //revisamos que no este vacio el campo para enviar datos
    if (isset($_POST["articulo"]) && !empty($_POST["articulo"])) {
      Registra(); 
    }

  ?>