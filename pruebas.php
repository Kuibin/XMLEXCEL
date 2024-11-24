<?php
  // require __DIR__ . '/cfdiutils/vendor/autoload.php';
  require_once "vendor/Autoload.php";
  // use PHPUnit\Framework\TestCase;
  require "lib/Certificados.php";
  require "lib/DocDigitales.php";

      $api  = new DocDigitales();
      $cert = new Certificados();

      $json = '{  
          "meta":{  
              "empresa_uid":"39bc8c7176",
              "empresa_api_key":"Z7aodcmS9vbFx7ob6Mml6Q",
              "ambiente":"S",
              "objeto":"factura"
          },
          "data":
          [  
              {  
                  "datos_fiscales":{  
                      "certificado_pem":"",
                      "llave_pem":"",
                      "llave_password":""
                  },
                  "cfdi":{  
                      "cfdi__comprobante":{  
                      "folio":"123",
                      "fecha":"2018-03-25T12:12:12",
                      "tipo_comprobante":"I",
                      "lugar_expedicion":"21100",
                      "forma_pago":"01",
                      "metodo_pago":"PUE",
                      "moneda":"MXN",
                      "tipo_cambio":"1",
                      "subtotal":"99.00",
                      "total":"99.00",
                      "cfdi__emisor":{  
                          "rfc":"DDM090629R13",
                          "nombre":"Emisor Test",
                          "regimen_fiscal":"601"
                      },
                      "cfdi__receptor":{  
                          "rfc":"XEXX010101000",
                          "nombre":"Receptor Test",
                          "uso_cfdi":"G01"
                      },
                      "cfdi__conceptos":{  
                          "cfdi__concepto":[  
                                      {  
                                          "clave_producto_servicio":"01010101",
                                          "clave_unidad":"KGM",
                                          "cantidad":"1",
                                          "descripcion":"descripcion test",
                                          "valor_unitario":"99.00",
                                          "importe":"99.00",
                                          "unidad":"unidad",
                                          "no_identificacion":"KGM123",
                                          "cfdi__impuestos":{  
                                          "cfdi__traslados":{  
                                              "cfdi__traslado":[  
                                                  {  
                                                      "base":"99.00",
                                                      "impuesto":"002",
                                                      "tipo_factor":"Exento"
                                                  }
                                              ]
                                          }
                                      }
                                  }
                              ]
                          }
                      }
                  }';
            // echo $json;

      $factura = json_decode($json, true);
      
      # Llenar los datos fiscales y ponerle fecha presente al comprobante
      $factura["data"][0]["datos_fiscales"]["certificado_pem"]  = $cert->contenidoCertificado("./certificados/certificado.cer");
      $factura["data"][0]["datos_fiscales"]["llave_pem"]        = $cert->der2pem("./certificados/llave.key");
      $factura["data"][0]["datos_fiscales"]["llave_password"]   = $cert->passwordLlave("./certificados/password.txt"); 

      $factura["data"][0]["cfdi"]["cfdi__comprobante"]["fecha"] = date('Y-m-d\TH:i:s', time());

      # Generar
      $facturaGenerada = $api->generacionFactura($factura);
      # Validar que el uuid venga en la respuesta
      // $uuid = $facturaGenerada["data"][0]["cfdi_complemento"]["uuid"];
      // $this->assertNotNull($uuid);
      echo $json;
      echo $facturaGenerada;


  ?>