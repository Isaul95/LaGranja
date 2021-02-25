<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Horarioalumno extends CI_Controller {

		 private $permisos;
	   public function __construct(){
	 	 parent::__construct();
		 $this->load->helper(array('form', 'url'));
	 	 $this->load->library(array('session', 'form_validation'));
		 $this->permisos = $this->backend_lib->control();
	 	 $this->load->model("Modelo_Horarioalumno");
	 }


	public function index(){

		$numero_control =  $this->session->userdata('username');

		$data = array(
			'permisos' => $this->permisos
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/Vistas_administrativos/VistaHorarioalumno',$data);
		$this->load->view('layouts/footer');
	}

//////////////////////////////////////// SELECCIÓN DE MATERIAS ////////////////////////////////////////////////////////
public function horarioyaseleccionado(){
	// $data['estatus'] = $this->input->post('estatus');
	if ($this->input->is_ajax_request()) {
	 $numero_control = $this->input->post('numero_control');
			if ($this->Modelo_Horarioalumno->horarioyaseleccionado($numero_control)) {
				$data = array('responce' => 'success', 'message' => "¡Horario asignado!");
			} else {
				// $data = array('responce' => 'error', 'message' => 'No ha realizado el Registro de su Comprobante de pago...!!!');
				$data = array('responce' => 'error');
			}
	echo json_encode($data);
} else {
	echo "No se permite este acceso directo...!!!";
}
}
public function materiasparaelegir(){
	if ($this->input->is_ajax_request()) {

	
	$licenciatura = $this->input->post('licenciatura');
	$semestre = $this->input->post('semestre');
	$opcion = $this->input->post('opcion');
	$ciclo = $this->input->post('ciclo');

	$posts = $this->Modelo_Horarioalumno->obtenermateriasaelegir($licenciatura,$semestre,$opcion,$ciclo);

	echo json_encode($posts);
} else {
	echo "No se permite este acceso directo...!!!";
}
}
public function materiaselegidas(){
	if ($this->input->is_ajax_request()) {

	$numero_control = $this->input->post('numero_control');
	$ciclo = $this->input->post('ciclo');
	$posts = $this->Modelo_Horarioalumno->obtenermateriasaelegidas($numero_control,$ciclo);

	echo json_encode($posts);
} else {
	echo "No se permite este acceso directo...!!!";
}
}

public function licenciaturadelalumno(){

	if ($this->input->is_ajax_request()) {
	$numero_control = $this->input->post('numero_control');
	$post = $this->Modelo_Horarioalumno->obtenerlicenciaturadelalumno($numero_control);
	$data = array('responce' => "success", "post" => $post);
	echo json_encode($data);
} else {
	echo "No se permite este acceso directo...!!!";
}
}

public function opciondelalumno(){
	if ($this->input->is_ajax_request()) {
	$numero_control = $this->input->post('numero_control');
	$post = $this->Modelo_Horarioalumno->obteneropciondelalumno($numero_control);
	$data = array('responce' => "success", "post" => $post);
	echo json_encode($data);
} else {
	echo "No se permite este acceso directo...!!!";
}
}

public function semestredelalumno(){
	if ($this->input->is_ajax_request()) {
	$numero_control = $this->input->post('numero_control');
	$post = $this->Modelo_Horarioalumno->obtenersemestredelalumno($numero_control);
	$data = array('responce' => "success", "post" => $post);
	echo json_encode($data);
} else {
	echo "No se permite este acceso directo...!!!";
}
}

public function agregar_materia(){
	if ($this->input->is_ajax_request()) {

						$ajax_data = $this->input->post();
						$ajax_data['estado_profesor'] = 0;
						$ajax_data['calificacion'] = 0;
						$detalle = $this->input->post('detalle');
						$materia = $this->input->post('materia');
						$ciclo = $this->input->post('ciclo');
						$profesor = $this->input->post('profesor');
						if($post = $this->Modelo_Horarioalumno->materiayaagregada($detalle,$materia,$ciclo)){
							$data = array('res' => "error", 'message' => "");
						}
						else{

							if ($this->Modelo_Horarioalumno->insertar_materia($ajax_data)) {
								$data = array('responce' => "success");
							} else {
								$data = array('res' => "error", 'message' => "");
							}
						}

					echo json_encode($data);
	} else {
		echo "No se permite este acceso directo...!!!";
	}

}
public function removermateria(){
	if ($this->input->is_ajax_request()) {
		$detalle = $this->input->post('detalle');
		$materia = $this->input->post('materia');
		$ciclo = $this->input->post('ciclo');
		$profesor = $this->input->post('profesor');
		$horario = $this->input->post('horario');
	if ($this->Modelo_Horarioalumno->delete_entry($detalle,$materia,$ciclo,$profesor,$horario)) {
			$data = array('responce' => "success");
	} else {
			$data = array('responce' => "error", "No se pudo eliminar...!");
	}
		echo json_encode($data);
	} else {
		echo "No se permite este acceso directo...!!!";
	}
}
public function alumnoencurso(){
	if ($this->input->is_ajax_request()) {

		$alumno = $this->input->post('alumno');
		$carrera = $this->input->post('carrera');
		$opcion = $this->input->post('opcion');
		$cuatrimestre = $this->input->post('cuatrimestre');
		$ciclo = $this->input->post('ciclo_escolar');
		$ajax_data['estado'] = $this ->input->post('estado');
				if ($this->Modelo_Horarioalumno->update_alumno_en_curso($alumno,$carrera,$opcion,$cuatrimestre,$ciclo,$ajax_data)) {
			$data = array('response' => "success", 'message' => "Datos actualizados correctamente");
		} else {
			$data = array('response' => "error", 'message' => "Error al agregar datos...!");
		}




		echo json_encode($data);

		}
	  else{
		echo "No se permite este acceso directo...!!!";
	}
}
public function verperiodo_activo_agregar_horario()
	{
		$posts = $this->Modelo_Horarioalumno->periodo_activo();
		echo json_encode($posts);
	}



		/* -------------------------------------------------------------------------- */
		/*                      5.- Generar Constancia Alumno                       */
		/* --------------------------------------- ---------------------------------- */

		public function generaConstanciaAlumno($numero_control,$detalle){
			/*
			* Se crea la function para hacer el llamado en el js
		   * se hace todo la parte del reporte
			*/
			error_reporting(0);

			include_once('src/phpjasperxml_0.9d/class/tcpdf/tcpdf.php');
		  include_once("src/phpjasperxml_0.9d/class/PHPJasperXML.inc.php");

			// SE HACE LA CONECION PARA CADA HOJA DE ESTAS
			$server = "localhost";
			$user = "root";
			$pass = "";
			$db = "cesvi_webapp";

			$PHPJasperXML = new PHPJasperXML();
		// $PHPJasperXML->debugsql=true;
	 // 	$PHPJasperXML-> debugsql = false; // Si desea ver la setencia del sql del reporte lo pones en true

		$PHPJasperXML->arrayParameter=array("nunControl"=>$numero_control,"detall"=>$detalle);

		$PHPJasperXML->load_xml_file("src/ReportesPDF_Cesvi_jrxml/constancia_estudiante.jrxml");

		$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
		$PHPJasperXML->outpage('I','ConstanciaAlumno_'.$numero_control.'.pdf');

		}


}  // Fin del controller
