<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Headers: *");
require_once("lib/Conekta.php");
\Conekta\Conekta::setApiKey("key_mN3WjzMhZRWL6SVrZkNOumv");
\Conekta\Conekta::setApiVersion("2.0.0");

//llave privada : key_mN3WjzMhZRWL6SVrZkNOumv
//llave publica : key_L5Hf0pfKyuDmHx1TeY1N8OC
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$token_id = $_POST['token_id'];
$plan_id = $_POST['plan'];

try{
    $customer = \Conekta\Customer::create(
      array(
          'name'  => $nombre,
          'email' => $email,
          'phone' => $telefono,
          'plan_id' => $plan_id,//plan test davi soft
          'payment_sources' => array(
                array(
                'type' => 'card',
                'token_id' => $token_id //en modo test usar token test 'tok_test_visa_4242'
                )
            )
      )
    );
    //var_dump(json_encode($customer));
    //$response = json_decode($result);
echo $data = json_encode($customer, JSON_PRETTY_PRINT);
  } catch (\Conekta\ProcessingError $error){
    echo $error->getMessage();
  } catch (\Conekta\ParameterValidationError $error){
    echo $error->getMessage();
  } catch (\Conekta\Handler $error){
    echo $error->getMessage();
  }
?>