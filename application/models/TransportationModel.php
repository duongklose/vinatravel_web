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
        public function addTrip($idTransportation, $coach, $startLocation, $endLocation, $startTime, $endTime, $price)
        {
            $sql = "Insert into `trips`(`id_transportation`, `id_coach`, `departure_time`, `arrival_time`, `departure_location`, `arrival_location`, `price`) VALUES ("
            .$idTransportation ."," .$coach .",'" .$startTime ."','" .$endTime ."'," .$startLocation ."," .$endLocation ."," .$price
            .");";
            $this->db->query($sql);
            // $data = array(
            //     'id_transportation' => $idTransportation,
            //     'id_coach' => $coach,
            //     'departure_time' => $startTime,
            //     'arrival_time' => $endTime,
            //     'departure_location' => $startLocation,
            //     'arrival_location' => $endLocation,
            //     'price' => $price
            // );
            // $this->db->insert('trips',$data);
        }

        public function getIdTransportationByPhone($phone)
        {
            $res = $this->db->query("Select id from `transportations` where phone=" .$phone)->result_array();
            return $res[0]['id'];
        }

        public function getIdCoachByLicensePlate($license_plate)
        {
            $res = $this->db->query("Select id from `coaches` where license_plate=" .$license_plate)->result_array();
            return $res[0]['id'];
        }
    }
?>