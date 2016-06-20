<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('proyecto','',TRUE);	
 }

 function index()
 {
   if($this->session->userdata('logged_in')){
     redirect('Home/');
     
   }else{
     $this->load->view('welcome_message.php');
   }

 }

}
 ?>
