<?php

class Admin_model extends CI_Model {

    public function get_koor()
    {
        $query = "SELECT * FROM user WHERE level_akses = 2";

        $result = $this->db->query($query);
        return $result;
    }

    public function get_dosen()
    {
        $query = "SELECT * FROM user 
                    WHERE level_akses = 3
                    ORDER BY nama";

        $result = $this->db->query($query);
        return $result;
    }

    public function get_asisten()
    {
        $query = "SELECT * FROM user
                    WHERE level_akses = 4
                    ORDER BY nama";

        $result = $this->db->query($query);
        return $result;
    }
}