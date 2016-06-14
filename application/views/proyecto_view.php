  <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tablero Proyecto | SCRUMVE</title>
    <link href="<?php echo base_url('libs/css/materialize.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('libs/css/iconos.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('libs/css/sprint.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('libs/css/w3.css'); ?>" rel="stylesheet" />
    <style media="screen">
    .nav-wrapper .brand-logo img {
      height: 64px;
    }
    </style>
  </head>
  <body>
    <ul id="dropdown1" class="dropdown-content">

      <li><a href="#!"></a></li>
      <li class="divider"></li>
      <li><a href="home/logout">Cerrar Sesion</a></li>
    </ul>
    <nav>
      <div class="nav-wrapper">
        <!--<a href="#!" class="brand-logo">SCRUMVE</a>-->

        <ul class="left hide-on-med-and-down">
          <li><a class="waves-effect waves-light btn" href="<?php echo base_url();?>index.php/home">proyectos</a></li>
          <li><a class="waves-effect waves-light btn" href="<?php echo base_url();?>index.php/Personal">Personal</a></li>
        </ul>
        <a href="#" class="brand-logo center"><img src="<?php echo base_url('libs/images/logo.jpeg'); ?>" alt="" /></a>
        <ul class="right hide-on-med-and-down">

          <!-- Dropdown Trigger -->
          <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons left">supervisor_account</i><?php echo $data['username']; ?><i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
      </div>
    </nav>
    <div class="container">

      <div class="row">
        <div class="col s6">
          <h5 class="center-align"><?php echo $proyecto['nombre']; ?></h5>
        </div>
        <div class="col s6">
          <h5><?php echo $this->session->flashdata('message'); ?></h5>

        </div>
      </div>
    </div>
    <div class="card-panel hoverable blue lighten-3">
    <?php
      if(isset($data['msj'])){
        /*echo "<div class='card'>";
          echo "<h3>".$data['msj']."</h3>";
        echo "</div>";*/
      }else{

        for ($i=0; $i < count($sprints); $i++) {
          # code...
          echo "<div class='card'>";
              echo "<div class='card-image'>";
                echo "<div class='chip'>".$sprints[$i]['numero'];
                  echo "<i class='material-icons'>close</i>";
                echo "</div>";
              echo "</div>";
              echo "<div class='card-content'>";
                echo "<p>".$sprints[$i]['descripcion']."</p>";
                echo "<br>";
                echo "<p><strong>Avance</strong></p>";
                echo "<div class='w3-progress-container'>";
                  echo "<div id='myBar' class='w3-progressbar w3-green' style='width:".$sprints[$i]['avanze']."%'>";
                    echo "<div class='w3-center w3-text-white'>".$sprints[$i]['avanze']."%</div>";
                  echo "</div>";
                echo "</div>";
                /*echo "<p class='range-field'>";
                  echo "<input type='range' id='test5' min='0' max='100' value='".$sprints[$i]['avanze']."' disabled />";
                echo "</p>";*/
                echo "<br>";
                echo "<p><strong>Fecha Inicial:</strong></p>";
                echo "<p>".$sprints[$i]['fecha_inicial']."</p>";
                echo "<p><strong>Fecha Final:</strong></p>";
                echo "<p>".$sprints[$i]['fecha_final']."</p>";

              echo "</div>";
              echo "<div class='card-action'>";
                /*echo form_open('Sprint/index');

                echo "<input type='hidden' name='id' value='".$sprints[$i]['id']."'>";
                echo "<button class='btn waves-effect waves-light' type='submit' name='action'>";
                  echo "Ver Tablero<!--<i class='material-icons right'>send</i>-->";
                echo "</button>";
                echo "</form>";*/
                echo "<a href='../../Sprint/index/".$sprints[$i]['id']."/".$proyecto['id']."'>Entrar</a>";
                echo "<br>";
                echo "<br>";



                /*echo form_open('Sprint/update');
                echo "<input type='hidden' name='id' value='".$sprints[$i]['id']."'>";
                echo "<button class='btn waves-effect blue darken-1' type='submit' name='action'>";
                  echo "<i class='material-icons right'>mode_edit</i>";
                echo "</button>";
                echo "</form>";*/
                echo "<a href='../../Sprint/update/".$sprints[$i]['id']."' class='btn waves-effect blue darken-1'><i class='material-icons right'>mode_edit</i></a>";
                echo "<br>";
                echo "<br>";

                /*echo "<a href='../../Sprint/delete/".$sprints[$i]['id']."' class='btn waves-effect red darken-1 eliminarSprint'><i class='material-icons right'>delete</i></a>";*/

                echo "<button class='btn waves-effect red darken-1 eliminarSprint' type='button' id='".$sprints[$i]['id']."'>";
                  echo "<i class='material-icons right'>delete</i>";
                echo "</button>";

              echo "</div>";
          echo "</div>";
        }
      }
     ?>
     <div class="card">
       <div class="card-action">

          <?php echo form_open('Sprint/create'); ?>
          <input type="submit" name="btn" value="Nuevo sprint" class="waves-effect waves-light btn">

          <input type="hidden" name="id"  value="<?php echo $proyecto['id']; ?>" id="proyectoActual "/>

          </form>

       </div>

     </div>
     </div>


     <!-- panel
      <div class="card-panel hoverable blue lighten-3">
        <div class="card">
            <div class="card-image">
              <div class="chip">
                Sprint 1
                <i class="material-icons">close</i>
              </div>
            </div>
            <div class="card-content">
              <p>En este sprint se terminara todo lo de la base de datos</p>
              <br>
              <p><strong>Avance</strong></p>
              <p class="range-field">
                <input type="range" id="test5" min="0" max="100" />
              </p>
              <p><strong>Fecha Inicial:</strong></p>
              <p>2016-04-01</p>
              <p><strong>Fecha Final:</strong></p>
              <p>2016-04-15</p>

            </div>
            <div class="card-action">
              <a href="#">Entrar</a>
              <a href="#"><i class='material-icons right'>mode_edit</i></a>
            </div>
        </div>
        <div class="card">
          <div class="card-action">

            <a href="<?php echo base_url();?>index.php/Sprint/create/<?php echo $proyecto['id']; ?>">Nuevo sprint<i class='material-icons left'>add</i></a>
          </div>

        </div>


      </div>-->




      <div id="modalEliminarSprint" class="modal">
        <div class="modal-content">
          <h4>Eliminar Sprint </h4>
          <input type="hidden" id="sprintEliminar"></input>
          <p>Tenga en cuenta que se eliminara todo lo relacionado a este Sprint</p>
        </div>
        <div class="modal-footer">
          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
          <a href="#!" id="btnAceptarEliminarSprint" class=" modal-action modal-close waves-effect waves-red btn-flat">Eliminar</a>
        </div>
      </div>










       <script type="text/javascript" src="<?php echo base_url('libs/js/jquery-2.1.4.min.js'); ?>"></script>
       <script type="text/javascript" src="<?php echo base_url('libs/js/materialize.min.js'); ?>"></script>
       <script type="text/javascript" src="<?php echo base_url('libs/js/script.js'); ?>"></script>
       <script type="text/javascript" src="<?php echo base_url('libs/js/main.js'); ?>"></script>
  </body>
</html>
