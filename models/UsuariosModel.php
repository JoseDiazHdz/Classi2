<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsuariosModel extends CI_Model{

  public function __construct(){
      parent::__construct();/*constructor de la clase padre Model*/
      $this->load->database();/*Permite accesos a la base de datos*/
  }
  
function login($email,$contrasena){
  $this->db->select('idUsuario, email, contrasena,Nombre');
  $this->db->from('usuario');
  $this->db->where('email',$email);
  $this->db->where('contrasena',$contrasena);
  $this->db->limit(1);

  $query = $this->db->get();
  if ($query->num_rows()==1) {
    return $query->result();
  }
  else{
    return false;
  }
}

 function verificarEmail($email){
    $query = $this->db->select('*');
    $query = $this->db->from('usuario');
    $query = $this->db->where("email",$email);
    $query = $this->db->get();
    return $query->num_rows();
  }



function insert($nombre,$email,$contrasena,$sexo,$fecha,$matricula,$edad){
  $datos = array(
   'Nombre' => $nombre,
   'Sexo' => $sexo,
   'Edad' => $edad,
   'contrasena' => $contrasena,
   'email' => $email,
   'Matricula' => $matricula,
   'fechaRegistro' =>$fecha

   );
        return $this->db->insert('usuario', $datos);
}
}