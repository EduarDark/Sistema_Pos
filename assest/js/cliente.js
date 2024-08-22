function MNuevoCliente() {
  $("#modal-c").modal("show");

  var obj = "";
  $.ajax({
    type: "POST",
    url: "vista/cliente/FNuevoCliente.php",
    data: obj,
    success: function (data) {
      $("#content-c").html(data);
    },
  });
}
function regCliente() {
  var formData = new FormData($("#FRegCliente")[0]);
  $.ajax({
    type: "POST",
    url: "controlador/clienteControlador.php?ctrRegCliente",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {
      if ((data = "ok")) {
        Swal.fire({
          icon: "success",
          title: "Registro Exitoso :)",
          showConfirmButton: false,
          timer: 1000,
        });

        setTimeout(function () {
          location.reload();
        }, 1200);
      } else {
        Swal.fire({
          title: "Error :(",
          icon: "error",
          showConfirmButton: false,
          timer: 1000,
        });
      }
    },
  });
}

function MEditCliente(id) {
  $("#modal-c").modal("show");
  var obj = "";
  $.ajax({
    type: "POST",
    url: "vista/cliente/FEditCliente.php?id=" + id,
    data: obj,
    success: function (data) {
      $("#content-c").html(data);
    },
  });
}

function editCliente() {
  var formData = new FormData($("#FEditCliente")[0]);
    $.ajax({
      type: "POST",
      url: "controlador/clienteControlador.php?ctrEditCliente",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        if ((data = "ok")) {
          Swal.fire({
            icon: "success",
            showConfirmButton: false,
            title: "Cliente Actualizado :)",
            timer: 1000,
          });

          setTimeout(function () {
            location.reload();
          }, 1200);
        } else {
          Swal.fire({
            title: "Error :)",
            icon: "error",
            showConfirmButton: false,
            timer: 1000,
          });
        }
      },
    });
  }

function MEliCliente(id) {
  var obj = {
    id: id,
  };

  Swal.fire({
    title: "¿Estás seguro de eliminar este cliente?",
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: "Confirmar",
    denyButtonText: "Cancelar",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "controlador/clienteControlador.php?ctrEliCliente",
        data: obj,
        success: function (data) {
          if (data == "ok") {
            location.reload();
          } else {
            Swal.fire({
              icon: "error",
              showConfirmButton: false,
              title: "Error",
              text: "El cliente no pudo ser eliminado",
              timer: 1000,
            });
          }},    });
    }});
}
