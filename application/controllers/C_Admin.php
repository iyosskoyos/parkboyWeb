
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C_Admin extends CI_Controller{
function dashboard(){
	if($this->session->userdata('logged_in')){
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('template/topbar');
			$this->load->view('main');
			$this->load->view('template/footer');
			//$this->load->view('dashboard');    
	}
	else{
		redirect('/');
	}
}
function signup(){

}
function test(){
	$this->load->model('M_Orders');
	$res = $this->M_Orders->getTotalOrderNow('1');
	print_r($res);
	return;

}
}
?>