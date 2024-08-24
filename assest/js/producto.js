function MNuevoProducto(){
  $("#modal-default").modal("show")

  var obj=""
  $.ajax({
    type:"POST",
    url:"vista/producto/FNuevoProducto.php",
    data:obj,
    success:function(data){
      $("#content-default").html(data)
    }

  })


}

function regProducto(){

  var formData=new FormData($("#FRegProducto")[0])

  if(formData.get("password")==formData.get("vrPassword")){

    $.ajax({
      type:"POST",
      url:"controlador/productoControlador.php?ctrRegProducto",
      data:formData,
      cache:false,
      contentType:false,
      processData:false,
      success:function(data){

        if(data="ok"){

          Swal.fire({
            icon: 'success',
            showConfirmButton: false,
            title: 'El producto ha sido registrado',
            timer: 1000
          })
          setTimeout(function(){
            location.reload()
          },1200)

        }else{
          Swal.fire({
            title: "Error!",
            icon: "error",
            showConfirmButton: false,
            timer: 1000
          })
        }

      }

    })

  }


}

function MEditProducto(id){

  $("#modal-default").modal("show")

  var obj=""
  $.ajax({
    type:"POST",
    url:"vista/producto/FEditProducto.php?id="+id,
    data:obj,
    success:function(data){
      $("#content-default").html(data)
    }

  })
}

function editProducto(){

  var formData=new FormData($("#FEditProducto")[0])

    $.ajax({
      type:"POST",
      url:"controlador/productoControlador.php?ctrEditProducto",
      data:formData,
      cache:false,
      contentType:false,
      processData:false,
      success:function(data){

        if(data="ok"){

          Swal.fire({
            icon: 'success',
            showConfirmButton: false,
            title: 'Producto actualizado',
            timer: 1000
          })
          setTimeout(function(){
            location.reload()
          },1200)

        }else{
          Swal.fire({
            title: "Error!",
            icon: "error",
            showConfirmButton: false,
            timer: 1000
          })
        }

      }

    })

  }

function MEliProducto(id){
  var obj={
    id:id
  }

  Swal.fire({
    title:"Estas seguro de eliminar este producto?",
    showDenyButton:true,
    showCancelButton:false,
    confirmButtonText:'Confirmar',
    denyButtonText:'Cancelar'
  }).then((result)=>{
    if(result.isConfirmed){
      $.ajax({
        type:"POST",
        url:"controlador/productoControlador.php?ctrEliProducto",
        data:obj,
        success:function(data){

          if(data=="ok"){
            location.reload()
          }else{
            Swal.fire({
              icon: 'error',
              showConfirmButton: false,
              title: 'Error',
              text:'El producto no puede ser eliminado',
              timer: 1000
            })
          }
        }
      })
    }
  })
}