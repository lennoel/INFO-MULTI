<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Academico_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	public function alumnos()
	{
		
		$this->load->database();
		$query=$this->db->query("select *from alumno");
		return $query->result();
	}
}
