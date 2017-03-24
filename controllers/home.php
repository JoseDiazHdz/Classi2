<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->library('session');
 }
 
 function index()
 {
   if($this->session->userdata('logged_in'))
   {
    
    $session_data = $this->session->userdata('logged_in');
     $data['email'] = $session_data['email'];
     $data['idUsuario'] = $session_data['idUsuario'];
      $data['Nombre'] = $session_data['Nombre'];
    $this->load->view('inicio/home_view', $data);



   }
   else
   {
     //If no session, redirect to login page

    
     redirect('VerifyLogin', 'refresh');


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