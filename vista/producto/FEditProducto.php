<?php
require_once "../../controlador/productoControlador.php";
require_once "../../modelo/productoModelo.php";

$id = $_GET["id"];
$producto = ControladorProducto::ctrInfoProducto($id);

?>
<form action="" id="FEditProducto" enctype="multipart/form-data">
  <div class="modal-header bg-secondary">
    <h4 class="modal-title">Editar producto</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="codProducto">Cod. Producto</label>
          <input type="text" class="form-control" name="codProducto" id="codProducto" value="<?php echo $producto["cod_producto"]; ?>" readonly>
          <input type="hidden" name="idProducto" value="<?php echo $producto["id_producto"]; ?>">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="codProductoSIN">Cod. Producto SIN</label>
          <input type="text" class="form-control" name="codProductoSIN" id="codProductoSIN" value="<?php echo $producto["cod_producto_sin"]; ?>">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="desProducto">Descripcion</label>
          <input type="text" class="form-control" name="desProducto" id="desProducto" value="<?php echo $producto["nombre_producto"]; ?>">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="preProducto">Precio</label>
          <input type="text" class="form-control" name="preProducto" id="preProducto" value="<?php echo $producto["precio_producto"]; ?>">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="unidadMedidad">Unidad de medida</label>
          <input type="text" class="form-control" name="unidadMedidad" id="unidadMedidad" value="<?php echo $producto["unidad_medida"]; ?>">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="unidadMedidadSIN">Unidad de medida SIN</label>
          <input type="text" class="form-control" name="unidadMedidadSIN" id="unidadMedidadSIN" value="<?php echo $producto["unidad_medida_sin"]; ?>">
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label for="imgProducto">Imagen <span class="text-muted">(Peso máximo 10MB - JPG, PNG)</span></label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="imgProducto" name="imgProducto" onchange="previsualizar()">
              <input type="hidden" name="imgActual" value="<?php echo $producto["imagen_producto"]; ?>">
              <label class="custom-file-label" for="imgProducto">Elegir archivo</label>
            </div>
            <div class="input-group-append">
              <span class="input-group-text">Subir</span>
            </div>
          </div>

          <div class="form-group">
            <label for="">Estado</label>
            <div class="row">
              <div class="col-sm-6">
                <div class="custom-control custom-radio">
                  <input type="radio" id="estadoActivo" name="estado" value="1"<?php if($producto["disponible"]=="1"):?>checked<?php endif;?>>
                  <label for="estadoActivo">Disponible</label>
                </div>
              </div>

              <div class="col-sm-6">
                <div class="custom-control custom-radio">
                  <input type="radio" id="estadoInactivo" name="estado" value="0"<?php if($producto["disponible"]=="0"):?>checked<?php endif;?>>
                  <label for="estadoInactivo">No disponible</label>
                </div>
              </div>

            </div>
          </div>


        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group" style="text-align:center">
          <?php
          if ($producto["imagen_producto"] == "") {
          ?>
            <img src="assest/dist/img/product_default.png" alt="" width="150" class="img-thumbnail previsualizar">
          <?php
          } else {
          ?>
            <img src="assest/dist/img/productos/<?php echo $producto["imagen_producto"]; ?>" alt="" width="150" class="img-thumbnail previsualizar">
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </div>

  <!-- /.card-footer -->
</form>


<script>
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        editProducto()
      }
    });
    $('#FEditProducto').validate({
      rules: {
        codProducto: {
          required: true,
          minlength: 3,
        },
        codProductoSIN: {
          required: true,
          minlength: 3,
        },
        desProducto: {
          required: true,
          minlength: 3,
        },
        preProducto: {
          required: true,
          minlength: 1,
        },
        unidadMedidad: {
          required: true,
          minlength: 1,
        },
        unidadMedidadSIN: {
          required: true,
          minlength: 1,
        },
        imgProducto: {
          required: true,
          minlength: 1,
        }
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>