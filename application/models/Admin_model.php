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

    public function hapus_anggota($username)
    {
        $query = "DELETE FROM user 
                  WHERE username = " . "'" . $username . "'";
        
        $this->db->query($query);
    }

    public function edit_user($username)
    {
        $query = "SELECT * FROM user
                  WHERE username = " . "'" . $username . "'";

        $result = $this->db->query($query)->row_array();
        return $result;
    }
}