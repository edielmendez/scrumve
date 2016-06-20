<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Actualizar Sprint</title>
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
      <h3>Actualizar Personal</h3>

      <div class="row">

          <?php echo form_open('Personal/actualizar',array('class'=>'col s12')); ?>
          <div class="row">
            <div class="input-field col s6 offset-s3">
              <input type="hidden" class="validate" required="" name="id" value="<?php echo $personal['id']; ?>">
              <input id="icon_prefix" type="text" class="validate" required="" name="nombre" value="<?php echo $personal['nombre']; ?>">
              <label for="icon_prefix">Nombre Completo</label>
            </div>

          </div>

          <div class="row">
            <div class="input-field col s6 offset-s3">
             
              <input id="icon_prefix" type="email" class="validate" required="" name="email" value="<?php echo $personal['email']; ?>">
              <label for="icon_prefix">Email</label>
            </div>

          </div>

          <div class="row">
            <div class="input-field col s6 offset-s3">
              <textarea id="textarea1" class="materialize-textarea" name="habilidades" required=""><?php echo $personal['habilidades']; ?></textarea>
              <label for="textarea1">Habilidades</label>
            </div>
          </div>

         




          


          <div class="row">
            <div class="input-field col s3 offset-s3">
              <input type="submit" value="Actualizar" class="waves-effect waves-light btn"   />

            </div>
            <div class="input-field col s4">
              <a class="waves-effect waves-light btn  red lighten-1" href="<?php echo base_url();?>index.php/Personal/">Cancelar</a>
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
