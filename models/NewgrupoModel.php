<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewgrupoModel extends CI_Model{

  public function __construct(){
      parent::__construct();/*constructor de la clase padre Model*/
      $this->load->database();/*Permite accesos a la base de datos*/
      $this->load->library('session');
  }


}

?>