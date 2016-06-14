<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
   if($this->session->userdata('logged_in')){
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $this->load->view('home_view', $data);
     
   }else{
     $this->load->view('welcome_message.php');
   }

 }

}
 ?>
