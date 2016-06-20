<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Sprint extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('SprintModel','',TRUE);
   $this->load->model('ActividadModel','',TRUE);
   $this->load->model('PersonalModel','',TRUE);
 }

 function index($id,$id_parent)
 {


   if($this->session->userdata('logged_in'))
   {

     $id_sprint = $id;//obtenenos los datos del sprint que se va a mostrar



     $result = $this->SprintModel->getOneSprint($id_sprint);



     if($result)
     {
       $sprint = array();
       foreach($result as $row)
       {
         $sprint = array(
           'id' => $row->id,
           'numero' => $row->numero,
           'descripcion' => $row->descripcion,
           'avanze' => $row->avanze,
           'id_proyecto' => $row->id_proyecto,
           'fecha_inicial' => $row->fecha_inicial,
           'fecha_final' => $row->fecha_final

         );


       }

       //obtenemos las actividades de este sprint
       $result = $this->ActividadModel->getAll($id_sprint);

       if($result)
       {
         $actividades = array();
         foreach($result as $row)
         {
           $personal = $this->PersonalModel->getOnePersonal($row->id_responsable);


           $actividad = array(
             'id' => $row->id,
             'nombre' => $row->nombre,
             'descripcion' => $row->descripcion,
             'prioridad' => $row->prioridad,
             'avanze' => $row->avanze,
             'estado' => $row->estado,
             'id_responsable' => $row->id_responsable,
             'id_sprint' => $row->id_sprint,
             'nombre_responsable' => $personal[0]->nombre
           );
           array_push($actividades,$actividad);

         }



         $session_data = $this->session->userdata('logged_in');
         $data['username'] = $session_data['username'];
         $data['id_parent'] = $id_parent;
         $datos['data'] = $data;
         $datos['sprint'] = $sprint;
         $datos['actividades'] = $actividades;
         $this->load->view('sprint_view', $datos);


       }else{
         //si el proyecto actual no tiene actividades
         $session_data = $this->session->userdata('logged_in');
         $data['username'] = $session_data['username'];
         $data['id_parent'] = $id_parent;
         $data['msj'] = "No hay sprints";
         $datos['data'] = $data;
         $datos['sprint'] = $sprint;
         $this->load->view('sprint_view', $datos);
       }



     }
     //fin del if que comprueba que si la sesion existe
   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }

 }

 function create(){
   $id_proyecto = $this->input->post('id');

   $session_data = $this->session->userdata('logged_in');
   $data['username'] = $session_data['username'];
   $data['id'] = $id_proyecto;
   $data['numero'] = 10;
    $this->load->view('nuevo_sprint_view', $data);
   //cremos el nuevo
   //$result = $this->proyecto->getAll($session_data['id']);
 }

 function nuevo(){
   $session_data = $this->session->userdata('logged_in');
   $numero = $this->input->post('numero');
   $descripcion = $this->input->post('descripcion');
   $fecha_inicial =  $this->input->post('fecha_inicial');
   $fecha_final =  $this->input->post('fecha_final');
   $id_proyecto = $this->input->post('id');


   //cremos el nuevo proyecto con su respectivo calendario
   $result = $this->SprintModel->crearSprint($numero,$descripcion,$fecha_inicial,$fecha_final,$id_proyecto);
   if($result){
     $this->session->set_flashdata('message', 'Sprint Creado');
   }else{
     $this->session->set_flashdata('message', 'Sprint No Creado');
   }
   redirect('Project/index/'.$id_proyecto);


 }

 function update($id){

   $id_sprint = $id;

   //obtenenos todos los datos de este sprint a actualizar
   $result = $this->SprintModel->getOneSprint($id_sprint);



   if($result)
   {
     $sprint = array();
     foreach($result as $row)
     {
       $sprint = array(
         'id' => $row->id,
         'numero' => $row->numero,
         'descripcion' => $row->descripcion,
         'avanze' => $row->avanze,
         'id_proyecto' => $row->id_proyecto,
         'fecha_inicial' => $row->fecha_inicial,
         'fecha_final' => $row->fecha_final
       );


     }


     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $datos['data'] = $data;
     $datos['sprint'] = $sprint;
     $this->load->view('actualizar_sprint_view', $datos);
   }



 }

 function actualizar(){
   //$session_data = $this->session->userdata('logged_in');
   $numero = $this->input->post('numero');
   $descripcion = $this->input->post('descripcion');
   $id = $this->input->post('id');
   $id_proyecto = $this->input->post('id_proyecto');
   $avanze = $this->input->post('avanze');
   $fecha_inicial = $this->input->post('fecha_inicial');
   $fecha_final = $this->input->post('fecha_final');
   /*$fecha_inicial =  $this->input->post('fecha_inicial');
   $fecha_final =  $this->input->post('fecha_final');
   $id_user = $session_data['id'];*/


   //actualizamos el proyecto

   $result = $this->SprintModel->actualizarProyecto($numero,$descripcion,$avanze,$id_proyecto,$fecha_inicial,$fecha_final,$id);
   if($result){
     $this->session->set_flashdata('message', 'Sprint actualizado');
   }else{
     $this->session->set_flashdata('message', 'Sprint no actualizado');
   }
   redirect('Project/index/'.$id_proyecto);
   /*
   $session_data = $this->session->userdata('logged_in');
   $data['username'] = $session_data['username'];
   //obtenenos todos los proyectos de este usuario
   $result = $this->proyecto->getAll($session_data['id']);



     if($result)
     {
       $proyectos = array();
       foreach($result as $row)
       {
         $proyecto = array(
           'id' => $row->id,
           'nombre' => $row->nombre,
           'descripcion' => $row->descripcion,
           'estado' => $row->estado,
           'id_user' => $row->id_user
         );
         array_push($proyectos,$proyecto);

       }
       $datos['data'] = $data;
       $datos['proyectos'] = $proyectos;


       $this->load->view('home_view', $datos  );




    }*/

 }

  function delete($id,$id_proyecto){
    $result = $this->SprintModel->delete($id); 

      if($result){
        $this->session->set_flashdata('message', 'Sprint Eliminado');
      }else{
        $this->session->set_flashdata('message', 'Sprint No Eliminado');
      }
      redirect('Project/index/'.$id_proyecto);
  }

  function add_actividad(){
    if($this->session->userdata('logged_in')){


      
      $result = $this->PersonalModel->getAll();


      if($result){
          $personal = array();
          foreach($result as $row)
          {
            $persona = array(
              'id' => $row->id,
              'nombre' => $row->nombre,
              'habilidades' => $row->habilidades,
              'email' => $row->email
              
            );
            array_push($personal,$persona);

          }
       




      }

      $id_sprint = $this->input->post('id');
      $id_parent = $this->input->post('id_parent');
      $session_data = $this->session->userdata('logged_in');
      $data['username'] = $session_data['username'];
      $data['id'] = $id_sprint;
      $data['id_parent'] = $id_parent;
      $data['personal'] = $personal;

      
      
      $this->load->view('nueva_actividad_view', $data);
    }else{
      redirect('login', 'refresh');
    }
  }

  function nueva_actividad(){
    if($this->session->userdata('logged_in')){

      $id_sprint = $this->input->post('id');
      $id_parent = $this->input->post('id_parent');

      $nombre = $this->input->post('nombre');
      $descripcion = $this->input->post('descripcion');
      $responsable =  $this->input->post('responsable');

      $result = $this->ActividadModel->crearActividad($nombre,$descripcion,$responsable,$id_sprint); 

    
      if($result){
        $this->session->set_flashdata('message', 'Actividad Creada');
      }else{
        $this->session->set_flashdata('message', 'Actividad No Creada');
      }
      redirect('Sprint/index/'.$id_sprint."/".$id_parent);
      
    }else{
      redirect('login', 'refresh');
    }
  }

  function updateEstadoActividad(){
    $id_actividad = $this->input->post('id');
    $estado = $this->input->post('estado');
    

    $result = $this->ActividadModel->updateEstadoActividad($id_actividad,$estado); 

    
    if($result){
      echo "done!!";
    }else{
      echo "fail!!";
    }


  }


  function getActividadById(){
    $id_actividad = $this->input->post('id');
    $result = $this->ActividadModel->getActividadById($id_actividad);
    if($result)
     {
       $actividad;
       foreach($result as $row)
       {
         $actividad = array (
           'id' => $row->id,
           'nombre' => $row->nombre,
           'descripcion' => $row->descripcion,
           'avanze' => $row->avanze,
           'estado' => $row->estado,
           'id_responsable' => $row->id_responsable,
           'id_sprint' => $row->id_sprint
         );
        
       }
       
      echo json_encode($actividad);

    


     }

  }

  function actualizarActividad(){
    $id_actividad = $this->input->post('id');
    $nombre = $this->input->post('nombre');
    $descripcion = $this->input->post('descripcion');

    $result = $this->ActividadModel->actualizarActividad($id_actividad,$nombre,$descripcion); 

    
    if($result){
      echo "done";
    }else{
      echo "fail!";
    }

  }



  function eliminarActividad(){
    $id_actividad = $this->input->post('id');
    

    $result = $this->ActividadModel->eliminarActividad($id_actividad); 

    
    if($result){
      echo "done";
    }else{
      echo "fail!";
    }
  }

  function actualizarResponsable(){
    $id_actividad = $this->input->post('id');
    $id_responsable = $this->input->post('idNuevoResponsable');

    $result = $this->ActividadModel->actualizarResponsable($id_actividad,$id_responsable); 

    
    if($result){
      echo "done";
    }else{
      echo "fail!";
    }
  }





}
 ?>
