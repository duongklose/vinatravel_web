
<?php

class Login extends CI_Controller{
    public function __construct(){
        parent :: __construct();
    }

    function index(){
        $this->load->view('login');
    }
    public function verify_login(){
        $phone = $this->input->post('phone');
        $password = $this->input->post('pass');

        $this->load->model('TransportationModel');
        $res = $this->TransportationModel->checkLogin($phone, $password);
        if($res == '1'){
            //tạo session cho người dùng
            $this->session->set_userdata('loginSuccess', $phone);
            //chuyển hướng
            redirect('home','refresh');

        }else{
            redirect('login','refresh');
        }
    }
}
