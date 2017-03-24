<?php defined('BASEPATH') OR exit('No direct script access allowed');

class NewcursoModel extends CI_Model{

  public  $id;

  public function __construct(){
      parent::__construct();/*constructor de la clase padre Model*/
      $this->load->database();/*Permite accesos a la base de datos*/
      $this->load->library('session');
}



function setId($Uid){
   $this->id=$Uid;
}

function RegisterNewCurso($nombre,$periodo,$hrs,$RdAprobacion,$RdCalificacion,$fecha){
 $Idd=$this->id;
  $datos = array(
   'Nombre' => $nombre,
   'Periodo' => $periodo,
   'Hrs' => $hrs,
   'RangoDeAprobacion' => $RdAprobacion,
   'RangoDeCalificacion' => $RdCalificacion,
   'Usuario_idUsuario' =>$Idd,
   'fechaCreacion' => $fecha

   );
        return $this->db->insert('curso', $datos);

}



}



 ?>