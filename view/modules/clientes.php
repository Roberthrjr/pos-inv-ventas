<?php

if($_SESSION["perfil"] == "Especial"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>
<div class="content-wrapper">
    <!-- CABECERA DEL CONTENIDO-->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar clientes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Clientes</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- CONTENEDOR DE LA TABLA O CARTA DE CONTENIDO -->
      <div class="card">

        <!-- BOTON DE AGREGAR CLIENTES EN LA TABLA -->
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCliente">
          Agregar Cliente
        </button>

        <!-- CUERPO DE LA CARTA -->
        <div class="card-body">
          <!-- CREACION DE TABLA PARA EL MANEJO DE CLIENTES O GESTIÓN DE CLIENTES -->
          <table class="table table-bordered table-striped table-responsive-lg tablas">
            <!-- CABECERA DE LA TABLA CLIENTES -->
            <thead>
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Documento</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Fecha nacimiento</th>
                <th>Total compras</th>
                <th>Última compra</th>
                <th>Ingreso al sistema</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <!-- CUERPO DE LA TABLA CLIENTES -->
            <tbody>
                <!-- DATOS DE CLIENTES -->
            <?php

              $item = null;
              $valor = null;

              $clientes = ControladorClientes::ctrMostrarClientes($item,$valor);

              foreach ($clientes as $key => $value){

                echo '<tr>
                        <td>'.($key+1).'</td>
                        <td>'.$value["nombre"].'</td>
                        <td>'.$value["documento"].'</td>
                        <td>'.$value["email"].'</td>
                        <td>'.$value["telefono"].'</td>
                        <td>'.$value["direccion"].'</td>
                        <td>'.$value["fecha_nacimiento"].'</td>
                        <td>'.$value["compras"].'</td>
                        <td>'.$value["ultima_compra"].'</td>
                        <td>'.$value["fecha"].'</td>
                        <td>
                          <div class="btn-group">';
                          if($_SESSION["perfil"] == "Administrador"){

                            echo  '<button class="btn btn-warning btnEditarCliente" data-toggle="modal" data-target="#modalEditarCliente" idCliente="'.$value["id"].'"><i class="fas fa-pencil-alt"></i></button>
                                  <button class="btn btn-danger btnEliminarCliente" idCliente="'.$value["id"].'"><i class="fas fa-times"></i></button>';
                                  
                          }
                          echo '</div>
                        </td>
                      </tr>';

              }
            ?>
              
            </tbody>
          </table>
        </div>

      </div>
      <!-- /.card -->

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
                <input type="text"  class="form-control" data-inputmask='"mask": "99999999"' data-mask name="nuevoDocumentoId" placeholder="Ingresar documento" required>
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

<!-- VENTANA MODAL EDITAR CLIENTE EN Bootstrap -->
<div class="modal fade" id="modalEditarCliente">
    
    <div class="modal-dialog">

      <div class="modal-content">

      <form role="form" method="post">

        <!-- CABECERA DEL MODAL -->

        <div class="modal-header" style="background:#007bff; color:white;">
          <h4 class="modal-title">Editar Cliente</h4>
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
                <input type="text" class="form-control" name="editarCliente" id="editarCliente" required>
                <input type="hidden" id="idCliente" name="idCliente">
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
                <input type="number" min="0" class="form-control" name="editarDocumentoId" id="editarDocumentoId" required>
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
                <input type="email" class="form-control" name="editarEmail" id="editarEmail" required>
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
                <input type="text" class="form-control" data-inputmask='"mask": "999-999-999"' data-mask name="editarTelefono" id="editarTelefono" required>
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
                <input type="text" class="form-control" name="editarDireccion" id="editarDireccion" required>
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
                <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask name="editarFechaNacimiento" id="editarFechaNacimiento" required>
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
        
          $editarCliente = new ControladorClientes();
          $editarCliente -> ctrEditarCliente();
        
        ?>

      </form>

      </div>
          <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
</div>

<?php

  $eliminarCliente = new ControladorClientes();
  $eliminarCliente -> ctrEliminarCliente();

?>