<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lectura extends CI_Controller {

	public function index()
	{
        $this->load->model("BDLeonel_model");
        $personas = $this->BDLeonel_model->personas();
        $cuentas = $this->BDLeonel_model->cuentabancarias();
        $transacciones = $this->BDLeonel_model->transacions();
    
        // Pasar los datos a la vista
        $datos = array(
            'personas' => $personas,
            'cuentas' => $cuentas,
            'transacciones' => $transacciones
        );
    
        $this->load->view('view_BDLeonel1', $datos);
	}
    public function index2()
	{
        $this->load->model("BDLeonel_model");
        $personas = $this->BDLeonel_model->personas();
        $cuentas = $this->BDLeonel_model->cuentabancarias();
        $transacciones = $this->BDLeonel_model->transacions();
        $filas=$this->BDLeonel_model->personas2('1');
        $datos = array(
            'personas' => $personas,
            'cuentas' => $cuentas,
            'transacciones' => $transacciones,
            'filas'=>$filas
            
        );
        $this->load->view('view_BDLeonel', $datos);
	}
    public function indexa2()
    {
        $this->load->model("BDLeonel_model");
        $personas = $this->BDLeonel_model->personas();
        $cuentas = $this->BDLeonel_model->cuentabancarias();
        $transacciones = $this->BDLeonel_model->transacions();
        $filas = $this->BDLeonel_model->eliminarCuentaPersonaYTransacciones('104');
        $datos = array(
            'personas' => $personas,
            'cuentas' => $cuentas,
            'transacciones' => $transacciones,
            'filas' => $filas
        );
        $this->load->view('view_BDLeonel', $datos);
        $this->index();
    }
    
	
}
