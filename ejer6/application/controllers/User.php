<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('users_model');
	}

	public function index()
	{
		//load session library
		$this->load->library('session');

		//restrict users to go back to login if session has been set
		if ($this->session->userdata('user')) {
			redirect('home');
		} else {
			$this->load->view('login_page');
		}
	}

	public function login()
	{
		//load session library
		$this->load->library('session');

		$nombre = $_POST['nombre'];
		$id_persona = $_POST['id_persona'];


		$data = $this->users_model->login($nombre, $id_persona);

		if ($data) {
			// Verificar el rol del usuario
			if ($data['roll'] == 'administrador') {
				$this->session->set_userdata('user', $data);
				redirect('homeAdmin');
			} else {
				$this->session->set_userdata('user', $data);
				redirect('home');
			}
		} else {
			// Si no se encuentra el usuario, redirigir a la página de inicio de sesión
			header('location:' . base_url() . $this->index());
			$this->session->set_flashdata('error', 'Credenciales inválidas');
		}
	}

	public function home()
	{
		$this->load->library('session');

		if ($this->session->userdata('user')) {
			$user = $this->session->userdata('user');
			$id_persona = $user['ID_Persona'];

			$cuentas = $this->cuentabancarias($id_persona);
			$transacciones = $this->transacions($id_persona);

			// Pasar los datos a la vista
			$data['cuentas'] = $cuentas;
			$data['transacciones'] = $transacciones;

			$this->load->view('home', $data);
		} else {
			redirect('/');
		}
	}
	public function homeAdmin()
{
    $this->load->library('session');

    
    if ($this->session->userdata('user')) {
        $personas = $this->personas1();
        $cuentas = $this->cuentabancarias1();
        $transacciones = $this->transacions1();
        $montos_data = $this->montos_por_departamento();

        // Pasar los datos a la vista
        $data['cuentas'] = $cuentas;
        $data['transacciones'] = $transacciones;
        $data['personas'] = $personas;
        $data['montos'] = $montos_data['departamentos'];
        $data['total_general'] = $montos_data['total_general'];

        $this->load->view('homeAdmin', $data); // Cargar la vista con los datos
    } else {
        redirect('/');
    }
}

	public function eliminarCuenta($numeroCuenta) {
		$this->load->database();
		$query = $this->db->select('ID_Persona')->from('CuentaBancaria')->where('ID_Cuenta', $numeroCuenta)->get();
		$row = $query->row();
		if ($row) {    
			$idPersona = $row->ID_Persona;
			
			$this->db->where('ID_Cuenta', $numeroCuenta);
			$transacciones_eliminadas = $this->db->delete('Transaccion');
			$this->db->where('ID_Cuenta', $numeroCuenta);
			$cuenta_eliminada = $this->db->delete('CuentaBancaria');
			
			$this->db->where('ID_Persona', $idPersona);
			$cuenta_persona = $this->db->delete('Persona');
	
			if ($transacciones_eliminadas && $cuenta_eliminada && $cuenta_persona) {
				
				redirect('homeAdmin'); 
			} else {
				// Error al eliminar la cuenta
				echo "Error al eliminar la cuenta. Por favor, inténtalo de nuevo más tarde.";
			}
		} else {
			// No se encontró la cuenta
			echo "La cuenta no existe.";
		}
	}
	

	public function logout()
	{
		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('user');
		redirect('/');
	}

	public function personas()
	{

		$this->load->database();
		$query_personas = $this->db->query("SELECT * FROM persona");
		return $query_personas->result();
	}
	public function cuentabancarias($id_persona)
	{
		$this->load->database();
		$query_cuentas = $this->db->query("SELECT * FROM cuentabancaria WHERE ID_Persona = ?", array($id_persona));
		return $query_cuentas->result();
	}

	public function transacions($id_persona)
	{
		$this->load->database();
		$query_transacciones = $this->db->query("SELECT * FROM transaccion WHERE ID_Cuenta IN (SELECT ID_Cuenta FROM cuentabancaria WHERE ID_Persona = ?)", array($id_persona));
		return $query_transacciones->result();
	}
	public function personas1()
	{
		$this->load->database();
		$query_cuentas = $this->db->query("SELECT * FROM persona");
		return $query_cuentas->result();
	}
	public function cuentabancarias1()
	{
		$this->load->database();
		$query_cuentas = $this->db->query("SELECT * FROM cuentabancaria");
		return $query_cuentas->result();
	}

	public function transacions1()
	{
		$this->load->database();
		$query_transacciones = $this->db->query("SELECT * FROM transaccion");
		return $query_transacciones->result();
	}
	public function montos_por_departamento() {
		$this->load->database();
		$query_departamentos = $this->db->query("SELECT Departamento,
			SUM(CASE WHEN tipo_cuenta = 'corriente' THEN Saldo ELSE 0 END) as total_corriente,
			SUM(CASE WHEN tipo_cuenta = 'ahorros' THEN Saldo ELSE 0 END) as total_ahorros,
			SUM(CASE WHEN tipo_cuenta = 'mixta' THEN Saldo ELSE 0 END) as total_mixta
			FROM CuentaBancaria GROUP BY Departamento");
	
		$query_total = $this->db->query("SELECT
			SUM(CASE WHEN tipo_cuenta = 'corriente' THEN Saldo ELSE 0 END) as total_general_corriente,
			SUM(CASE WHEN tipo_cuenta = 'ahorros' THEN Saldo ELSE 0 END) as total_general_ahorros,
			SUM(CASE WHEN tipo_cuenta = 'mixta' THEN Saldo ELSE 0 END) as total_general_mixta
			FROM CuentaBancaria");
	
		$departamentos = $query_departamentos->result();
		$total_general = $query_total->row();
	
		return array('departamentos' => $departamentos, 'total_general' => $total_general);
	}
	


}
