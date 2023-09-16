<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Encriptado extends CI_Model {
    
    public function encrypt_password_md5($password) {
        $encrypted_password = md5($password);
        return $encrypted_password;
    }

}
