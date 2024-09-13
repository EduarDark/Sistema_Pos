// variables globales
var host = "http://localhost:5000/";
var codSistema = "775FA42BE90F7B78EF98F57";
var cuis = "9272DC05";
var nitEmpresa = 338794023;
var rsEmpresa = "NEOMAC SRL";
var telEmpresa = "9422560";
var dirEmpresa =
  "Calle Pucara 129 AVENIDA 7MO ANILLO NRO. 7550 ZONA/BARRIO: TIERRAS NUEVAS UV: 0135 MZA: 007";

var token =
  "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJTdXBlcmppY2hvMzMiLCJjb2RpZ29TaXN0ZW1hIjoiNzc1RkE0MkJFOTBGN0I3OEVGOThGNTciLCJuaXQiOiJINHNJQUFBQUFBQUFBRE0ydGpDM05ERXdNZ1lBOFFXMzNRa0FBQUE9IiwiaWQiOjYxODYwOCwiZXhwIjoxNzMzOTYxNjAwLCJpYXQiOjE3MDI0OTc2NjAsIm5pdERlbGVnYWRvIjozMzg3OTQwMjMsInN1YnNpc3RlbWEiOiJTRkUifQ.4K_pQUXnIhgI5ymmXoyL43i0pSk3uKCgLMkmQeyl67h7j55GSRsH120AD44pR0aQ1UX_FNYzWQBYrX6pWLd-1w";
var cufd;
var codControlCufd;
var fechaVigCufd;
var leyenda;

function verificarComunicacion() {
  var obj = "";

  $.ajax({
    type: "POST",
    url: `${host}api/CompraVenta/comunicacion`,
    data: obj,
    cache: false,
    contentType: "application/json",
    processData: false,
    success: function (data) {
      if (data["transaccion"] == true) {
        document.getElementById("comunSiat").innerHTML = "Conectado";
        document.getElementById("comunSiat").className = "badge badge-success";
      }
    },
  }).fail(function (jqXHR, textStatus, errorThrown) {
    if (jqXHR.status == 0) {
      document.getElementById("comunSiat").innerHTML = "Desconectado";
      document.getElementById("comunSiat").className = "badge badge-danger";
    }
  });
}
setInterval(verificarComunicacion, 3000);

function busCliente() {
  let nitCliente = document.getElementById("nitCliente").value;

  var obj = {
    nitCliente: nitCliente,
  };

  $.ajax({
    type: "POST",
    url: "controlador/clienteControlador.php?ctrBusCliente",
    data: obj,
    dataType: "json",
    success: function (data) {
      if (data["email_cliente"] == "") {
        document.getElementById("emailCliente").value = "null";
      } else {
        document.getElementById("emailCliente").value = data["email_cliente"];
      }
      document.getElementById("rsCliente").value = data["razon_social_cliente"];
      numFactura();
    },
  });
}

// generar numero de factura
function numFactura() {
  let obj = "";
  $.ajax({
    type: "POST",
    url: "controlador/facturaControlador.php?ctrNumFactura",
    data: obj,
    success: function (data) {
      document.getElementById("numFactura").value = data;
    },
  });
}

function busProducto() {
  let codProducto = document.getElementById("codProducto").value;

  var obj = {
    codProducto: codProducto,
  };

  $.ajax({
    type: "POST",
    url: "controlador/productoControlador.php?ctrBusProducto",
    data: obj,
    dataType: "json",
    success: function (data) {
      document.getElementById("conceptoPro").value = data["nombre_producto"];
      document.getElementById("uniMedida").value = data["unidad_medida"];
      document.getElementById("preUnitario").value = data["precio_producto"];

      document.getElementById("uniMedidaSin").value = data["unidad_medida_sin"];
      document.getElementById("codProductoSin").value =
        data["cod_producto_sin"];
    },
  });
}

function calcularPreProd() {
  let cantPro = parseInt(document.getElementById("cantProducto").value);
  let descProducto = parseFloat(document.getElementById("descProducto").value);
  let preUnitario = parseFloat(document.getElementById("preUnitario").value);

  let preProducto = preUnitario - descProducto;
  document.getElementById("preTotal").value = preProducto * cantPro;
}

// Carrito
var arregloCarrito = [];
var listaDetalle = document.getElementById("listaDetalle");
function agregarCarrito() {
  let actEconomica = document.getElementById("actEconomica").value;
  let codProducto = document.getElementById("codProducto").value;
  let codProductoSin = parseInt(
    document.getElementById("codProductoSin").value
  );
  let conceptoPro = document.getElementById("conceptoPro").value;
  let cantProducto = parseInt(document.getElementById("cantProducto").value);
  let uniMedida = document.getElementById("uniMedida").value;
  let uniMedidaSin = parseInt(document.getElementById("uniMedidaSin").value);
  let preUnitario = parseFloat(document.getElementById("preUnitario").value);
  let descProducto = parseFloat(document.getElementById("descProducto").value);
  let preTotal = parseFloat(document.getElementById("preTotal").value);

  let objDetalle = {
    actividadEconomica: actEconomica,
    codigoProductoSin: codProductoSin,
    codigoProducto: codProducto,
    descripcion: conceptoPro,
    cantidad: cantProducto,
    unidadMedida: uniMedidaSin,
    precioUnitario: preUnitario,
    montoDescuento: descProducto,
    subTotal: preTotal,
  };

  arregloCarrito.push(objDetalle);
  dibujarTablaCarrito();

  // borrar el formulario de carrito
  document.getElementById("codProducto").value = "";
  document.getElementById("conceptoPro").value = "";
  document.getElementById("cantProducto").value = 0;
  document.getElementById("uniMedida").value = "";
  document.getElementById("preUnitario").value = "";
  document.getElementById("descProducto").value = "0.00";
  document.getElementById("preTotal").value = "0.00";
}

function dibujarTablaCarrito() {
  listaDetalle.innerHTML = "";
  arregloCarrito.forEach((detalle) => {
    let fila = document.createElement("tr");
    fila.innerHTML =
      "<td>" +
      detalle.descripcion +
      "</td>" +
      "<td>" +
      detalle.cantidad +
      "</td>" +
      "<td>" +
      detalle.precioUnitario +
      "</td>" +
      "<td>" +
      detalle.montoDescuento +
      "</td>" +
      "<td>" +
      detalle.subTotal +
      "</td>";

    let tdEliminar = document.createElement("td");
    let botonEliminar = document.createElement("button");
    botonEliminar.classList.add("btn", "btn-danger");
    botonEliminar.innerText = "Eliminar";
    botonEliminar.onclick = () => {
      eliminarCarrito(detalle.codigoProducto);
    };

    tdEliminar.appendChild(botonEliminar);
    fila.appendChild(tdEliminar);

    listaDetalle.appendChild(fila);
  });
}

function eliminarCarrito(cod) {
  arregloCarrito = arregloCarrito.filter((detalle) => {
    if (cod != detalle.codigoProducto) {
      return detalle;
    }
  });
  dibujarTablaCarrito();
}

function calcularTotal() {
  let totalCarrito = 0;
  for (var i = 0; i < arregloCarrito.length; i++) {
    totalCarrito = totalCarrito + parseFloat(arregloCarrito[i].subTotal);
  }
  document.getElementById("subTotal").value = totalCarrito;
  let descAdicional = parseFloat(
    document.getElementById("descAdicional").value
  );
  document.getElementById("totApagar").value = totalCarrito - descAdicional;
}
/*===============
obtencion de cufd
===============*/
function solicitudCufd() {
  return new Promise((resolve, reject)=>{

  
  var obj = {
    codigoAmbiente: 2,
    codigoModalidad: 2,
    codigoPuntoVenta: 0,
    codigoPuntoVentaSpecified: true,
    codigoSistema: codSistema,
    codigoSucursal: 0,
    nit: nitEmpresa,
    cuis: cuis,
  };

  $.ajax({
    type: "POST",
    url: host + "api/Codigos/solicitudCufd?token=" + token,
    data: JSON.stringify(obj),
    cache: false,
    contentType: "application/json",
    success: function (data) {
      cufd = data["codigo"];
      codControlCufd = data["codigoControl"];
      fechaVigCufd = data["fechaVigencia"];

      resolve(cufd)
    }
  })
})
}
/*========
registrar nuevo cufd
==========*/
function registrarNuevoCufd() {

  solicitudCufd().then(ok=>{
    if(ok!="" || ok!=null){
      var obj = {
        "cufd": cufd,
        "fechaVigCufd": fechaVigCufd,
        "codControlCufd": codControlCufd,
      };
    
      $.ajax({
        type: "POST",
        data: obj,
        url: "controlador/facturaControlador.php?ctrNuevoCufd",
        cache: false,
        success: function (data) {
          if(data=="ok"){
          $("#panelInfo").before("<span class='text-primary'>Cufd registrado!!!</span><br>") 
        }else{
          $("#panelInfo").before("<span class='text-danger'>Error de registro cufd</span><br>") 
        }

    }});
  }
    
}) 
}  

/*===============
verificar vidgencia cifd
=================*/
function verificarVigenciaCufd(){
  //fecha actual
  let date=new Date()

  //obtener el ultimo cufd de DB
  var obj=""
  $.ajax({
    type:"POST",
    url:"controlador/facturaControlador.php?ctrUltimoCufd",
    data:obj,
    cache:false,
    dataType:"json",
    success:function(data){
      //fecha del ultimo cufd de mi DB
      let vigCufdActual=new Date (data["fecha_vigencia"])

      if(date.getTime()>vigCufdActual.getTime()  || data[0]
    ==null){
        $("#panelInfo").before("<span class='text-warning'>Cufd caducado!!!</span><br>")
        $("#panelInfo").before("<span>Registrando cufd... </span><br>")
        registrarNuevoCufd()
      }else{
        $("#panelInfo").before("<span class='text-success'>Cufd vigente, puede facturar </span><br>")

        // cufd=data["codigo_cufd"]
        // codControlCufd=data["codigo_control"]
        // fechaVigCufd=data["fecha_vigencia"]
      }
    }
  })

}
/*===============
Obtener leyenda
=================*/
function extraerLeyenda(){

  var obj=""

  $.ajax({
    type:"POST",
    url:"controlador/facturaControlador.php?ctrLeyenda",
    data:obj,
    cache:false,
    dataType:"json",
    success:function(data){
      leyenda=data["desc_leyenda"]
    }
  })
}
// emitir factura
function emitirFactura() {
  let date = new Date();
  let numFactura = parseInt(document.getElementById("numFactura").value);
  let fechaFactura = date.toISOString();
  let rsCliente = document.getElementById("rsCliente").value;
  let tpDocumento = parseInt(document.getElementById("tpDocumento").value);
  let nitCliente = document.getElementById("nitCliente").value;
  let metPago = parseInt(document.getElementById("metPago").value);
  let totApagar = parseFloat(document.getElementById("totApagar").value);
  let descAdicional = parseFloat(
    document.getElementById("descAdicional").value
  );
  let subTotal = parseFloat(document.getElementById("subTotal").value);
  let usuarioLogin = document.getElementById("usuarioLogin").innerHTML;

  let actEconomica = document.getElementById("actEconomica").value;
  let emailCliente = document.getElementById("emailCliente").value;

  var obj = {
    codigodAmbiente: 2,
    codigoDocumentoSector: 1,
    codigoEmision: 1,
    codigoModalidad: 2,
    codigoPuntoVenta: 0,
    codigoPuntoVentaSpecified: true,
    codigoSistema: codSistema,
    codigoSucursal: 0,
    cufd: cufd,
    cuis: cuis,
    nit: nitEmpresa,
    tipoFacturaDocumento: 1,
    archivo: null,
    fechaEnvio: fechaFactura,
    hashArchivo: "",
    codigoControl: codControlCufd,
    factura: {
      cabecera: {
        nitEmisor: nitEmpresa,
        razonSocialEmisor: rsEmpresa,
        municipio: "Santa Cruz",
        telefono: telEmpresa,
        numeroFactura: numFactura,
        cuf: "String",
        cufd: cufd,
        codigoSucursal: 0,
        direccion: dirEmpresa,
        codigoPuntoVenta: 0,
        fechaEmision: fechaFactura,
        nombreRazonSocial: rsCliente,
        codigoTipoDocumentoIdentidad: tpDocumento,
        numeroDocumento: nitCliente,
        complemento: "",
        codigoCliente: nitCliente,
        codigoMetodoPago: metPago,
        numeroTarjeta: null,
        montoTotal: subTotal,
        montoTotalSujetoIva: totApagar,
        montoGiftCard: 0,
        descuentoAdicional: descAdicional,
        codigoExepcion: "0",
        cafc: null,
        leyenda:leyenda,
        uduario: usuarioLogin,
        codigoDocumentoSector: 1,
      },
      detalle: arregloCarrito,
    },
  };
}
