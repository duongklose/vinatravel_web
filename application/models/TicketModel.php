<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TicketModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_info($id_trip)
    {
        $sql = "SELECT seats.name as seat_name, users.phone, l1.name as startLocation, l2.name as endLocation, payment_method
                FROM (SELECT * FROM tickets WHERE tickets.id_trip=".$id_trip.") AS tk
                LEFT JOIN users
                ON tk.id_user=users.id LEFT JOIN (locations as l1)
                ON tk.start_location= l1.id LEFT JOIN (locations as l2)
                ON tk.end_location = l2.id LEFT JOIN seat_ticket_trip
                ON tk.id=seat_ticket_trip.id_ticket LEFT JOIN seats
                ON seat_ticket_trip.id_seat=seats.id";
        return $this->db->query($sql)->result();
    }

    public function add_ticket($id_trip, $id_user, $startLocation, $endLocation)
    {
        $date = new DateTime();
        $data = array(
                'id_trip' => $id_trip,
                'id_user' => $id_user,
                'book_date' => $date->format('Y-m-d H:i:s'),
                'state' => 'booked',
                'start_location' => $startLocation,
                'end_location' => $endLocation,
                'payment_method' => 'Tiền mặt'
            );
        $this->db->insert('tickets',$data);
    }
    function get_id_newest_ticket($id_trip, $id_user)
    {
        $this->db->select('id');
        $this->db->where('id_trip', $id_trip);
        $this->db->where('id_user', $id_user);
        return $this->db->get('tickets')->result();
    }
    function add_seat_ticket_trip($id_trip, $id_seat, $id_ticket){
        $data = array(
            'id_seat' => $id_seat,
            'id_trip' => $id_trip,
            'id_ticket' => $id_ticket
        );
        $this->db->insert('seat_ticket_trip',$data);
    }
}
?>