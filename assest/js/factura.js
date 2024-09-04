// variables globales
var host = "http://localhost:5000/";

function verificarComunicacion() {
  var obj = ""

  $.ajax({
    type: "POST",
    url: host + "api/CompraVenta/comunicacion",
    data: obj,
    cache: false,
    contentType: "application/json",
    processData: false,
    success: function (data) {
      if (data["transaccion"] == true) {
        document.getElementById("comunSiat").innerHTML = "Conectado"
        document.getElementById("comunSiat").className = "badge badge-success"
      }
    }
  }).fail(function (jqXHR, textStatus, errorThrown) {
    if (jqXHR.status == 0) {
      document.getElementById("comunSiat").innerHTML = "Desconectado"
      document.getElementById("comunSiat").className = "badge badge-danger"
    }
  })
}
setInterval(verificarComunicacion, 3000)

function busCliente() {
  let nitCliente = document.getElementById("nitCliente").value

  var obj = {
    nitCliente: nitCliente
  }

  $.ajax({
    type: "POST",
    url: "controlador/clienteControlador.php?ctrBusCliente",
    data: obj,
    dataType: "json",
    success: function (data) {

      if (data["email_cliente"] == "") {
        document.getElementById("emailCliente").value = "null"
      } else {
        document.getElementById("emailCliente").value = data["email_cliente"]
      }
      document.getElementById("rsCliente").value = data["razon_social_cliente"]
      numFactura()
    }
  })
}


// generar numero de factura
function numFactura() {
  let obj = ""
  $.ajax({
    type: "POST",
    url: "controlador/facturaControlador.php?ctrNumFactura",
    data: obj,
    success: function (data) {
      document.getElementById("numFactura").value = data
    }
  })
}