<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Orders extends CI_Model{
    function getTotalOrderMonth($idPerusahaan){

    }
    function getTotalOrderDay($idPerusahaan){
    
    }
    function getTotalOrderNow($idPerusahaan){
        $this->db->select("*");
        $this->db->where('JAM_KELUAR', NULL);
        $this->db->where('ID_PERUSAHAAN',$idPerusahaan);
        $this->db->from('Orders');
        $query = $this->db->get();
        if($query->num_rows() == 1){
			return $query->result_array();
		}
		else {
			return false;
		}
    }
}
   ?>
