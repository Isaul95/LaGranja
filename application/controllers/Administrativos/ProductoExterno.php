<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductoExterno extends CI_Controller {
		 private $permisos;
         public function __construct(){
	 	 parent::__construct();
		 $this->permisos = $this->backend_lib->control();
		 $this->load->helper(array('form', 'url'));
	 	 $this->load->library(array('session', 'form_validation'));
	 	 $this->load->model("productoExterno/ModeloProductoExterno");
	 }

	public function index(){
		$data  = array(
			'permisos' => $this->permisos,
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/productoExterno/VistaProductoExterno',$data);
		$this->load->view('layouts/footer');
	}

# Listar Productos Externos
public function listarProductoExterno(){


    $posts = $this->ModeloProductoExterno->listarProductoExterno();
    echo json_encode($posts);

}

public function getLocales(){
  //$locales= $this->input->pots('tienda')

  $posts = $this->ModeloProductoExterno->listarLocales();
  echo json_encode($posts);

}
public function verProductosExt(){


    $posts = $this->ModeloProductoExterno->verProductosExt();
    echo json_encode($posts);

}



# Agregar nuevo Producto Externo
	public function agregarProductoExterno(){


		if ($this->input->is_ajax_request()) {

      $ajax_data = array(

          'producto' => $this->input->post('producto'),
          'tipo' => $this->input->post('tipo'),
          'pieza' => $this->input->post('pieza'),
	        'precio' => $this->input->post('precio'),
          'total' => $this->input->post('total'),
          'tienda_externa' => $this->input->post('tienda'),
          'fecha' => $this->input->post('fecha'),
	      );
        if ($this->ModeloProductoExterno->agregarProductoExterno($ajax_data)) {
					$data = array('res' => "success", 'message' => "¡Registro agregado!");
	  		} else {
					$data = array('res' => "error", 'message' => "¡Error! :(");
				}

	 		echo json_encode($data);





		} else {
			echo "No se permite este acceso directo...!!!";
		}
	}



# Eliminar Apertura

public function eliminarProductoExt(){

	if ($this->input->is_ajax_request()) {
		$del_id = $this->input->post('del_id');
	if ($this->ModeloProductoExterno->delete_entry($del_id)) {

			$data = array('responce' => "success");
	} else {

			$data = array('responce' => "error", "No se pudo eliminar...!");
	}
		echo json_encode($data);
	} else {
		echo "No se permite este acceso directo...!!!";
	}
}

public function editarProductoExt(){

	if ($this->input->is_ajax_request()) {

		$edit_id = $this->input->post('edit_id');
		if ($post = $this->ModeloProductoExterno->single_entry($edit_id)) {
			$data = array('responce' => "success", "post" => $post);
		}else{
			$data = array('responce' => "error", "failed to fetch");
		}
		echo json_encode($data);
	}else {
		echo "No se permite este acceso directo...!!!";
	}
}

public function updateProductoExt(){

	if ($this->input->is_ajax_request()) {


			$id_pe = $this->input->post('id_pe');

			$ajax_data = array(

				'producto' => $this->input->post('producto'),
        'tipo' => $this->input->post('tipo'),
        'pieza' => $this->input->post('pieza'),
        'precio' => $this->input->post('precio'),
				'total' => $this->input->post('total'),
        'tienda_externa' => $this->input->post('tienda'),
        'fecha' => $this->input->post('fecha'),
			);


			if ($this->ModeloProductoExterno->actualizarProductoExt($id_pe,$ajax_data)) {
				//
				$data = array('responce' => "success", 'message' => "¡Producto actualizado!");
				} else {
          $data = array('responce' => "error", 'message' => "Error al agregar datos...!");
					//$data = array('responce' => "error", 'message' => "");
				}

			echo json_encode($data);
		}else {
			echo "No se permite este acceso directo...!!!";
		}
}	// Fin de funcion editar



# Agregar nuevo Producto Externo
	public function agregarProductoExternoFinal(){
    $data='';
    $resultados = $this->ModeloProductoExterno->getProductosExternos();


    //$filas=$resultados->result();	# Numero total de filas
    if ($resultados != null || $resultados != '') {
      // code...





    foreach ($resultados->result() as $row){

      $ajax_data = array(
          'nombre' => $row->producto,
          'tipo' => $row->tipo,
          'pieza' => $row->pieza,
	        'precio' => $row->precio,
          'total' => $row->total,
          'tienda_externa' => $row->tienda_externa,
          'fecha' => $row->fecha,
	      );
        // Agrega productos en la tabla pructos
        $ajax_datap = array(
            'nombre_producto' => $row->producto,
            'tipo_producto' => $row->tipo,
  	        'precio' => $row->precio,
            'cantidad' => $row->pieza,
            'fecha_de_caducidad' => 'Sin fecha de caducidad',
            'id_proveedor' => 1,
            'fecha' => $row->fecha,
  	      );

        if ($this->ModeloProductoExterno->agregarProductoExternoFinal($ajax_data)) {
          $this->ModeloProductoExterno->agregarProductoExternoFinalP($ajax_datap);
          $this->ModeloProductoExterno->eliminarProductoExternoFinal();

      			$data = array('responce' => "success");
      	}


        //$this->ModeloProductoExterno->agregarProductoExternoFinal($ajax_data);

    }
}

else {

      $data = array('responce' => "error");
  }

      echo json_encode($data);

	}



}  // Fin del controller
