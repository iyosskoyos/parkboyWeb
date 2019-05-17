<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Admin extends CI_Model{
    function signup($email,$nama,$password,$no_telepon){
        $data = array(
        	'e_mail' => $email,
        	'nama' => $nama,
        	'password' => $password,
        	'no_telepon' => $no_telepon
		);
		$result = $this->db->insert('customer', $data);
		if($result){
			return true;
		}
		else{
			return false;
		}
    }
    function signIn($nama,$password){
        $this->db->select("ID,NAMA,PERUSAHAAN");
        $this->db->where('NAMA', $nama);
        $this->db->where('PASSWORD', $password);
        $this->db->from("admin");
        $query = $this->db->get();
        if($query->num_rows() == 1){
			return $query->result_array();
		}
		else {
			return false;
		}
    }
    function signInGoogle(){

    }
    function signUpGoogle(){

    }
}



?>