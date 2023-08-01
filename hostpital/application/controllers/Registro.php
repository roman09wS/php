<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {
    public function __construct(){
		parent:: __construct();
		$this->load->helper(array('getmenu'));
        $this->load->model('user');
	}

    public function index(){
        $data['menu'] = main_menu();
        $this->load->view('registro',$data);
    }

    public function create(){
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $password_confirm = $this->input->post('password_confirm');
        $datos = array(
            'nombre_usuario' => $username,
            'correo' => $email,
            'contrasena' => $password,
        );

        $data['menu'] = main_menu();

        if(!$this->user->create($datos)){
            $data['msg'] = 'Ocurrio un error';
            $this->load->view('registro',$data);            
        }
        $data['msg'] = 'Registrado correctamente';
        $this->load->view('registro',$data);
    }
}
?>