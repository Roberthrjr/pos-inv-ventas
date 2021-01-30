<!-- CONTENEDOR DE BARRA LATERAL -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- LOGOTIPO EN LA BARRA LATERAL -->
    <a href="inicio" class="brand-link">
        <img src="view/dist/img/AdminLTELogo.png" alt="LOGO" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- BARRA LATERAL -->
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- USUARIOS -->
          <li class="nav-item">
            <a href="usuarios" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
                <p>
                  Usuarios
                </p>
            </a>
          </li>
          <!-- CATEGORIAS -->
          <li class="nav-item">
            <a href="categorias" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
                <p>
                  Categorías
                </p>
            </a>
          </li>
          <!-- PRODUCTOS -->
          <li class="nav-item">
            <a href="productos" class="nav-link">
              <i class="nav-icon fab fa-product-hunt"></i>
                <p>
                  Productos
                </p>
            </a>
          </li>
          <!-- CLIENTES -->
          <li class="nav-item">
            <a href="clientes" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
                <p>
                  Clientes
                </p>
            </a>
          </li>
          <!-- VENTAS -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list-ul"></i>
              <p>
                Ventas
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admin-venta" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Administrar ventas
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="crear-venta" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Crear venta
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="report-venta" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Reporte de ventas
                  </p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
</aside>