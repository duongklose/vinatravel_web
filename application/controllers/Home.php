<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Home extends CI_Controller {
        
        public function __construct()
        {
            parent::__construct();
            $this->load->library('session');
        }
        
        public function add_trip()
        {
            if($this->session->userdata('loginSuccess')){
                $this->load->view('add_trip');
            }else{
                redirect('login/verify_login','refresh');
            }
        }
        public function update_trip()
        {
            if($this->session->userdata('loginSuccess')){
                $this->load->view('update_trip');
            }else{
                redirect('login/verify_login','refresh');
            }
        }
        public function logout()
        {
            if($this->session->userdata('loginSuccess')){
                $this->session->unset_userdata('loginSuccess');
                redirect('login/verify_login','refresh');
            }
        }
        public function addTrip(){
            $phone = $this->session->userdata('loginSuccess');
            if($phone){
                $this->load->model('TransportationModel');

                //xác định id Nhà xe đang thêm dữ liệu
                $idTransportation = $this->TransportationModel->getIdTransportationByPhone($phone);

                //thêm dữ liệu chuyến đi vào database
                $coach = $this->input->post('coach');
                $startLocation = $this->input->post('startLocation');
                $endLocation = $this->input->post('endLocation');
                $startTime = $this->input->post('starttime');
                $timeToGo = $this->input->post('timeToGo');
                $price = $this->input->post('price');

                $this->TransportationModel->addTrip($idTransportation, $coach, $startLocation, $endLocation, $startTime, $timeToGo, $price);
            }else{
                redirect('login/verify_login','refresh');
            }
        }
    }
        
?>