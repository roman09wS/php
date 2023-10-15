<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Model {
    
    Public $table = 'usuarios';
    Public $table_id = 'id_usuario';


	Public function __construct(){
        parent::__construct();
        $this->load->helper('form');
        $this->load->database();
    }


    function findAll(){
        $this->db->select();
        $this->db->from($this->table);

        $query = $this->db->get();
        return $query->result();
    }

	public function index(){
		
	}

    public function find($id){
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where($this->table_id,$id);

        $query = $this->db->get();
        return $query->row();
    }

    public function get_user_by_email($identifier) {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where('correo', $identifier);        
        $query = $this->db->get();
        return $query->row();
    }

    public function login($data) {
        if (isset($data['password']) && isset($data['correo'])) {
            $correo = $data['correo'];
            $password = $data['password'];
            //$password_hash = md5($password);
            $user = $this->get_user_by_email($correo);
            if ($user->correo == $correo && $user->passw == $password && $user->estado == '1') {
                return $user;
            }else {
                return false;
            }


            //if ($user && $user->password === $password_hash) {
                // La contraseña coincide
            //} else {
                // La contraseña no coincide o el usuario no existe
            //    return false;
            //}
        } else {
            return false;
        }
    }
    

    public function update($id, $data){
        $this->db->where($this->table_id,$id);
        $this->db->update($this->table,$data);
    }


    public function delete($id){
        $data = array('estado' => 0);
        $this->db->where($this->table_id, $id);
        $this->db->update($this->table, $data);
    }

    public function updateActivate($id){
        $data = array('estado' => 1);
        $this->db->where($this->table_id, $id);
        $this->db->update($this->table, $data);
    }

    public function setPassw($id,$change){
        $data = array('passw' => $change);
        $this->db->where($this->table_id, $id);
        $this->db->update($this->table, $data);
    }

    public function insert($data){
        //$data['password'] = md5($data['password']);
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function get_name($correo) {
        $pos_arroba = strpos($correo, "@");
        if ($pos_arroba !== false) {
            // Extrae la parte antes de "@"
            $nombre_usuario = substr($correo, 0, $pos_arroba);
            
            // Imprime el nombre de usuario
            return $nombre_usuario;
        } else {
            // Maneja el caso en el que no se encuentra la "@" en el correo
            return null ;
        }
    }
}
