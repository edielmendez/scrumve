<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller {

 function __construct()
 {
   parent::__construct();

   $this->load->model('proyecto','',TRUE);
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

}
 ?>
