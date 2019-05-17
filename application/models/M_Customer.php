<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Customer extends CI_Model{
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
    function signIn($e_mail){
        $this->db->select("e_mail,nama,password,no_telepon,idCustomer,saldo");
        $this->db->where('e_mail', $e_mail);
        $this->db->from("customer");
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