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
        if (!$this->session->userdata('user_id')) {
            // La sesión no está activa, redirigir al inicio de sesión
            redirect('/Dashboard/login');
        }

        $user_rol = $this->session->userdata('rol');
        $correo = $this->session->userdata('correo');
        $nombre = $this->Usuario->get_name($correo);
        $datos = array(
            "name" => $nombre,
            "rol" => $user_rol,
            "correo" => $correo,
        );

        

        $this->load->view('Dashboard/plantilla',$datos);
    }

    public function tabla() {
        if (!$this->session->userdata('user_id')) {
            redirect('/Dashboard/login');
        }

        $user_rol = $this->session->userdata('rol');
        $correo = $this->session->userdata('correo');
        $nombre = $this->Usuario->get_name($correo);
        $vdata["usuarios"] = $this->Usuario->findAll();
        $datos = array(
            "name" => $nombre,
            "rol" => $user_rol,
            "correo" => $correo,
            "usuarios" => $vdata["usuarios"],
        );

        $this->load->view('Dashboard/tabla',$datos);

    }

 
    public function delete($usuario_id) {
        if (!$this->session->userdata('user_id')) {
            // La sesión no está activa, redirigir al inicio de sesión
            redirect('/Dashboard/login');
        }

        if ($this->session->userdata('rol') != 'admin') {
            redirect("/Dashboard/tabla");
        }

        $this->Usuario->delete($usuario_id);
        redirect("/Dashboard/tabla");
    }

    public function activate($usuario_id) {
        if (!$this->session->userdata('user_id')) {
            // La sesión no está activa, redirigir al inicio de sesión
            redirect('/Dashboard/login');
        }

        if ($this->session->userdata('rol') != 'admin') {
            redirect("/Dashboard/tabla");
        }

        $this->Usuario->updateActivate($usuario_id);
        redirect("/Dashboard/tabla");
    }

    public function registrar($usuario_id = null){
        if (!$this->session->userdata('user_id')) {
            // La sesión no está activa, redirigir al inicio de sesión
            redirect('/Dashboard/login');
        }

        if ($this->session->userdata('rol') != 'admin') {
            redirect('/Dashboard/plantilla');
        }

        
        $vistaListado = false;
        $correo = $this->session->userdata('correo');
        $nombre = $this->Usuario->get_name($correo);
        $vdata["name"] = $nombre;
		$vdata["nombre"] = $vdata["correo"] = $vdata["passw"] = $vdata["rol"] = $vdata["estado"] = "";
		if(isset($usuario_id)){
			$usuario = $this->Usuario->find($usuario_id);

			if(isset($usuario)){
				$vdata["id_usuario"] = $usuario->id_usuario;
				$vdata["correo"] = $usuario->correo;
				$vdata["passw"] = $usuario->passw;         
				$vdata["rol"] = $usuario->rol;         
				$vdata["estado"] = $usuario->estado;         
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
        
        $id_user = $this->session->userdata('user_id');
        $user = $this->Usuario->find($id_user);
        $name = $this->Usuario->get_name($user->correo);
        $datos["correo"] = $user->correo;
        $datos["passw"] = $user->passw;
        $datos["name"] = $name;
        $datos["rol"] = $user->rol;
        $datos["foto"] = $user->foto_perfil;

        if($this->input->server("REQUEST_METHOD")== "POST"){
            $data["passw"] = $this->input->post("passw");
            $data["correo"] = $this->input->post("correo");
            $data["rol"] = $this->input->post("rol");
            

            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2048;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('userfile')) {
                $upload_data = $this->upload->data();
                $ruta_foto = 'uploads/' . $upload_data['file_name'];

                

                // Actualizar la ruta de la foto en la base de datos
                $this->Usuario->actualizar_foto_perfil($id_user, $ruta_foto);
                
            
            } else {
                // Manejar el caso en el que la carga de la imagen falla
                $error = array('error' => $this->upload->display_errors());
                print_r($error);
            }

            $this->Usuario->update($id_user, $data);
            redirect('/Dashboard/perfil','refresh');
	    }
        $this->load->view('Dashboard/profile',$datos);
    }

    public function actualizar_foto_perfil() {
        // Lógica para manejar la subida de la nueva foto de perfil
        // Puedes utilizar la biblioteca 'upload' de CodeIgniter como en el ejemplo anterior

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('userfile')) {
            $upload_data = $this->upload->data();
            $ruta_foto = 'uploads/' . $upload_data['file_name'];

            // Obtener el ID del usuario actual (puedes obtenerlo de la sesión u otra fuente)
            $id_usuario = 1; // Reemplaza esto con la lógica adecuada

            // Actualizar la ruta de la foto en la base de datos
            $this->Usuario->actualizar_foto_perfil($id_usuario, $ruta_foto);
        } else {
            // Manejar el caso en el que la carga de la imagen falla
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        }

        // Redirigir de vuelta a la página de perfil después de actualizar la foto
        redirect('usuarios/perfil');
    }


    public function recuperar(){
        $data["correo"] = "";
        if($this->input->server("REQUEST_METHOD")== "POST"){
            $email = $this->input->post("correo");
            $encontrado = $this->Usuario->get_user_by_email($email);
            if (!empty($encontrado)) {

                $data["correo"] = $encontrado->correo;
                $this->session->set_userdata("correo",$encontrado->correo  );
            }else {
                redirect('/Dashboard/recuperar','refresh');
            }
	    }
        $this->load->view('Dashboard/recuperarPass',$data);
    }

    public function recuperarPassw(){
        if($this->input->server("REQUEST_METHOD")== "POST"){
            $data["passw1"] = $this->input->post("passw1");
            $data["passw2"] = $this->input->post("passw2");
            if ($data["passw1"] === $data["passw2"]) {
                $email = $this->session->userdata('correo');
                $encontrado = $this->Usuario->get_user_by_email($email);
                $this->Usuario->setPassw($encontrado->id_usuario,$data["passw1"]);
                $this->cerrar_sesion();
            }else {
                redirect('/Dashboard/recuperar','refresh');
            } 
	    }
    }
}
