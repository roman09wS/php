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
        if (!$this->session->userdata('user_id')) {
            // La sesión no está activa, redirigir al inicio de sesión
            redirect('/Dashboard/login');
        }
        $vdata["usuarios"] = $this->Usuario->findAll();
        $this->load->view('Dashboard/plantilla',$vdata);
    }

 
    public function delete($usuario_id) {
        if (!$this->session->userdata('user_id')) {
            // La sesión no está activa, redirigir al inicio de sesión
            redirect('/Dashboard/login');
        }

        $this->Usuario->delete($usuario_id);
        redirect("/Dashboard/plantilla");
    }

    public function registrar($usuario_id = null){
        if (!$this->session->userdata('user_id')) {
            // La sesión no está activa, redirigir al inicio de sesión
            redirect('/Dashboard/login');
        }

        $vistaListado = false;
		$vdata["nombre"] = $vdata["correo"] = $vdata["password"] = "";
		if(isset($usuario_id)){
			$usuario = $this->Usuario->find($usuario_id);

			if(isset($usuario)){
				$vdata["id_usuario"] = $usuario->id_usuario;
				$vdata["nombre"] = $usuario->nombre;
				$vdata["correo"] = $usuario->correo;
				$vdata["password"] = $usuario->password;         
			}
		}
        if($this->input->server("REQUEST_METHOD")== "POST"){
            $data["nombre"] = $this->input->post("nombre");
            $data["password"] = $this->input->post("password");
            $data["correo"] = $this->input->post("correo");

          
            // Cifrar la contraseña usando MD5
            // $encrypted_password = $this->auth_model->encrypt_password_md5($data["password"]);


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
            redirect("/Dashboard/plantilla");	
        }else{
            $this->load->view('Dashboard/registrar',$vdata);
        }
        
	}

    public function ver($persona_id = null) {
         if (!$this->session->userdata('user_id')) {
            // La sesión no está activa, redirigir al inicio de sesión
            redirect('/Dashboard/login');
        }

        $persona = $this->Usuario->find($persona_id);
        if (isset($persona)) {
            $vdata["nombre"] = $persona->nombre;
            $vdata["password"] = $persona->password;
            $vdata["correo"] = $persona->correo;
        }else{
            $vdata["nombre"] = $vdata["password"] = $vdata["correo"] = "";
        }
        $this->load->view('Dashboard/ver',$vdata);
    }


}
