<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	public function getUsuarios(){
		$this->db->select("u.*,r.nombre as rol");
		$this->db->from("usuarios u");
		$this->db->join("roles r","u.rol_id = r.id");
		$this->db->where("u.estado_usuario","1");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getUsuario($id){
		$this->db->select("u.*,r.nombre as rol");
		$this->db->from("usuarios u");
		$this->db->join("roles r","u.rol_id = r.id");
		$this->db->where("u.id",$id);
		$this->db->where("u.estado_usuario","1");
		$resultado = $this->db->get();
		return $resultado->row();
	}
	public function getRoles(){
		$resultados = $this->db->get("roles");
		return $resultados->result();
	}
	public function save($data){
		return $this->db->insert("usuarios",$data);
	}
	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("usuarios",$data);
	}

	public function login($username, $password){
		$this->db->where("username", $username);
		$this->db->where("password", $password);

		$this->db->select("us.*, us.username, r.nombre as rol");
		$this->db->from("usuarios us");
		$this->db->join("roles r","us.rol_id = r.id");

				$resultados = $this->db->get();
		// $resultados = $this->db->get("usuarios");
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}
	//Seccion de Apertura
	public function comprobrarApertura($fecha){
		//
		$this->db->select('*');
		$this->db->from('apertura');
		$this->db->where('fecha', $fecha);
		$query = $this->db->get();
		if (count($query->result()) > 0) {
		  return $query->row();
		}

	}


}
