<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controller_RegistroPago extends CI_Controller {


	public function __construct(){ // crear constructor
	 	 parent::__construct();   // hereda
	 	 $this->load->model("Modelo_RegistroPago");
	 }


	public function index()
	{
		$data = array('RegistroPago' => $this->Modelo_RegistroPago->getRegistroPago(),
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
/*   >Mostrar_comida< == carpeta dentro de la vista/admin y  >list<== file k hace la consulta   */
	   $this->load->view('admin/Vistas_RegistroPago/lista_RegistroPago', $data);/*la vista k contrendra el contenido*/
		$this->load->view('layouts/footer');
	}


	// public function index()
	//   {
	//     $this->load->view('header');
	//    $this->load->view('layouts/aside');
	//     $this->load->view('main', $data);
	//     $this->load->view('footer');
	//   }


public function addFile(){  // INSERTAR EL DOCUMENTO ALA BASE

$nombre = $this->input->post("nombre");

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
'nombre' => $nombre
);

$this->Modelo_RegistroPago->insertarDoc("finan_registro_de_pago", $data);


}






	public function agregar_RegistroPago(){

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
	   $this->load->view('admin/Vistas_RegistroPago/agregar_RegistroPago');/*la vista k contrendra el contenido*/
		$this->load->view('layouts/footer');
	}


	public function captura_inputs(){  // ESTE METHOD ES PARA LLAMAR LOS INPUT EL DATO K SE INGRESA DENTRO DE CADA INPUT
		$Nombre_Completo_del_Alumno = $this->input->post("alumno_nombre_completo");
		$Número_de_Control = $this->input->post("numero_control");
		$Carrera = $this->input->post("carrera");
    $Semestre = $this->input->post("semestre");

	 $this->form_validation->set_rules("alumno_nombre_completo","Nombre del Alumno...","required");
   $this->form_validation->set_rules("numero_control", "Numero de control...", "required");
   $this->form_validation->set_rules("carrera", "Carrera...", "required");
   $this->form_validation->set_rules("semestre", "Semestre...", "required");



   if ($this->form_validation->run()) {

      	 $data = array(
      'alumno_nombre_completo' => $Nombre_Completo_del_Alumno,
			'numero_control' => $Número_de_Control,
			'carrera' => $Carrera,
			'semestre' => $Semestre,
		);


	   if ($this->Modelo_RegistroPago->guardar_RegistroPago($data)) {
		    	redirect(base_url()."mantenimiento/Controller_RegistroPago");
		    } else{
		    	$this->session->set_flashdata("error", " ERROR: NO SE GUARDARON LOS DATOS");
		    	  redirect(base_url()."mantenimiento/Controller_RegistroPago/agregar_RegistroPago");
		       }
        }
        else{
           	   $this->agregar_RegistroPago();
           }
	}


	public function edit($id_comida){

	 	$data = array(
			'comida' => $this->menu_model->getComida($id_comida)
		);
	 	$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/comida/edit', $data);
		$this->load->view('layouts/footer');
	 }

	 public function update(){

        $idProductos = $this->input->post("idProductos");
        $nombre_de_categoria = $this->input->post("nombre_de_categoria");
		$precio_asada = $this->input->post("precio_asada");
		$precio_chorizo = $this->input->post("precio_chorizo");

		$precio_campechano_a = $this->input->post("precio_campechano_a");
		$precio_barbacha = $this->input->post("precio_barbacha");
		$precio_costilla = $this->input->post("precio_costilla");

		$precio_sencilla = $this->input->post("precio_sencilla");
		$descripcion = $this->input->post("descripcion");


        $data = array(
        	'nombre_de_categoria' => $nombre_de_categoria,
			'precio_asada' => $precio_asada,
			'precio_chorizo' => $precio_chorizo,

			'precio_campechano_a' => $precio_campechano_a,
			'precio_barbacha' => $precio_barbacha,
			'precio_costilla' => $precio_costilla,

			'precio_sencilla' => $precio_sencilla,
			'descripcion' => $descripcion,


		);

		if ($this->menu_model->update($idProductos, $data)) {
			  redirect(base_url()."mantenimiento/comida");
		} else{
                $this->session->set_flashdata("error", " ERROR: NO SE ACTUALIZARÓN LOS DATOS");
		    	  redirect(base_url()."mantenimiento/comida/edit".$idProductos);
		}
	 }


public function delete($id_comida){
	 	$data = array(
	 		'id_comida' => $id_comida,
	 	);

	 	$this->menu_model->delete($data);
			redirect(base_url()."mantenimiento/comida");
  // https://www.youtube.com/watch?v=3mdQdjc-dhA&list=PLsk-U_4GoSVMz3OzYGN7ZJWOm-rx2FvwS&index=14   --------ELIMINAR
	 }



}
