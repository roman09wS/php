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
        $vdata["personas"] = $this->Persona->findAll();
        $this->load->view('Personas/listado',$vdata);
    }

 
    public function delete($persona_id) {
        $this->Persona->delete($persona_id);
        $vdata["personas"] = $this->Persona->findAll();
        $this->load->view('Personas/listado',$vdata);		
    }

    public function guardar($persona_id = null){
        $vistaListado = false;
		$vdata["nombre"] = $vdata["apellido"] = $vdata["edad"] = "";
		if(isset($persona_id)){
			$persona = $this->Persona->find($persona_id);

			if(isset($persona)){
				$vdata["nombre"] = $persona->nombre;
				$vdata["apellido"] = $persona->apellido;
				$vdata["edad"] = $persona->edad;
				$vdata["genero"] = $persona->genero;
                $vdata["php"] = $persona->php;
                $vdata["html"] = $persona->html;
                $vdata["python"] = $persona->python;
                $vdata["aws"] = $persona->aws;
                $vdata["estado_civil"] = $persona->estado_civil;
                
			}
		}
        if($this->input->server("REQUEST_METHOD")== "POST"){
            $data["nombre"] = $this->input->post("nombre");
            $data["apellido"] = $this->input->post("apellido");
            $data["edad"] = $this->input->post("edad");
            $data["genero"] = $this->input->post("genero");
            $data["estado_civil"] = $this->input->post("estado_civil");
            $data["php"] = $this->input->post("php");
            $data["html"] = $this->input->post("html");
            $data["python"] = $this->input->post("python");
            $data["aws"] = $this->input->post("aws");
            if ($data["php"] == null) {
                $data["php"] = 'no sabe';
            }
            if ($data["html"] == null) {
                $data["html"] = 'no sabe';
            }
            if ($data["python"] == null) {
                $data["python"] = 'no sabe';
            }
            if ($data["aws"] == null) {
                $data["aws"] = "no sabe";
            }

			
			$vdata["nombre"] = $this->input->post("nombre");
            $vdata["apellido"] = $this->input->post("apellido");
            $vdata["edad"] = $this->input->post("edad");
            $vdata["genero"] = $this->input->post("genero");
            $vdata["estado_civil"] = $this->input->post("estado_civil");
            $vdata["php"] = $this->input->post("php");
            $vdata["html"] = $this->input->post("html");
            $vdata["python"] = $this->input->post("python");
            $vdata["aws"] = $this->input->post("aws");
            if ($vdata["php"] == null) {
                $vdata["php"] = 'no sabe';
            }
            if ($vdata["html"] == null) {
                $vdata["html"] = 'no sabe';
            }
            if ($vdata["python"] == null) {
                $vdata["python"] = 'no sabe';
            }
            if ($vdata["aws"] == null) {
                $vdata["aws"] = "no sabe";
            }
				
			if (isset($persona_id)){
                $this->Persona->update($persona_id, $data);
                $vistaListado = true;
			}else{
                $this->Persona->insert($data);
                $vistaListado = true;    
            }
	    }

        if ($vistaListado) {
            $vdata["personas"] = $this->Persona->findAll();
            $this->load->view('Personas/listado',$vdata);
        }else{
            $this->load->view('personas/guardar',$vdata);
        }
        
	}


}
