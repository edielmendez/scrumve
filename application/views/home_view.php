<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>HOME</title>
    <link href="<?php echo base_url('libs/css/materialize.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('libs/css/iconos.css'); ?>" rel="stylesheet" />


  </head>
  <body>
    <ul id="dropdown1" class="dropdown-content">

      <li><a href="#!"></a></li>
      <li class="divider"></li>
      <li><a href="home/logout">Cerrar Sesion</a></li>
    </ul>
    <nav>
      <div class="nav-wrapper">
        <a href="#!" class="brand-logo">SCRUMVE</a>

        <ul class="right hide-on-med-and-down">

          <!-- Dropdown Trigger -->
          <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons left">supervisor_account</i><?php echo $data['username']; ?><i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
      </div>
    </nav>
    <?php //print_r($proyectos); ?>
    <div class="container">
      <div class="row">
        <div class="col s6">
          <h3>Mis proyectos</h3>
        </div>
        <div class="col s6">
          <?php echo $this->session->flashdata('message'); ?>
        </div>
      </div>


      <?php
      $aux = FALSE;
      for ($i=0; $i < count($proyectos); $i++) {
        # code...
        if($i==0){
          echo "<div class='row' >";
        }

        echo "<div class='col s4'>";
          echo "<div class='card'>";
            echo "<div class='card-content'>";
              echo "<span class='card-title activator grey-text text-darken-4'>".$proyectos[$i]['nombre']."<i class='material-icons right'>more_vert</i></span>";
              echo "<p><a href='Project/index/".$proyectos[$i]['id']."'>Entrar</a></p>";

            echo "</div>";
            echo "<div class='card-action'>";
              echo "<a href='Project/update/".$proyectos[$i]['id']."'><i class='material-icons left'>mode_edit</i></a>";
              echo "<a href='#' id=".$proyectos[$i]['id']." class='eliminarProyecto'><i class='material-icons left'>delete</i></a>";
              echo "<!--<a href='Project/lanzar/".$proyectos[$i]['id']."'>Lanzar<i class='material-icons'></i></a>-->";
            echo "</div>";
            echo "<div class='card-reveal'>";
              echo "<span class='card-title grey-text text-darken-4'>Descripcion<i class='material-icons right'>close</i></span>";
              echo "<p>".$proyectos[$i]['descripcion']."</p>";
            echo "</div>";
          echo "</div>";
        echo "</div>";


        if(($i+1)%3==0){
          echo "</div>";
          echo "<div class='row' >";
          $aux = TRUE;
        }else{
          $aux = FALSE;
        }




        if($i==(count($proyectos)-1)){
          echo "<div class='col s4'>";
          echo "<a class='waves-effect waves-light btn' href='Project/create'><i class='material-icons right'>queue</i>Nuevo Proyecto</a>";
          echo "</div>";
        }














      }

      if(!$aux){
        echo "</div>";
      }
       ?>

      <!--
      <div class="row">

        <div class="col s3">
          <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator" src="images/office.jpg">
            </div>
            <div class="card-content">
              <span class="card-title activator grey-text text-darken-4">Tablas Colaborativas<i class="material-icons right">more_vert</i></span>
              <p><a href="#">Entrar</a></p>
            </div>
            <div class="card-reveal">
              <span class="card-title grey-text text-darken-4">Descripción<i class="material-icons right">close</i></span>
              <p>Es un proyecto para realizar tablas colaborativas con nodejs </p>
            </div>
          </div>
        </div>
      </div>
    </div>-->

    <!--Modales-->


  <!-- Modal Structure -->
    <div id="modalEliminarProyecto" class="modal">
      <div class="modal-content">
        <h4>Eliminar Proyecto </h4>
        <input type="hidden" id="idProyectoEliminar"> </input>
        <p>Tenga en cuenta que se eliminara todo lo relacionado a este Proyecto</p>
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
        <a href="#!" id="btnAceptarEliminarProyecto" class=" modal-action modal-close waves-effect waves-red btn-flat">Eliminar</a>
      </div>
    </div>







       <script type="text/javascript" src="<?php echo base_url('libs/js/jquery-2.1.4.min.js'); ?>"></script>
       <script type="text/javascript" src="<?php echo base_url('libs/js/materialize.min.js'); ?>"></script>
       <script type="text/javascript" src="<?php echo base_url('libs/js/script.js'); ?>"></script>
  </body>
</html>
