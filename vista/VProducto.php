<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de productos registrados</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Código Producto</th>
                <th>Código SIN</th>
                <th>Nombre Producto</th>
                <th>Precio</th>
                <th>Unidad Medida</th>
                <th>Unidad Medida SIN</th>
                <th>Imagen</th>
                <th>Disponible</th>
                <td>
                  <button class="btn btn-primary" style="width: 100%;" onclick="MNuevoProducto()">Nuevo</button>
                </td>
              </tr>
            </thead>

            <tbody>
              <?php
              $producto = controladorProducto::ctrInfoProductos();
              foreach ($producto as $value) {
              ?>

                <tr>
                  <!-- Atributos de la tabla producto -->
                  <td> <?php echo $value["id_producto"]; ?> </td>
                  <td> <?php echo $value["cod_producto"]; ?> </td>
                  <td> <?php echo $value["cod_producto_sin"]; ?> </td>
                  <td> <?php echo $value["nombre_producto"]; ?> </td>
                  <td> <?php echo $value["precio_producto"]; ?> </td>
                  <td> <?php echo $value["unidad_medida"]; ?> </td>
                  <td> <?php echo $value["unidad_medida_sin"]; ?> </td>
                  <td>
                    <img src="<?php echo $value["imagen_producto"]; ?>" alt="Imagen del Producto" style="width: 50px; height: 50px;">
                  </td>
                  <td> <?php echo $value["disponible"] ? 'Sí' : 'No'; ?> </td>

                  <td>
                    <div class="btn-group">
                      <button class="btn-secondary" onclick="MEditProducto(<?php echo $value["id_producto"]; ?>)">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="btn-danger" onclick="MEliProducto(<?php echo $value["id_producto"]; ?>)">
                        <i class="fas fa-trash"></i>
                      </button>
                    </div>
                  </td>
                </tr>

              <?php
              }
              ?>
            </tbody>

          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<!-- /.content-wrapper -->
