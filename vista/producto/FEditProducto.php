<?php

require_once "../../controlador/productoControlador.php";
require_once "../../modelo/productoModelo.php";

$id = $_GET["id"];
$producto = ControladorProducto::ctrInfoProducto($id);

?>

<form class="form-horizontal" action="" id="FEditProducto">
  <div class="modal-header">
    <h4 class="modal-title">Actualizar Producto</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="card-body">
    <div class="form-group row">
      <label for="id_producto" class="col-sm-3 col-form-label">ID Producto:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" name="id" id="id" value="<?php echo $producto["id_producto"]; ?>" readonly>
      </div>
    </div>
    <div class="form-group row">
      <label for="cod_producto" class="col-sm-3 col-form-label">Código Producto:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="cod_producto" name="cod_producto" value="<?php echo $producto["cod_producto"]; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="cod_producto_sin" class="col-sm-3 col-form-label">Código SIN:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="cod_producto_sin" name="cod_producto_sin" value="<?php echo $producto["cod_producto_sin"]; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="nombre_producto" class="col-sm-3 col-form-label">Nombre Producto:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" value="<?php echo $producto["nombre_producto"]; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="precio_producto" class="col-sm-3 col-form-label">Precio:</label>
      <div class="col-sm-9">
        <input type="number" class="form-control" id="precio_producto" name="precio_producto" value="<?php echo $producto["precio_producto"]; ?>" step="0.01">
      </div>
    </div>
    <div class="form-group row">
      <label for="unidad_medida" class="col-sm-3 col-form-label">Unidad Medida:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="unidad_medida" name="unidad_medida" value="<?php echo $producto["unidad_medida"]; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="unidad_medida_sin" class="col-sm-3 col-form-label">Unidad Medida SIN:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="unidad_medida_sin" name="unidad_medida_sin" value="<?php echo $producto["unidad_medida_sin"]; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="imagen_producto" class="col-sm-3 col-form-label">Imagen Producto:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="imagen_producto" name="imagen_producto" value="<?php echo $producto["imagen_producto"]; ?>">
      </div>
    </div>
    <div class="form-group">
     <label for="">Estado</label>
      <div class="row">
        <div class="col-sm-6">
          <div class="custom-control custom-radio">
            <input class="custom-control-input" type="radio" id="estadoActivo" name="disponible" <?php if($producto["disponible"]=="1"):?>checked<?php endif;?> value="1">
            <label for="estadoActivo" class="custom-control-label">Disponible</label>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="custom-control custom-radio">
            <input class="custom-control-input" type="radio" id="estadoInactivo" name="disponible" <?php if($producto["disponible"]=="0"):?>checked<?php endif;?> value="0">
            <label for="estadoInactivo" class="custom-control-label">Inactivo</label>
          </div>  
        </div>
      </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Guardar</button>
    <button type="button" class="btn btn-default float-right" data-dismiss="modal">Cancelar</button>
  </div>
  <!-- /.card-footer -->
</form>

<script>
$(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        editProducto();
      }
    });
    $('#FEditProducto').validate({
      rules: {
        cod_producto: {
          required: true,
          minlength: 3,
        },
        cod_producto_sin: {
          required: true,
          minlength: 3
        },
        nombre_producto: {
          required: true,
          minlength: 3
        },
        precio_producto: {
          required: true,
          number: true
        },
        unidad_medida: {
          required: true,
          minlength: 1
        },
        unidad_medida_sin: {
          required: true,
          minlength: 1
        },
        imagen_producto: {
          required: true,
          minlength: 3
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
