function MNuevoCliente(){
    $("#modal-default").modal("show")

    var obj=""
    $.ajax({
        type:"POST",
        url:"vista/Cliente/FNuevoCliente.php",
        data:obj,
        success:function(data){
            $("#content-default").html(data)
        }
    })

}

function RegCliente(){
    var formData=new FormData($("#FRegCliente")[0])
    $.ajax({
        type:"POST",
        url:"controlador/clienteControlador.php?ctrRegCliente",
        data:formData,
        cache: false,
        contentType:false,
        processData:false,
        success:function(data){
          
       if(data="ok"){
                Swal.fire({
                    title: "El cliente ha sido registrado",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1000
                  })
                setTimeout(function(){
                    location.reload()
                },1200)
            }else{
                Swal.fire({
                    title: "Error:",
                    icon: "error",
                    showConfirmButton: false,
                    timer: 1000
                  })
            }
        }
    })
} 

function MEditCliente(id){
    $("#modal-default").modal("show")

    var obj=""
    $.ajax({
        type:"POST",
        url:"vista/cliente/FEditCliente.php?id="+id,
        data:obj,
        success:function(data){
            $("#content-default").html(data)
        }
    })
}

function editCliente(){
    var formData=new FormData($("#FEditCliente")[0])
    if (formData.get("password")== formData.get("vrPassword")) {
        $.ajax({
            type:"POST",
            url:"controlador/clienteControlador.php?ctrEditCliente",
            data:formData,
            cache: false,
            contentType:false,
            processData:false,
            success:function(data){
                if(data="ok"){
                    Swal.fire({
                        title: "El cliente ha sido modificado",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1000
                      })
                    setTimeout(function(){
                        location.reload()
                    },1200)
                }else{
                    Swal.fire({
                        title: "Error:",
                        icon: "error",
                        showConfirmButton: false,
                        timer: 1000
                      })
                }
            }
        })
    } 
}

function MEliCliente(id){
    var obj={
        id:id
    }

    swal.fire({
        title:"Estas seguro de eliminar este Cliente?",
        showDenyButton:true,
        showCanselButton:false,
        confirmButtonText:'Confirmar',
        denyButtonText:'Cancelar'
    }).then((result)=>{
        if(result.isConfirmed){
           $.ajax({
            type:"POST",
            url:"controlador/clienteControlador.php?ctrEliCliente",
            data:obj,
            success:function(data){
             
                if(data=="ok"){
                    location.reload()
                }else{
                    Swal.fire({
                        icon: "error",
                        showConfirmButton: false,
                        title: "Error",
                        text:'El Cliente no puede ser eliminado',
                        timer: 1000
                      })
                }
            }
           }) 
        }
    })
}

 