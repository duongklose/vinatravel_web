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

        // $this->db->select('license_plate,departure_location,arrival_location,departure_time,arrival_time,price');
        // $this->db->from('trips');
        // $this->db->join('coaches','id_coach = id','left');
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function delete_trip($id_trip)
    {
        $this->db->delete('trips', array('id' => $id_trip));
    }

    function get_province($id_trip)
    {
        $this->db->select('departure_location,arrival_location');
        $this->db->where('id', $id_trip);
        return $this->db->get('trips');
    }
    function get_emptyseatA($id_trip){
        //get id coach
        $this->db->select('id_coach');
        $this->db->where('id', $id_trip);
        $coachId = $this->db->get('trips')->result()[0]->id_coach;

        $sql = "SELECT * FROM (Select id_seat, name 
                                from (Select * from coach_seat where id_coach =".$coachId. " AND (id_seat BETWEEN 1 AND 10)) as cs
                                left join seats
                                on cs.id_seat = seats.id) as s1
                WHERE name NOT IN (Select name 
                                from (SELECT id_seat FROM `seat_ticket_trip` WHERE id_trip=".$id_trip.") as stt
                                left join seats
                                on stt.id_seat = seats.id)";
        $query = $this->db->query($sql)->result();
        return $query;
    }
    function get_emptyseatB($id_trip){
        //get id coach
        $this->db->select('id_coach');
        $this->db->where('id', $id_trip);
        $coachId = $this->db->get('trips')->result()[0]->id_coach;

        $sql = "SELECT * FROM (Select id_seat, name 
                                from (Select * from coach_seat where id_coach =".$coachId. " AND (id_seat BETWEEN 11 AND 20)) as cs
                                left join seats
                                on cs.id_seat = seats.id) as s1
                WHERE name NOT IN (Select name 
                                from (SELECT id_seat FROM `seat_ticket_trip` WHERE id_trip=".$id_trip.") as stt
                                left join seats
                                on stt.id_seat = seats.id)";
        $query = $this->db->query($sql)->result();
        return $query;
    }
    function get_emptyseatC($id_trip){
        //get id coach
        $this->db->select('id_coach');
        $this->db->where('id', $id_trip);
        $coachId = $this->db->get('trips')->result()[0]->id_coach;

        $sql = "SELECT * FROM (Select id_seat, name 
                                from (Select * from coach_seat where id_coach =".$coachId. " AND (id_seat BETWEEN 21 AND 30)) as cs
                                left join seats
                                on cs.id_seat = seats.id) as s1
                WHERE name NOT IN (Select name 
                                from (SELECT id_seat FROM `seat_ticket_trip` WHERE id_trip=".$id_trip.") as stt
                                left join seats
                                on stt.id_seat = seats.id)";
        $query = $this->db->query($sql)->result();
        return $query;
    }
    function get_emptyseatD($id_trip){
        //get id coach
        $this->db->select('id_coach');
        $this->db->where('id', $id_trip);
        $coachId = $this->db->get('trips')->result()[0]->id_coach;

        $sql = "SELECT * FROM (Select id_seat, name 
                                from (Select * from coach_seat where id_coach =".$coachId. " AND (id_seat BETWEEN 31 AND 40)) as cs
                                left join seats
                                on cs.id_seat = seats.id) as s1
                WHERE name NOT IN (Select name 
                                from (SELECT id_seat FROM `seat_ticket_trip` WHERE id_trip=".$id_trip.") as stt
                                left join seats
                                on stt.id_seat = seats.id)";
        $query = $this->db->query($sql)->result();
        return $query;
    }

    function get_statistics($year, $idTransportation){
        $sql = "SELECT t1.id_transportation, t1.m, t1.y, num, p
                FROM (SELECT id_transportation, SUM(price) as p, MONTH(departure_time) as m, YEAR(departure_time) as y
                        FROM (SELECT id_transportation, departure_time, price FROM trips, tickets WHERE trips.id=tickets.id_trip) as t
                        GROUP BY(MONTH(departure_time))) as t1,
                 
                        (SELECT COUNT(*) as num, MONTH(departure_time) as m, YEAR(departure_time) as y
                        FROM trips
                        GROUP BY(MONTH(departure_time))) as t2
                WHERE t1.m=t2.m AND t1.y=t2.y AND t1.y =".$year." AND t1.id_transportation = " .$idTransportation;
        $query = $this->db->query($sql)->result();
        return $query;
    }
    function get_statistics_by_year($idTransportation){
        $sql = "SELECT t1.id_transportation, t1.y, num, p
                FROM (SELECT id_transportation, SUM(price) as p, YEAR(departure_time) as y
                        FROM (SELECT id_transportation, departure_time, price FROM trips, tickets WHERE trips.id=tickets.id_trip) as t
                        GROUP BY(YEAR(departure_time))) as t1,
                 
                        (SELECT COUNT(*) as num, YEAR(departure_time) as y
                        FROM trips
                        GROUP BY(YEAR(departure_time))) as t2
                WHERE t1.y=t2.y AND t1.id_transportation = " .$idTransportation;
        $query = $this->db->query($sql)->result();
        return $query;
    }
}

?>