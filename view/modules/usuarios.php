<div class="content-wrapper">
    <!-- CABECERA DEL CONTENIDO-->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Administrar usuarios</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Usuarios</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

    <!-- Main content -->
  <section class="content">

      <!-- CONTENEDOR DE LA TABLA O CARTA DE CONTENIDO -->
    <div class="card">

        <!-- BOTON DE AGREGAR USUARIOS EN LA TABLA -->
      <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
          Agregar Usuario
      </button>

        <!-- CABECERA DE LA CARTA -->
        <!-- <div class="card-header">
          <h3 class="card-title">Title</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div> -->

        <!-- CUERPO DE LA CARTA -->
      <div class="card-body">
          <!-- CREACION DE TABLA PARA EL MANEJO DE USUARIOS O GESTIÓN DE USUARIOS -->
        <table class="table table-bordered table-striped table-responsive-lg tablas">
            <!-- CABECERA DE LA TABLA USUARIOS -->
          <thead>
            <tr>
              <th>#</th>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Foto</th>
              <th>Perfil</th>
              <th>Estado</th>
              <th>Último login</th>
              <th>Acciones</th>
            </tr>
          </thead>
            <!-- CUERPO DE LA TABLA USUARIOS -->
          <tbody>

            <?php
            
              $item = null;

              $valor = null;

              $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

              foreach ($usuarios as $key => $value){
                
                echo '<tr>
                        <td>1</td>
                        <td>'.$value["nombre"].'</td>
                        <td>'.$value["usuario"].'</td>';

                        if($value["foto"] != ""){
                          echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';
                        }else{
                          echo '<td><img src="view/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
                        }

                echo '<td>'.$value["perfil"].'</td>';
                        
                // VALIDAR EL ESTADO DEL PERFIL DE USUARIO
                if($value["estado"] != 0){

                  echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';
                
                }else{

                  echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';
                
                }
                
                echo '<td>'.$value["ultimo_login"].'</td>
                        <td>
                          <div class="btn-group">
                            
                            <!--EDITAR USUARIO-->
                            <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fas fa-pencil-alt"></i></button>
                            
                            <!--DESACTIVAR USUARIO-->
                            <button class="btn btn-danger"><i class="fas fa-times"></i></button>
                          </div>
                        </td>
                      </tr>';

              }
            
            ?>

              <!-- DATOS DE EJEMPLO DE USUARIOS -->
              <!-- <tr>
                <td>1</td>
                <td>Usuario Administrador</td>
                <td>admin</td>
                <td><img src="view/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>
                <td>Administrador</td>
                <td><button class="btn btn-success btn-xs">Activado</button></td>
                <td>2020-02-01 11:44:25</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger"><i class="fas fa-times"></i></button>
                  </div>
                </td>
              </tr> -->
              
          </tbody>
        </table>
      </div>

        <!-- FOOTER DE LA CARTA -->
        <!-- <div class="card-footer">
          Footer
        </div> -->

    </div>
      <!-- /.card -->

  </section>
    <!-- /.content -->
</div>

<!-- VENTANA MODAL AGREGAR USUARIO EN Bootstrap -->
<div class="modal fade" id="modalAgregarUsuario">
    
    <div class="modal-dialog">

      <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!-- CABECERA DEL MODAL -->

        <div class="modal-header" style="background:#007bff; color:white;">
          <h4 class="modal-title">Agregar Usuario</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <!-- CUERPO DEL MODAL -->
        
        <div class="modal-body">
          <div class="card-body">

            <!-- ENTRADA PAR EL NOMBRE DEL USUARIO -->
            <div class="form-group">
              <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-user"></i>
                </span>
              </div>
                <input type="text" class="form-control" name="nuevoNombre" placeholder="Ingresar nombre" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL USUARIO  -->
            <div class="form-group">
              <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-smile"></i>
                </span>
              </div>
                <input type="text" class="form-control" name="nuevoUsuario" placeholder="Ingresar usuario" required>
              </div>
            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA  -->
            <div class="form-group">
              <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-key"></i>
                </span>
              </div>
                <input type="password" class="form-control" name="nuevoPassword" placeholder="Ingresar contraseña" required>
              </div>
            </div>

            <!-- ENTRADA PARA EL PERFIL  -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-users"></i>
                  </span>
                </div>
                <select class="form-control" name="nuevoPerfil">
                  <option value="">Seleccionar perfil</option>
                  <option value="Administrador">Administrador</option>
                  <option value="Especial">Especial</option>
                  <option value="Vendedor">Vendedor</option>
                </select>
              </div>
            </div>

            <!-- select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" -->

            <!-- ENTRADA PARA SUBIR FOTO  -->
            <div class="form-group">
              <label for="nuevaFoto">Seleccionar foto</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="nuevaFoto">
                <label class="custom-file-label" for="nuevaFoto">Seleccionar archivo</label>
                <p class="help-block">Peso máximo de la foto 2 MB</p>
                <img src="view/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
              </div>
            </div>

          </div>
        </div>

        <!-- PIE DEL MODAL -->

        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar usuario</button>
        </div>

        <?php
        
          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrCrearUsuario();

        ?>

      </form>

      </div>
          <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
</div>

<!-- VENTANA MODAL EDITAR USUARIO CON JAVASCRIPT Y AJAX -->
<div class="modal fade" id="modalEditarUsuario">
    
  <div class="modal-dialog">

    <div class="modal-content">

    <form role="form" method="post" enctype="multipart/form-data">

      <!-- CABECERA DEL MODAL -->

      <div class="modal-header" style="background:#007bff; color:white;">
        <h4 class="modal-title">Editar Usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <!-- CUERPO DEL MODAL -->
      
      <div class="modal-body">
        <div class="card-body">

          <!-- ENTRADA PAR EL NOMBRE DEL USUARIO -->
          <div class="form-group">
            <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-user"></i>
              </span>
            </div>
              <input type="text" class="form-control" id="editarNombre" name="editarNombre" value="" required>
            </div>
          </div>

          <!-- ENTRADA PARA EL USUARIO  -->
          <div class="form-group">
            <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-smile"></i>
              </span>
            </div>
              <input type="text" class="form-control" id="editarUsuario" name="editarUsuario" value="" readonly>
            </div>
          </div>

          <!-- ENTRADA PARA LA CONTRASEÑA  -->
          <div class="form-group">
            <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="fas fa-key"></i>
              </span>
            </div>
              <input type="password" class="form-control" name="editarPassword" placeholder="Escriba la nueva contraseña">
              <input type="hidden" id="passwordActual" name="passwordActual">
            </div>
          </div>

          <!-- ENTRADA PARA EL PERFIL  -->
          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-users"></i>
                </span>
              </div>
              <select class="form-control" name="editarPerfil">
                <option value="" id="editarPerfil"></option>
                <option value="Administrador">Administrador</option>
                <option value="Especial">Especial</option>
                <option value="Vendedor">Vendedor</option>
              </select>
            </div>
          </div>

          <!-- select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" -->

          <!-- ENTRADA PARA SUBIR FOTO  -->
          <div class="form-group">
            <label for="editarFoto">Seleccionar foto</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="editarFoto">
              <label class="custom-file-label" for="editarFoto">Seleccionar archivo</label>
              <p class="help-block">Peso máximo de la foto 2 MB</p>
              <img src="view/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
              <input type="hidden" name="fotoActual" id="fotoActual">
            </div>
          </div>

        </div>
      </div>

      <!-- PIE DEL MODAL -->

      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Modificar usuario</button>
      </div>

      <?php
      
        $editarUsuario = new ControladorUsuarios();
        $editarUsuario -> ctrEditarUsuario();

      ?>

    </form>

    </div>
        <!-- /.modal-content -->
  </div>
      <!-- /.modal-dialog -->
</div>

