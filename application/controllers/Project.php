<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Project extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('proyecto','',TRUE);
   $this->load->model('SprintModel','',TRUE);
 }

 function index($id)
 {

   if($this->session->userdata('logged_in'))
   {
     //obtenenos todos los datos de este proyecto para  mostrar
     $result = $this->proyecto->getOneProject($id);



     if($result)
     {
       $proyecto = array();
       foreach($result as $row)
       {
         $proyecto = array(
           'id' => $row->id,
           'nombre' => $row->nombre,
           'descripcion' => $row->descripcion,
           'estado' => $row->estado,
           'id_user' => $row->id_user
         );


       }

       //obtenemos los sprint de este proyecto
       $result = $this->SprintModel->getAll($proyecto['id']);

       if($result)
       {
         $sprints = array();
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
           array_push($sprints,$sprint);

         }



         $session_data = $this->session->userdata('logged_in');
         $data['username'] = $session_data['username'];
         $datos['data'] = $data;
         $datos['proyecto'] = $proyecto;
         $datos['sprints'] = $sprints;
         $this->load->view('proyecto_view', $datos);


       }else{
         //si el proyecto actual no tiene sprints
         $session_data = $this->session->userdata('logged_in');
         $data['username'] = $session_data['username'];
         $data['msj'] = "No hay sprints";
         $datos['data'] = $data;
         $datos['proyecto'] = $proyecto;
         $this->load->view('proyecto_view', $datos);
       }



     }

   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 function create(){
   $session_data = $this->session->userdata('logged_in');
   $data['username'] = $session_data['username'];
    $this->load->view('nuevo_proyecto_view', $data);
   //cremos el nuevo
   //$result = $this->proyecto->getAll($session_data['id']);
 }

 function nuevo(){
   $session_data = $this->session->userdata('logged_in');
   $nombre = $this->input->post('nombre');
   $descripcion = $this->input->post('descripcion');
   $fecha_inicial =  $this->input->post('fecha_inicial');
   $fecha_final =  $this->input->post('fecha_final');
   $id_user = $session_data['id'];

   //cremos el nuevo proyecto con su respectivo calendario
   $result = $this->proyecto->crearProyecto($nombre,$descripcion,$fecha_inicial,$fecha_final,$id_user);
   if($result){
     $this->session->set_flashdata('message', 'Proyecto Creado');
   }else{
     $this->session->set_flashdata('message', 'Proyecto No Creado');
   }
   redirect('Home/');


 }

 function update($id){

   //obtenenos todos los datos de este proyecto a actualizar
   $result = $this->proyecto->getOneProject($id);



   if($result)
   {
     $proyecto = array();
     foreach($result as $row)
     {
       $proyecto = array(
         'id' => $row->id,
         'nombre' => $row->nombre,
         'descripcion' => $row->descripcion,
         'estado' => $row->estado,
         'id_user' => $row->id_user
       );


     }


     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $datos['data'] = $data;
     $datos['proyecto'] = $proyecto;
     $this->load->view('actualizar_proyecto_view', $datos);
   }



 }

 function actualizar(){
   //$session_data = $this->session->userdata('logged_in');
   $nombre = $this->input->post('nombre');
   $descripcion = $this->input->post('descripcion');
   $id = $this->input->post('id');
   /*$fecha_inicial =  $this->input->post('fecha_inicial');
   $fecha_final =  $this->input->post('fecha_final');
   $id_user = $session_data['id'];*/

   //actualizamos el proyecto
   $result = $this->proyecto->actualizarProyecto($nombre,$descripcion,$id);
   if($result){
     $this->session->set_flashdata('message', 'Proyecto actualizado');
   }else{
     $this->session->set_flashdata('message', 'Proyecto no actualizado');
   }
   redirect('Home/');
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

  function delete($id){
    $result = $this->proyecto->delete($id); 

    if($result){
      $this->session->set_flashdata('message', 'Proyecto Eliminado');
    }else{
      $this->session->set_flashdata('message', 'Proyectoo No Eliminado');
    }
    redirect('Home/');
  }



}
 ?>
