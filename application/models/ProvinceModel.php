<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class ProvinceModel extends CI_Model {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        function get_all_provinces(){
            $query = $this->db->get('provinces');
            return $query;  
        }
        function get_all_location($provinceID){
            $this->db->where('id_province', $provinceID);
            return $this->db->get('locations');
        }
    }
?>