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

       
        $data['username'] = $session_data['username'];
        $datos['data'] = $data;
        $datos['personal'] = $personal;
        $this->load->view('personal_view', $datos);
       
      

    


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

 function addPersonal(){
    if($this->session->userdata('logged_in')){
       $session_data = $this->session->userdata('logged_in');
       $data['username'] = $session_data['username'];
       $this->load->view("nuevo_personal_view",$data);
    }else{
      redirect('login', 'refresh');
    }
  }

  function nuevo_personal(){
    $nombre = $this->input->post('nombre');
    $email = $this->input->post('email');
    $habilidades = $this->input->post('habilidades');

    $result = $this->PersonalModel->nuevoPersonal($nombre,$email,$habilidades);

    if($result){
      $this->session->set_flashdata('message', 'Persona Agregada');
    }else{
       $this->session->set_flashdata('message', 'Persona No Agregada');
    }
     redirect('Personal/');
  }


  function update($id){
    //obtenenos todos los datos del personal a actualizar
   $result = $this->PersonalModel->getOnePersonal($id);



     if($result)
     {
       $sprintpersonal = array();
       foreach($result as $row)
       {
         $personal = array(
           'id' => $row->id,
           'nombre' => $row->nombre,
           'email' => $row->email,
           'habilidades' => $row->habilidades
         );


       }


       $session_data = $this->session->userdata('logged_in');
       $data['username'] = $session_data['username'];
       $datos['data'] = $data;
       $datos['personal'] = $personal;
       $this->load->view('actualizar_personal_view', $datos);
     }
  }

  function actualizar(){
    $id = $this->input->post('id');
    $nombre = $this->input->post('nombre');
    $email = $this->input->post('email');
    $habilidades = $this->input->post('habilidades');

    $result = $this->PersonalModel->actualizarPersonal($nombre,$email,$habilidades,$id);

    if($result){
      $this->session->set_flashdata('message', 'Personal Actualizado');
    }else{
       $this->session->set_flashdata('message', 'Personal No Actualizado');
    }
     redirect('Personal/');
  }

  function delete ($id){
    $result = $this->PersonalModel->delete($id); 

    if($result){
      $this->session->set_flashdata('message', 'Personal Eliminado');
    }else{
      $this->session->set_flashdata('message', 'Personal No Eliminado');
    }
    redirect('Personal/');
  }

}

   ?>
