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


  public function CrearVentaEnTurno() {
    if ($this->input->is_ajax_request()) {
      $UsuarioID = $this->input->post('usuarioID');
      $FechaActual = $this->input->post('fechaActual');
      //$VentaID = $this->VentasModelo->BuscarIDVenta($UsuarioID, $FechaActual);

      /*if ($VentaID->row() <= 0) {
        $this->VentasModelo->CrearVenta($UsuarioID, $FechaActual);
        $VentaID = $this->VentasModelo->BuscarIDVenta($UsuarioID, $FechaActual);
      }
      echo json_encode($VentaID);*/
      if ($this->VentasModelo->BuscarIDVenta($UsuarioID, $FechaActual)){
        $data = array('response' => "success", 'message' => "¡Ya hay una venta!");
    } else {
          $data = array('response' => "error", 'message' => "¡Todavia no hay una venta, se creará una!");
          $this->VentasModelo->CrearVenta($UsuarioID, $FechaActual);
    }
  echo json_encode($data);
    } else {
      echo "No se permite este acceso directo";
    }
  }

  public function listar_venta_en_turno(){
		if ($this->input->is_ajax_request()) {
      $UsuarioID = $this->input->post('usuarioID');
			$posts = $this->VentasModelo->listar_venta_en_turno($UsuarioID);
			echo json_encode($posts);
		}else {
			echo "No se permite este acceso directo...!!!";
		}
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


  public function MostrarDescripcionDeLaVentaEnTurno() {
    if ($this->input->is_ajax_request()) {
      $VentaID = $this->input->post('ventaID');
      $UsuarioID = $this->input->post('usuarioID');
      $MostrarConsulta = $this->VentasModelo->LeerDescripcionDeLaVentaEnTurno($VentaID, $UsuarioID, $EstadoVenta);
      echo json_encode($MostrarConsulta);
    } else {
      echo "No se permite este acceso directo";
    }
  }


  public function CambiarCantidadProducto () {
    if ($this->input->is_ajax_request()) {

      $operacion = $this->input->post('operacion');
      $piezas = $this->input->post('piezas');

      if ($operacion == "Resta") {
        $identificador = $this->input->post('productoID');
      } else {
        $identificador = $this->input->post('nombreProducto');
      }

      $Cantidad = $this->VentasModelo->ActualizarCantidadProducto($operacion, $piezas, $identificador);

      if ($Cantidad != "Error") {
        $Consulta = array ('Resultado' => "Exitoso", 'Valor' => $Cantidad);
      } else {
        $Consulta = array ('Resultado' => "Erroneo", 'Valor' => $Cantidad);
      }
      echo json_encode($Consulta);
    } else {
      echo "No se permite este acceso directo";
    }
  }


}
