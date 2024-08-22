<!-- razon_social nit_ci direccion nombre telefono email -->

<form class="form-horizontal" action="" id="FRegCliente">
  <div class="modal-header">
    <h4 class="modal-title">Registro Nuevo Cliente</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="card-body">
    <div class="form-group row">
      <label for="razon_social" class="col-sm-3 col-form-label">Razon Social :</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="razon_social" name="razon_social" placeholder="Razon social">
      </div>
    </div>
    <div class="form-group row">
      <label for="nit_ci" class="col-sm-3 col-form-label">Nit/CI :</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nit_ci" name="nit_ci" placeholder="Nit / CI">
      </div>
    </div>
    <div class="form-group row">
      <label for="direccion" class="col-sm-3 col-form-label">Direccion :</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="direccion">
      </div>
    </div>
    <div class="form-group row">
      <label for="nombre" class="col-sm-3 col-form-label">Nombre :</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
      </div>
    </div>
    <div class="form-group row">
      <label for="telefono" class="col-sm-3 col-form-label">Telefono :</label>
      <div class="col-sm-9">
        <!-- pattern="[0-9]{7,8}"  -->
        <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Telefono" style="appearance: none;">
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-sm-3 col-form-label">Email :</label>
      <div class="col-sm-9">
        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
      </div>
    </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <button type="submit" class="btn btn-primary">Guardar</button>
    <button type="submit" class="btn btn-default float-right">Cancel</button>
  </div>
  <!-- /.card-footer -->
</form>
<script>
  // envia los datos del formulario al controlador

  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        regCliente()
      }
    });
    $('#FRegCliente').validate({
      rules: {

        razon_social: {
          required: true,
          minlength: 3,
        },
        nit_ci: {
          required: true,
          minlength: 3
        },
        direccion: {
          required: true,
          minlength: 3
        },
        nombre: {
          required: true,
          minlength: 3
        },
        telefono: {
          required: true,
          minlength: 6,
          //que sea solo numeros, no  caracteres
          digits: true

        },
        email: {
          required: true,
          minlength: 3
        },
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