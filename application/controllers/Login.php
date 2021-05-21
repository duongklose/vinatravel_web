
<?php

class Login extends CI_Controller{
    public function __construct(){
        parent :: __construct();
    }

    public function verify_login(){
        $this->load->view('login');
        $phone = $this->input->post('phone');
        $password = $this->input->post('pass');

        $this->load->model('TransportationModel');
        $res = $this->TransportationModel->checkLogin($phone, $password);
        if($res == '1'){
            //tạo session cho người dùng
            $this->session->set_userdata('loginSuccess', $phone);
            //chuyển hướng
            redirect('home/add_trip','refresh');

        }else{
            // echo 'Đăng nhập thất bại.';
        }
    }
}
