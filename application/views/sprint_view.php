<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Tablero Sprint | SCRUMVE</title>
    <link href="<?php echo base_url('libs/css/materialize.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('libs/css/iconos.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('libs/css/jquery-ui.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('libs/css/drag.css'); ?>" rel="stylesheet" />
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
          <li><a class="waves-effect waves-light btn" href="<?php echo base_url();?>index.php/Project/index/<?php echo $data['id_parent'] ?>">sprints</a></li>
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
          <h3><?php echo $this->session->flashdata('message'); ?></h3>
        </div>
      </div>
    </div>
    
    <div class="card-panel hoverable blue lighten-5 tablero">
      <?php //print_r($actividades); ?>
      <!--SprintBacklog-->
      

      <div class="column sprint-backlog" id="">
        <h5 class="title_column">ACTIVIDADES</h5>
        <?php
        if(!isset($data['msj'])){

        
        for ($i=0; $i <count($actividades); $i++) {
          # code...
          if(strcmp($actividades[$i]['estado'],"")==0 ){
            echo "<div class='portlet'>";
              echo "<div class='portlet-header' id='".$actividades[$i]['id']."'>".$actividades[$i]['nombre']."</div>";
              echo "<div class='portlet-content'>".$actividades[$i]['descripcion']."</div>";
              echo "<a href='#' class='verResponsable' id='".$actividades[$i]['id_responsable']."-".$actividades[$i]['id']."'><i class='material-icons left'>perm_identity</i></a>";
              echo "<a href='#' class='editarActividad' id='".$actividades[$i]['id']."'><i class='material-icons left'>edit</i></a>";
              echo "<a href='#' class='eliminarActividad' id='".$actividades[$i]['id']."'><i class='material-icons left'>delete</i></a>";
            echo "</div>";
          }


        }
      }
        ?>
        <!--<div class="portlet">
          <div class="portlet-header">Crear clase conexión</div>
          <div class="portlet-content">se debe crear la clase conexión en PHP.</div>
          <div class="w3-progress-container">
          <div id="myBar" class="w3-progressbar w3-green" style="width:100%">
            <div class="w3-center w3-text-white">50%</div>
          </div>
          </div>
          <BR>
          <a href="#"><i class='material-icons left'>perm_identity</i></a>
          </div>
        </div>

        <div class="portlet">
          <div class="portlet-header">CRUD Usuarios</div>
          <div class="portlet-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</div>
        </div>-->




      </div>
      <!---->


      <div class="column" id="pendiente">
        <h5 class="title_column">PENDIENTE</h5>
        <?php
        if(!isset($data['msj'])){
        for ($i=0; $i <count($actividades); $i++) {
          # code...
          if(strcmp($actividades[$i]['estado'],"pendiente")==0 ){
            echo "<div class='portlet'>";
              echo "<div class='portlet-header' id='".$actividades[$i]['id']."'>".$actividades[$i]['nombre']."</div>";
              echo "<div class='portlet-content'>".$actividades[$i]['descripcion']."</div>";
              echo "<a href='#' class='verResponsable' id='".$actividades[$i]['id_responsable']."-".$actividades[$i]['id']."'><i class='material-icons left'>perm_identity</i></a>";
              echo "<a href='#' class='editarActividad' id='".$actividades[$i]['id']."'><i class='material-icons left'>edit</i></a>";
              echo "<a href='#' class='eliminarActividad' id='".$actividades[$i]['id']."'><i class='material-icons left'>delete</i></a>";
            echo "</div>";
          }


        }
      }
        ?>
        <!--<div class="portlet">
          <div class="portlet-header">Crear clase conexión</div>
          <div class="portlet-content">se debe crear la clase conexión en PHP.</div>
          <div class="w3-progress-container">
          <div id="myBar" class="w3-progressbar w3-green" style="width:100%">
            <div class="w3-center w3-text-white">50%</div>
          </div>
          <BR>
          <a href="#"><i class='material-icons left'>perm_identity</i></a>
          </div>
        </div>

        <div class="portlet">
          <div class="portlet-header">CRUD Usuarios</div>
          <div class="portlet-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</div>
        </div>-->

      </div>

      <div class="column" id="encurso">
        <h5 class="title_column">EN CURSO</h5>
        <?php
        if(!isset($data['msj'])){
        for ($i=0; $i <count($actividades); $i++) {
          # code...
          if(strcmp($actividades[$i]['estado'],"encurso")==0 ){
            echo "<div class='portlet'>";
              echo "<div class='portlet-header' id='".$actividades[$i]['id']."'>".$actividades[$i]['nombre']."</div>";
              echo "<div class='portlet-content'>".$actividades[$i]['descripcion']."</div>";
              echo "<a href='#' class='verResponsable' id='".$actividades[$i]['id_responsable']."-".$actividades[$i]['id']."'><i class='material-icons left'>perm_identity</i></a>";
              echo "<a href='#' class='editarActividad' id='".$actividades[$i]['id']."'><i class='material-icons left'>edit</i></a>";
              echo "<a href='#' class='eliminarActividad' id='".$actividades[$i]['id']."'><i class='material-icons left'>delete</i></a>";
            echo "</div>";
          }


        }
      }
        ?>

      </div>

      <div class="column" id="done">
        <h5 class="title_column">ECHO</h5>
        <?php
        if(!isset($data['msj'])){
        for ($i=0; $i <count($actividades); $i++) {
          # code...
          if(strcmp($actividades[$i]['estado'],"done")==0 ){
            echo "<div class='portlet'>";
              echo "<div class='portlet-header' id='".$actividades[$i]['id']."'>".$actividades[$i]['nombre']."</div>";
              echo "<div class='portlet-content'>".$actividades[$i]['descripcion']."</div>";
              echo "<a href='#' class='verResponsable' id='".$actividades[$i]['id_responsable']."-".$actividades[$i]['id']."'><i class='material-icons left'>perm_identity</i></a>";
              echo "<a href='#' class='editarActividad' id='".$actividades[$i]['id']."'><i class='material-icons left'>edit</i></a>";
              echo "<a href='#' class='eliminarActividad' id='".$actividades[$i]['id']."'><i class='material-icons left'>delete</i></a>";
            echo "</div>";
          }


        }
      }
        ?>
        <!--<div class="portlet">
          <div class="portlet-header">Links</div>
          <div class="portlet-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</div>
          <div class="w3-progress-container">
          <div id="myBar" class="w3-progressbar w3-green" style="width:25%">
            <div class="w3-center w3-text-white">25%</div>
          </div>
          </div>
        </div>

        <div class="portlet">
          <div class="portlet-header">Images</div>
          <div class="portlet-content">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</div>
        </div>-->

      </div>
    </div>



      <?php
      echo form_open('Sprint/add_actividad');
      echo "<input type='hidden' name='id' value='".$sprint['id']."'>";
      echo "<div class='fixed-action-btn horizontal click-to-toggle' style='top: 500px; left: 230px;'>";
        echo "<button class='btn-floating btn-large red'  type='submit'>";
          echo "<i class='material-icons'>add</i>";
        echo "</button>";
      echo "</div>";
      echo "</form>";
      ?>
      
      
     

















      <div id="modalEliminarActividad" class="modal">
        <div class="modal-content">
          <h4>Eliminar Actividad </h4>
          <p>Esta seguro de eliminar la actividad ?</p>
          <input type="hidden" id="idEliminar"></input>
        </div>
        <div class="modal-footer">
          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
          <a href="#!" class=" modal-action modal-close waves-effect waves-red btn-flat" id="aceptarEliminarActividad">Eliminar</a>
        </div>
      </div>



      <div id="modalActualizarActividad" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4>Actualizar Actividad </h4>
          <div class="row">
            <div class="input-field col s12">
              <input type="hidden" id="idActividadActualizar" />
              <input  type="text" name="nombre" value=""  required="" id="txtNombreActividad" />
           
              <label for="icon_prefix">Nombre</label>
            </div>

          </div>

          <div class="row">
            <div class="input-field col s12 ">
              <textarea id="txtDescripcionActividad" class="materialize-textarea" name="descripcion" required=""></textarea>
              <label for="textarea1">Descripción</label>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
          <a href="#!" class=" modal-action modal-close waves-effect waves-red btn-flat" id="btnAceptarActualizarActividad">Actualizar</a>
        </div>
      </div>



      <div id="modalResponsable" class="modal modal-fixed-footer">
        <div class="modal-content">
          <h4>Responsable :  </h4>
          <h5 id="nombreResponsable"></h5>
          <input type="hidden" id="ActividadCambiarResponsable"></input>
          <br>
          <br>
          <br>
          <h4>Cambiar Responsable</h4>
          <div class="row">
            <div class="input-field col s10">
            <select id="selectResponsable" class="browser-default">
              <option value="" disabled selected>Escoje un responsable</option>
              
            </select>
            
          </div>
          </div>
          </div>
        <div class="modal-footer">
          <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
          <a href="#!" class=" modal-action modal-close waves-effect waves-red btn-flat" id="btnAceptarActualizarResponsable">Actualizar</a>
        </div>
      
      </div>
   










       <script type="text/javascript" src="<?php echo base_url('libs/js/jquery-2.1.4.min.js'); ?>"></script>
       <script type="text/javascript" src="<?php echo base_url('libs/js/jquery-ui.min.js'); ?>"></script>
       <script type="text/javascript" src="<?php echo base_url('libs/js/materialize.min.js'); ?>"></script>
       <script type="text/javascript" src="<?php echo base_url('libs/js/script.js'); ?>"></script>
       <script type="text/javascript" src="<?php echo base_url('libs/js/drag.js'); ?>"></script>
  </body>
</html>
