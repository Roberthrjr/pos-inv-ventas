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

          <!-- Date and time range -->
          <button type="button" class="btn btn-default float-right" id="daterange-btn">
            <i class="far fa-calendar"></i> Rango de fecha
            <i class="fas fa-caret-down"></i>
          </button>

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
              <?php

                $item = null;
                $valor = null;

                $respuesta = ControladorVentas::ctrMostrarVentas($item, $valor);

                foreach ($respuesta as $key => $value) {
        
                  echo '<tr>
                
                        <td>'.($key+1).'</td>
                
                        <td>'.$value["codigo"].'</td>';
                
                        $itemCliente = "id";
                        $valorCliente = $value["id_cliente"];
                
                        $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);
                
                        echo '<td>'.$respuestaCliente["nombre"].'</td>';
                
                        $itemUsuario = "id";
                        $valorUsuario = $value["id_vendedor"];
                
                        $respuestaUsuario = ControladorUsuarios::ctrMostrarUsuarios($itemUsuario, $valorUsuario);
                
                        echo '<td>'.$respuestaUsuario["nombre"].'</td>
                        <td>'.$value["metodo_pago"].'</td>
                        <td>S/ '.number_format($value["neto"],2).'</td>
                        <td>S/ '.number_format($value["total"],2).'</td>
                        <td>'.$value["fecha"].'</td>               
                        <td>                
                          <div class="btn-group">

                            <button class="btn btn-info btnImprimirFactura" codigoVenta="'.$value["codigo"].'"><i class="fas fa-print"></i></button>
                
                            <button class="btn btn-warning btnEditarVenta" idVenta="'.$value["id"].'"><i class="fas fa-pencil-alt"></i></button>
                
                            <button class="btn btn-danger btnEliminarVenta" idVenta="'.$value["id"].'"><i class="fas fa-times"></i></button>
                
                          </div>                 
                        </td>                
                      </tr>';
                  }       
              ?>
            </tbody>
          </table>
          <?php
            
            $eliminarVenta = new ControladorVentas();
            $eliminarVenta -> ctrEliminarVenta();
                            
          ?>
        </div>

      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>