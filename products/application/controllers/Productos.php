<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

	Public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Producto');
        $this->load->database();
    }


	public function index(){
		
	}

    public function listado()
    {
        $vdata["personas"] = $this->Producto->findAll();
        $this->load->view('Productos/listado',$vdata);
    }

 
    public function delete($persona_id) {
        $this->Producto->delete($persona_id);
        redirect("/Productos/listado");
    }

    public function guardar($persona_id = null){
        $vistaListado = false;
		$vdata["nombre"] = $vdata["descripcion"] = $vdata["serial"] =  $vdata["costo"] =  $vdata["precio"] =  $vdata["cantidad"] = "";
		if(isset($persona_id)){
			$persona = $this->Producto->find($persona_id);

			if(isset($persona)){
				$vdata["serial"] = $persona->serial;
				$vdata["nombre"] = $persona->nombre;
				$vdata["descripcion"] = $persona->descripcion;
				$vdata["costo"] = $persona->costo;
				$vdata["precio"] = $persona->precio;
				$vdata["cantidad"] = $persona->cantidad;          
			}
		}
        if($this->input->server("REQUEST_METHOD")== "POST"){
            $data["serial"] = $this->input->post("serial");
            $data["nombre"] = $this->input->post("nombre");
            $data["descripcion"] = $this->input->post("descripcion");
            $data["costo"] = $this->input->post("costo");
            $data["precio"] = $this->input->post("precio");
            $data["cantidad"] = $this->input->post("cantidad");
           
			$vdata["serial"] = $this->input->post("serial");
            $vdata["nombre"] = $this->input->post("nombre");
            $vdata["descripcion"] = $this->input->post("descripcion");
            $vdata["costo"] = $this->input->post("costo");
            $vdata["precio"] = $this->input->post("precio");
            $vdata["cantidad"] = $this->input->post("cantidad");
           
				
			if (isset($persona_id)){
                $this->Producto->update($persona_id, $data);
                $vistaListado = true;
			}else{
                $this->Producto->insert($data);
                $vistaListado = true;    
            }
	    }

        if ($vistaListado) {
            $vdata["personas"] = $this->Producto->findAll();
            $this->load->view('Productos/listado',$vdata);
            //redirect("/personas/listado");	
        }else{
            $this->load->view('Productos/guardar',$vdata);
        }
        
	}

    public function ver($persona_id = null) {
        $persona = $this->Producto->find($persona_id);
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
