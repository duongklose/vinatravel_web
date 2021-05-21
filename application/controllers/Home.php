<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Home extends CI_Controller {
        
        public function __construct()
        {
            parent::__construct();
            $this->load->library('session');
            $this->load->model('TripModel');
            $this->load->model('TransportationModel');
            $this->load->model('CoachModel');
            $this->load->model('ProvinceModel');
        }
        
        function index(){
            if($this->session->userdata('loginSuccess')){
                $phone = $this->session->userdata('loginSuccess');
                $id_transportation = $this->TransportationModel->getIdTransportationByPhone($phone);
                $data['trips'] = $this->TripModel->get_all_info_trips($id_transportation);
                $this->load->view('manage_trip',$data);
            }else{
                redirect('login/verify_login','refresh');
            }
        }
        public function add_trip()
        {
            if($this->session->userdata('loginSuccess')){

                $phone = $this->session->userdata('loginSuccess');
                $id_transportation = $this->TransportationModel->getIdTransportationByPhone($phone);
                $data['coaches'] = $this->CoachModel->get_all_coach($id_transportation);
                $data['provinces'] = $this->ProvinceModel->get_all_provinces()->result();
                $this->load->view('add_trip', $data);
            }else{
                redirect('login/verify_login','refresh');
            }
        }
        public function delete_trip()
        {
            if($this->session->userdata('loginSuccess')){
                $id_trip = $this->uri->segment(3);
                $this->TripModel->delete_trip($id_trip);
                $this->session->set_flashdata('msg','<div class="alert alert-success">Đã xóa chuyến đi</div>');
                redirect('home');
            }else{
                redirect('login/verify_login','refresh');
            }
        }
        public function logout()
        {
            if($this->session->userdata('loginSuccess')){
                $this->session->unset_userdata('loginSuccess');
                redirect('login','refresh');
            }
        }
        public function addTrip(){
            $phone = $this->session->userdata('loginSuccess');
            if($phone){

                //xác định id Nhà xe đang thêm dữ liệu
                $idTransportation = $this->TransportationModel->getIdTransportationByPhone($phone);

                //thêm dữ liệu chuyến đi vào database
                $coach = $this->input->post('coach');
                $startLocation = $this->input->post('startLocation');
                $endLocation = $this->input->post('endLocation');
                $startTime = date('Y-m-d H:i:s', strtotime($this->input->post('starttime')));
                $timeToGo = $this->input->post('timeToGo');
                $price = $this->input->post('price');

                //xử lý thời gian đến
                $time_stamp = strtotime($startTime);
                $endTime = date('Y-m-d H:i:s',$time_stamp + (float)$timeToGo *60*60);

                //gửi dữ liệu sang model, chưa check lại code đoạn lấy id coach để thêm vào db nên có thể sẽ bug
                $this->TransportationModel->addTrip($idTransportation, $coach, $startLocation, $endLocation, $startTime, $endTime, $price);
                //Thông báo thêm thành công, load lại màn hình
                // $message = "Thêm thành công!!!";
                // echo "<script type='text/javascript'>alert('$message');</script>";
                $this->session->set_flashdata('msg','<div class="alert alert-success">Thêm thành công.</div>');
                redirect('home/add_trip','refresh');

            }else{
                redirect('login/verify_login','refresh');
            }
        }
    }
        
?>