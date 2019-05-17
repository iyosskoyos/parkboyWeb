<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C_Login extends CI_Controller{

    function login(){
        $this->load->view('login');
        
    }
    function prosesLogin(){
        $username = $_POST['username'];
        $password =  $_POST['password'];
        
        $this->load->model('M_Admin');
        $result= $this->M_Admin->signin($username,$password);
        if($result){
            $userdata = array(
                'logged_in' => true,
                'id' =>$result[0]['ID'],
                'nama' =>$result[0]['NAMA'],
                'perusahaan' =>$result[0]['PERUSAHAAN']
            );
            $this->session->set_userdata($userdata);
            redirect('/dashboard');
        }
        else{
            redirect('/');
        }
           
    }
    function logout(){
        if($this->session->userdata('logged_in')){
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('id');
			$this->session->unset_userdata('nama');
            $this->session->unset_userdata('perusahaan');
            redirect('/');
		}
		else{
			redirect('/');
		}
    }
}
?>