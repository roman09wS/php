<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gestion_user extends CI_Controller {

	Public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Usuario');
        $this->load->database();
    }


	public function index(){
		
	}

    public function listar_user()
    {
        $vdata["usuarios"] = $this->Usuario->findAll();
        $this->load->view('Usuarios/listar_user',$vdata);
    }

 
    public function delete($usuario_id) {
        $this->Usuario->delete($usuario_id);
        redirect("/Usuarios/listar_user");
    }

    public function registrar($usuario_id = null){
        $vistaListado = false;
		$vdata["nombre"] = $vdata["correo"] = $vdata["password"] = "";
		if(isset($usuario_id)){
			$usuario = $this->Usuario->find($usuario_id);

			if(isset($usuario)){
				$vdata["nombre"] = $usuario->nombre;
				$vdata["correo"] = $usuario->correo;
				$vdata["passw"] = $usuario->passw;         
			}
		}
        if($this->input->server("REQUEST_METHOD")== "POST"){
            $data["nombre"] = $this->input->post("nombre");
            $data["password"] = $this->input->post("password");
            $data["correo"] = $this->input->post("correo");


            $vdata["nombre"] = $this->input->post("nombre");
            $vdata["password"] = $this->input->post("password");
            $vdata["correo"] = $this->input->post("correo");
           
			if (isset($usuario_id)){
                $this->Usuario->update($usuario_id, $data);
                $vistaListado = true;
			}else{
                $this->Usuario->insert($data);
                $vistaListado = true; 
            }
	    }

        if ($vistaListado) {
            // $vdata["usuarios"] = $this->Usuario->findAll();
            // $this->load->view('Usuarios/listar_user',$vdata);
            redirect("/Gestion_user/listar_user");	
        }else{
            $this->load->view('Usuarios/registrar',$vdata);
        }
        
	}

    public function ver($persona_id = null) {
        $persona = $this->Usuario->find($persona_id);
        if (isset($persona)) {
            $vdata["serial"] = $persona->serial;
            $vdata["nombre"] = $persona->nombre;
            $vdata["descripcion"] = $persona->descripcion;
            $vdata["costo"] = $persona->costo;
            $vdata["precio"] = $persona->precio;
            $vdata["cantidad"] = $persona->cantidad;
        }else{
            $vdata["nombre"] = $vdata["serial"] = $vdata["descripcion"] = $vdata["costo"] = "";
        }
        $this->load->view('Productos/ver',$vdata);
    }


}
