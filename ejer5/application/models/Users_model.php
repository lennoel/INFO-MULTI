<?php
	class Users_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
 
		public function login($nombre, $id_persona){
			$query = $this->db->get_where('persona', array('nombre'=>$nombre, 'id_persona'=>$id_persona));
			return $query->row_array();
		}
		
 
	}
?>