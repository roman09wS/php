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

    public function login() {
         // Obtener el nombre de usuario y la contraseña del formulario
        //  $username = $this->input->post('username');
        //  $password = $this->input->post('password');
 
        //  // Obtener el hash de la contraseña almacenada en la base de datos para el usuario dado
        //  $stored_password_hash = $this->auth_model->get_password_hash_by_username($username);
 
        //  // Calcular el hash de la contraseña ingresada por el usuario
        //  $input_password_hash = md5($password);
 
        //  // Verificar si los hashes coinciden
        //  if ($input_password_hash === $stored_password_hash) {
        //      // Las contraseñas coinciden, el usuario está autenticado
        //      // Realiza las acciones apropiadas después de la autenticación
        //  } else {
        //      // Las contraseñas no coinciden, muestra un mensaje de error
        //  }
 
         // Resto de tu lógica de inicio de sesión aquí...
         
         if($this->input->server("REQUEST_METHOD")== "POST"){
            $data["password"] = $this->input->post("password");
            $data["correo"] = $this->input->post("correo");
            $usuario = $this->Usuario->login($data);
            if ($usuario) {
                redirect("/Gestion_user/listar_user");	
            }else{
                $mensaje['msg'] = "Error";
            }
	    }

        if (isset($mensaje)) {
            $this->load->view('Usuarios/login',$mensaje);
        }else{
            $this->load->view('Usuarios/login');
        }
    }

    public function listar_user()
    {
        $vdata["usuarios"] = $this->Usuario->findAll();
        $this->load->view('Usuarios/listar_user',$vdata);
    }

 
    public function delete($usuario_id) {
        $this->Usuario->delete($usuario_id);
        redirect("/Gestion_user/listar_user");
    }

    public function registrar($usuario_id = null){
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
            redirect("/Gestion_user/listar_user");	
        }else{
            $this->load->view('Usuarios/registrar',$vdata);
        }
        
	}

    public function ver($persona_id = null) {
        $persona = $this->Usuario->find($persona_id);
        if (isset($persona)) {
            $vdata["nombre"] = $persona->nombre;
            $vdata["password"] = $persona->password;
            $vdata["correo"] = $persona->correo;
        }else{
            $vdata["nombre"] = $vdata["password"] = $vdata["correo"] = "";
        }
        $this->load->view('Usuarios/ver',$vdata);
    }


}
