<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {
		 private $permisos;
         public function __construct(){
	 	 parent::__construct();
		 $this->permisos = $this->backend_lib->control();
		 $this->load->helper(array('form', 'url'));
	 	 $this->load->library(array('session', 'form_validation'));
	 	 $this->load->model("productos/ModeloProductos");
	 }

	public function index(){
		$data  = array(
			'permisos' => $this->permisos,
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/productos/VistaProductos',$data);
		$this->load->view('layouts/footer');
	}
# Listar Productos
public function listarProductos(){
    $posts = $this->ModeloProductos->listarProductos();
    echo json_encode($posts);
}



# Agregar nuevo Producto
	public function agregarProducto(){
    date_default_timezone_set("America/Mexico_City");
  	$fecha_registro=date("Y-m-d H:i:s");
    $fecha=date("Y-m-d");

		if ($this->input->is_ajax_request()) {

			$this->form_validation->set_rules('nombre_producto', 'nombre', 'required');
			$this->form_validation->set_rules('precio', 'precio', 'required');
			$this->form_validation->set_rules('cantidad', 'cantidad', 'required');
      $this->form_validation->set_rules('tipo_producto', 'descripcion', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data = array('res' => "error", 'message' => validation_errors());
			} else {


	      $ajax_data = array(
	        'nombre_producto' => $this->input->post('nombre_producto'),
          'tipo_producto' => $this->input->post('tipo_producto'),
	        'precio' => $this->input->post('precio'),
	        'cantidad' => $this->input->post('cantidad'),
	        'fecha_de_caducidad' => $this->input->post('fecha_de_caducidad'),
          'id_proveedor' => $this->input->post('id_proveedor'),
          //'fecha_y_hora' => $this->input->post('fecha_y_hora'),
          'fecha' => $this->input->post('fecha'),

	      );

				if ($this->ModeloProductos->agregarProducto($ajax_data)) {
					$data = array('res' => "success", 'message' => "¡Producto agregado!");
	  		} else {
					$data = array('res' => "error", 'message' => "¡Error! :(");
				}

	 		echo json_encode($data);


			}
		} else {
			echo "No se permite este acceso directo...!!!";
		}
	}



# Eliminar producto

public function eliminarProducto(){

	if ($this->input->is_ajax_request()) {
		$del_id = $this->input->post('del_id');
	if ($this->ModeloProductos->delete_entry($del_id)) {

			$data = array('responce' => "success");
	} else {

			$data = array('responce' => "error", "No se pudo eliminar...!");
	}
		echo json_encode($data);
	} else {
		echo "No se permite este acceso directo...!!!";
	}
}

public function editarProducto(){

	if ($this->input->is_ajax_request()) {

		$edit_id = $this->input->post('edit_id');
		if ($post = $this->ModeloProductos->single_entry($edit_id)) {
			$data = array('responce' => "success", "post" => $post);
		}else{
			$data = array('responce' => "error", "failed to fetch");
		}
		echo json_encode($data);
	}else {
		echo "No se permite este acceso directo...!!!";
	}
}

public function updateProducto(){

	if ($this->input->is_ajax_request()) {
    $this->form_validation->set_rules('nombre_producto', 'Nombre', 'required');
    $this->form_validation->set_rules('precio', 'Precio', 'required');
    $this->form_validation->set_rules('tipo_producto', 'Tipo', 'required');
		$this->form_validation->set_rules('cantidad', 'Cantidad', 'required');


		if ($this->form_validation->run() == FALSE) {
			$data = array('res' => "error", 'message' => validation_errors());
		} else {


			$id_producto = $this->input->post('id_producto');


			$ajax_data = array(
				'nombre_producto' => $this->input->post('nombre_producto'),
				'tipo_producto' => $this->input->post('tipo_producto'),
        'precio' => $this->input->post('precio'),
				'cantidad' => $this->input->post('cantidad'),
				'fecha_de_caducidad' => $this->input->post('fecha_de_caducidad'),


			);


			if ($this->ModeloProductos->actualizarProducto($id_producto,$ajax_data)) {
				//
				$data = array('responce' => "success", 'message' => "¡Producto actualizado!");
				} else {
          $data = array('responce' => "error", 'message' => "Error al agregar datos...!");
					//$data = array('responce' => "error", 'message' => "");
				}
			}
			echo json_encode($data);
		}else {
			echo "No se permite este acceso directo...!!!";
		}
}	// Fin de funcion editar


}  // Fin del controller
