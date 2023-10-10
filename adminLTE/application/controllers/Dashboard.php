<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	Public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Usuario');
        $this->load->database();
        $this->load->library('session');
    }


	public function index(){
		
	}

    public function login() {
        if($this->input->server("REQUEST_METHOD")== "POST"){
            $data["password"] = $this->input->post("password");
            $data["correo"] = $this->input->post("correo");
            $usuario = $this->Usuario->login($data);
            if ($usuario) {
                $session_data = array(
                    'user_id' => $usuario->id_usuario,
                    'correo' => $usuario->correo,
                    'rol' => $usuario->rol,
                    // Agrega cualquier otro dato de usuario que desees almacenar en la sesión
                );
                $this->session->set_userdata($session_data);
                redirect("/Dashboard/plantilla");	
            }else{
               $mensaje['msg'] = "Error";
            }
	    }

        if (isset($mensaje)) {
            $this->load->view('Dashboard/login',$mensaje);
        }else{
            $this->load->view('Dashboard/login');
        }
    }

    public function cerrar_sesion() {
        $this->session->sess_destroy(); // Destruye la sesión actual
        redirect("/Dashboard/login"); // Redirige al inicio de sesión o a donde prefieras
    }
    

    public function plantilla()
    {
        $user_rol = $this->session->userdata('rol');
        $correo = $this->session->userdata('correo');
        $nombre = $this->Usuario->get_name($correo);
        $datos = array(
            "nombre" => $nombre,
            "rol" => $user_rol,
            "correo" => $correo,
        );

        if (!$this->session->userdata('user_id')) {
            // La sesión no está activa, redirigir al inicio de sesión
            redirect('/Dashboard/login');
        }
        

        $this->load->view('Dashboard/plantilla',$datos);
    }

    public function tabla() {
        if (!$this->session->userdata('user_id')) {
            redirect('/Dashboard/login');
        }

        $vdata["usuarios"] = $this->Usuario->findAll();
        $this->load->view('Dashboard/tabla',$vdata);

    }

 
    public function delete($usuario_id) {
        if (!$this->session->userdata('user_id')) {
            // La sesión no está activa, redirigir al inicio de sesión
            redirect('/Dashboard/login');
        }

        $this->Usuario->delete($usuario_id);
        redirect("/Dashboard/tabla");
    }

    public function registrar($usuario_id = null){
        if (!$this->session->userdata('user_id')) {
            // La sesión no está activa, redirigir al inicio de sesión
            redirect('/Dashboard/login');
        }

        $vistaListado = false;
		$vdata["nombre"] = $vdata["correo"] = $vdata["passw"] = $vdata["rol"] = "";
		if(isset($usuario_id)){
			$usuario = $this->Usuario->find($usuario_id);

			if(isset($usuario)){
				$vdata["id_usuario"] = $usuario->id_usuario;
				$vdata["correo"] = $usuario->correo;
				$vdata["passw"] = $usuario->passw;         
				$vdata["rol"] = $usuario->rol;         
			}
		}
        if($this->input->server("REQUEST_METHOD")== "POST"){
            $data["passw"] = $this->input->post("passw");
            $data["correo"] = $this->input->post("correo");
            $data["rol"] = $this->input->post("rol");
            #---------------------------------------------------
            $vdata["passw"] = $this->input->post("passw");
            $vdata["correo"] = $this->input->post("correo");
            $vdata["rol"] = $this->input->post("rol");
           
			if (isset($usuario_id)){
                $this->Usuario->update($usuario_id, $data);
                $vistaListado = true;
			}else{
                $this->Usuario->insert($data);
                $vistaListado = true; 
            }
	    }

        if ($vistaListado) {
            redirect("/Dashboard/tabla");	
        }else{
            $this->load->view('Dashboard/registrar',$vdata);
        }
        
	}

    public function perfil() {
         if (!$this->session->userdata('user_id')) {
            // La sesión no está activa, redirigir al inicio de sesión
            redirect('/Dashboard/login');
        }

        $this->load->view('Dashboard/profile');

        
    }


}
