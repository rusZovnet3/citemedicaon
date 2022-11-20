<div class="content-wrapper">



    <section class="content">

      <div class="box">

        <?php

          $inicio = new InicioC();
          $inicio->MostrarInicioC();

          if ($_SESSION["rol"] == "Administrador") {
            echo '<div class="box-footer">
                    <a href="inicio-editar">
                      <button class="btn btn-success btn-lg">Editar</button>
                    </a>
                  </div>';
          }

         ?>

      </div>

    </section>

  </div>