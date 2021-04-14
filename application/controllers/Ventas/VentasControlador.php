<?php

defined('BASEPATH') OR exit ("No deberías poder entrar, pero aún así lo haces :v");

class VentasControlador extends CI_Controller {

  private $permisos;

  public function __construct() {
  	parent::__construct();
  	$this->load->helper(array ('form', 'url'));
  	$this->load->library(array ('session', 'form_validation'));
  	$this->permisos = $this->backend_lib->control();
  	$this->load->model('Ventas/VentasModelo');
  }


  public function index() {
  	$AccionesPermitidas = array ('permisos' => $this->permisos,);

  	$this->load->view('layouts/header');
  	$this->load->view('layouts/aside');
  	$this->load->view('admin/Ventas/VentasVista', $AccionesPermitidas);
  	$this->load->view('layouts/footer');
  }


  public function EnlistarProductos() {
    if ($this->input->is_ajax_request()) {
      $TipoProducto = $this->input->post('tipoProducto');
      //echo "<script> alert('".$Hola."'); </script>";
      $MostrarConsulta = $this->VentasModelo->LeerProductos($TipoProducto);
		  echo json_encode($MostrarConsulta);
    } else {
      echo "No se permite este acceso directo";
    }
  }


}
