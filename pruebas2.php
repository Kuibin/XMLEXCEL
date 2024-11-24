<?php
// $pem_data = file_get_contents($cert_path.$pem_file);
// $pem2der = pem2der($pem_data);

// $der_data = file_get_contents($cert_path.$der_file);
$der_data = file_get_contents('CSD_uno_TOPD900809UM0_20200219_115743.key');
$der2pem = der2pem($der_data);

// function pem2der($pem_data) {
//    $begin = "CERTIFICATE-----";
//    $end   = "-----END";
//    $pem_data = substr($pem_data, strpos($pem_data, $begin)+strlen($begin));   
//    $pem_data = substr($pem_data, 0, strpos($pem_data, $end));
//    $der = base64_decode($pem_data);
//    return $der;
// }

function der2pem($der_data) {
   $pem = chunk_split(base64_encode($der_data), 64, "\n");
   $pem = "-----BEGIN CERTIFICATE-----\n".$pem."-----END CERTIFICATE-----\n";
//    return openssl_pkey_export_to_file($pem, 'csd.pem','D206860f');
// return openssl_pkey_export_to_file('CSD_uno_TOPD900809UM0_20200219_115743.key', $pem.'pem', 'D206860f');
   return $pem;
}
// $privkey = openssl_pkey_new();
// openssl_pkey_export_to_file($privkey, $der2pem);
// Create the keypair

// $privateKeyFile = 'CSD_uno_TOPD900809UM0_20200219_115743.pem';
// $passphrase = 'D206860f';
// // generate a 1024 bit rsa private key, returns a php resource, save to file
// $privateKey = openssl_pkey_new(array('private_key_bits' => 1024, 'private_key_type' => OPENSSL_KEYTYPE_RSA));
// openssl_pkey_export_to_file($privateKey, $privateKeyFile, $passphrase);
// // get the public key $keyDetails['key'] from the private key;
// $keyDetails = openssl_pkey_get_details($privateKey);
// file_put_contents('CSD_uno_TOPD900809UM0_20200219_115743.key', $keyDetails['key']);


// file_put_contents('CSD_uno_TOPD900809UM0_20200219_115743.key',$der2pem);

// ------------------------------------------
// -----------------------------------
// function der2pem($der_data) { $pem = chunk_split(base64_encode($der_data), 64, "\n"); $pem = "-----BEGIN PRIVATE KEY-----\n".$pem."-----END PRIVATE KEY-----\n"; return $pem; } $keyfile = 'myFileDER.key'; $keyFileContent = file_get_contents($keyfile); $pemContent = der2pem($keyFileContent); file_put_contents('llavetemp.pem', $pemContent); $private_key1 = openssl_pkey_get_private($pemContent); var_dump($private_key1); 
echo $der2pem;
// echo $keyDetails;
?>