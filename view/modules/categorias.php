<div class="content-wrapper">
    <!-- CABECERA DEL CONTENIDO-->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar categorías</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Categorías</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- CONTENEDOR DE LA TABLA O CARTA DE CONTENIDO -->
      <div class="card">

        <!-- BOTON DE AGREGAR CATEGORIA EN LA TABLA -->
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
          Agregar Categoría
        </button>

        <!-- CUERPO DE LA CARTA -->
        <div class="card-body">
          <!-- CREACION DE TABLA PARA EL MANEJO DE CATEGORIAS O GESTIÓN DE CATEGORIAS -->
          <table class="table table-bordered table-striped table-responsive-lg tablas">
            <!-- CABECERA DE LA TABLA CATEGORIAS -->
            <thead>
              <tr>
                <th>#</th>
                <th>Categoría</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <!-- CUERPO DE LA TABLA CATEGORIAS -->
            <tbody>
            <?php

              $item=null;
              $valor=null;

              $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);

              foreach ($categorias as $key => $value){

                echo '<tr>
                        <td>'.$value["id"].'</td>
                        <td>'.$value["categoria"].'</td>
                        <td>
                          <div class="btn-group">
                            <button class="btn btn-warning btnEditarCategoria" idCategoria="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCategoria"><i class="fas fa-pencil-alt"></i></button>
                            <button class="btn btn-danger btnEliminarCategoria" idCategoria="'.$value["id"].'"><i class="fas fa-times"></i></button>
                          </div>
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

  <!-- VENTANA MODAL AGREGAR CATEGORIA EN Bootstrap -->
  <div class="modal fade" id="modalAgregarCategoria">
    
    <div class="modal-dialog">

      <div class="modal-content">

      <form role="form" method="post">

        <!-- CABECERA DEL MODAL -->

        <div class="modal-header" style="background:#007bff; color:white;">
          <h4 class="modal-title">Agregar Categoría</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <!-- CUERPO DEL MODAL -->
        
        <div class="modal-body">
          <div class="card-body">

            <!-- ENTRADA PAR EL NOMBRE DE CATEGORIA -->
            <div class="form-group">
              <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-th"></i>
                </span>
              </div>
                <input type="text" class="form-control" name="nuevaCategoria" placeholder="Ingresar categoría" required>
              </div>
            </div>

          </div>
        </div>

        <!-- PIE DEL MODAL -->

        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar categoría</button>
        </div>

        <?php 
          $crearCategoria = new ControladorCategorias();
          $crearCategoria -> ctrCrearCategoria();
        ?>

      </form>

      </div>
          <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
</div>

  <!-- VENTANA MODAL EDITAR CATEGORIA EN Bootstrap -->
  <div class="modal fade" id="modalEditarCategoria">
    
    <div class="modal-dialog">

      <div class="modal-content">

      <form role="form" method="post">

        <!-- CABECERA DEL MODAL -->

        <div class="modal-header" style="background:#007bff; color:white;">
          <h4 class="modal-title">Editar Categoría</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <!-- CUERPO DEL MODAL -->
        
        <div class="modal-body">
          <div class="card-body">

            <!-- ENTRADA PAR EL NOMBRE DE CATEGORIA -->
            <div class="form-group">
              <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-th"></i>
                </span>
              </div>
                <input type="text" class="form-control" name="editarCategoria" id="editarCategoria" required>
                <input type="hidden" name="idCategoria" id="idCategoria" required>
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
          $crearCategoria = new ControladorCategorias();
          $crearCategoria -> ctrEditarCategoria();
        ?>

      </form>

      </div>
          <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
</div>

<?php
  $borrarCategoria = new ControladorCategorias();
  $borrarCategoria -> ctrBorrarCategoria();
?>