<div class="content-wrapper">

    <!-- CABECERA DEL CONTENIDO-->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar productos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Productos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- CONTENEDOR DE LA TABLA O CARTA DE CONTENIDO -->
      <div class="card">

        <!-- BOTON DE AGREGAR PRODUCTO EN LA TABLA -->
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProducto">
          Agregar Producto
        </button>

        <!-- CUERPO DE LA CARTA -->
        <div class="card-body">
          <!-- CREACION DE TABLA PARA EL MANEJO DE PRODUCTO O GESTIÓN DE PRODUCTO -->
          <table class="table table-bordered table-striped table-responsive-lg tablaProductos">
            <!-- CABECERA DE LA TABLA PRODUCTO -->
            <thead>
              <tr>
                <th>#</th>
                <th>Imagen</th>
                <th>Código</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Stock</th>
                <th>Precio de compra</th>
                <th>Precio de ventas</th>
                <th>Agregado</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <!-- CUERPO DE LA TABLA PRODUCTO -->
            <!-- <tbody>
              <?php
                $item = null;
                $valor = null;

                $productos = ControladorProductos::ctrMostrarProductos($item,$valor);
                
                foreach ($productos as $key => $value){
                  echo '<tr>
                          <td>'.$value["id"].'</td>
                          <td><img src="view/img/productos/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                          <td>'.$value["codigo"].'</td>
                          <td>'.$value["descripcion"].'</td>';
                          
                          $item = "id";
                          $valor = $value["id_categoria"];

                          $categoria = ControladorCategorias::ctrMostrarCategorias($item,$valor);

                          echo '<td>'.$categoria["categoria"].'</td>
                          <td>'.$value["stock"].'</td>
                          <td>S/ '.$value["precio_compra"].'</td>
                          <td>S/ '.$value["precio_venta"].'</td>
                          <td>'.$value["fecha"].'</td>
                          <td>
                            <div class="btn-group">
                              <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                              <button class="btn btn-danger"><i class="fas fa-times"></i></button>
                            </div>
                          </td>
                        </tr>';
                }
              ?>
            </tbody> -->
          </table>
        </div>

      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>

  <!-- VENTANA MODAL AGREGAR PRODUCTO  -->
  <div class="modal fade" id="modalAgregarProducto">
    
    <div class="modal-dialog">

      <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!-- CABECERA DEL MODAL -->

        <div class="modal-header" style="background:#007bff; color:white;">
          <h4 class="modal-title">Agregar Producto</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <!-- CUERPO DEL MODAL -->
        
        <div class="modal-body">
          <div class="card-body">

            <!-- ENTRADA PARA SELECCIONAR LA CATEGORIA DEL PRODUCTO  -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-th"></i>
                  </span>
                </div>
                <select class="form-control" id="nuevaCategoria" name="nuevaCategoria" required>
                  <option value="">Seleccionar categoria</option>

                  <?php
                  
                  $item = null;
                  $valor = null;

                  $categorias = ControladorCategorias::ctrMostrarCategorias($item,$valor);

                  foreach ($categorias as $key => $value){

                    echo '<option value="'.$value["id"].'">'.$value["categoria"].'</option>';

                  }
                  
                  ?>
                </select>
              </div>
            </div>

            <!-- ENTRADA PAR EL CODIGO DEL PRODUCTO -->
            <div class="form-group">
              <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-barcode"></i>
                </span>
              </div>
                <input type="text" class="form-control" id="nuevoCodigo" name="nuevoCodigo" placeholder="Ingresar código" readonly required>
              </div>
            </div>

            <!-- ENTRADA PARA LA DESCRIPCION DEL PRODUCTO  -->
            <div class="form-group">
              <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-align-left"></i>
                </span>
              </div>
                <input type="text" class="form-control" name="nuevaDescripcion" placeholder="Ingresar descripción" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL STOCK DEL PRODUCTO  -->
            <div class="form-group">
              <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-check"></i>
                </span>
              </div>
                <input type="number" class="form-control" name="nuevoStock" min="0" placeholder="Ingresar stock" required>
              </div>
            </div>

            <div class="row">
              <!-- ENTRADA PARA EL PRECIO COMPRA DEL PRODUCTO  -->
              <div class="form-group col-md-6">
                <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-arrow-up"></i>
                  </span>
                </div>
                  <input type="number" class="form-control" id="nuevoPrecioCompra" name="nuevoPrecioCompra" min="0" step="any" placeholder="Precio de compra" required>
                </div>
              </div>

              <!-- ENTRADA PARA EL PRECIO VENTA DEL PRODUCTO  -->
              <div class="form-group col-md-6">
                <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-arrow-down"></i>
                  </span>
                </div>
                  <input type="number" class="form-control" id="nuevoPrecioVenta" name="nuevoPrecioVenta" min="0" step="any" placeholder="Precio de venta" required>
                </div>

                <br>

                <div class="form-group clearfix">
                  <div class="icheck-primary d-inline">
                    <input type="checkbox" id="porcentaje" class="porcentaje" checked>
                    <label for="porcentaje">
                      Porcentaje
                    </label>
                  </div>
                </div>

                <div class="input-group col-xs-5">
                  <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>
                  <span class="input-group-text">
                    <i class="fas fa-percent"></i>
                  </span>
                </div>

              </div>
            </div>

            <!-- ENTRADA PARA SUBIR IMAGEN DEL PRODUCTO  -->
            <div class="form-group">
              <label for="nuevaImagen">IMAGEN PRODUCTO</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input nuevaImagen" name="nuevaImagen">
                <label class="custom-file-label" for="nuevaImagen">Seleccionar imagen</label>
                <p class="help-block">Peso máximo de la foto 2 MB</p>
                <img src="view/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
              </div>
            </div>

          </div>
        </div>

        <!-- PIE DEL MODAL -->

        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar producto</button>
        </div>
      <?php

          $crearProducto = new ControladorProductos();
          $crearProducto -> ctrCrearProducto();

      ?>  

      </form>
      
      </div>
          <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
  </div>

  <!-- VENTANA MODAL EDITAR PRODUCTO  -->
  <div class="modal fade" id="modalEditarProducto">
    
    <div class="modal-dialog">

      <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!-- CABECERA DEL MODAL -->

        <div class="modal-header" style="background:#007bff; color:white;">
          <h4 class="modal-title">Editar Producto</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <!-- CUERPO DEL MODAL -->
        
        <div class="modal-body">
          <div class="card-body">

            <!-- ENTRADA PARA SELECCIONAR LA CATEGORIA DEL PRODUCTO  -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-th"></i>
                  </span>
                </div>
                <select class="form-control" name="editarCategoria" readonly required>
                  <option id="editarCategoria"></option>
                </select>
              </div>
            </div>

            <!-- ENTRADA PAR EL CODIGO DEL PRODUCTO -->
            <div class="form-group">
              <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-barcode"></i>
                </span>
              </div>
                <input type="text" class="form-control" id="editarCodigo" name="editarCodigo" readonly required>
              </div>
            </div>

            <!-- ENTRADA PARA LA DESCRIPCION DEL PRODUCTO  -->
            <div class="form-group">
              <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-align-left"></i>
                </span>
              </div>
                <input type="text" class="form-control" id="editarDescripcion" name="editarDescripcion" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL STOCK DEL PRODUCTO  -->
            <div class="form-group">
              <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-check"></i>
                </span>
              </div>
                <input type="number" class="form-control" id="editarStock" name="editarStock" min="0" required>
              </div>
            </div>

            <div class="row">
              <!-- ENTRADA PARA EL PRECIO COMPRA DEL PRODUCTO  -->
              <div class="form-group col-md-6">
                <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-arrow-up"></i>
                  </span>
                </div>
                  <input type="number" class="form-control" id="editarPrecioCompra" name="editarPrecioCompra" min="0" step="any" required>
                </div>
              </div>

              <!-- ENTRADA PARA EL PRECIO VENTA DEL PRODUCTO  -->
              <div class="form-group col-md-6">
                <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-arrow-down"></i>
                  </span>
                </div>
                  <input type="number" class="form-control" id="editarPrecioVenta" name="editarPrecioVenta" min="0" readonly required>
                </div>

                <br>

                <div class="form-group clearfix">
                  <div class="icheck-primary d-inline">
                    <input type="checkbox" id="editPorcentaje" class="editPorcentaje" checked>
                    <label for="editPorcentaje">
                      Porcentaje
                    </label>
                  </div>
                </div>

                <div class="input-group col-xs-5">
                  <input type="number" class="form-control input-lg nuevoPorcentaje" min="0" value="40" required>
                  <span class="input-group-text">
                    <i class="fas fa-percent"></i>
                  </span>
                </div>

              </div>
            </div>

            <!-- ENTRADA PARA SUBIR IMAGEN DEL PRODUCTO  -->
            <div class="form-group">
              <label for="editarImagen">SUBIR IMAGEN</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input nuevaImagen" name="editarImagen">
                <label class="custom-file-label" for="editarImagen">Seleccionar imagen</label>
                <p class="help-block">Peso máximo de la foto 2 MB</p>
                <img src="view/img/productos/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
                <input type="hidden" name="imagenActual" id="imagenActual">
              </div>
            </div>

          </div>
        </div>

        <!-- PIE DEL MODAL -->

        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>

        <?php

          $editarProducto = new ControladorProductos();
          $editarProducto -> ctrEditarProducto();

        ?>   

      </form>
      
      </div>
          <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
  </div>

  <?php

  $eliminarProducto = new ControladorProductos();
  $eliminarProducto -> ctrEliminarProducto();

  ?>      
