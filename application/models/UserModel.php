<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function get_id_user_by_phone($phone)
    {
        $this->db->select('id');
        $this->db->where('phone', $phone);
        return $this->db->get('users')->result();
    }

    function add_new_user($phone){
        $object = array('phone' => $phone);
        $this->db->insert('users', $object);
    }

}
?>