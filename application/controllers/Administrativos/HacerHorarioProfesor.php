<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HacerHorarioProfesor extends CI_Controller {

	   public function __construct(){
	 	 parent::__construct();
		 $this->load->helper(array('form', 'url'));
	 	 $this->load->library(array('session', 'form_validation'));
	 	 $this->load->model("Modelo_HacerHorarioProfesor");
	 }






	public function index(){
		$data = array(
			// 'tipoDePagos' => $this->Modelo_DarAccesoAlumnos->getTipoDePagos(),
			'username' => $this->session->userdata('username'),
			'rol' => $this->session->userdata('rol'),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/Vistas_administrativos/VistaHacerHorarioProfesor',$data);
		$this->load->view('layouts/footer');
	}

	public function ver_si_tiene_horario_asignado(){
		if ($this->input->is_ajax_request()) {
		$id_profesores = $this->input->post('id_profesores');
		$post = $this->Modelo_HacerHorarioProfesor->obtener_horario_asginado_estado($id_profesores);
		$data = array('responce' => "success", "post" => $post);
		echo json_encode($data);
	} else {
		echo "No se permite este acceso directo...!!!";
	}
	}
	public function eliminarhorario()
{
	if ($this->input->is_ajax_request()) {

		$profesor = $this->input->post('profesor');
		$materia = $this->input->post('materia');
		$ciclo = $this->input->post('ciclo');

		if ($this->Modelo_HacerHorarioProfesor->delete_entry($profesor,$materia,$ciclo)) {
			$data = array('responce' => "success");
	    } else {
			$data = array('responce' => "error", "No se pudo eliminar...!");
	    }

		echo json_encode($data);
	} else {
		echo "No se permite este acceso directo...!!!";
	}
}
	public function materias_asignadas(){

		$profesor = $this->input->post('profesor');
		$ciclo = $this->input->post('ciclo');
		$semestre = $this->input->post('semestre');
		$posts = $this->Modelo_HacerHorarioProfesor->horario_asignado_al_profesor($profesor,$ciclo,$semestre);
		echo json_encode($posts);
	}
	public function agregarhorario(){
		if ($this->input->is_ajax_request()) {
		$ajax_data = $this->input->post();

		$opcion_estudio = $this->input->post('opcion_estudio');
		$semestre = $this->input->post('semestre');
		$licenciatura = $this->input->post('licenciatura');
		$profesor = $this->input->post('profesor');
		$materia = $this->input->post('materia');
		$ciclo = $this->input->post('ciclo');

		if ($post = $this->Modelo_HacerHorarioProfesor->hoario_profesor_ya_asignado($profesor)) {
			$data = array('response' => "error", 'message' => "¡Horario del profesor ya asignado, habilite para continuar!");
		}
		else{
			if ($post = $this->Modelo_HacerHorarioProfesor->sepuede_agregar_materia($opcion_estudio,$semestre,$licenciatura,$profesor,$ciclo,$materia)) {
				$data = array('response' => "error", 'message' => "No se puede repetir la materia");

			}
			else{
				if ($this->Modelo_HacerHorarioProfesor->insert_entry($ajax_data)) {
					//	$data = array('response' => "success", 'message' => "Se agrega materia ".$materia." correctamente");
					$data = array('response' => "success", 'message' => "Se agrega materia correctamente");
					} else {
						$data = array('response' => "error", 'message' => "No se agrega correctamente");
					}
			}
		}

	echo json_encode($data);

		}
  else{
	echo "No se permite este acceso directo...!!!";
}

}


public function confirmar_horario_profesor(){
	if ($this->input->is_ajax_request()) {

		$profesor = $this->input->post('id_profesores');
		$ajax_data['horario_asignado'] = $this ->input->post('horario_asignado');
				if ($this->Modelo_HacerHorarioProfesor->update_horario_profesore_asginado($profesor,$ajax_data)) {
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
	public function vermateriasparaasignaralprofesor(){
		$especialidad = $this->input->post('especialidad');
		$semestre = $this->input->post('semestre');
		$posts = $this->Modelo_HacerHorarioProfesor->obtenermaterias($semestre,$especialidad);
		echo json_encode($posts);
	}

	public function obtenercarreras(){
		$posts = $this->Modelo_HacerHorarioProfesor->obtenercarreras();
		echo json_encode($posts);

	}

	public function obteneropciones(){
		$posts = $this->Modelo_HacerHorarioProfesor->obteneropciones();
		echo json_encode($posts);

	}
	public function obtenerprofesores(){
		$posts = $this->Modelo_HacerHorarioProfesor->obtenerprofesores();
		echo json_encode($posts);

	}
	public function obtenersemestres(){
		$posts = $this->Modelo_HacerHorarioProfesor->obtenersemestres();
		echo json_encode($posts);

	}
	public function veralumnos_asignados_ala_materia_del_profesor(){
		$edit_id = $this->input->post('materia_a_consultar');
		$posts = $this->Modelo_HacerHorarioProfesor->alumnos_asignados_a_la_materia_del_profesor($edit_id);
		echo json_encode($posts);
	}
	public function veralumnos_asignados_porcarrera_opcion(){
		$carrera = $this->input->post('carrera');
		$opcion = $this->input->post('opcion');
		$posts = $this->Modelo_HacerHorarioProfesor->alumnos_asignados_a_la_carrera_y_opcion_administrativo($carrera,$opcion);
		echo json_encode($posts);
	}

	public function updatehorario(){
		if ($this->input->is_ajax_request()) {

				$materia = $this->input->post('materia');
				$ciclo = $this->input->post('ciclo');
				$semestre = $this->input->post('semestre');
				$horario = $this->input->post('horario');
				$profesor = $this->input->post('profesor');

				$nombre_materia = $this->input->post('nombre_materia');

				$tabla = "horarios_profesor";
					if($this->Modelo_HacerHorarioProfesor->materias_iguales($materia,$ciclo,$semestre,$profesor,$tabla,$horario)>0){
						$data = array('response' => "error", 'message' => "Horario ya asignado a la materia: ".$nombre_materia." a otro profesor");

					}else{ // NO HAY MÁS MATERIAS REGISTRADAS EN EL MISMO, SEMESTRE, CICLO, Y CON DIFERENTE PROFESOR

						if($this->Modelo_HacerHorarioProfesor->horarios_iguales($ciclo,$semestre,$tabla,$horario)>0){
							$data = array('response' => "error", 'message' => "Horario ya asignado a otra materia");

						}else{// NO HAY MÁS MATERIAS REGISTRADAS EN EL MISMO HORARIO
					$ajax_data['inicio'] = $this ->input->post('inicio');
					$ajax_data['fin'] = $this ->input->post('fin');
					$ajax_data['ex_final'] = $this ->input->post('ex_final');
					$ajax_data['horario'] = $this ->input->post('horario');
					$ajax_data['salon'] = $this ->input->post('salon');
					 if ($this->Modelo_HacerHorarioProfesor->updatehorario($materia,$ciclo,$semestre,$profesor,$ajax_data)) {
						 $data = array('response' => "success", 'message' => "Datos actualizados correctamente");
					 } else {
					   $data = array('response' => "error", 'message' => "Error al agregar datos...!");
					 }


					}// NO HAY MÁS MATERIAS REGISTRADAS EN EL MISMO HORARIO

					}// NO HAY MÁS MATERIAS REGISTRADAS EN EL MISMO, SEMESTRE, CICLO, Y CON DIFERENTE PROFESOR


			echo json_encode($data);
		}
		  else{
			echo "No se permite este acceso directo...!!!";
		}
	}
	public function editarcalificacion(){
		if ($this->input->is_ajax_request()) {
			$profesor = $this->input->post('profesor');
			$materia = $this->input->post('materia');
			$ciclo = $this->input->post('ciclo');
			if ($post = $this->Modelo_HacerHorarioProfesor->single_entry($profesor,$materia,$ciclo)) {
				$data = array('responce' => "success", "post" => $post);
			}else{
				$data = array('responce' => "error", "failed to fetch");
			}
			echo json_encode($data);
		}else {
			echo "No se permite este acceso directo...!!!";
		}
	}
	/* -------------------------------------------------------------------------- */
	/*                               Insert Records                               */
	/* -------------------------------------------------------------------------- */
	//
	// public function insertarPagos(){
	//
	// 	if ($this->input->is_ajax_request()) {
	// 		$this->form_validation->set_rules('nombre', 'Nombre Alumno', 'required');
	// 		$this->form_validation->set_rules('numero_con', 'Número de control', 'required');
	// 		$this->form_validation->set_rules('carrera', 'Carrera', 'required');
	// 		$this->form_validation->set_rules('semestre', 'Semestre', 'required');
	//
	// 		if ($this->form_validation->run() == FALSE) {
	// 			$data = array('res' => "error", 'message' => validation_errors());
	// 		} else {
	// 			$config['upload_path'] = "./assets/template/dist/img/uploads";
	// 			$config['allowed_types'] = 'gif|jpg|png|pdf';
	// 			$config['max_size']     = '1000';
	// 			// $config['max_width'] = '1024';
	// 			// $config['max_height'] = '768';
	// 			$this->load->library('upload', $config);
	//
	// 			if (!$this->upload->do_upload("archivo")) {
	// 				$data = array('res' => "error", 'message' => $this->upload->display_errors());
	// 			} else {
	//   $file_name = $_FILES['archivo']['name'];
	// 	$file_size = $_FILES['archivo']['size'];
	// 	$file_tmp = $_FILES['archivo']['tmp_name'];
	// 	$file_type = $_FILES['archivo']['type'];
	//
	// 	$imagen_temporal = $file_tmp;
	// 	$tipo = $file_type;
	//
	// 	$fp = fopen($imagen_temporal, 'r+b');
	// 	$binario = fread($fp, filesize($imagen_temporal));
	// 	fclose($fp);
	//
	// 	$ajax_data = $this->input->post();
	// 	$ajax_data['archivo'] = $binario; // Documento pdf
	// 	$ajax_data['img'] = $this->upload->data('file_name'); // name file
	//
	// 				if ($this->Modelo_RegistrosPag->insert_entry($ajax_data)) {
	// 					$data = array('res' => "success", 'message' => "Datos agregados correctamente...!");
	// 				} else {
	// 					$data = array('res' => "error", 'message' => "Error al agregar datos...!");
	// 				}
	// 			}
	// 		}
	// 		echo json_encode($data);
	// 	} else {
	// 		echo "No se permite este acceso directo...!!!";
	// 	}
	//
	// }




	/* -------------------------------------------------------------------------- */
	/*                                Fetch Records                               */
	/* -------------------------------------------------------------------------- */
	//
	// public function listaAccesoAlumnosARecibos() {
	//
	// 	$posts = $this->Modelo_DarAccesoAlumnos->obtenerListaDeAlumnosInscritos();
	// 	echo json_encode($posts);
	//
	// }



	//
	// public function verArchivo($id){
	// 	$consulta = $this->Modelo_RegistrosPag->getArchivoId($id);
	// 	$archivo = $consulta['archivo'];
	// 	$img = $consulta['img'];
	// 	header("Content-type: application/pdf");
	// 	header("Content-Disposition: inline; filename=$img.pdf");
	// 	print_r($archivo);
	//
	// }


	/* -------------------------------------------------------------------------- */
/*                               Delete Records                               */
/* -------------------------------------------------------------------------- */
//
// public function eliminarPagos()
// {
// 	if ($this->input->is_ajax_request()) {
//
// 		$del_id = $this->input->post('del_id');
//
// 		$post = $this->Modelo_RegistrosPag->single_entry($del_id);
//
// 		unlink(APPPATH . '../assets/template/dist/img/uploads/' . $post->img);
//
// 		if ($this->Modelo_RegistrosPag->delete_entry($del_id)) {
// 			$data = array('res' => "success", 'message' => "Datos eliminados con éxito...!");
// 		} else {
// 			$data = array('res' => "error", 'message' => "No se pudo eliminar...!");
// 		}
// 		echo json_encode($data);
// 	} else {
// 		echo "No se permite este acceso directo...!!!";
// 	}
// }
//




/* -------------------------------------------------------------------------- */
/*                  1.- Generar certificado de estudios                       */
/* --------------------------------------- ---------------------------------- */

public function generaHorarioProfesor($profesor,$semestre){   // ,$ciclo
	/*
	 * Se crea la function para hacer el llamado en el js
	 * se hace todo la parte del reporte
	 */
	error_reporting(0);

	include_once('src/phpjasperxml_0.9d/class/tcpdf/tcpdf.php');
	include_once("src/phpjasperxml_0.9d/class/PHPJasperXML.inc.php");

	$server = "localhost";
	$user = "root";
	$pass = "";
	$db = "cesvi_webapp";


	$PHPJasperXML = new PHPJasperXML();

	$PHPJasperXML->arrayParameter=array("profesor"=>$profesor,"semestre"=>$semestre);  // ,"ciclo"=>$ciclo

	$PHPJasperXML->load_xml_file("src/ReportesPDF_Cesvi_jrxml/Horario_profesor.jrxml");

	$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
	$PHPJasperXML->outpage('I','CertificadoEstudios_.pdf');

	
}




}  // Fin del controller
