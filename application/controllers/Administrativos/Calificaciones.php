<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calificaciones extends CI_Controller {

	   public function __construct(){
	 	 parent::__construct();
		 $this->load->helper(array('form', 'url'));
	 	 $this->load->library(array('session', 'form_validation'));
	 	 $this->load->model("Modelo_Calificaciones");
	 }
	
	 

	 
	public function index(){
		$data = array(
			// 'tipoDePagos' => $this->Modelo_DarAccesoAlumnos->getTipoDePagos(),
			'username' => $this->session->userdata('username'),
			'rol' => $this->session->userdata('rol'),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		 $this->load->view('admin/Vistas_administrativos/VistaAlumnosPorSemestre',$data);
		$this->load->view('layouts/footer');
	}


/***
 * 
 * 
 * 
 * public function VistaCalificacionesPorSemestre(){
		$data = array(
			// 'tipoDePagos' => $this->Modelo_DarAccesoAlumnos->getTipoDePagos(),
			'username' => $this->session->userdata('username'),
			'rol' => $this->session->userdata('rol'),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		 $this->load->view('admin/Vistas_administrativos/VistaAlumnosPorSemestre',$data);
		$this->load->view('layouts/footer');
	}
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 */
	

	public function vermateriasdelprofesor(){
			
		$carrera = $this->input->post('carrera');
		$opcion = $this->input->post('opcion');
		$semestre = $this->input->post('semestre');
		$profesor = $this->input->post('profesor');
		$ciclo = $this->input->post('ciclo');
		$posts = $this->Modelo_Calificaciones->obtenermaterias($carrera,$opcion,$semestre,$profesor,$ciclo);
		echo json_encode($posts);
	}

	public function obtenercarreras(){
		$posts = $this->Modelo_Calificaciones->obtenercarreras();
		echo json_encode($posts);

	}

	public function obteneropciones(){
		$posts = $this->Modelo_Calificaciones->obteneropciones();
		echo json_encode($posts);

	}
	public function veralumnos_asignados_ala_materia_del_profesor(){
		$edit_id = $this->input->post('materia');
		$ciclo = $this->input->post('ciclo');
		$profesor = $this->input->post('profesor');
		$posts = $this->Modelo_Calificaciones->alumnos_asignados_a_la_materia_del_profesor($edit_id,$ciclo,$profesor);
		echo json_encode($posts);
	}
	public function veralumnos_asignados_porcarrera_opcion(){
		$carrera = $this->input->post('carrera');
		$opcion = $this->input->post('opcion');
		$cuatrimestre = $this->input->post('cuatrimestre');
		$posts = $this->Modelo_Calificaciones->alumnos_asignados_a_la_carrera_y_opcion_administrativo($carrera,$opcion,$cuatrimestre);
		echo json_encode($posts);
	}
	public function viewalumno(){
		if ($this->input->is_ajax_request()) {
			$view_id = $this->input->post('view_id');
			if ($post = $this->Modelo_Alumnos->ficha_alumno($view_id)) {
				$data = array('responce' => "success", "post" => $post);
			}else{
				$data = array('responce' => "error", "failed to fetch");
			}
			echo json_encode($data);
		}else {
			echo "No se permite este acceso directo...!!!";
		}
	}

	public function moveralumno_desemestre(){
		if ($this->input->is_ajax_request()) {	
			$tabla = 'Calificaciones';
			$id_detalle = $this->input->post('detalle');
			$ciclo = $this->input->post('ciclo');
			if ($this->Modelo_Calificaciones->sepuede_mover_desemestre($tabla,$id_detalle,$ciclo)==0) {

				$estado_del_alumno = $this->Modelo_Calificaciones->estado_del_alumno($id_detalle);
				if($estado_del_alumno['estado']=='En_curso'){
					if($this->Modelo_Calificaciones->mover_alumno_al_siguiente_senestre($id_detalle)){
						$data = array('response' => "success", 'message' => "Se mueve el alumno al siguiente semestre");
						$promedio = $this->Modelo_Calificaciones->promedio($id_detalle,$ciclo);
						$ajax_data['promedio'] = $promedio['promedio'];
						$ajax_data['estado'] = "Completo";
						$this->Modelo_Calificaciones->agregar_promedio_y_estado($id_detalle,$ajax_data);
						$ajax_data2['estatus'] = 0;
						$this->Modelo_Calificaciones->actualizar_alumno_a_cero($estado_del_alumno['alumno'],$ajax_data2);
					}
				}else{
					$data = array('response' => "success", 'message' => "El alumno: ".$estado_del_alumno['alumno']." tiene el estado: ".$estado_del_alumno['estado']." ");
				}
               
			} else {
			  $data = array('response' => "error", 'message' => "No se mueve el alumno al siguiente semestre");
			}

			echo json_encode($data);			
			}
		  else{
			echo "No se permite este acceso directo...!!!";
		}
	}
	public function updatecalificacion(){
		if ($this->input->is_ajax_request()) {	
			
				$id_detalle = $this->input->post('detalle');
				$materia = $this->input->post('materia');
				$ciclo = $this->input->post('ciclo');
				$profesor = $this->input->post('profesor');
				if ($post = $this->Modelo_Calificaciones->sepuede_agregar_calificacion($id_detalle,$materia,$profesor,$ciclo)) {
					if($post = $this->Modelo_Calificaciones->sepuede_insertar_o_actualizar_sobre_profesor($id_detalle,$materia,$ciclo,$profesor)){
						//INSERTA POR PRIMERA VEZ LOS DATOS DE CAPTURA DEL PROFESOR
						$ajax_data['calificacion'] = $this ->input->post('calificacion');
						$ajax_data['ciclo'] = $this ->input->post('ciclo');
						$ajax_data['estado_profesor'] = $this ->input->post('estado_profesor');
						$ajax_data['tiempo_extension'] = $this ->input->post('tiempo_extension');
						$ajax_data['profesor_captura'] = $this ->input->post('profesor_captura');
						$ajax_data['fecha_captura_profesor'] = $this ->input->post('fecha_captura_profesor');
						 if ($this->Modelo_Calificaciones->updatecalificacion($materia,$id_detalle,$ciclo,$profesor,$ajax_data)) {
							 $data = array('response' => "success", 'message' => "Datos actualizados correctamente");
						
						 } else {
						   $data = array('response' => "error", 'message' => "Error al agregar datos...!");
						 }
					}
					else{
                         //ACTUALIZA LOS DATOS DE CAPTURA DEL PROFESOR
						$ajax_data['calificacion'] = $this ->input->post('calificacion');
						$ajax_data['ciclo'] = $this ->input->post('ciclo');
						$ajax_data['estado_profesor'] = $this ->input->post('estado_profesor');
						$ajax_data['tiempo_extension'] = $this ->input->post('tiempo_extension');
						$ajax_data['profesor_actualizacion'] = $this ->input->post('profesor_actualizacion');
						$ajax_data['fecha_actualizacion_profesor'] = $this ->input->post('fecha_actualizacion_profesor');
						 if ($this->Modelo_Calificaciones->updatecalificacion($materia,$id_detalle,$ciclo,$profesor,$ajax_data)) {
							 $data = array('response' => "success", 'message' => "Datos actualizados correctamente");
						 } else {
						   $data = array('response' => "error", 'message' => "Error al agregar datos...!");
						 }
					}
					
				}else{
					$data = array('response' => "error", 'message' => "No puede agregar calificación nuevamente");		
				}
				echo json_encode($data);			
			}
		  else{
			echo "No se permite este acceso directo...!!!";
		}
	}
	public function updatecalificacion_admin(){
		if ($this->input->is_ajax_request()) {	
			
			$id_detalle = $this->input->post('detalle');
				$materia = $this->input->post('materia');
				$ciclo = $this->input->post('ciclo');
				$profesor = $this->input->post('profesor');
				if($post = $this->Modelo_Calificaciones->sepuede_insertar_o_actualizar_sobre_admin($id_detalle,$materia,$ciclo,$profesor)){
					//INSERTA POR PRIMERA VEZ LOS DATOS DE CAPTURA DEL PROFESOR
						$ajax_data['calificacion'] = $this ->input->post('calificacion');
						$ajax_data['ciclo'] = $this ->input->post('ciclo');
						$ajax_data['estado_administrativo'] = $this ->input->post('estado_administrativo');
						$ajax_data['tiempo_extension'] = $this ->input->post('tiempo_extension');
						$ajax_data['administrativo_captura'] = $this ->input->post('administrativo_captura');
						$ajax_data['fecha_captura_administrativo'] = $this ->input->post('fecha_captura_administrativo');
						 if ($this->Modelo_Calificaciones->updatecalificacion($materia,$id_detalle,$ciclo,$profesor,$ajax_data)) {
							 $data = array('response' => "success", 'message' => "Datos actualizados correctamente");
						 } else {
						   $data = array('response' => "error", 'message' => "Error al agregar datos...!");
						 }
					}
					else{
                         //ACTUALIZA LOS DATOS DE CAPTURA DEL PROFESOR
						$ajax_data['calificacion'] = $this ->input->post('calificacion');
						$ajax_data['ciclo'] = $this ->input->post('ciclo');
						$ajax_data['estado_administrativo'] = $this ->input->post('estado_administrativo');
						$ajax_data['tiempo_extension'] = $this ->input->post('tiempo_extension');
						$ajax_data['administrativo_actualizacion'] = $this ->input->post('administrativo_actualizacion');
						$ajax_data['fecha_actualizacion_administrativo'] = $this ->input->post('fecha_actualizacion_administrativo');
						 if ($this->Modelo_Calificaciones->updatecalificacion($materia,$id_detalle,$ciclo,$profesor,$ajax_data)) {
							 $data = array('response' => "success", 'message' => "Datos actualizados correctamente");
						 } else {
						   $data = array('response' => "error", 'message' => "Error al agregar datos...!");
						 }
					}
					
				
				echo json_encode($data);			
			}
		  else{
			echo "No se permite este acceso directo...!!!";
		}
	}
	public function calificacionesymateriasdelalumno(){
		if ($this->input->is_ajax_request()) {
			$id_detalle = $this->input->post('detalle');
			$ciclo = $this->input->post('ciclo');
			$posts = $this->Modelo_Calificaciones->single_entry_calificaciones_por_detalle($id_detalle,$ciclo);
			
			echo json_encode($posts);
		}else {
			echo "No se permite este acceso directo...!!!";
		}
	}

	public function validar_asignacion_calificacion(){
		if ($this->input->is_ajax_request()) {
			$id_detalle = $this->input->post('detalle');
			$materia = $this->input->post('materia');
			$ciclo = $this->input->post('ciclo');
			$profesor = $this->input->post('profesor');
			$licenciatura = $this->input->post('licenciatura');
			$semestre = $this->input->post('semestre');
			$opcion_estudio = $this->input->post('opcion_estudio');
			$fecha_actual = $this->input->post('fin');
			//$fecha_en_base = $this->Modelo_Calificaciones->yasepuedeasignarcalificacion($opcion_estudio,$licenciatura,$semestre,$ciclo,$materia,
			//$profesor,$fecha_actual);
			//$stringDate = $fecha_en_base->format('Y-m-d');

			if($post=$this->Modelo_Calificaciones->yasepuedeasignarcalificacion($opcion_estudio,$licenciatura,$semestre,$ciclo,$materia,
			$profesor,$fecha_actual)){
				$data = array('response' => "success", "message" =>"¡Ya se puede asignar calificación, se encuentra en fechas validas para hcaerlo! ");
			}
			else{
				$data = array('response' => "error", "message" =>"¡Aún no se puede asignar calificación!");
			}
			echo json_encode($data);
		}else {
			echo "No se permite este acceso directo...!!!";
		}
	}

	public function editarcalificacion(){
		if ($this->input->is_ajax_request()) {
			$id_detalle = $this->input->post('detalle');
			$materia = $this->input->post('materia');
			$ciclo = $this->input->post('ciclo');
			$profesor = $this->input->post('profesor');
			$licenciatura = $this->input->post('licenciatura');
			$semestre = $this->input->post('semestre');
			$opcion_estudio = $this->input->post('opcion_estudio');
			$fecha_actual = $this->input->post('fin');
				if ($post = $this->Modelo_Calificaciones->single_entry($id_detalle,$materia,$ciclo,$profesor)) {
					$data = array('response' => "success", "post" => $post);
				}else{
					$data = array('response' => "error", "failed to fetch");
				}
			echo json_encode($data);
		}else {
			echo "No se permite este acceso directo...!!!";
		}
	}
	public function editarcalificacion_admin(){
		if ($this->input->is_ajax_request()) {
			$id_detalle = $this->input->post('detalle');
			$materia = $this->input->post('materia');
			$profesor = $this->input->post('profesor');
			$ciclo = $this->input->post('ciclo');
			if ($post = $this->Modelo_Calificaciones->single_entry_consulta_calificacion_admin($id_detalle,$materia,$profesor,$ciclo)) {
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


}  // Fin del controller
