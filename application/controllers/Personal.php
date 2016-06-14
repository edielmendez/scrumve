<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Personal extends CI_Controller {

 function __construct()
 {
   parent::__construct();

   $this->load->model('proyecto','',TRUE);
   $this->load->model('PersonalModel','',TRUE);
 }

 function index()
 {

   if($this->session->userdata('logged_in'))
   {
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


     }




   }
   else
   {
     //If no session, redirect to login page
     redirect('login', 'refresh');
   }
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('home', 'refresh');
 }

 function getById(){
   $id = $this->input->post('id');
   
   $result = $this->PersonalModel->getOnePersonal($id);
   if($result)
     {
       $responsable;
       foreach($result as $row)
       {
         $responsable = array (
           'id' => $row->id,
           'nombre' => $row->nombre,
           'habilidades' => $row->habilidades,
           'email' => $row->email
         
         );
        
       }
       
      echo json_encode($responsable);

    


     }
 }

 function getAll(){
  $result = $this->PersonalModel->getAll();
   if($result)
     {
       $personal = array();
       foreach($result as $row)
       {
         $persona = array (
           'id' => $row->id,
           'nombre' => $row->nombre,
           'habilidades' => $row->habilidades,
           'email' => $row->email
         
         );
         array_push($personal, $persona);
        
       }
       
      echo json_encode($personal);

    


     }
 }

}
 ?>
