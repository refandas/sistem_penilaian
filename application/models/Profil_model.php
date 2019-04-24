<?php

class Profil_model extends CI_Model {

    public function get_user($username)
    {
        $query = "SELECT * FROM user
                  WHERE username = " . "'" . $username . "'";

        $result = $this->db->query($query)->row_array();
        return $result;
    }
}