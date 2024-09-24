<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">

        <!-- encabezado-->
        <div class="card">
            <div class="card-header">
                <div class="card-title">Encabezado</div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="form-group row col-md-9">
                        <div class="form-group col-md-3">
                            <label for="numFactura">#Factura</label>
                            <input type="number" class="form-control" name="numFactura" id="numFactura" readonly>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="actEconomica">Actividad económica</label>
                            <select name="actEconomica" id="actEconomica" class="form-control">
                                <option value="106140">Servicios de comercio</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="tpDocumento">Tipo de documento</label>
                            <select name="tpDocumento" id="tpDocumento" class="form-control">
                                <option value="1">Ninguno</option>
                                <option value="2">Cédula de identidad</option>
                                <option value="5">NIT</option>
                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="nitCliente">NIT/CI</label>
                            <div class="input-group">
                                <input type="text" class="form-control" list="listaClientes" name="nitCliente" id="nitCliente">
                               <input type="hidden" id="idCliente" name="idCliente">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" onclick="busCliente()">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>

                            <datalist id="listaClientes">
                                <?php
                                $cliente = ControladorCliente::ctrInfoClientes();
                                foreach ($cliente as $value) {
                                ?>
                                    <option value="<?php echo $value["nit_ci_cliente"]; ?>">
                                        <?php echo $value["razon_social_cliente"]; ?>
                                    </option>
                                <?php
                                }
                                ?>
                            </datalist>

                        </div>

                        <div class="form-group col-md-6">
                            <label for="emailCliente">E-mail</label>
                            <input type="email" class="form-control" name="emailCliente" id="emailCliente">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="rsCliente">Razón social</label>
                            <input type="text" class="form-control" name="rsCliente" id="rsCliente">
                        </div>

                    </div>

                    <div class="form-group row col-md-3">
                        <div class="card">
                            <div class="input-group sm-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Subtotal</span>
                                </div>
                                <input type="text" class="form-control" name="subTotal" id="subTotal" value="0.00" readonly>
                            </div>

                            <div class="input-group sm-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Descuento</span>
                                </div>
                                <input type="text" class="form-control" name="descAdicional" id="descAdicional" value="0.00" 
                                onkeyup="calcularTotal()">
                            </div>

                            <div class="input-group sm-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Total</span>
                                </div>
                                <input type="text" class="form-control" name="totApagar" id="totApagar" value="0.00" readonly>
                            </div>

                            <div class="card-footer">
                                <label for="metPago">Método de pago</label>
                                <div class="input-group">
                                    <select name="metPago" id="metPago" class="form-control">
                                        <option value="1">Efectivo</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            
            <!-- panel de avisos-->
             <div class="callout callout-info direct-chat-messanges" style="height:100px; width;290px">
                <span class="list-unstyled" id="panelInfo"></span>
             </div>
            <div class="card-footer">
                <button class="btn btn-success" onclick="emitirFactura()">Guardar</button>
            </div>
        </div>

        <!-- carrito -->

        <div class="card">
            <div class="card-header">
                <div class="card-title">Agregar producto</div>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>

                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-2">
                        <label for="codProducto">Cod. Producto</label>
                        <div class="input-group form-group">
                            <input type="text" class="form-control" name="codProducto" id="codProducto" list="listaProductos">
                            <input type="hidden" id="codProductoSin" name="codProductoSin">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" onclick="busProducto()">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>

                        <datalist id="listaProductos">
                            <?php
                            $producto = ControladorProducto::ctrInfoProductos();
                            foreach ($producto as $value) {
                            ?>
                                <option value="<?php echo $value["cod_producto"]; ?>">
                                    <?php echo $value["nombre_producto"]; ?>
                                </option>
                            <?php
                            }
                            ?>
                        </datalist>

                    </div>

                    <div class="form-group col-md-4">
                        <label for="conceptoPro">Concepto</label>
                        <div class="input-group form-group">
                            <input type="text" class="form-control" name="conceptoPro" id="conceptoPro" readonly>
                        </div>
                    </div>

                    <div class="form-group col-md-1">
                        <label for="cantProducto">Cantidad</label>
                        <div class="input-group form-group">
                            <input type="text" class="form-control" name="cantProducto" id="cantProducto" value="0" onkeyup="calcularPreProd()">
                        </div>
                    </div>

                    <div class="form-group col-md-1">
                        <label for="uniMedida">U. Medida</label>
                        <div class="input-group form-group">
                            <input type="text" class="form-control" name="uniMedida" id="uniMedida" readonly>
                            <input type="hidden" id="uniMedidaSin" name="uniMedidaSin">
                        </div>
                    </div>

                    <div class="form-group col-md-1">
                        <label for="preUnitario">P. Unit</label>
                        <div class="input-group form-group">
                            <input type="text" class="form-control" name="preUnitario" id="preUnitario" readonly>
                        </div>
                    </div>

                    <div class="form-group col-md-1">
                        <label for="descProducto">Descuento</label>
                        <div class="input-group form-group">
                            <input type="text" class="form-control" name="descProducto" id="descProducto" value="0.00" onkeyup="calcularPreProd()">
                        </div>
                    </div>

                    <div class="form-group col-md-1">
                        <label for="preTotal">P. Total</label>
                        <div class="input-group form-group">
                            <input type="text" class="form-control" name="preTotal" id="preTotal" readonly value="0.00">
                        </div>
                    </div>

                    <div class="form-group col-md-1">
                        <label for="">&nbsp;</label>
                        <div class="input-group form-group">
                            <button class="btn btn-info btn-circle form-control" onclick="agregarCarrito()">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- <div class="card-body p-0">
                <table class="table table-striped" id="tbProductos">
                    <thead>
                        <tr>
                            <th>Cod. Producto</th>
                            <th>Concepto</th>
                            <th>Cantidad</th>
                            <th>U. Medida</th>
                            <th>P. Unit</th>
                            <th>Descuento</th>
                            <th>P. Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div> -->
            <div class="card-footer">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Descripcion</th>
                            <th>Cantidad</th>
                            <th>P. Unitario</th>
                            <th>Descuento</th>
                            <th>P. Total</th>
                            <td>&nbsp;</td>
                        </tr>
                    </thead>
                    <tbody id="listaDetalle"></tbody>
                </table>
            </div>
        </div>

    </div>
</div>
<script>
    setTimeout(() => {
        verificarVigenciaCufd()
    }, 4000);

    setTimeout(() => {
        extraerLeyenda()
    }, 5000);
</script>
