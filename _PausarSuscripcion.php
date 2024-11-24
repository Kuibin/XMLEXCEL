<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Headers: *");
require_once("lib/Conekta.php");
\Conekta\Conekta::setApiKey("key_mN3WjzMhZRWL6SVrZkNOumv");
\Conekta\Conekta::setApiVersion("2.0.0");

// $json = json_decode(file_get_contents("php://input"));
$idConekta = $_POST['idConekta'];

//Primero le asociamos la tarjeta que tokenizo
$url= 'https://api.conekta.io/customers/'.$idConekta.'/subscription/pause';
$private_key = 'key_mN3WjzMhZRWL6SVrZkNOumv';
$headers = [
    'Accept: application/vnd.conekta-v2.0.0+json',
    'Content-Type: application/json; charset=utf-8',
    'Authorization: Bearer ' . $private_key . ''
];

try{
  $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, true);
    $result = curl_exec($ch);
    curl_close($ch);

    $response = json_decode($result);
    echo $data = json_encode($response, JSON_PRETTY_PRINT);
  } catch (\Conekta\ProcessingError $error){
    echo $error->getMessage();
  } catch (\Conekta\ParameterValidationError $error){
    echo $error->getMessage();
  } catch (\Conekta\Handler $error){
    echo $error->getMessage();
  }

  ?>