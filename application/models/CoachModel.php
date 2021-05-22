<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class CoachModel extends CI_Model {
    
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }

        function get_all_coach($id_transportation){
            $sql = "Select `coaches`.`id` as id_coach, `license_plate`, `num_of_seats`, `coach_type`.`name` as type, `description`
            from `coaches`,`coach_type`  where `coaches`.`type`=`coach_type`.`id` AND `id_transportation`=" .$id_transportation;
            $query = $this->db->query($sql)->result();
            return $query;
        }
        
        function delete_coach($id_coach){
            $this->db->delete('coaches', array('id' => $id_coach));
        }

        function get_all_type_coach(){
            return $this->db->get('coach_type')->result();
        }

        function addCoach($idTransportation, $numOfSeats, $licensePlate, $description, $type){
            if($description != NULL){
                $data = array(
                    'id_transportation' => $idTransportation,
                    'num_of_seats' => $numOfSeats,
                    'license_plate' => $licensePlate,
                    'description' => $description,
                    'type' => $type
                );
                $this->db->insert('coaches',$data);
            }else{
                $data = array(
                    'id_transportation' => $idTransportation,
                    'num_of_seats' => $numOfSeats,
                    'license_plate' => $licensePlate,
                    'type' => $type
                );
                $this->db->insert('coaches',$data);
            }
        }

        function checkCoachExist($licensePlate){
            $this->db->where('license_plate', $licensePlate);
            return $this->db->get('coaches')->num_rows();
        }
    }
    
    
?>