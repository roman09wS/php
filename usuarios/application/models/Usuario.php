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

    private function get_user_by_email_or_nombre($identifier) {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where('nombre', $identifier);
        $this->db->or_where('correo', $identifier);
        
        $query = $this->db->get();
        return $query->row();
    }

    public function login($data) {
        if (isset($data['password']) && isset($data['correo'])) {
            $correo = $data['correo'];
            $password = $data['password'];
            $password_hash = md5($password);
            $user = $this->get_user_by_email_or_nombre($correo);
    
            //if ($user && $user->password === $password_hash) {
                // La contraseña coincide
                return $user;
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


    public function delete($id)
    {
        $this->db->where($this->table_id,$id);
        $this->db->delete($this->table);
    }

    public function insert($data){
       $data['password'] = md5($data['password']);
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
}
