<div class="content-wrapper">
    <!-- CABECERA DEL CONTENIDO-->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tablero</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Tablero</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <?php
        if($_SESSION["perfil"] == "Especial" || $_SESSION["perfil"] == "Vendedor" || $_SESSION["perfil"] == "Administrador"){
          echo '<div class="card bg-success">
                  <div class="card-header">
                    <h3 class="card-title">BIENVENIDA</h3>
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
                    <h1>
                      Bienvenid@ '.$_SESSION["nombre"].'
                    </h1>
                  </div>
                </div>';
        }
      ?>
    </section>
    <!-- /.content -->
  </div>