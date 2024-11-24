<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Headers: *");
//el json q recivimos de conkecta
$body = @file_get_contents('php://input');
$data = json_decode($body);
http_response_code(200); // Return 200 OK 

// $contraseña = "Gangstar556677";
// $usuario = "erestaur_Kuibin";
// $ServerDB="localhost";
// $nombre_base_de_datos = "erestaur_Usuarios";

$msg = "";//var para almacenar mensaje
$encabezado = "";

if ($data->type == 'webhook_ping'){
    $encabezado = 'Webhook Ping'; 
    $msg = "Ping";
    ///Test
    mail("bboykuibin@gmail.com",$encabezado,"Su $msg se ha realizado exitosamente");
    // try {
    //   $ruta = new PDO("mysql:host=".$ServerDB.";dbname=". $nombre_base_de_datos, $usuario, $contraseña);
    //   $fecha = date("Y-m-d");
    //   $finSuscripcion = date("Y-m-d",strtotime($fecha."+ 1 month")); 
    //   $notificarFin = date("Y-m-d",strtotime($finSuscripcion."- 3 days")); 
    //   $tolerancia = date("Y-m-d",strtotime($finSuscripcion."+ 3 days")); 

    // $sentencia = $ruta->prepare("UPDATE usuarios SET suscripcion =?, inicioSuscripcion =?, finSuscripcion =?, notificarSuscripcion =?, tolerarSuscripcion =? WHERE email = ?");
    // $resultado = $sentencia->execute([ 1, $fecha, $finSuscripcion, $notificarFin, $tolerancia, "bboykuibin@gmail.com"]);
    // } catch (Exception $e) {
    // }
    ///
  }else
  if ($data->type == 'charge.created'){
    $encabezado = 'Cargo Creado correctamente'; 
    $msg = "CARGO CREADO CORRECTAMENTE";
  }else
  if ($data->type == 'charge.paid'){
    $encabezado = 'PAGO EXITOSO AXCONTABLE'; 
    $msg = "SU PAGO HA SIDO PROCESADO EXITOSAMENTE, GRACIAS POR PREFERIR AXCONTABLE";
    //ACTUALIZAMOS A LA BASE DE DATOS EL PAGO SUSCRITO SEGUN SU CORREO
    //   $ruta = new PDO("mysql:host=".$ServerDB.";dbname=". $nombre_base_de_datos, $usuario, $contraseña);
    //   $fecha = date("Y-m-d");
    //   $tipoSuscripcion = 1;
    //   $finSuscripcion = date("Y-m-d",strtotime($fecha."+ 1 month")); 
    //   if ($data->data->object->plan_id == "0002"){$tipoSuscripcion = 2; $finSuscripcion = date("Y-m-d",strtotime($fecha."+ 1 year")); }
    //   if ($data->data->object->plan_id == "0003"){$tipoSuscripcion = 3;}
    //   $notificarFin = date("Y-m-d",strtotime($finSuscripcion."- 3 days")); 
    //   $tolerancia = date("Y-m-d",strtotime($finSuscripcion."+ 3 days")); 

    // $sentencia = $ruta->prepare("UPDATE usuarios SET suscripcion =?, inicioSuscripcion =?, finSuscripcion =?, notificarSuscripcion =?, tolerarSuscripcion =? WHERE email = ?");
    // $resultado = $sentencia->execute([ $tipoSuscripcion, $fecha, $finSuscripcion, $notificarFin, $tolerancia, $data->data->object->customer_info->email]);
    
    //
  }else
  if ($data->type == 'charge.under_fraud_review'){
    $encabezado = 'Cargo bajo revisión de fraude'; 
    $msg = "Cargo bajo revisión de fraude";
  }else
  if ($data->type == 'charge.fraudulent'){
    $encabezado = 'Cargo Fraudulento'; 
    $msg = "Cargo Fraudulento";
  }else
  if ($data->type == 'charge.refunded'){
    $encabezado = 'Cargo Reembolsado'; 
    $msg = "Rargo Reembolsado";
  }else
  if ($data->type == 'charge.preauthorized'){
    $encabezado = 'Cargo Preautorizado'; 
    $msg = "Cargo Preautorizado";
  }else
  if ($data->type == 'charge.declined'){
    $encabezado = 'Cargo Rechazado'; 
    $msg = "Cargo Rechazado";
  }else
  if ($data->type == 'charge.canceled'){
    $encabezado = 'Cargo Cancelado'; 
    $msg = "Cargo Cancelado";
  }else
  if ($data->type == 'charge.reversed'){
    $encabezado = 'Cargo Invertido'; 
    $msg = "Cargo Invertido";
  }else
  if ($data->type == 'charge.pending_confirmation'){
    $encabezado = 'Cargo pendiente de confirmación'; 
    $msg = "Cargo pendiente de confirmación";
  }else
  if ($data->type == 'charge.expired'){
    $encabezado = 'Cargo Expirado'; 
    $msg = "Cargo Expirado";
  }else
  if ($data->type == 'customer.created'){
    $encabezado = 'Cliente creado'; 
    $msg = "Cliente creado";
  }else
  if ($data->type == 'customer.updated'){
    $encabezado = 'Cliente actualizado'; 
    $msg = "Cliente actualizado";
  }else
  if ($data->type == 'customer.deleted'){
    $encabezado = 'Cliente Eliminado'; 
    $msg = "Cliente Eliminado";
  }else
  if ($data->type == 'charge.chargeback.created'){
    $encabezado = 'Contracargo Creado'; 
    $msg = "Contracargo Creado";
  }else
  if ($data->type == 'charge.chargeback.updated'){
    $encabezado = 'Contracargo Actualizado'; 
    $msg = "Contracargo Actualizado";
  }else
  if ($data->type == 'charge.chargeback.under_review'){
    $encabezado = 'Contracargo bajo revisión'; 
    $msg = "Contracargo bajo revisión";
  }else
  if ($data->type == 'charge.chargeback.lost'){
    $encabezado = 'Contracargo perdido'; 
    $msg = "Contracargo perdido";
  }else
  if ($data->type == 'charge.chargeback.won'){
    $encabezado = 'Cargo de contracargo ganado'; 
    $msg = "Cargo de contracargo ganado";
  }else
  if ($data->type == 'payout.created'){
    $encabezado = 'Pago creado'; 
    $msg = "Pago creado";
  }else
  if ($data->type == 'payout.retrying'){
    $encabezado = 'Reintento de pago'; 
    $msg = "Reintento de pago";
  }else
  if ($data->type == 'payout.paid_out'){
    $encabezado = 'Pago pagado'; 
    $msg = "Pago pagado";
  }else
  if ($data->type == 'payout.failed'){
    $encabezado = 'Pago fallido'; 
    $msg = "Pago fallido";
  }else
  if ($data->type == 'plan.created'){
    $encabezado = 'Plan creado'; 
    $msg = "Plan creado";
  }else
  if ($data->type == 'plan.updated'){
    $encabezado = 'Plan actualizado'; 
    $msg = "Plan actualizado";
  }else
  if ($data->type == 'plan.deleted'){
    $encabezado = 'Plan Eliminado'; 
    $msg = "Plan Eliminado";
  }else
  if ($data->type == 'subscription.created'){
    $encabezado = 'Suscripción Creada'; 
    $msg = "Suscripción creada";
  }else
  if ($data->type == 'subscription.paused'){
    $encabezado = 'Suscripción Pausada'; 
    $msg = "Suscripción Pausada";
  }else
  if ($data->type == 'subscription.resumed'){
    $encabezado = 'Suscripción Reanudada'; 
    $msg = "Suscripción Reanudada";
  }else
  if ($data->type == 'subscription.canceled'){
    $encabezado = 'Suscripción Cancelada'; 
    $msg = "Suscripción Cancelada";
  }else
  if ($data->type == 'subscription.expired'){
    $encabezado = 'Suscripción Expirada'; 
    $msg = "Suscripción Expirada";
  }else
  if ($data->type == 'subscription.updated'){
    $encabezado = 'Suscripción Actualizada'; 
    $msg = "Suscripción Actualizada";
  }else
  if ($data->type == 'subscription.paid'){
    $encabezado = 'Suscripción Pagada'; 
    $msg = "Suscripción Pagada";
  }else
  if ($data->type == 'subscription.payment_failed'){
    $encabezado = 'Pago de suscripción fallido'; 
    $msg = "Pago de suscripción fallido";
  }else
  if ($data->type == 'payee.created'){
    $encabezado = 'Beneficiario creado'; 
    $msg = "Beneficiario creado";
  }else
  if ($data->type == 'payee.updated'){
    $encabezado = 'Beneficiario actualizado'; 
    $msg = "Beneficiario actualizado";
  }else
  if ($data->type == 'payee.deleted'){
    $encabezado = 'Beneficiario Eliminado'; 
    $msg = "Beneficiario Eliminado";
  }else
  if ($data->type == 'payee.payout_method.created'){
    $encabezado = 'Método de pago del beneficiario creado'; 
    $msg = "Método de pago del beneficiario creado";
  }else
  if ($data->type == 'payee.payout_method.updated'){
    $encabezado = 'Método de pago del beneficiario actualizado'; 
    $msg = "Método de pago del beneficiario actualizado";
  }else
  if ($data->type == 'payee.payout_method.deleted'){
    $encabezado = 'Método de pago del beneficiario eliminado'; 
    $msg = "Método de pago del beneficiario eliminado";
  }else
  if ($data->type == 'charge.score_updated'){
    $encabezado = 'Puntuación de carga actualizada'; 
    $msg = "Puntuación de carga actualizada";
  }else
  if ($data->type == 'receipt.created'){
    $encabezado = 'Puntuación de carga actualizada'; 
    $msg = "Puntuación de carga actualizada";
  }else
  if ($data->type == 'order.canceled'){
    $encabezado = 'Orden cancelada'; 
    $msg = "Orden cancelada";
  }else
  if ($data->type == 'order.charged_back'){
    $encabezado = 'Pedido devuelto'; 
    $msg = "Pedido devuelto";
  }else
  if ($data->type == 'order.created'){
    $encabezado = 'Orden Creada'; 
    $msg = "Orden Creada";
  }else
  if ($data->type == 'order.expired'){
    $encabezado = 'Orden Expirada'; 
    $msg = "Orden Expirada";
  }else
  if ($data->type == 'order.fraudulent'){
    $encabezado = 'Orden Fraudulenta'; 
    $msg = "Orden Fraudulenta";
  }else
  if ($data->type == 'order.under_fraud_review'){
    $encabezado = 'Orden bajo revisión de fraude'; 
    $msg = "Orden bajo revisión de fraude";
  }else
  if ($data->type == 'order.paid'){
    $encabezado = 'PAGO EXITOSO AXCONTABLE'; 
    $msg = "SU PAGO HA SIDO PROCESADO EXITOSAMENTE, GRACIAS POR PREFERIR AXCONTABLE";
    //ACTUALIZAMOS A LA BASE DE DATOS EL PAGO SUSCRITO SEGUN SU CORREO
    //   $ruta = new PDO("mysql:host=".$ServerDB.";dbname=". $nombre_base_de_datos, $usuario, $contraseña);
    //   $fecha = date("Y-m-d");
    //   $finSuscripcion = date("Y-m-d",strtotime($fecha."+ 1 month")); 
    //   $notificarFin = date("Y-m-d",strtotime($finSuscripcion."- 3 days")); 
    //   $tolerancia = date("Y-m-d",strtotime($finSuscripcion."+ 3 days")); 

    // $sentencia = $ruta->prepare("UPDATE usuarios SET suscripcion =?, inicioSuscripcion =?, finSuscripcion =?, notificarSuscripcion =?, tolerarSuscripcion =? WHERE email = ?");
    // $resultado = $sentencia->execute([ 1, $fecha, $finSuscripcion, $notificarFin, $tolerancia, $data->data->object->customer_info->email]);
    
  }else
  if ($data->type == 'order.partially_refunded'){
    $encabezado = 'Pedido parcialmente reembolsado'; 
    $msg = "Pedido parcialmente reembolsado";
  }else
  if ($data->type == 'order.pending_payment'){
    $encabezado = 'Orden pendiente de pago'; 
    $msg = "Orden pendiente de pago";
  }else
  if ($data->type == 'order.pre_authorized'){
    $encabezado = 'Pedido pre autorizado'; 
    $msg = "Pedido pre autorizado";
  }else
  if ($data->type == 'order.refunded'){
    $encabezado = 'Orden reembolsada'; 
    $msg = "Orden reembolsada";
  }else
  if ($data->type == 'order.updated'){
    $encabezado = 'Orden actualizada'; 
    $msg = "Orden actualizada";
  }else
  if ($data->type == 'order.voided'){
    $encabezado = 'Orden anulada'; 
    $msg = "Orden anulada";
  }else
  if ($data->type == 'order.declined'){
    $encabezado = 'Orden rechazada'; 
    $msg = "Orden rechazada";
  }

$to = $data->data->object->customer_info->email;//"destinatario@email.com, destinatario2@email.com, destinatario3@email.com";
$subject = $encabezado;//"Asunto del email";
// $message = "Este es mi primer envío de email con PHP";
$headers = "From: support@axcontable.com" . "\r\n" . $data->data->object->customer_info->email;
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 
$message = "
<html>
<head>
<title>eRestaurant</title>
</head>
<body>
<h1>$msg</h1>
<p>$msg</p>
</body>
</html>";

 mail($to, $subject, $message, $headers);
//mail($data->data->object->customer_info->email,"Pago confirmado","Su $msg se ha realizado exitosamente");
//mail("bboykuibin@gmail.com",$encabezado,"Su $msg se ha realizado exitosamente");


//Enviamos correo de notificacion
// try {
//     //Server settings
//     $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
//     $mail->isSMTP();                                            //Send using SMTP
//     $mail->Host       = 'mail.erestaurant.com.mx';                     //Set the SMTP server to send through
//     $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//     $mail->Username   = 'support@axcontable.com';                     //SMTP username
//     $mail->Password   = 'Soporte556677';                               //SMTP password
//     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
//     $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//     //Recipients
//     $mail->setFrom('support@axcontable.com', 'eRestaurant');
//     //$mail->addAddress('bboykuibin@gmail.com', 'Cliente');     //Add a recipient
//     $mail->addAddress('bboykuibin@gmail.com');               //Name is optional
//     //$mail->addReplyTo('info@example.com', 'Information');
//     //$mail->addCC('cc@example.com');
//     //$mail->addBCC('bcc@example.com');

//     //Attachments -Adjuntos
//     //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//     //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

//     //Content
//     $mail->isHTML(true);                                  //Set email format to HTML
//     $mail->Subject = $encabezado;
//     $mail->Body    = 'Su <b>'+$msg+'!</b> se ha realizado exitosamente';
//     $mail->AltBody = 'Su '+$msg+' se ha realizado exitosamente';

//     $mail->send();
//     echo 'Message has been sent';
// } catch (Exception $e) {
// //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }
?>