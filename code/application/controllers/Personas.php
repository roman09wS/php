<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personas extends CI_Controller {

	Public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('Persona');
        $this->load->database();
    }


	public function index()
	{
		
	}

    public function listado()
    {

    }

    public function guardar(){
        $this->load->view('Personas/guardar');
        
        if($this->input->server("REQUEST_METHOD")=="POST")
            $data["nombre"] = $this->input->post("nombre");
            $data["apellido"] = $this->input->post("apellido");
            $data["edad"] = $this->input->post("edad");

            $this->Persona->insert($data);  
    }

    public function borrar()
    {

    }
}
