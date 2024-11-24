<?php 
class Certificados {
  public function contenidoCertificado($pathCertificado) {
    $archivo = file_get_contents($pathCertificado);
    $cert = "-----BEGIN CERTIFICATE-----\n" . chunk_split(base64_encode($archivo), 64, "\n") . "-----END CERTIFICATE-----";
    return $cert;
  }
  public function der2pem($data) {
    $der_data = file_get_contents($data);
    $pem = chunk_split(base64_encode($der_data), 64, "\n");
    $pem = "-----BEGIN CERTIFICATE-----\n".$pem."-----END CERTIFICATE-----\n";
 //    return openssl_pkey_export_to_file($pem, 'csd.pem','D206860f');
 // return openssl_pkey_export_to_file('CSD_uno_TOPD900809UM0_20200219_115743.key', $pem.'pem', 'D206860f');
    return $pem;
 }

  public function contenidoLlave($pathLlave) {
    $archivo   = file_get_contents($pathLlave);
    return $archivo;
  }

  public function passwordLlave($pathPassword) {
    $password = file_get_contents($pathPassword);
    return $password;
  }
}
?>