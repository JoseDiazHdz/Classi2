<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newcurso extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('NewcursoModel','',TRUE);
   $this->load->library('session');
 }


function index()
 {
 	{
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['email'] = $session_data['email'];
     $data['idUsuario'] = $session_data['idUsuario'];


     $this->load->view('inicio/home_view', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('modallogin', 'refresh');
   }
 }
   //This method will have the credentials validation
 /*  $this->load->helper('security');
   $this->load->library('form_validation');

   $this->form_validation->set_rules('Nombre', 'Nombre', 'trim|required|xss_clean');
   $this->form_validation->set_rules('Periodo', 'Periodo', 'trim|required|xss_clean');
   $this->form_validation->set_rules('Horas', 'Horas', 'trim|required|xss_clean');
   $this->form_validation->set_rules('RdAprobacion', 'RdAprobacion', 'trim|required|xss_clean');
   $this->form_validation->set_rules('RdCalificacion', 'RdCalificacion', 'trim|required|xss_clean');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page


     $this->load->view('inicio/home_view');
   }
   else
   {
     //Go to private area

		$nombre = $this->input->post('Nombre');
   // if($this->NewcursoModel->verificarCurso($nombre) == 0){
        $periodo = $this->input->post('Periodo');
        $hrs = $this->input->post('Horas');
        $RdAprobacion = $this->input->post('RdAprobacion');
        $RdCalificacion = $this->input->post('RdCalificacion');
        $fecha = date('Y-m-d');
               
    //}
    $ready = $this->NewcursoModel->RegisterNewCurso($nombre,$periodo,$hrs,$RdAprobacion,$RdCalificacion,$fecha);
   }*/

 }





function RegisterNewCurso(){
	   $this->load->helper('security');
   $this->load->library('form_validation');

   $this->form_validation->set_rules('Nombre', 'Nombre', 'trim|required|xss_clean');
   $this->form_validation->set_rules('Periodo', 'Periodo', 'trim|required|xss_clean');
   $this->form_validation->set_rules('Horas', 'Horas', 'trim|required|xss_clean');
   $this->form_validation->set_rules('RdAprobacion', 'RdAprobacion', 'trim|required|xss_clean');
   $this->form_validation->set_rules('RdCalificacion', 'RdCalificacion', 'trim|required|xss_clean');

   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page


     $this->load->view('inicio/home_view');
   }
   else
   {
     //Go to private area

		$nombre = $this->input->post('Nombre');
   // if($this->NewcursoModel->verificarCurso($nombre) == 0){
        $periodo = $this->input->post('Periodo');
        $hrs = $this->input->post('Horas');
        $RdAprobacion = $this->input->post('RdAprobacion');
        $RdCalificacion = $this->input->post('RdCalificacion');
        $fecha = date('Y-m-d');

               
    //}
    $ready = $this->NewcursoModel->RegisterNewCurso($nombre,$periodo,$hrs,$RdAprobacion,$RdCalificacion,$fecha);
}




/*function RegisterNewCurso(){
		$nombre = $this->input->post('Nombre');
   // if($this->NewcursoModel->verificarCurso($nombre) == 0){
        $periodo = $this->input->post('Periodo');
        $hrs = $this->input->post('Horas');
        $RdAprobacion = $this->input->post('RdAprobacion');
        $RdCalificacion = $this->input->post('RdCalificacion');
        $fecha = date('Y-m-d');
               
    //}
    $ready = $this->NewcursoModel->RegisterNewCurso($nombre,$periodo,$hrs,$RdAprobacion,$RdCalificacion,$fecha);
}*/


}
}
 ?>