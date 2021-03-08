<div class="content-wrapper">
    <!-- CABECERA DEL CONTENIDO-->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear venta</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Crear venta</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        
          <!--=====================================
          EL FORMULARIO
          ======================================-->
          <div class="col-lg-5 col-xs-12">
            <div class="card card-success">
              <div class="card-header"></div>
              <form role="form" method="post" class="formularioVenta">
                <div class="card-body">

                <?php

                    $item = "id";
                    $valor = $_GET["idVenta"];

                    $venta = ControladorVentas::ctrMostrarVentas($item, $valor);

                    $itemUsuario = "id";
                    $valorUsuario = $venta["id_vendedor"];

                    $vendedor = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);

                    $itemCliente = "id";
                    $valorCliente = $venta["id_cliente"];

                    $cliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

                    $porcentajeImpuesto = $venta["impuesto"] * 100 / $venta["neto"];
                
                ?>

                  <!-- ENTRADA DEL VENDEDOR -->
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-user"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control" id="nuevoVendedor" value="<?php echo $vendedor["nombre"]; ?>" readonly>
                      <input type="hidden" name="idVendedor" value="<?php echo $vendedor["id"]; ?>">
                    </div>
                  </div>

                  <!-- ENTRADA DEL CODIGO -->
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-key"></i>
                        </span>
                      </div>
                    <input type="text" class="form-control" id="nuevaVenta" name="editarVenta" value="<?php echo $venta["codigo"]; ?>" readonly>
                    </div>
                  </div>

                  <!-- ENTRADA PARA EL CLIENTE  -->
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-users"></i>
                        </span>
                      </div>
                      <select class="form-control" id="seleccionarCliente" name="seleccionarCliente" required>
                        <option value="<?php echo $cliente["id"]; ?>"><?php echo $cliente["nombre"]; ?></option>
                        <?php

                          $item = null;
                          $valor = null;

                          $categorias = ControladorClientes::ctrMostrarClientes($item, $valor);

                          foreach ($categorias as $key => $value) {

                            echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';

                          }

                        ?>
                      </select>
                      <span class="input-group-append">
                        <button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#modalAgregarCliente" data-dismiss="modal">
                          Agregar cliente
                        </button>
                      </span>
                    </div>
                  </div>
                  
                  <!-- ENTRADA PARA AGREGAR PRODUCTO -->
                  <div class="form-group row nuevoProducto">

                  <?php

                    $listaProducto = json_decode($venta["productos"], true);

                    foreach($listaProducto as $key => $value){
                        
                        $item = "id";
                        $valor = $value["id"];

                        $respuesta = ControladorProductos::ctrMostrarProductos($item, $valor);

                        $stockAntiguo = $respuesta["stock"] + $value["cantidad"];

                        echo '
                            <div class="row" style="padding:5px 15px">

                                <div class="col-md-6">                      
                                    <div class="input-group">                        
                                        <div class="input-group-prepend">                          
                                            <button type="button" class="btn btn-danger quitarProducto" idProducto="'.$value["id"].'"><i class="fas fa-times"></i></button>        
                                        </div>        
                                        <input type="text" class="form-control nuevaDescripcionProducto" idProducto="'.$value["id"].'" name="agregarProducto" value="'.$value["descripcion"].'" readonly required>
                                    </div>
                                </div>
        
                                <div class="col-md-3">            
                                    <div class="input-group">                
                                        <input type="number" class="form-control nuevaCantidadProducto" name="nuevaCantidadProducto" min="1" value="'.$value["cantidad"].'" stock="'.$stockAntiguo.'" nuevoStock="'.$value["stock"].'" required>        
                                    </div>        
                                </div>
        
                                <div class="col-md-3 ingresoPrecio">        
                                    <div class="input-group">                            
                                        <div class="input-group-prepend">        
                                            <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                                        </div>        
                                        <input type="text" class="form-control nuevoPrecioProducto" precioReal="'.$respuesta["precio_venta"].'" name="nuevoPrecioProducto" value="'.$value["total"].'" readonly required>
                                    </div>
                                </div>
                            </div>';
                    }
                  
                  ?>

                  </div>
  
                  <input type="hidden" id="listaProductos" name="listaProductos">

                  <!--=====================================
                  BOTÓN PARA AGREGAR PRODUCTO EN DISPOSITIVOS
                  ======================================-->
                  <button type="button" class="btn btn-default d-xl-none btnAgregarProducto">Agregar producto</button>

                  <hr>
                  <!--=====================================
                  ENTRADA IMPUESTOS Y TOTAL
                  ======================================-->
                  <div class="row">

                    <div class="col-md-8">
                      <table class="table">
                    
                        <thead>
                          <tr>
                            <th>Impuesto</th>
                            <th>Total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <!-- IMPUESTO -->
                            <td style="width:50%">
                              <div class="input-group">

                                <input type="number" class="form-control input-lg" min="0" id="nuevoImpuestoVenta" name="nuevoImpuestoVenta" value="<?php echo $porcentajeImpuesto; ?>" required>

                                <input type="hidden" name="nuevoPrecioImpuesto" id="nuevoPrecioImpuesto" value="<?php echo $venta["impuesto"]; ?>" required>
  
                                <input type="hidden" name="nuevoPrecioNeto" id="nuevoPrecioNeto" value="<?php echo $venta["neto"]; ?>" required>
                                
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="fas fa-percent"></i>
                                  </span>
                                </div>

                              </div>
                            </td>

                            <!-- TOTAL -->
                            <td style="width:50%">
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">
                                    <i class="fas fa-dollar-sign"></i>
                                  </span>
                                </div>                          
                                <input type="text" class="form-control input-lg" id="nuevoTotalVenta" name="nuevoTotalVenta" total="<?php echo $venta["neto"]; ?>" value="<?php echo $venta["total"]; ?>" readonly required>

                                <input type="hidden" name="totalVenta" value="<?php echo $venta["total"]; ?>" id="totalVenta">
                              </div>
                            </td>
                          </tr>
                        </tbody>
                      
                      </table>
                    </div>

                  </div>

                  <hr>
                  <!--=====================================
                  ENTRADA MÉTODO DE PAGO
                  ======================================-->
                  <div class="form-row">

                    <div class="col-md-10">
                      <div class="input-group">

                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="fas fa-hand-holding-usd"></i>
                          </span>
                        </div>
                        <select class="form-control" id="nuevoMetodoPago" name="nuevoMetodoPago" required>
                          <option value="">Seleccionar método de pago</option>
                          <option value="Efectivo">Efectivo</option>
                          <option value="TC">Tarjeta Crédito</option>
                          <option value="TD">Tarjeta Débito</option>
                        </select>

                      </div>
                    </div>

                    <div class="cajasMetodoPago"></div>
                    <input type="hidden" id="listaMetodoPago" name="listaMetodoPago">

                  </div>

                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-block">Guardar cambios</button>
                </div>

              </form>
              <?php

                $editarVenta = new ControladorVentas();
                $editarVenta -> ctrEditarVenta();

              ?>
            </div>
          </div>

          <!--=====================================
          LA TABLA DE PRODUCTOS
          ======================================-->
          <div class="col-lg-7 d-none d-xl-block">
            <div class="card card-danger">
              <div class="card-header"></div>
              <div class="card-body">
                <table class="table table-bordered table-striped table-responsive-lg tablaVentas">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Imagen</th>
                      <th>Código</th>
                      <th>Descripcion</th>
                      <th>Stock</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>

  <!-- VENTANA MODAL AGREGAR CLIENTE EN Bootstrap -->
<div class="modal fade" id="modalAgregarCliente">
    
  <div class="modal-dialog">

    <div class="modal-content">

    <form role="form" method="post">

      <!-- CABECERA DEL MODAL -->

      <div class="modal-header" style="background:#007bff; color:white;">
        <h4 class="modal-title">Agregar Cliente</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <!-- CUERPO DEL MODAL -->
      
      <div class="modal-body">
        <div class="card-body">

          <!-- ENTRADA PARA EL NOMBRE DEL CLIENTE -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-user"></i>
                </span>
              </div>
              <input type="text" class="form-control" name="nuevoCliente" placeholder="Ingresar nombre" required>
            </div>
          </div>

          <!-- ENTRADA PARA EL DOCUMENTO DEL CLIENTE -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-key"></i>
                </span>
              </div>
              <input type="number" min="0" class="form-control" name="nuevoDocumentoId" placeholder="Ingresar documento" required>
            </div>
          </div>

          <!-- ENTRADA PARA EL EMAIL DEL CLIENTE -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-envelope"></i>
                </span>
              </div>
              <input type="email" class="form-control" name="nuevoEmail" placeholder="Correo Electronico" required>
            </div>
          </div>

          <!-- ENTRADA PARA EL TELEFONO DEL CLIENTE -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-phone"></i>
                </span>
              </div>
              <input type="text" class="form-control" data-inputmask='"mask": "999-999-999"' data-mask name="nuevoTelefono" placeholder="Ingresar telefono" required>
            </div>
          </div>

          <!-- ENTRADA PARA DIRECCION DEL CLIENTE -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-map-marker"></i>
                </span>
              </div>
              <input type="text" class="form-control" name="nuevaDireccion" placeholder="Ingresar dirección" required>
            </div>
          </div>

          <!-- ENTRADA PARA LA FECHA DE NACIMIENTO DEL CLIENTE -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-calendar"></i>
                </span>
              </div>
              <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask name="nuevaFechaNacimiento" placeholder="Ingresar fecha nacimiento" required>
            </div>
          </div>

        </div>
      </div>

      <!-- PIE DEL MODAL -->

      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar cliente</button>
      </div>

      <?php
      
        $crearCliente = new ControladorClientes();
        $crearCliente -> ctrCrearCliente();
      
      ?>

    </form>

    </div>
        <!-- /.modal-content -->
  </div>
      <!-- /.modal-dialog -->
</div>