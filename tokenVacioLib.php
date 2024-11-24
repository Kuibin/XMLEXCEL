<?php
header("Access-Control-Allow-Origin: http://localhost:4200");
header("Access-Control-Allow-Headers: *");
require_once("lib/Conekta.php");
\Conekta\Conekta::setApiKey("key_mN3WjzMhZRWL6SVrZkNOumv");
\Conekta\Conekta::setApiVersion("2.0.0");

try{
    $token = \Conekta\Token::create(
        array(
            'checkout'    => array(
              'returns_control_on' => 'Token'
            ),
          )
        );
echo $data = json_encode($token, JSON_PRETTY_PRINT);
  } catch (\Conekta\ProcessingError $error){
    echo $error->getMessage();
  } catch (\Conekta\ParameterValidationError $error){
    echo $error->getMessage();
  } catch (\Conekta\Handler $error){
    echo $error->getMessage();
  }

?>