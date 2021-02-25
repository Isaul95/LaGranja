<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tramites extends CI_Controller {

		 private $permisos;
	   public function __construct(){
	 	 parent::__construct();
		 $this->load->helper(array('form', 'url'));
	 	 $this->load->library(array('session', 'form_validation'));
		 $this->permisos = $this->backend_lib->control();
	 	 $this->load->model("Modelo_DarAccesoAlumnos");
	 }


	public function index(){

		$numero_control =  $this->session->userdata('username');

		$data = array(
			'permisos' => $this->permisos,
			'tipoDePagos' => $this->Modelo_DarAccesoAlumnos->getTipoDePagos(),
			'nombres' => $this->session->userdata('nombres'),
			'username' => $this->session->userdata('username'),
		//  consulta de datos para rellenar los txt en la cista reticula avamce
			'datosTxt' => $this->Modelo_DarAccesoAlumnos->consultaDatosPersonalesDelAlumnos($numero_control),
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/Vistas_Alumno/VistaAlumnoSubirBaucher',$data);
		$this->load->view('layouts/footer');
	}


	/* -------------------------------------------------------------------------- */
	/*                               Insert Records                               */
	/* -------------------------------------------------------------------------- */
	
	public function insertarBaucherDelBanco(){

		if ($this->input->is_ajax_request()) {

			$this->form_validation->set_rules('numero_control', 'Número de control', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data = array('res' => "error", 'message' => validation_errors());
			} else {
				$config['upload_path'] = "./assets/template/dist/img/uploads";
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$config['max_size']     = '1000';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload("archivo")) {
					$data = array('res' => "error", 'message' => $this->upload->display_errors());
				} else {
				  $file_name = $_FILES['archivo']['name'];
					$file_size = $_FILES['archivo']['size'];
					$file_tmp = $_FILES['archivo']['tmp_name'];
					$file_type = $_FILES['archivo']['type'];

					$imagen_temporal = $file_tmp;
					$tipo = $file_type;

					$fp = fopen($imagen_temporal, 'r+b');
					$binario = fread($fp, filesize($imagen_temporal));
					fclose($fp);

					$ajax_data = $this->input->post();
					$ajax_data['archivo'] = $binario; // Documento pdf
					$ajax_data['nombre_archivo'] = $this->upload->data('file_name'); // name file

					if ($this->Modelo_DarAccesoAlumnos->insert_baucher($ajax_data)) {
						$data = array('res' => "success", 'message' => "Archivo guardado correctamente...!");
					} else {
						$data = array('res' => "error", 'message' => "Error al guardado el archivo...!");
					}
				}
			}
			echo json_encode($data);
		} else {
			echo "No se permite este acceso directo...!!!";
		}
	}



		/* -------------------------------------------------------------------------- */
		/*       Datos generales del alumno para GENERAR DOCUMENTACION AlumnoS        */
		/* --------------------------------------- ---------------------------------- */
			public function consultaAlumnosPaDocumentos(){
						$semestre = $this->input->post('semestre');
						$licenciatura = $this->input->post('licenciatura');
						$opciones = $this->input->post('opciones');
						$numero_control = $this->input->post('numero_control');
				$posts = $this->Modelo_DarAccesoAlumnos->obtenerDatosGenerarDocsDelAlumno($semestre,$licenciatura,$opciones, $numero_control);
				echo json_encode($posts);
			}



// LLENAR COMBO DE SEMESTRES
	public function obtenerSemestre(){
		$posts = $this->Modelo_DarAccesoAlumnos->obtenerSemestreCombo();
		echo json_encode($posts);

	}


		public function consultaCountAlumnos(){
					// $data['estatus'] = $this->input->post('estatus');
	 				$numero_control = $this->input->post('numero_control');
							if ($this->Modelo_DarAccesoAlumnos->consultaCountAlumnosXxx($numero_control)) {
								$data = array('responce' => 'success', 'message' => '¡Comprobante de pago registrado!');
							} else {
								// $data = array('responce' => 'error', 'message' => 'No ha realizado el Registro de su Comprobante de pago...!!!');
								$data = array('responce' => 'error');
							}
					echo json_encode($data);
		}


			public function verBaucher($numero_control){
				$consulta = $this->Modelo_DarAccesoAlumnos->getBaucherId($numero_control);
				$archivo = $consulta['archivo'];
				$img = $consulta['nombre_archivo'];
				header("Content-type: application/pdf");
				header("Content-Disposition: inline; filename=$img.pdf");
				print_r($archivo);
			}


		public function consultaHistDePagosXAlumnos($numero_control){
			$semestre = $this->input->post('semestre');
			$tipoPago = $this->input->post('tipoPago');

			$posts = $this->Modelo_DarAccesoAlumnos->obtenerHistorialDePagosXAlumnos($numero_control,  $semestre, $tipoPago);

			echo json_encode($posts);
		}


		public function consultaAvanceReticulaXAlumnos(){
			$numero_control = $this->input->post('numero_control');
			$id_detalle = $this->input->post('id_detalle');
			$semestre = $this->input->post('semestre');
			$posts = $this->Modelo_DarAccesoAlumnos->obtenerAvanceReticulaXAlumnos($numero_control, $semestre, $id_detalle);
			echo json_encode($posts);
		}


		public function consultaAvanceReticulaXMateriasCursadas(){
			$numero_control = $this->input->post('numero_control');
			$id_detalle = $this->input->post('id_detalle');
			$semestre = $this->input->post('semestre');
			$posts = $this->Modelo_DarAccesoAlumnos->obtenerAvanceReticulaXMateriasCursadas($numero_control, $semestre, $id_detalle);
			echo json_encode($posts);
		}



		public function verReciboFirmadoValidado($id_recibo_valido){
			$consulta = $this->Modelo_DarAccesoAlumnos->getReciboValidado($id_recibo_valido);
			$archivo = $consulta['archivo'];
			$img = $consulta['nombre_archivo'];
			header("Content-type: application/pdf");
			header("Content-Disposition: inline; filename=$img.pdf");
			print_r($archivo);
		}


		public function obtenerTiposDePagosHistPagosAlumnos(){
				$posts = $this->Modelo_DarAccesoAlumnos->consultarTiposDePagosHistPagosAlumnos();
				echo json_encode($posts);
			}


		/* -------------------------------------------------------------------------- */
		/*                      1.- Generar Horario Alumno                       */
		/* --------------------------------------- ---------------------------------- */

public function generaHorarioAlumno($numero_control,$semestre, $detalle){
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

// $PHPJasperXML->arrayParameter=array("class_id"=>"'" .$p1. "'","student_name"=>"'" .$p2."'"); // EXAMPLE: MULTIPLES PARAMETRPS
			$PHPJasperXML->arrayParameter=array("num_control"=>$numero_control,"Dsemestre"=>$semestre,"Ddetalle"=>$detalle);
			// $PHPJasperXML->arrayParameter=array("parameter1"=>1);

$PHPJasperXML->load_xml_file("src/ReportesPDF_Cesvi_jrxml/Horarios.jrxml");

		 	$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
		  // $PHPJasperXML->outpage('I','HistorialAcademico_.pdf');
		  $PHPJasperXML->outpage('I','Horario_'.$numero_control.'.pdf');

			}

//////////////////////////////////////// SELECCIÓN DE MATERIAS ////////////////////////////////////////////////////////
public function horarioyaseleccionado(){
	// $data['estatus'] = $this->input->post('estatus');
	if ($this->input->is_ajax_request()) {
	 $numero_control = $this->input->post('numero_control');
			if ($this->Modelo_DarAccesoAlumnos->horarioyaseleccionado($numero_control)) {
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

	$numero_control = $this->input->post('numero_control');
	$licenciatura = $this->input->post('licenciatura');
	$semestre = $this->input->post('semestre');
	$opcion = $this->input->post('opcion');
	$ciclo = $this->input->post('ciclo');

	$posts = $this->Modelo_DarAccesoAlumnos->obtenermateriasaelegir($numero_control,$licenciatura,$semestre,$opcion,$ciclo);

	echo json_encode($posts);
} else {
	echo "No se permite este acceso directo...!!!";
}
}
public function materiaselegidas(){
	if ($this->input->is_ajax_request()) {

	$numero_control = $this->input->post('numero_control');
	$ciclo = $this->input->post('ciclo');
	$posts = $this->Modelo_DarAccesoAlumnos->obtenermateriasaelegidas($numero_control,$ciclo);

	echo json_encode($posts);
} else {
	echo "No se permite este acceso directo...!!!";
}
}

public function licenciaturadelalumno(){

	if ($this->input->is_ajax_request()) {
	$numero_control = $this->input->post('numero_control');
	$post = $this->Modelo_DarAccesoAlumnos->obtenerlicenciaturadelalumno($numero_control);
	$data = array('responce' => "success", "post" => $post);
	echo json_encode($data);
} else {
	echo "No se permite este acceso directo...!!!";
}
}

public function opciondelalumno(){
	if ($this->input->is_ajax_request()) {
	$numero_control = $this->input->post('numero_control');
	$post = $this->Modelo_DarAccesoAlumnos->obteneropciondelalumno($numero_control);
	$data = array('responce' => "success", "post" => $post);
	echo json_encode($data);
} else {
	echo "No se permite este acceso directo...!!!";
}
}

public function semestredelalumno(){
	if ($this->input->is_ajax_request()) {
	$numero_control = $this->input->post('numero_control');
	$post = $this->Modelo_DarAccesoAlumnos->obtenersemestredelalumno($numero_control);
	$data = array('responce' => "success", "post" => $post);
	echo json_encode($data);
} else {
	echo "No se permite este acceso directo...!!!";
}
}

public function agregar_materia(){
	if ($this->input->is_ajax_request()) {

						$ajax_data = $this->input->post();
						$detalle = $this->input->post('detalle');
						$materia = $this->input->post('materia');
						$ciclo = $this->input->post('ciclo');
						$profesor = $this->input->post('profesor');
						if($post = $this->Modelo_DarAccesoAlumnos->materiayaagregada($detalle,$materia,$ciclo)){
							$data = array('res' => "error", 'message' => "");
						}
						else{

							if ($this->Modelo_DarAccesoAlumnos->insertar_materia($ajax_data)) {
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
	if ($this->Modelo_DarAccesoAlumnos->delete_entry($detalle,$materia,$ciclo,$profesor,$horario)) {
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
				if ($this->Modelo_DarAccesoAlumnos->update_alumno_en_curso($alumno,$carrera,$opcion,$cuatrimestre,$ciclo,$ajax_data)) {
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
		$posts = $this->Modelo_DarAccesoAlumnos->periodo_activo();
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
