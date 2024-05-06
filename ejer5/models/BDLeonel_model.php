<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BDLeonel_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	public function personas()
	{
		
		$this->load->database();
        $query_personas = $this->db->query("SELECT * FROM persona");
		return $query_personas->result();
	}
    public function cuentabancarias()
	{
		
		$this->load->database();
        $query_cuentas = $this->db->query("SELECT * FROM cuentabancaria");
        return $query_cuentas->result();

        $query_transacciones = $this->db->query("SELECT * FROM transaccion");
        return $query_transacciones->result();
	}
    public function transacions()
	{	
		$this->load->database();
        $query_transacciones = $this->db->query("SELECT * FROM transaccion");
        return $query_transacciones->result();
	}
	public function personas2($id)
	{
		
		$this->load->database();
        $query = $this->db->query("SELECT * FROM persona where ID_Persona='$id'");
		return $query->result();
	}
	public function eliminarCuentaPersonaYTransacciones($numeroCuenta) {
		// Cargar la base de datos
		$this->load->database();
	
		// Obtener el ID de la persona asociada a la cuenta bancaria
		$query = $this->db->select('ID_Persona')->from('CuentaBancaria')->where('ID_Cuenta', $numeroCuenta)->get();
		$row = $query->row();
	
		// Verificar si se encontró una fila
		if ($row) {
			// Obtener el ID de la persona
			$idPersona = $row->ID_Persona;
	
			// Eliminar las transacciones asociadas a la cuenta
			$this->db->where('ID_Cuenta', $numeroCuenta);
			$transacciones_eliminadas = $this->db->delete('Transaccion');
	
			// Eliminar la cuenta bancaria
			$this->db->where('ID_Cuenta', $numeroCuenta);
			$cuenta_eliminada = $this->db->delete('CuentaBancaria');
	
			// Eliminar la persona
			$this->db->where('ID_Persona', $idPersona);
			$cuenta_persona = $this->db->delete('Persona');
	
			// Retornar true si la eliminación fue exitosa, de lo contrario false
			return ($transacciones_eliminadas && $cuenta_eliminada && $cuenta_persona);
		} else {
			// No se encontró ninguna persona asociada a la cuenta bancaria, retornar false
			return false;
		}
	}
	
	
}
