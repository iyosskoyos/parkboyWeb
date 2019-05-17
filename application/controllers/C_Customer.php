
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class C_Customer extends CI_Controller{
    function signup(){
        $e_mail = $_POST['e_mail'];
        $password = password_hash( $_POST['password'],PASSWORD_BCRYPT);
        $nama = $_POST["nama"];
        $no_telepon = $_POST["no_telepon"];
        $this->load->model('M_Customer');
        $result= $this->M_Customer->signup($e_mail,$nama,$password,$no_telepon);
        if ($result) { 
            $a=array("error"=>"false","message"=>"Sign up Succesfully"); 
            $list_json = json_encode($a,JSON_PRETTY_PRINT);
            echo $list_json;
         }
         else{
            $a=array("error"=>"true","message"=>"Failed Create transpay");
            $list_json = json_encode($a,JSON_PRETTY_PRINT);
            echo $list_json;
         }
    }

    function signin(){
        $e_mail = $_POST['e_mail'];
        $password = $_POST['password'];
        $this->load->model('M_Customer');
        $result= $this->M_Customer->signin($e_mail);
        if(password_verify($password,$result[0]['password']) == false){
            $a=array("error"=>"true","message"=>"wrong password");  
            $list_json = json_encode($a,JSON_PRETTY_PRINT);
            echo $list_json;
        }
        else{
            $a=array(
                "error"=>"false",
                "message"=>"login succesfull",
                "no_telepon"=>$result[0]['no_telepon'],
                "e_mail"=>$result[0]['e_mail'],
                "idCustomer"=>$result[0]['idCustomer'],
                "nama"=>$result[0]['nama'],
                "saldo"=>$result[0]['saldo']
            );
            $list_json = json_encode($a,JSON_PRETTY_PRINT);
            echo $list_json;
        }
        
    }
}
?>