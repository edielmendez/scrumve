<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Personal</title>
    <link href="<?php echo base_url('libs/css/materialize.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('libs/css/iconos.css'); ?>" rel="stylesheet" />
    <style type="text/css">
    .container{
      margin-top: 100px;
    }
    </style>

  </head>
  <body>
    <ul id="dropdown1" class="dropdown-content">

      <li><a href="#!"></a></li>
      <li class="divider"></li>
      <li><a href="<?php echo base_url();?>index.php/Home/logout">Cerrar Sesion</a></li>
    </ul>
    <nav>
      <div class="nav-wrapper">
        <a href="#!" class="brand-logo center">SCRUMVE</a>
        <ul id="nav-mobile" class="left hide-on-med-and-down">
          <li><a href="<?php echo base_url();?>index.php/Home/">PROYECTOS</a></li>
          <li><a class="active2" >PERSONAL</a></li>
          
        </ul>
        <ul class="right hide-on-med-and-down">

          <!-- Dropdown Trigger -->
          <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons left">supervisor_account</i><?php echo $data['username']; ?><i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
      </div>
    </nav>
    <h4><?php echo $this->session->flashdata('message') ?></h4>
    <div class="container">
      <div class="row">
        <div class="col s8">
          
        
      <ul class="collapsible  " data-collapsible="accordion">
      <?php
      if(count($personal)==0){

      }else{
        for ($i=0; $i < count($personal); $i++) { 
          # code...
          echo "<li>";
          echo "<div class='collapsible-header'>";
            echo "<i class='material-icons'>accessibility</i>".$personal[$i]['nombre'];
            echo "<a href='#' class='eliminarPersonal' id='".$personal[$i]['id']."'><i class='material-icons right'>delete</i></a>";
            echo "<a href='". base_url()."index.php/Personal/update/".$personal[$i]['id']."'><i class='material-icons right'>edit</i></a>";
          echo "</div>";
            
          echo "<div class='collapsible-body'>";
            echo "<h5>Habilidades : </h5>";
            echo "<p><strong>".$personal[$i]['habilidades']."</strong></p>";
            echo "<h5>email : </h5>";
            echo "<p><strong>".$personal[$i]['email']."</strong></p>";
          echo "</div>";
          echo "</li>";
        }
        
      }

      ?>
      </ul>
        </div>
        <div class="col s4">
          <a href="<?php echo base_url();?>index.php/Personal/addPersonal" class="waves-effect waves-light btn"><i class="material-icons right">add</i>Nuevo Personal</a>
        </div>
      </div>
        
      
    </div>

    <!--Modales-->
    

  <!-- Modal Structure -->
    <div id="modalEliminarPersonal" class="modal">
      <div class="modal-content">
        <h4>Eliminar Personal </h4>
        <input type="hidden" id="idPersonalEliminar"> </input>
        <p>Seguro de eliminar el personal ?</p>
      </div>
      <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
        <a href="#!" id="btnAceptarEliminarPersonal" class=" modal-action modal-close waves-effect waves-red btn-flat">Eliminar</a>
      </div>
    </div>







       <script type="text/javascript" src="<?php echo base_url('libs/js/jquery-2.1.4.min.js'); ?>"></script>
       <script type="text/javascript" src="<?php echo base_url('libs/js/materialize.min.js'); ?>"></script>
       <script type="text/javascript" src="<?php echo base_url('libs/js/script.js'); ?>"></script>
  </body>
</html>
