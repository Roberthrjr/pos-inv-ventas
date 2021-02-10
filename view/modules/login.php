<body class="hold-transition sidebar-collapse sidebar-mini login-page">
<div id="back"></div>
<div class="login-box">
  <!-- LOGO DEL SISTEMA -->
  <div class="login-logo">
    <a href="login"><b>La Gran Familia </b>R&S</a>
  </div>
  <!-- /.login-logo -->
  <!-- CARTA DE INICIO DE SESIÓN -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Ingresar al sistema</p>

      <form method="post">
        <!-- ENTRADA DE TEXTO PARA USUARIO -->
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <!-- ENTRADA DE TEXTO PARA PASSWORD -->
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <!-- CONTENEDOR DE BOTONES -->
        <div class="row">
          <!-- BOTON DE INGRESAR -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
          </div>
        </div>

        <?php

          $login = new ControladorUsuarios();
          $login -> ctrIngresoUsuario();
          
        ?>

      </form>
    </div>
    <!-- CARTA DE INICIO DE SESION-->
  </div>
</div>
</body>