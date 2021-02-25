<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materias extends CI_Controller {

		 private $permisos;
	   public function __construct(){
	 	 parent::__construct();
		 $this->permisos = $this->backend_lib->control();
		 $this->load->helper(array('form', 'url'));
	 	 $this->load->library(array('session', 'form_validation'));
		  // $this->permisos = $this->backend_lib->control();
	 	 $this->load->model("Modelo_Materias");
	 }


	public function index(){

		$data  = array(
			'permisos' => $this->permisos,
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/Vistas_Administrativos/VistaMaterias',$data);
		$this->load->view('layouts/footer');
	}


	/* -------------------------------------------------------------------------- */
	/*                               Insert Records                               */
	/* -------------------------------------------------------------------------- */

	public function insertarmateria(){

		if ($this->input->is_ajax_request()) {	
			$this->form_validation->set_rules('clave', 'clave', 'required');
			$this->form_validation->set_rules('nombre_materia', 'nombre_materia', 'required');
			$this->form_validation->set_rules('creditos', 'creditos', 'required');
			
			$this->form_validation->set_rules('especialidad', 'especialidad', 'required');
			$this->form_validation->set_rules('semestre', 'semestre', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
			
				$ajax_data = $this->input->post();
				if ($this->Modelo_Materias->insert_entry($ajax_data)) {
					$data = array('response' => "success", 'message' => "Materia agregada correctamente");
					
				} else {
					$data = array('response' => "error", 'message' => "Error al agregar materia");
				}	
			}
			echo json_encode($data);
	    
			}
		  else{
			echo "No se permite este acceso directo...!!!";
		}

	}


	
	public function updatemateria(){
		if ($this->input->is_ajax_request()) {	
				$this->form_validation->set_rules('clave', 'clave', 'required');
				$this->form_validation->set_rules('nombre_materia', 'nombre_materia', 'required');
				$this->form_validation->set_rules('creditos', 'creditos', 'required');
				$this->form_validation->set_rules('especialidad', 'especialidad', 'required');
				$this->form_validation->set_rules('semestre', 'semestre', 'required');
		   
			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
				
			$materia = $this->input->post('id_materia');
            $ajax_data['clave'] = $this ->input->post('clave');
			$ajax_data['nombre_materia'] = $this ->input->post('nombre_materia');
			$ajax_data['creditos'] = $this ->input->post('creditos');
			$ajax_data['especialidad'] = $this ->input->post('especialidad');
			$ajax_data['semestre'] = $this ->input->post('semestre');
	
            
			if ($this->Modelo_Materias->update($materia,$ajax_data)) {
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

	/* -------------------------------------------------------------------------- */
	/*                                Fetch Records                               */
	/* -------------------------------------------------------------------------- */

	public function vermaterias()
	{
		$semestre = $this->input->post('semestre');
		$especialidad = $this->input->post('especialidad');
		
		$posts = $this->Modelo_Materias->obtenermaterias($semestre,$especialidad);
		echo json_encode($posts);
	}

	public function editarmateria(){
		if ($this->input->is_ajax_request()) {
			$edit_id = $this->input->post('edit_id');
			if ($post = $this->Modelo_Materias->single_entry($edit_id)) {
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
/*                               Delete Records                               */
/* -------------------------------------------------------------------------- */

public function eliminarmateria()
{
	if ($this->input->is_ajax_request()) {

		$del_id = $this->input->post('id_materia');
		if ($this->Modelo_Materias->delete_entry($del_id)) {
			$data = array('responce' => "success",'message' => "¡Materia eliminadad!");
		} else {
			$data = array('responce' => "error", 'message' => "¡No se pudo eliminar la materia!");
		}
		echo json_encode($data);
	} else {
		echo "No se permite este acceso directo...!!!";
	}
}



}  // Fin del controller
function updateTeamLogo() {
	global $server, $db, $dbUser, $dbKey;
  
	try {
	  $conn = new PDO("mysql:host=" . $server . ";dbname=" . $db, $dbUser, $dbKey);
	  $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
	  $file = $_FILES["teamLogo"]["tmp_name"];
  
	  if(!isset($file)) {
		echo "Please select an image to upload";
	  } else {
		$fileSize = getimagesize($_FILES["teamLogo"]["tmp_name"]);
  
		if ($fileSize) {
		  $img = file_get_contents($_FILES["teamLogo"]["tmp_name"]);
		  $sql = $conn -> prepare("UPDATE Team SET (teamID, teamLogo) VALUES (:teamID, :teamLogo) WHERE teamID=:teamID");
		  $sql -> bindValue(":teamID", $_POST["teamID"]);
		  $sql -> bindValue(":teamLogo", $img);
  
		  $result = $sql -> execute();
  
		  if ($result == null) {
			echo "Error uploading image";
		  } else {
			echo "Image uploaded";
		  }
		} else {
		  echo "The file to be uploaded is not an image";
		}
	  }
	}
  
	catch(PDOException $e) {
	  echo "An error occured: " . $e -> getMessage();
	}
  
	$conn = null;
  }
  
  if (isset($_POST["updateTeam"])) {
	updateTeamLogo();
  }