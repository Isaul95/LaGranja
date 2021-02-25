<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegistrarPagos extends CI_Controller {

	   public function __construct(){
	 	 parent::__construct();
	 	 $this->load->model("Modelo_RegistrarPagos");
	 }
/* =========================== CONTROLADOR -- BEBIDASS ===================================*/

	public function index(){

		  $data = array(
				'RegistrarPagos' => $this->Modelo_RegistrarPagos->getbebidas(),
				'archivos' => $this->Modelo_RegistrarPagos->getArchivos()
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/Vistas_RegistrarPagos/lista_RegistrarPagos', $data);
		$this->load->view('layouts/footer');
	}

	 public function agregar_RegistrarPagos(){

		 $data = array('archivos' => $this->Modelo_RegistrarPagos->getArchivos()
		 );

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/Vistas_RegistrarPagos/agregar_RegistrarPagos', $data);
		$this->load->view('layouts/footer');
	}




		public function captura_inputs(){  // ESTE METHOD ES PARA LLAMAR LOS INPUT EL DATO K SE INGRESA DENTRO DE CADA INPUT
			$Nombre_Completo_del_Alumno = $this->input->post("alumno_nombre_completo");

		 $this->form_validation->set_rules("alumno_nombre_completo","Nombre del Alumno...","required");

	   if ($this->form_validation->run()) {

	      	 $data = array(
	      'alumno_nombre_completo' => $Nombre_Completo_del_Alumno,
			);


		   if ($this->Modelo_RegistrarPagos->guardar_RegistrarPagos($data)) {
			    	redirect(base_url()."mantenimiento/Controller_RegistroPago");
			    } else{
			    	$this->session->set_flashdata("error", " ERROR: NO SE GUARDARON LOS DATOS");
			    	  redirect(base_url()."mantenimiento/Controller_RegistroPago/agregar_RegistrarPagos");
			       }
	        }
	        else{
	           	   $this->agregar_RegistrarPagos();
	           }
		}










public function verArchivo($id){
	$consulta = $this->Modelo_RegistrarPagos->getArchivoId($id);
	$archivo = $consulta['archivo'];
	$nombre = $consulta['nombre'];
	header("Content-type: application/pdf");
	header("Content-Disposition: inline; filename=$nombre.pdf");
	print_r($archivo);

}



		public function addFile(){  // INSERTAR EL DOCUMENTO ALA BASE

		$nombre = $this->input->post("nombre");
		$Nombre_Completo_del_Alumno = $this->input->post("alumno_nombre_completo");

		$file_name = $_FILES['archivo']['name'];
		$file_size = $_FILES['archivo']['size'];
		$file_tmp = $_FILES['archivo']['tmp_name'];
		$file_type = $_FILES['archivo']['type'];

		$imagen_temporal = $file_tmp;
		$tipo = $file_type;

		$fp = fopen($imagen_temporal, 'r+b');
		$binario = fread($fp, filesize($imagen_temporal));
		fclose($fp);

		$data = array(
		'archivo' => $binario,
		'nombre' => $nombre,
		'alumno_nombre_completo' => $Nombre_Completo_del_Alumno
		);

		$this->Modelo_RegistrarPagos->insertarDoc($data);

		}






	public function store(){

		$Nombre_de_Bebida = $this->input->post("nombre_bebida");
		$Precio_de_Bebida = $this->input->post("precio_bebida");
		$Descripcion_de_Bebida = $this->input->post("descripcion_bebida");
		//$Fecha_caducidad = $this->input->post("caducidad");


   $this->form_validation->set_rules("nombre_bebida","Nombre de Bebida del Producto","required|is_unique[bebidas.nombre_bebida]");
   $this->form_validation->set_rules("precio_bebida", "El precio de la bebida", "required");
   $this->form_validation->set_rules("descripcion_bebida", "Descripcion de Bebida", "required");

      if ($this->form_validation->run()) {

      	 $data = array(
      	 	'nombre_bebida' => $Nombre_de_Bebida,
			'precio_bebida' => $Precio_de_Bebida,
			'descripcion_bebida' => $Descripcion_de_Bebida,
			//'Fecha_caducidad' => $Fecha_caducidad,
		);
		    if ($this->Bebidas_model->guardar($data)) {
		    	redirect(base_url()."mantenimiento/bebidas");
		    }  else{
		    	$this->session->set_flashdata("error", " ERROR: NO SE GUARDARON LOS DATOS");
		    	  redirect(base_url()."mantenimiento/bebidas/addBebida");
		       }
        }
           else{
           	   $this->agregar();
           }
	}

	  public function edit($id_bebida){

	 	$data = array(
			'bebidas' => $this->Bebidas_model->getBebida($id_bebida)
		);

	 	$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/bebidas/editbeb', $data);
		$this->load->view('layouts/footer');
	 }

	 public function update(){

	 	$idProductos = $this->input->post("idProductos");
	 	$nombre_bebida = $this->input->post("nombre_bebida");
	 	$precio_bebida = $this->input->post("precio_bebida");
		$descripcion_bebida = $this->input->post("descripcion_bebida");

        $data = array(
        	'nombre_bebida' => $nombre_bebida,
			'precio_bebida' => $precio_bebida,
			'descripcion_bebida' => $descripcion_bebida,
		);

		if ($this->Bebidas_model->update($idProductos, $data)) {
			  redirect(base_url()."mantenimiento/bebidas");
		} else{
                $this->session->set_flashdata("error", " ERROR: NO SE ACTUALIZARÓN LOS DATOS");
		    	  redirect(base_url()."mantenimiento/bebidas/editbeb".$idProductos);
		}
	 }

	 public function delete($id_bebida){
	 	$data = array(
	 		'id_bebida' => $id_bebida,
	 	);

	 	$this->Bebidas_model->delete($data);
			 redirect(base_url()."mantenimiento/bebidas");
  // https://www.youtube.com/watch?v=3mdQdjc-dhA&list=PLsk-U_4GoSVMz3OzYGN7ZJWOm-rx2FvwS&index=14   --------ELIMINAR
	 }

	 public function edit2($id_Productos){

	 	$data = array(
			'productos' => $this->Productos_model->getProducto($id_Productos)
		);

	 	$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/productos/edit2', $data);
		$this->load->view('layouts/footer');
	 }
}
