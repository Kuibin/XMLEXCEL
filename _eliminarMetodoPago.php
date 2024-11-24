<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Headers: *");
require_once("lib/Conekta.php");
\Conekta\Conekta::setApiKey("key_mN3WjzMhZRWL6SVrZkNOumv");
\Conekta\Conekta::setApiVersion("2.0.0");

// $jsonCliente = json_decode(file_get_contents("php://input"));
$idConekta = $_POST['idConekta'];

try{
    $customer = \Conekta\Customer::find($idConekta);
    $source   = $customer->payment_sources[0]->delete();

  echo $data = json_encode($source, JSON_PRETTY_PRINT);
  } catch (\Conekta\ProcessingError $error){
    echo $error->getMessage();
  } catch (\Conekta\ParameterValidationError $error){
    echo $error->getMessage();
  } catch (\Conekta\Handler $error){
    echo $error->getMessage();
  }
?>