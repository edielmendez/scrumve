<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Actualizar Proyecto</title>
    <link href="<?php echo base_url('libs/css/materialize.min.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('libs/css/iconos.css'); ?>" rel="stylesheet" />


  </head>
  <body>
    <ul id="dropdown1" class="dropdown-content">

      <li><a href="#!"></a></li>
      <li class="divider"></li>
      <li><a href="<?php echo base_url();?>index.php/Home/logout">Cerrar Sesion</a></li>
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
      <h3>Actualizar proyecto</h3>

      <div class="row">

          <?php echo form_open('Project/actualizar',array('class'=>'col s12')); ?>
          <div class="row">
            <div class="input-field col s6 offset-s3">
              <input type="hidden"  name="id" value="<?php echo $proyecto['id']; ?>">
              <input id="icon_prefix" type="text" class="validate" required="" name="nombre" value="<?php echo $proyecto['nombre']; ?>">
              <label for="icon_prefix">Nombre</label>
            </div>

          </div>

          <div class="row">
            <div class="input-field col s6 offset-s3">
              <textarea id="textarea1" class="materialize-textarea" name="descripcion" required=""><?php echo $proyecto['nombre']; ?></textarea>
              <label for="textarea1">Descripción</label>
            </div>
          </div>




          <!--<div class="row">
            <div class="input-field col s3 offset-s3">
              <input id="fecha_inicial" type="text" class="datepicker" required="" name="fecha_inicial">
              <label for="fecha_inicial">Fecha inicial</label>
            </div>
            <div class="input-field col s3">

              <input id="fecha_final" type="text" class="datepicker" required="" name="fecha_final">
              <label for="fecha_final">Fecha final</label>
            </div>
          </div>-->


          <div class="row">
            <div class="input-field col s3 offset-s3">
              <input type="submit" value="Actualizar" class="waves-effect waves-light btn"   />

            </div>
            <div class="input-field col s4">
              <a class="waves-effect waves-light btn  red lighten-1" href="<?php echo base_url();?>index.php/home">Cancelar</a>
            </div>
          </div>


        </form>
      </div>
    </div>






       <script type="text/javascript" src="<?php echo base_url('libs/js/jquery-2.1.4.min.js'); ?>"></script>
       <script type="text/javascript" src="<?php echo base_url('libs/js/materialize.min.js'); ?>"></script>
       <script type="text/javascript" src="<?php echo base_url('libs/js/script.js'); ?>"></script>
  </body>
</html>
