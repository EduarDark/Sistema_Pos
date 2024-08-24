<form class="form-horizontal" action="" id="FRegProducto">
  <div class="modal-header">
    <h4 class="modal-title">Registro Nuevo Producto</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="card-body">
    <div class="form-group row">
      <label for="cod_producto" class="col-sm-3 col-form-label">Código Producto:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="cod_producto" name="cod_producto" placeholder="Código del producto">
      </div>
    </div>
    <div class="form-group row">
      <label for="cod_producto_sin" class="col-sm-3 col-form-label">Código SIN:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="cod_producto_sin" name="cod_producto_sin" placeholder="Código SIN">
      </div>
    </div>
    <div class="form-group row">
      <label for="nombre_producto" class="col-sm-3 col-form-label">Nombre Producto:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" placeholder="Nombre del producto">
      </div>
    </div>
    <div class="form-group row">
      <label for="precio_producto" class="col-sm-3 col-form-label">Precio:</label>
      <div class="col-sm-9">
        <input type="number" class="form-control" id="precio_producto" name="precio_producto" placeholder="Precio" step="0.01">
      </div>
    </div>
    <div class="form-group row">
      <label for="unidad_medida" class="col-sm-3 col-form-label">Unidad de Medida:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="unidad_medida" name="unidad_medida" placeholder="Unidad de medida">
      </div>
    </div>
    <div class="form-group row">
      <label for="unidad_medida_sin" class="col-sm-3 col-form-label">Unidad Medida SIN:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="unidad_medida_sin" name="unidad_medida_sin" placeholder="Unidad Medida SIN">
      </div>
    </div>
    <div class="form-group row">
      <label for="imagen_producto" class="col-sm-3 col-form-label">Imagen Producto:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="imagen_producto" name="imagen_producto" placeholder="URL de la imagen del producto">
      </div>
    </div>
    <div class="form-group row">
      <label for="disponible" class="col-sm-3 col-form-label">Disponible:</label>
      <div class="col-sm-9">
        <input type="checkbox" id="disponible" name="disponible"> Disponible
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
  // Envia los datos del formulario al controlador

  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        regProducto();
      }
    });
    $('#FRegProducto').validate({
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
