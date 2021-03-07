<div class="content-wrapper">
    <!-- CABECERA DEL CONTENIDO-->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Administrar ventas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Ventas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- CONTENEDOR DE LA TABLA O CARTA DE CONTENIDO -->
      <div class="card">

        <!-- CABECERA DE LA CARTA -->
        <div class="card-header">
          <!-- BOTON DE AGREGAR CLIENTES EN LA TABLA -->
          <a href="crear-venta">
            <button class="btn btn-primary">
              Agregar venta
            </button>
          </a>
        </div>

        <!-- CUERPO DE LA CARTA -->
        <div class="card-body">
          <!-- CREACION DE TABLA PARA EL MANEJO DE CLIENTES O GESTIÓN DE CLIENTES -->
          <table class="table table-bordered table-striped table-responsive-lg tablas">
            <!-- CABECERA DE LA TABLA CLIENTES -->
            <thead>
              <tr>
                <th>#</th>
                <th>Código factura</th>
                <th>Cliente</th>
                <th>Vendedor</th>
                <th>Forma de pago</th>
                <th>Neto</th>
                <th>Total</th>
                <th>Fecha</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <!-- CUERPO DE LA TABLA CLIENTES -->
            <tbody>
              <!-- DATOS DE EJEMPLO DE USUARIOS -->
              <tr>
                <td>1</td>
                <td>12521</td>
                <td>Roberth</td>
                <td>Admin</td>
                <td>Efectivo</td>
                <td>$ 1000</td>
                <td>$ 1020</td>
                <td>2020-12-12 00:00:00</td>
                <td>
                  <div class="btn-group">
                    <button class="btn btn-info"><i class="fa fa-print"></i></button>
                    <button class="btn btn-warning btnEditarVenta"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger btnEliminarVenta"><i class="fas fa-times"></i></button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>