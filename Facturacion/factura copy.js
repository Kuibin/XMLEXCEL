//Mapa de los conceptos
let mapConceptos = new Map();

//Mapa de impuestos de conceptos
// let mapImpuestosTraslado = new Map();
let setImpuestosTraslado = new Set();
let setImpuestosRetencion = new Set();

//Agregamos los conceptos a un map
//map.set('banana', 1);

function guardarConcepto(papa,clave_producto_servicio,clave_unidad,cantidad,descripcion,valor_unitario,importe,unidad,no_identificacion) {

    let _clave_producto_servicio=document.getElementById(clave_producto_servicio).value;
    let _clave_unidad=document.getElementById(clave_unidad).value;
    let _cantidad=document.getElementById(cantidad).value;
    let _descripcion=document.getElementById(descripcion).value;
    let _valor_unitario=document.getElementById(valor_unitario).value;
    let _importe=document.getElementById(importe).value;
    let _unidad=document.getElementById(unidad).value;
    let _no_identificacion=document.getElementById(no_identificacion).value;
    //comprobar q no esten vacios
    if (_clave_producto_servicio == null || _clave_producto_servicio == "undefined" || _clave_producto_servicio == "") {return;}
    if (_clave_unidad == null || _clave_unidad == "undefined" || _clave_unidad == "") {return;}
    if (_cantidad == null || _cantidad == "undefined" || _cantidad == "") {return;}
    if (_descripcion == null || _descripcion == "undefined" || _descripcion == "") {return;}
    if (_valor_unitario == null || _valor_unitario == "undefined" || _valor_unitario == "") {return;}
    if (_importe == null || _importe == "undefined" || _importe == "") {return;}

    // let concepto  = `{  
    // "cfdi__concepto":[  
    //             {  
    //                 "clave_producto_servicio":"${_clave_producto_servicio}",
    //                 "clave_unidad":"${_clave_unidad}",
    //                 "cantidad":"${_cantidad}",
    //                 "descripcion":"${_descripcion}",
    //                 "valor_unitario":"${_valor_unitario}",
    //                 "importe":"${_importe}",
    //                 "unidad":"${_unidad}",
    //                 "no_identificacion":"${_no_identificacion}",
    //                 "cfdi__impuestos":{  
    //                 "cfdi__traslados":{  
    //                     "cfdi__traslado":[  
    //                         {  
    //                             "base":"",
    //                             "impuesto":"",
    //                             "tipo_factor":""
    //                         }
    //                     ]
    //                 }
    //             }
    //         }
    //     ]
    // }`;
    let concepto  = ([
      ['clave_producto_servicio', _clave_producto_servicio],
      ['clave_unidad', _clave_unidad],
      ['cantidad', _cantidad],
      ['descripcion', _descripcion],
      ['valor_unitario', _valor_unitario],
      ['importe', _importe],
      ['unidad', _unidad],
      ['no_identificacion', _no_identificacion]
    ]);
    //guardamos en map
    mapConceptos.set(papa,concepto);

    // iterando sobre las entradas [clave, valor]
    // for (let [entry,key, value] of mapConceptos) { // lo mismo que recipeMap.entries()
    //   console.log('entrada:', entry);
    //   console.log('clave_producto_servicio:',key[0][1]);
    //   console.log('clave_unidad:',key[1][1]);
    //   console.log('cantidad:',key[2][1]);
    //   console.log('descripcion:',key[3][1]);
    //   console.log('valor_unitario:',key[4][1]);
    //   console.log('importe:',key[5][1]);
    //   console.log('unidad:',key[6][1]);
    //   console.log('no_identificacion:',key[7][1]);
    //   // console.log('valor:',value[1]);
    //     // alert(entry); // pepino,500 (etc)
    // }
}
//agregamos impuestos de Tralado
function guardarImpuestosTraslado(papa,hijoP,check,base,impuesto,tipo_factor,total_impuestos_trasladados) {

    let _base=document.getElementById(base).value;
    let _impuesto=document.getElementById(impuesto).value;
    let _tipo_factor=document.getElementById(tipo_factor).value;
    let _total_impuestos_trasladados=document.getElementById(total_impuestos_trasladados).value;
    let _chec = document.getElementsByName(check);

    let cfdi = "";
    for (var i = 0; i <  _chec.length; i++) {
      if (_chec[i].checked) {
        // console.log(_chec[i].value);
        if (_chec[i].value == "Traslado"){
            cfdi = "cfdi__traslado";
        }else
        if (_chec[i].value == "Retencion"){
          cfdi = "cfdi__retencion";
      }
        break;
      }
    }
    //comprobar q no esten vacios
    if (_base == null || _base == "undefined" || _base == "") {return;}
    if (_impuesto == null || _impuesto == "undefined" || _impuesto == "") {return;}
    if (_tipo_factor == null || _tipo_factor == "undefined" || _tipo_factor == "") {return;}
    if (_total_impuestos_trasladados == null || _total_impuestos_trasladados == "undefined" || _total_impuestos_trasladados == "") {return;}

    let claveHijo = papa +'-'+ hijoP; 
    let impuestoTraslado  = { 
      padre: papa,
      hijo: claveHijo,
      imp:
      ` {
          "${cfdi}":[  
              {  
                  "base":"${_base}",
                  "impuesto":"${_impuesto}",
                  "tipo_factor":"${_tipo_factor}",
                  "total_impuestos_trasladados":"${_total_impuestos_trasladados}"
              }
          ]
        }
      `
      };

if (cfdi == "cfdi__traslado"){
  // agregamos impuesto o reemplazamos
  if (setImpuestosTraslado.size == 0){
    //si no hay ningun registro, agregamos directamente
    setImpuestosTraslado.add(impuestoTraslado);
    // console.log("agrego");
  }else{
    //si hay registro, buscamos el registro para actualizarlo
  for (let conceptoIm of setImpuestosTraslado) {
    // console.log(conceptoIm.hijo);
    //donde los hijos sean iguales ahi actuaizamos
    if (conceptoIm.hijo == claveHijo){
      // console.log("deberia sobreescribir");
      // como no podemos sobreescribir directamente, primero eliminamos el registro actual
      setImpuestosTraslado.delete(conceptoIm);
      // console.log("borro el existente");
      //y volvemos a agregar el actualizado
      setImpuestosTraslado.add(impuestoTraslado);
      // console.log("aqui termina la sobreescritura");
      //break para salir del ciclo pero continuar con el cidgo posterior
      break;
      // exit;
    }else{//si no existe agrega
    setImpuestosTraslado.add(impuestoTraslado);
    // console.log("solo agrego");
    }
  };
  }
}
if (cfdi == "cfdi__retencion"){
  // agregamos impuesto o reemplazamos
  if (setImpuestosRetencion.size == 0){
    //si no hay ningun registro, agregamos directamente
    setImpuestosRetencion.add(impuestoTraslado);
    // console.log("agrego");
  }else{
    //si hay registro, buscamos el registro para actualizarlo
  for (let conceptoIm of setImpuestosRetencion) {
    // console.log(conceptoIm.hijo);
    //donde los hijos sean iguales ahi actuaizamos
    if (conceptoIm.hijo == claveHijo){
      // console.log("deberia sobreescribir");
      // como no podemos sobreescribir directamente, primero eliminamos el registro actual
      setImpuestosRetencion.delete(conceptoIm);
      // console.log("borro el existente");
      //y volvemos a agregar el actualizado
      setImpuestosRetencion.add(impuestoTraslado);
      // console.log("aqui termina la sobreescritura");
      //break para salir del ciclo pero continuar con el cidgo posterior
      break;
      // exit;
    }else{//si no existe agrega
      setImpuestosRetencion.add(impuestoTraslado);
    // console.log("solo agrego");
    }
  };
  }
}

// set solo guarda valores únicos
// alert( setImpuestosTraslado.size ); // 3

// for (let conceptoIm of setImpuestosTraslado) {
//   console.log(conceptoIm);
//   alert(conceptoIm); //checamos el impuesto del concepto padre
// }

}
///////////////////////////////////
    $('.buttonConceptos').click(function(){
      if($(this).text()=='Producto y Servicio - AGREGAR'){
        $('.contentConceptos').show();
        $(this).text('Producto y Servicio - CONTRAER');
      } else {
        $('.contentConceptos').hide();
        $(this).text('Producto y Servicio - EXPANDIR');
      }
    });
    $('.buttonComprobante').click(function(){
      if($(this).text()=='Comprobante - Expandir'){
        $('.contentComprobante').show();
        $(this).text('Comprobante - Contraer');
      } else {
        $('.contentComprobante').hide();
        $(this).text('Comprobante - Expandir');
      }
    });
    $('.buttonReceptor').click(function(){
      if($(this).text()=='Receptor - Expandir'){
        $('.contentReceptor').show();
        $(this).text('Receptor - Contraer');
      } else {
        $('.contentReceptor').hide();
        $(this).text('Receptor - Expandir');
      }
    });
    $('.buttonEmisor').click(function(){
      if($(this).text()=='Emisor - Expandir'){
        $('.contentEmisor').show();
        $(this).text('Emisor - Contraer');
      } else {
        $('.contentEmisor').hide();
        $(this).text('Emisor - Expandir');
      }
    });

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      // document.getElementById("enviarFac").addEventListener('click', function (event) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()

function showImpuestoTraslado(contenedorIm, checkIm) {
        element = document.getElementById(contenedorIm);
        check = document.getElementById(checkIm);
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
// formulas
let numConceptos = 0;
let numImpuestos = null;

let nuevo = function() {
  // $("<section/>").insertBefore("[name='enviar']")//[name='enviar']
  //                .append($("#conceptoCopia").html()) //".inputs"
  //                .find("button")
  //                .attr({onclick:"eliminar(this)", class:"btn btn-danger"})
  //                .text("Eliminar");
  numConceptos++;
  // document.getElementById("numConceptos").value=numConceptos;
  numImpuestos++;
  // document.getElementById("numImpuestos").value=numImpuestos;
  $("<section/>").insertBefore("[name='enviar']")//[name='enviar']
                 .append(`
                 <div class="col-sm-5 col-md-6 mb-3">
                    <label class="form-label" for="clave_producto_servicio">Clave de producto o Servicio</label>
                    <input type="search" list="clave_producto_servicioLista" class="form-control" id="clave_producto_servicio${numConceptos}" name="clave_producto_servicio${numConceptos}" onchange="guardarConcepto('${numConceptos}','clave_producto_servicio${numConceptos}','clave_unidad${numConceptos}','cantidad${numConceptos}','descripcion${numConceptos}','valor_unitario${numConceptos}','importe${numConceptos}','unidad${numConceptos}','no_identificacion${numConceptos}')" required>
                  </div>
                  <div class="col-sm-5 col-md-6 mb-3">
                    <label class="form-label" for="clave_unidad">Clave de Unidad</label>
                    <input type="search" list="clave_unidadLista" class="form-control" id="clave_unidad${numConceptos}" name="clave_unidad${numConceptos}" onchange="guardarConcepto('${numConceptos}','clave_producto_servicio${numConceptos}','clave_unidad${numConceptos}','cantidad${numConceptos}','descripcion${numConceptos}','valor_unitario${numConceptos}','importe${numConceptos}','unidad${numConceptos}','no_identificacion${numConceptos}')" required>

                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control myCantidad" id="cantidad${numConceptos}" name="cantidad${numConceptos}" placeholder="usoCFDI" onchange="importeFormula('cantidad${numConceptos}','valor_unitario${numConceptos}','importe${numConceptos}'), guardarConcepto('${numConceptos}','clave_producto_servicio${numConceptos}','clave_unidad${numConceptos}','cantidad${numConceptos}','descripcion${numConceptos}','valor_unitario${numConceptos}','importe${numConceptos}','unidad${numConceptos}','no_identificacion${numConceptos}')" required>
                    <label for="cantidad">Cantidad</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="descripcion${numConceptos}" name="descripcion${numConceptos}" placeholder="usoCFDI" onchange="guardarConcepto('${numConceptos}','clave_producto_servicio${numConceptos}','clave_unidad${numConceptos}','cantidad${numConceptos}','descripcion${numConceptos}','valor_unitario${numConceptos}','importe${numConceptos}','unidad${numConceptos}','no_identificacion${numConceptos}')" required>
                    <label for="descripcion">Descripcion</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="valor_unitario${numConceptos}" name="valor_unitario${numConceptos}" placeholder="usoCFDI" onchange="importeFormula('cantidad${numConceptos}','valor_unitario${numConceptos}','importe${numConceptos}'), guardarConcepto('${numConceptos}','clave_producto_servicio${numConceptos}','clave_unidad${numConceptos}','cantidad${numConceptos}','descripcion${numConceptos}','valor_unitario${numConceptos}','importe${numConceptos}','unidad${numConceptos}','no_identificacion${numConceptos}')" required>
                    <label for="valor_unitario">Valor Unitario</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="importe${numConceptos}" name="importe${numConceptos}" placeholder="usoCFDI" onchange="guardarConcepto('${numConceptos}','clave_producto_servicio${numConceptos}','clave_unidad${numConceptos}','cantidad${numConceptos}','descripcion${numConceptos}','valor_unitario${numConceptos}','importe${numConceptos}','unidad${numConceptos}','no_identificacion${numConceptos}')" required>
                    <label for="importe">Importe</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control"  id="unidad${numConceptos}" name="unidad${numConceptos}" placeholder="usoCFDI" onchange="guardarConcepto('${numConceptos}','clave_producto_servicio${numConceptos}','clave_unidad${numConceptos}','cantidad${numConceptos}','descripcion${numConceptos}','valor_unitario${numConceptos}','importe${numConceptos}','unidad${numConceptos}','no_identificacion${numConceptos}')">
                    <label for="unidad">Unidad</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="no_identificacion${numConceptos}" name="no_identificacion${numConceptos}" placeholder="usoCFDI" onchange="guardarConcepto('${numConceptos}','clave_producto_servicio${numConceptos}','clave_unidad${numConceptos}','cantidad${numConceptos}','descripcion${numConceptos}','valor_unitario${numConceptos}','importe${numConceptos}','unidad${numConceptos}','no_identificacion${numConceptos}')">
                    <label for="no_identificacion">No Identificacion</label>
                  </div>
                    <h4>Impuestos
                  <input type="checkbox" name="checkImpuestoTraslado.${numConceptos}-${numImpuestos}" id="checkImpuestoTraslado.${numConceptos}-${numImpuestos}" value="1" onchange="javascript:showImpuestoTraslado('contentImpuestoTraslado.${numConceptos}-${numImpuestos}','checkImpuestoTraslado.${numConceptos}-${numImpuestos}')" />
                  </h4>
                  <div id="contentImpuestoTraslado.${numConceptos}-${numImpuestos}" style="display: none;">
                    <h3>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions.${numConceptos}-${numImpuestos}" id="inlineRadioTraslado" value="Traslado" checked>
                      <label class="form-check-label" for="inlineRadioTraslado">Traslado</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions.${numConceptos}-${numImpuestos}" id="inlineRadioRetencion" value="Retencion">
                      <label class="form-check-label" for="inlineRadioRetencion">Retencion</label>
                    </div>
                  </h3>
                  <div class="col-sm-5 col-md-6">
                    <label class="form-label" for="tipo_factor.${numConceptos}-${numImpuestos}">Tipo Factor</label>
                    <input type="search" list="tipo_factorLista" class="form-control" id="tipo_factor.${numConceptos}-${numImpuestos}" name="tipo_factor.${numConceptos}-${numImpuestos}" onchange="TotalImpuestosTrasladoFormula('base.${numConceptos}-${numImpuestos}','impuesto.${numConceptos}-${numImpuestos}','tipo_factor.${numConceptos}-${numImpuestos}','TotalImpuestosTraslado.${numConceptos}-${numImpuestos}'), guardarImpuestosTraslado('${numConceptos}','${numImpuestos}','inlineRadioOptions.${numConceptos}-${numImpuestos}','base.${numConceptos}-${numImpuestos}','impuesto.${numConceptos}-${numImpuestos}','tipo_factor.${numConceptos}-${numImpuestos}','TotalImpuestosTraslado.${numConceptos}-${numImpuestos}')" placeholder="Seleccione" required>
                  </div>
                  <div class="col-sm-5 col-md-6">
                  <label class="form-label" for="impuesto.${numConceptos}-${numImpuestos}">Impuesto</label>
                  <input type="search" list="impuestoLista" class="form-control" id="impuesto.${numConceptos}-${numImpuestos}" name="impuesto.${numConceptos}-${numImpuestos}" onchange="TotalImpuestosTrasladoFormula('base.${numConceptos}-${numImpuestos}','impuesto.${numConceptos}-${numImpuestos}','tipo_factor.${numConceptos}-${numImpuestos}','TotalImpuestosTraslado.${numConceptos}-${numImpuestos}'), guardarImpuestosTraslado('${numConceptos}','${numImpuestos}','inlineRadioOptions.${numConceptos}-${numImpuestos}','base.${numConceptos}-${numImpuestos}','impuesto.${numConceptos}-${numImpuestos}','tipo_factor.${numConceptos}-${numImpuestos}','TotalImpuestosTraslado.${numConceptos}-${numImpuestos}')" placeholder="Seleccione" required>

                </div>
                <br>
                <h5>Calculo Inverso
                  <input type="checkbox" name="checkCalculoInverso.${numConceptos}-${numImpuestos}" id="checkCalculoInverso.${numConceptos}-${numImpuestos}" value="1" onchange="calculoInverso('base.${numConceptos}-${numImpuestos}','checkCalculoInverso.${numConceptos}-${numImpuestos}')" />
                  <h6>*Explicacion: saca el valor sin impuesto de la cantidad</h6>
                  </h5>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control"  id="base.${numConceptos}-${numImpuestos}" name="base.${numConceptos}-${numImpuestos}" placeholder="usoCFDI" onchange="TotalImpuestosTrasladoFormula('base.${numConceptos}-${numImpuestos}','impuesto.${numConceptos}-${numImpuestos}','tipo_factor.${numConceptos}-${numImpuestos}','TotalImpuestosTraslado.${numConceptos}-${numImpuestos}'), guardarImpuestosTraslado('${numConceptos}','${numImpuestos}','inlineRadioOptions.${numConceptos}-${numImpuestos}','base.${numConceptos}-${numImpuestos}','impuesto.${numConceptos}-${numImpuestos}','tipo_factor.${numConceptos}-${numImpuestos}','TotalImpuestosTraslado.${numConceptos}-${numImpuestos}')" required>
                    <label for="base">Base</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control"  id="TotalImpuestosTraslado.${numConceptos}-${numImpuestos}" name="TotalImpuestosTraslado.${numConceptos}-${numImpuestos}" placeholder="usoCFDI" onchange="guardarImpuestosTraslado('${numConceptos}','${numImpuestos}','inlineRadioOptions.${numConceptos}-${numImpuestos}','base.${numConceptos}-${numImpuestos}','impuesto.${numConceptos}-${numImpuestos}','tipo_factor.${numConceptos}-${numImpuestos}','TotalImpuestosTraslado.${numConceptos}-${numImpuestos}')" required>
                    <label for="TotalImpuestosTraslado">Total Impuesto Traslado</label>
                  </div>
                </div>
                <br>
                <div class="d-grid gap-2 col-6 mx-auto">
                  <button class="btn btn-info" type="button" onclick="nuevoImpuesto(${numConceptos})" name="agregarImpuesto">Agregar Impuesto</button>
                </div>
                <br name="finImpuesto${numConceptos}">
                  <div class="d-grid gap-2 col-6 mx-auto">
                    <button class="btn btn-success" type="button" onclick="nuevo()" name="agregarConcepto" id="agregarConcepto">Agregar Concepto</button>
                  </div>
                 `)
                 .find("[name='agregarConcepto']")
                 .attr({onclick:`eliminar(this,'${numConceptos}')`, class:"btn btn-danger"})
                 .text("Eliminar");

  // console.log(numConceptos);
}
let nuevoImpuesto = function(papa) {
  numImpuestos++;
  // document.getElementById("numImpuestos").value=numImpuestos;
$("<section/>").insertBefore(`[name='finImpuesto${papa}']`)//[name='enviar']
                 .append(`
                  <h4>Impuestos
                  <input type="checkbox" name="checkImpuestoTraslado.${papa}-${numImpuestos}" id="checkImpuestoTraslado.${papa}-${numImpuestos}" value="1" onchange="javascript:showImpuestoTraslado('contentImpuestoTraslado.${papa}-${numImpuestos}','checkImpuestoTraslado.${papa}-${numImpuestos}')" />
                  </h4>
                  <div id="contentImpuestoTraslado.${papa}-${numImpuestos}" style="display: none;">
                  <h3>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions.${papa}-${numImpuestos}" id="inlineRadioTraslado" value="Traslado" checked>
                      <label class="form-check-label" for="inlineRadioTraslado">Traslado</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions.${papa}-${numImpuestos}" id="inlineRadioRetencion" value="Retencion">
                      <label class="form-check-label" for="inlineRadioRetencion">Retencion</label>
                    </div>
                  </h3>
                  <div class="col-sm-5 col-md-6">
                    <label class="form-label" for="tipo_factor.${papa}-${numImpuestos}">Tipo Factor</label>
                    <input type="search" list="tipo_factorLista" class="form-control" id="tipo_factor.${papa}-${numImpuestos}" name="tipo_factor.${papa}-${numImpuestos}" onchange="TotalImpuestosTrasladoFormula('base.${papa}-${numImpuestos}','impuesto.${papa}-${numImpuestos}','tipo_factor.${papa}-${numImpuestos}','TotalImpuestosTraslado.${papa}-${numImpuestos}'), guardarImpuestosTraslado('${papa}','${numImpuestos}','inlineRadioOptions.${papa}-${numImpuestos}','base.${papa}-${numImpuestos}','impuesto.${papa}-${numImpuestos}','tipo_factor.${papa}-${numImpuestos}','TotalImpuestosTraslado.${papa}-${numImpuestos}')" placeholder="Seleccione" required>
                  </div>
                  <div class="col-sm-5 col-md-6">
                  <label class="form-label" for="impuesto.${papa}-${numImpuestos}">Impuesto</label>
                  <input type="search" list="impuestoLista" class="form-control" id="impuesto.${papa}-${numImpuestos}" name="impuesto.${papa}-${numImpuestos}" onchange="TotalImpuestosTrasladoFormula('base.${papa}-${numImpuestos}','impuesto.${papa}-${numImpuestos}','tipo_factor.${papa}-${numImpuestos}','TotalImpuestosTraslado.${papa}-${numImpuestos}'), guardarImpuestosTraslado('${papa}','${numImpuestos}','inlineRadioOptions.${papa}-${numImpuestos}','base.${papa}-${numImpuestos}','impuesto.${papa}-${numImpuestos}','tipo_factor.${papa}-${numImpuestos}','TotalImpuestosTraslado.${papa}-${numImpuestos}')" placeholder="Seleccione" required>

                </div>
                <br>
                <h5>Calculo Inverso
                  <input type="checkbox" name="checkCalculoInverso.${papa}-${numImpuestos}" id="checkCalculoInverso.${papa}-${numImpuestos}" value="1" onchange="calculoInverso('base.${papa}-${numImpuestos}','checkCalculoInverso.${papa}-${numImpuestos}')" />
                  <h6>*Explicacion: saca el valor sin impuesto de la cantidad</h6>
                  </h5>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control"  id="base.${papa}-${numImpuestos}" name="base.${papa}-${numImpuestos}" placeholder="usoCFDI" onchange="TotalImpuestosTrasladoFormula('base.${papa}-${numImpuestos}','impuesto.${papa}-${numImpuestos}','tipo_factor.${papa}-${numImpuestos}','TotalImpuestosTraslado.${papa}-${numImpuestos}'), guardarImpuestosTraslado('${papa}','${numImpuestos}','inlineRadioOptions.${papa}-${numImpuestos}','base.${papa}-${numImpuestos}','impuesto.${papa}-${numImpuestos}','tipo_factor.${papa}-${numImpuestos}','TotalImpuestosTraslado.${papa}-${numImpuestos}')" required>
                    <label for="base">Base</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control"  id="TotalImpuestosTraslado.${papa}-${numImpuestos}" name="TotalImpuestosTraslado.${papa}-${numImpuestos}" placeholder="usoCFDI" onchange="guardarImpuestosTraslado('${papa}','${numImpuestos}','inlineRadioOptions.${papa}-${numImpuestos}','base.${papa}-${numImpuestos}','impuesto.${papa}-${numImpuestos}','tipo_factor.${papa}-${numImpuestos}','TotalImpuestosTraslado.${papa}-${numImpuestos}')" required>
                    <label for="TotalImpuestosTraslado">Total Impuesto Traslado</label>
                  </div>
                </div>
                <br>
                <div class="d-grid gap-2 col-6 mx-auto">
                  <button class="btn btn-success" type="button" onclick="nuevoImpuesto(${papa})" name="agregarImpuesto">Agregar Impuesto</button>
                </div>
                 `)
                 .find("button")
                 .attr({onclick:`eliminarImpuesto(this,'${papa}-${numImpuestos}')`, class:"btn-warning"})
                 .text("Eliminar Impuesto");
}

let eliminar = function(obj,papa) {
  // console.log(obj);
  if (mapConceptos.size > 0){
    mapConceptos.delete(papa);
    // for (let conceptoIm of mapConceptos) {
    //   if (conceptoIm.hijo == claveHijo){
    //     // Eliminamos el registro segun el valor de hijo q tenga
    //     mapConceptos.delete(conceptoIm);
    //     // console.log("elimino ", claveHijo);
    //     break;
    //   }
    // };
  }
  // iterando sobre las entradas [clave, valor]
  // for (let entry of mapConceptos) { // lo mismo que recipeMap.entries()
  //   // console.log(entry);
  //     // alert(entry); // pepino,500 (etc)
  // }
  //eliminamos seccion
  $(obj).closest("section").remove();
}
let eliminarImpuesto = function(obj,claveHijo) {
  // console.log(obj);
  // console.log(setImpuestosTraslado.size);
  if (setImpuestosTraslado.size > 0){
    for (let conceptoIm of setImpuestosTraslado) {
      if (conceptoIm.hijo == claveHijo){
        // Eliminamos el registro segun el valor de hijo q tenga
        setImpuestosTraslado.delete(conceptoIm);
        // console.log("elimino ", claveHijo);
        break;
      }
    };
  }
  //eliminamos seccion
  $(obj).closest("section").remove();
}

// $(document).ready(function(){ 
//     $('.myCantidad').click(function(){
//         alert("alo si jala");
//     });
// });

tipoCambio = function(){
  if(document.getElementById("moneda").value !== 'MXN' && document.getElementById("moneda").value !== '' && document.getElementById("moneda").value !== null && document.getElementById("moneda").value !== "undefinedd" ){
      document.getElementById("tipo_cambio").readOnly = false;
      }
      else{
        document.getElementById("tipo_cambio").readOnly = true;
        document.getElementById("tipo_cambio").value = 0;
      }
}

importeFormula = function(cantidadN,valorUnitarioN,importeN) //"10/09/2014".split('/');// "15/10/2014".split('/');
		{
      var importeR = parseFloat(document.getElementById(cantidadN).value) * parseFloat(document.getElementById(valorUnitarioN).value);
      if(document.getElementById(cantidadN).value !== '' && document.getElementById(valorUnitarioN).value !== ''){
      document.getElementById(importeN).value=importeR;
      }
    }
TotalImpuestosTrasladoFormula = function(base,impuesto,tipo_factor,TotalImpuestosTraslado){
  var totalR = 0;
  var baseR = parseFloat(document.getElementById(base).value);
  var impuestoR = parseFloat(document.getElementById(impuesto).value);

  if(document.getElementById(tipo_factor).value === 'Tasa'){
    totalR = baseR * impuestoR;
      if(document.getElementById(base).value !== '' && document.getElementById(impuesto).value !== ''){
      document.getElementById(TotalImpuestosTraslado).value=totalR;
      }
    }
  if(document.getElementById(tipo_factor).value == 'Cuota'){
    totalR = baseR + (baseR * impuestoR);
      if(document.getElementById(base).value !== '' && document.getElementById(impuesto).value !== ''){
      document.getElementById(TotalImpuestosTraslado).value=totalR;
      }
    }
  if(document.getElementById(tipo_factor).value == 'Exento'){
      if(document.getElementById(base).value !== '' && document.getElementById(impuesto).value !== ''){
      document.getElementById(TotalImpuestosTraslado).value=baseR;
      }
    }
  }//fin
  
  //Armado de concepto he impuestos estructura
  estructuraConceptosImpuestos = function(){
  // document.getElementById("enviarFac").onclick = function () {

    let estructuraConcepto = "";
    let cuantosConceptos = 0;

    // iterando sobre las entradas [clave, valor]
    for (let [entry,key, value] of mapConceptos) { // lo mismo que recipeMap.entries()
      // console.log('entrada:', entry);
      // console.log('clave_producto_servicio:',key[0][1]);
      // console.log('clave_unidad:',key[1][1]);
      // console.log('cantidad:',key[2][1]);
      // console.log('descripcion:',key[3][1]);
      // console.log('valor_unitario:',key[4][1]);
      // console.log('importe:',key[5][1]);
      // console.log('unidad:',key[6][1]);
      // console.log('no_identificacion:',key[7][1]);
        // alert(entry); // pepino,500 (etc)

        //primero armo los impuestos
        let estructuraImpuesto = "";
        let estructuraImpuestoRetencion = "";

        //IMPUESTO TRASLADO
        if (setImpuestosTraslado.size > 0){
        for (let conceptoIm of setImpuestosTraslado) {
          //si padre es el mismo concatena
            if (conceptoIm.padre == entry){
              estructuraImpuesto += conceptoIm.imp;
              estructuraImpuesto += ',';
            }
          }
        }else{
          estructuraImpuesto = "{} ";
        }
        // console.log(estructuraImpuesto);
        estructuraImpuesto2 = estructuraImpuesto.replace(/.$/, '');

        //IMPUESTO RETENCION
        if (setImpuestosRetencion.size > 0){
          for (let conceptoIm of setImpuestosRetencion) {
            //si padre es el mismo concatena
              if (conceptoIm.padre == entry){
                estructuraImpuestoRetencion += conceptoIm.imp;
                estructuraImpuestoRetencion += ',';
              }
            }
          }else{
            estructuraImpuestoRetencion = "{} ";
          }
          // console.log(estructuraImpuesto);
          estructuraImpuestoRetencion2 = estructuraImpuestoRetencion.replace(/.$/, '');

        //concepto
      let concepto  = `{  
      "cfdi__concepto":[  
                  {  
                      "clave_producto_servicio":"${key[0][1]}",
                      "clave_unidad":"${key[1][1]}",
                      "cantidad":"${key[2][1]}",
                      "descripcion":"${key[3][1]}",
                      "valor_unitario":"${key[4][1]}",
                      "importe":"${key[5][1]}",
                      "unidad":"${key[6][1]}",
                      "no_identificacion":"${key[7][1]}",
                      "cfdi__impuestos":{  
                      "cfdi__traslados":${estructuraImpuesto2} ,
                      "cfdi__retenciones":${estructuraImpuestoRetencion2}
                  }
              }
          ]
      } `;

      estructuraConcepto += concepto;
      cuantosConceptos++;
      estructuraImpuesto = "";
      if (cuantosConceptos == mapConceptos.size){break;}
      estructuraConcepto += ',';
    }
    
    document.getElementById("estructuraConceptos").value = estructuraConcepto;
    
    // console.log(estructuraConcepto);
    // document.formularioFactura.submit();
    // alert('no entro??');

  }

  function calculoInverso(base,checkСal){
    check = document.getElementById(checkСal);
    if (check.checked) {
      cantidad = parseFloat(document.getElementById(base).value);
      res = cantidad/1.16;
      sinIva = Math.round10(res, -1);  // 
      document.getElementById(base).value = sinIva;
    }
    else {
      cantidad = parseFloat(document.getElementById(base).value);
      res = cantidad*1.16;
      Iva = Math.round10(res, -1);  // 
      document.getElementById(base).value = Iva;
    }
    
  }

  // Redondeo para decimales
(function() {
  /**
   * Ajuste decimal de un número.
   *
   * @param {String}  tipo  El tipo de ajuste.
   * @param {Number}  valor El numero.
   * @param {Integer} exp   El exponente (el logaritmo 10 del ajuste base).
   * @returns {Number} El valor ajustado.
   */
  function decimalAdjust(type, value, exp) {
    // Si el exp no está definido o es cero...
    if (typeof exp === 'undefined' || +exp === 0) {
      return Math[type](value);
    }
    value = +value;
    exp = +exp;
    // Si el valor no es un número o el exp no es un entero...
    if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
      return NaN;
    }
    // Shift
    value = value.toString().split('e');
    value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
    // Shift back
    value = value.toString().split('e');
    return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
  }

  // Decimal round
  if (!Math.round10) {
    Math.round10 = function(value, exp) {
      return decimalAdjust('round', value, exp);
    };
  }
  // Decimal floor
  if (!Math.floor10) {
    Math.floor10 = function(value, exp) {
      return decimalAdjust('floor', value, exp);
    };
  }
  // Decimal ceil
  if (!Math.ceil10) {
    Math.ceil10 = function(value, exp) {
      return decimalAdjust('ceil', value, exp);
    };
  }
})();

