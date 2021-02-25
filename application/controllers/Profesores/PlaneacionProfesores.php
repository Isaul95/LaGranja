<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PlaneacionProfesores extends CI_Controller {

	   public function __construct(){
	 	 parent::__construct();
		 $this->load->helper(array('form', 'url'));
	 	 $this->load->library(array('session', 'form_validation'));
	 	 $this->load->model("Modelo_PlaneacionesProfesor");
	 }


	 
	public function index(){
		$data = array(
			// 'tipoDePagos' => $this->Modelo_DarAccesoAlumnos->getTipoDePagos(),
			'username' => $this->session->userdata('username'),
			'rol' => $this->session->userdata('rol'),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/Vistas_PlaneacionProfesores/VistaPlaneacionesProfesor',$data);
		$this->load->view('layouts/footer');
	}
	public function materias_asignadas(){
		
		$profesor = $this->input->post('profesor');
		$licenciatura = $this->input->post('licenciatura');
		$semestre = $this->input->post('semestre');
		$opcion = $this->input->post('opciones');
		$posts = $this->Modelo_PlaneacionesProfesor->horario_asignado_al_profesor($profesor,$licenciatura,$semestre,$opcion);
		echo json_encode($posts);
	}
	public function verArchivo($materia,$profesor){
		$consulta = $this->Modelo_PlaneacionesProfesor->getArchivoId($materia,$profesor);
		$archivo = $consulta['planeacion'];
		$img = $consulta['nombre_planeacion'];
		header("Content-type: application/pdf");
		// header("Content-type: application/img");  // para mostrar imagen
		header("Content-Disposition: inline; filename=$img.pdf");
		print_r($archivo);

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
		if ($post = $this->Modelo_PlaneacionesProfesor->sepuede_agregar_materia($opcion_estudio,$semestre,$licenciatura,$profesor,$ciclo,$materia)) {
			$data = array('response' => "error", 'message' => "No se puede repetir la materia");
			
		}
		else{
			if ($this->Modelo_PlaneacionesProfesor->insert_entry($ajax_data)) {
				//	$data = array('response' => "success", 'message' => "Se agrega materia ".$materia." correctamente");
				$data = array('response' => "success", 'message' => "Se agrega materia correctamente");
				} else {
					$data = array('response' => "error", 'message' => "No se agrega correctamente");
				}		
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
		$posts = $this->Modelo_PlaneacionesProfesor->obtenermaterias($semestre,$especialidad);
		echo json_encode($posts);
	}

	public function obtenercarreras(){
		$posts = $this->Modelo_PlaneacionesProfesor->obtenercarreras();
		echo json_encode($posts);

	}

	public function obteneropciones(){
		$posts = $this->Modelo_PlaneacionesProfesor->obteneropciones();
		echo json_encode($posts);

	}

	public function obtenersemestres(){
		$posts = $this->Modelo_PlaneacionesProfesor->obtenersemestres();
		echo json_encode($posts);

	}
	public function veralumnos_asignados_ala_materia_del_profesor(){
		$edit_id = $this->input->post('materia_a_consultar');
		$posts = $this->Modelo_PlaneacionesProfesor->alumnos_asignados_a_la_materia_del_profesor($edit_id);
		echo json_encode($posts);
	}
	public function veralumnos_asignados_porcarrera_opcion(){
		$carrera = $this->input->post('carrera');
		$opcion = $this->input->post('opcion');
		$posts = $this->Modelo_PlaneacionesProfesor->alumnos_asignados_a_la_carrera_y_opcion_administrativo($carrera,$opcion);
		echo json_encode($posts);
	}

	public function updatehorario(){
		if ($this->input->is_ajax_request()) {	
			
			if (isset($_FILES["planeacion"]["name"])) {
				$config['upload_path'] = "./assets/template/dist/img/uploads";
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$config['max_size']     = '1000';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload("planeacion")) {
					$data = array('res' => "error", 'message' => $this->upload->display_errors());
				}else{
								// unlink(APPPATH . '../assets/uploads/' . $post->planeacion);
								$file_name = $_FILES['planeacion']['name'];
								$file_size = $_FILES['planeacion']['size'];
								$file_tmp = $_FILES['planeacion']['tmp_name'];
								$file_type = $_FILES['planeacion']['type'];

								$imagen_temporal = $file_tmp;
								$tipo = $file_type;
								$fp = fopen($imagen_temporal, 'r+b');
								$binario = fread($fp, filesize($imagen_temporal));
								fclose($fp);
								$materia = $this->input->post('materia');
				$ciclo = $this->input->post('ciclo');
				$semestre = $this->input->post('semestre');
				$profesor = $this->input->post('profesor');
								$ajax_data['planeacion'] = $binario; // Documento pdf
								$ajax_data['nombre_planeacion'] = $this->upload->data('file_name');
								$nombre_materia = $this->input->post('nombre_materia');
								
								if ($this->Modelo_PlaneacionesProfesor->updatehorario($materia,$ciclo,$semestre,$profesor,$ajax_data)) {
									$data = array('response' => "success", 'message' => "Se actualiza ".$nombre_materia."");
								} else {
								  $data = array('response' => "error", 'message' => "Error al agregar datos...!");
								}	
							
					   }

			
				
					
				
					}
			
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
			if ($post = $this->Modelo_PlaneacionesProfesor->single_entry($profesor,$materia)) {
				$data = array('responce' => "success", "post" => $post);
			}else{
				$data = array('responce' => "error", "failed to fetch");
			}
			echo json_encode($data);
		}else {
			echo "No se permite este acceso directo...!!!";
		}
	}

	}  // Fin del controller
