<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Nuevo Actividad</title>
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
          <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><i class="material-icons left">supervisor_account</i><?php echo $username ?><i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
      </div>
    </nav>
    <?php //print_r($personal); ?>
    
    <div class="container">
      <h3>Nuevo Actividad del Sprint <?php echo $id?>   </h3>

      <div class="row">
          
          <?php  echo form_open('Sprint/nueva_actividad',array('class'=>'col s12','id'=>'formNuevaActividad')); ?>
          <div class="row">
            <div class="input-field col s6 offset-s3">

              <input  type="text" name="nombre" value=""  required="" />
              <input  type="hidden"  name="id" value="<?php echo $id; ?>">
              <label for="icon_prefix">Nombre</label>
            </div>

          </div>

          <div class="row">
            <div class="input-field col s6 offset-s3">
              <textarea id="textarea1" class="materialize-textarea" name="descripcion" required=""></textarea>
              <label for="textarea1">Descripción</label>
            </div>
          </div>




          <div class="row">
             <div class="input-field col s6 offset-s3">
              
                <?php
                echo "<select id='selectResponsable' name='responsable'>"; 
                echo "<option  disabled selected>Escoje un responsable</option>";
                for ($i=0; $i < count($personal); $i++) { 
                  # code...
                 
                
                  echo "<option value='".$personal[$i]['id']."'>".$personal[$i]['nombre']."</option>";
                  
                }
                echo "</select>";
                 ?>
          
              <label>Responsable</label>
            </div>
          </div>


          <div class="row">
            <div class="input-field col s3 offset-s3">
              <input type="submit" value="Crear" class="waves-effect waves-light btn"   />

            </div>
            <div class="input-field col s4">
              <a class="waves-effect waves-light btn  red lighten-1" href="<?php echo base_url();?>index.php/">Cancelar</a>
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
