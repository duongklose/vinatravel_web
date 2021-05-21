<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class CoachModel extends CI_Model {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        function get_all_coach($id_transportation){
            // echo $id_transportation ."<br>";
            // $this->db->where('id_transportation', $id_transportation);
            // $query = $this->db->get('coaches');
            $sql = "Select * from `coaches` where `id_transportation`=" .$id_transportation;
            $query = $this->db->query($sql)->result();
            // print_r($query);
            return $query;
        }
        
    
    }
    
    
?>