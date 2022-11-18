<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Clinica Médica</b></a>
  </div>

  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Ingresar como Administrador</p>

    <form method="post" autocomplete="off">

      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="usuario-Ing" placeholder="Usuario">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="clave-Ing" placeholder="Contraseña">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">

        <div class="col-xs-4 pull-left">
          <a href="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline">
            <button type="button" class="btn btn-info btn-block btn-flat">Volver</button>
          </a>
        </div>

        <div class="col-xs-4 pull-right">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div>

      </div>

      <?php

        $ingreso = new AdministradorC();
        $ingreso->IngresarAdministradorC();

       ?>


    </form>

  </div>
  <!-- /.login-box-body -->

</div>