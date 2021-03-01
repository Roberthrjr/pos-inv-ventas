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

        <!-- BOTON DE AGREGAR USUARIOS EN LA TABLA -->
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCategoria">
          Agregar Categoría
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
                <th>Categoría</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <!-- CUERPO DE LA TABLA USUARIOS -->
            <tbody>
              <!-- DATOS DE EJEMPLO DE USUARIOS -->
              <tr>
                <td>1</td>
                <td>Equipos Electromecanicos</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger"><i class="fas fa-times"></i></button>
                  </div>
                </td>
              </tr>
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

      </form>

      </div>
          <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
</div>