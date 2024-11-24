<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Headers: *");
require_once("lib/Conekta.php");
\Conekta\Conekta::setApiKey("key_mBPzgkNqgVgQA5hB0pUWOk");
\Conekta\Conekta::setApiVersion("2.0.0");

$json = json_decode(file_get_contents("php://input"));

try{
    $customer = \Conekta\Customer::create(
      array(
          'name'  => $json->nombre,
          'email' => $json->email,
          'phone' => $json->telefono
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