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
      $ResultadoBusqueda = $this->VentasModelo->BuscarIDVenta($UsuarioID, $FechaActual);
      $VentaID = $ResultadoBusqueda->id_venta;
      if ($VentaID == 0) {
        $this->VentasModelo->InsertarVenta($UsuarioID, $FechaActual);
        $ResultadoBusqueda = $this->VentasModelo->BuscarIDVenta($UsuarioID, $FechaActual);
        $VentaID = $ResultadoBusqueda->id_venta;
      }
      echo json_encode($VentaID);
      /*if ($this->VentasModelo->BuscarIDVenta($UsuarioID, $FechaActual)){
        $data = array('response' => "success", 'message' => "¡Ya hay una venta!");
    } else {
          $data = array('response' => "error", 'message' => "¡Todavia no hay una venta, se creará una!");
          $this->VentasModelo->InsertarVenta($UsuarioID, $FechaActual);
    }
    echo json_encode($data);*/
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
			echo "No se permite este acceso directo";
		}
	}


  public function EnlistarProductos() {
    if ($this->input->is_ajax_request()) {
      $TipoProducto = $this->input->post('tipoProducto');
      $MostrarConsulta = $this->VentasModelo->LeerProductos($TipoProducto);
		  echo json_encode($MostrarConsulta);
    } else {
      echo "No se permite este acceso directo";
    }
  }


  public function AgregarProductoVenta() {
    if ($this->input->is_ajax_request()) {

      $ProductoID = $this->input->post('productoID');
      $PiezasCompradas = $this->input->post('piezasCompradas');
      $PrecioPiezas = $this->input->post('precioPiezas');
      $VentaID = $this->input->post('ventaID');

      $DatosBusqueda = $this->VentasModelo->ComprobarSiExisteProductoDescripcionVenta($ProductoID, $VentaID);
      $Datos = array(array("id" => 0));
      print_r($DatosBusqueda);
      print_r($Datos);
      /*if ($DatosBusqueda[0]->id == 0) {
        $ResultadoConsulta = $this->VentasModelo->InsertarProductoDescripcionVenta($ProductoID, $PiezasCompradas, $PrecioPiezas, $VentaID);
        echo "<script> alert('$ResultadoConsulta'); </script>";
      } else {

        $NuevaCantidadPiezas = $PiezasCompradas + $DatosBusqueda[0]->cantidad;
        $NuevoPrecioPiezas = $PrecioPiezas + $DatosBusqueda[0]->importe;
        $ID = $DatosBusqueda[0]->id;

        $ResultadoConsulta = $this->VentasModelo->ActualizarProductoSeleccionadoDescripcionVenta($NuevaCantidadPiezas, $NuevoPrecioPiezas, $ID);
      }
		  echo json_encode($ResultadoConsulta);*/
      echo json_encode(0);
    } else {
      echo "No se permite este acceso directo";
    }
  }


  public function CambiarCantidadProducto () {
    if ($this->input->is_ajax_request()) {
      $ProductoID = $this->input->post('productoID');
      $CantidadModificada = $this->input->post('cantidadModificada');

      $SeActualizoLaCantidad = $this->VentasModelo->ActualizarCantidadProducto($ProductoID, $CantidadModificada);
      if ($SeActualizoLaCantidad) {
        $ResultadoBusqueda = $this->VentasModelo->BuscarCantidadProducto($ProductoID);
        if($ResultadoBusqueda->cantidad < 0 ) {
          $NuevaCantidad = -1;
        } else {
          $NuevaCantidad = $ResultadoBusqueda->cantidad;
        }
      }
      echo json_encode($NuevaCantidad);
    } else {
      echo "No se permite este acceso directo";
    }
  }


}
//echo "<script> alert('$NuevaCantidadPiezas', '$NuevoPrecioPiezas', '$ID'); </script>";
//echo "<script> alert('".$Hola."'); </script>";
