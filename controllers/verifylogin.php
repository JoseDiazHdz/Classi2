<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerifyLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('UsuariosModel','',TRUE);
   $this->load->model('NewcursoModel','',TRUE);
   $this->load->library('session');
 }

 function index()
 {
   //This method will have the credentials validation
   $this->load->helper('security');
   $this->load->library('form_validation');

   $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');
   $this->form_validation->set_rules('contrasena', 'contrasena', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page


     $this->load->view('Shared/modallogin');
   }
   else
   {
     //Go to private area
redirect('home', 'refresh');
    /* $session_data = $this->session->userdata('logged_in');
     $data['email'] = $session_data['email'];
     $data['idUsuario'] = $session_data['idUsuario'];


    
     $this->load->view('inicio/home_view', $data);
     $this->NewcursoModel->setId($data['idUsuario']);*/
    // $this->Newcurso->RegisterNewCurso($Uid);
   }

 }

 function check_database($contrasena)
 {
   //Field validation succeeded.  Validate against database
   $email = $this->input->post('email');
  

   //query the database
   $result = $this->UsuariosModel->login($email, $contrasena);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'idUsuario' => $row->idUsuario,
          'Nombre' => $row->Nombre,
         'email' => $row->email
       );

       $this->session->set_userdata('logged_in', $sess_array);
       
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Invalid username or password');
     return false;
   }
 }


function registrar(){


     $this->load->helper('security');
   $this->load->library('form_validation');

   $this->form_validation->set_rules('Nombre', 'Nombre', 'trim|required|xss_clean');
   $this->form_validation->set_rules('Sexo', 'Sexo', 'trim|required|xss_clean');
   $this->form_validation->set_rules('Edad', 'Edad', 'trim|required|xss_clean');
   $this->form_validation->set_rules('Email', 'Email', 'trim|required|xss_clean');
   $this->form_validation->set_rules('Matricula', 'Matricula', 'trim|required|xss_clean');
  $this->form_validation->set_rules('contrasena', 'contrasena', 'trim|required|xss_clean');




          $email = $this->input->post('Email');
            $nombre = $this->input->post('Nombre');
            $sexo = $this->input->post('Sexo');
            $contrasena = $this->input->post('contrasena');
            $matricula = $this->input->post('Matricula');
            $edad = $this->input->post('Edad');
            $fecha = date('Y-m-d');
               
                
          $ready = $this->UsuariosModel->insert($nombre,$email,$contrasena,$sexo,$fecha,$matricula,$edad);


}

}
?>