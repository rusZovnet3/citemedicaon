<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php

              if ($_SESSION["foto"] == "") {
                    echo '<img src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/Vistas/img/defecto.png" class="user-image">';
                  } else {
                    echo '<img src="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/'. $_SESSION["foto"] .'" class="user-image">';
                  }

           ?>

        </div>
        <div class="pull-left info">
          <p>
            <?php

                $ext = explode(" ", $_SESSION["nombre"]);
                echo strtoupper($ext[0]);

              ?>

          </p>
          <a href="#"><i class="fa fa-circle text-success"></i> En Línea</a>
        </div>
      </div>

      <ul class="sidebar-menu">
        <li>
          <a href="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/inicio">
            <i class="fa fa-home"></i>
            <span>Inicio</span>
          </a>
        </li>

        <li>
          <a href="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/doctores">
            <i class="fa fa-user-md"></i>
            <span>Doctores</span>
          </a>
        </li>

        <li>
          <a href="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/secretarias">
            <i class="fa fa-female"></i>
            <span>Secretarias</span>
          </a>
        </li>

        <li>
          <a href="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/consultorios">
            <i class="fa fa-medkit"></i>
            <span>Consultorios</span>
          </a>
        </li>

        <li>
          <a href="http://localhost:8080/Proyecto/SitioWeb/SitioWeb/websiteCitasMedicaOnline/pacientes">
            <i class="fa fa-users"></i>
            <span>Pacientes</span>
          </a>
        </li>
      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>