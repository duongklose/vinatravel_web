<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class TripModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all_info_trips($id_transportation)
    {
        $sql = "Select filted_trip.id as id_trip, license_plate, p1.name as departure_location, p2.name as arrival_location, departure_time, arrival_time, price
        From (SELECT * from trips WHERE trips.id_transportation=" .$id_transportation .") as filted_trip
        Left join coaches
        On filted_trip.id_coach=coaches.id LEFT JOIN provinces as p1
        On filted_trip.departure_location=p1.id LEFT JOIN provinces AS p2
        ON filted_trip.arrival_location=p2.id";

        // $sql = "Select trips.id as id_trip, license_plate, p1.name as departure_location, p2.name as arrival_location, departure_time, arrival_time, price
        //         From trips
        //         Left join coaches
        //         On trips.id_coach=coaches.id LEFT JOIN provinces as p1
        //         On trips.departure_location=p1.id LEFT JOIN provinces AS p2
        //         ON trips.arrival_location=p2.id";
        // $this->db->select('license_plate,departure_location,arrival_location,departure_time,arrival_time,price');
        // $this->db->from('trips');
        // $this->db->join('coaches','id_coach = id','left');
        $query = $this->db->query($sql)->result();
        return $query;
    }

    public function delete_trip($id_trip)
    {
        $this->db->delete('trips', array('id' => $id_trip));
    }
}

?>