<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class TransportationModel extends CI_Model {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        
        public function checkLogin($phone, $pass)
        {
           $this->db->where('phone', $phone);
           $this->db->where('pass', $pass);
           return $this->db->get('transportations')->num_rows();
        }
        public function addTrip($idTransportation, $coach, $startLocation, $endLocation, $startTime, $timeToGo, $price)
        {

            $this->db->query("Select id from `transportations` where phone=");
            
        }

        public function getIdTransportationByPhone($phone)
        {
            $res = $this->db->query("Select id from `transportations` where phone=" .$phone)->result_array();
            return $res[0]['id'];
        }
    }
?>