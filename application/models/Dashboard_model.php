<?php

class Dashboard_model extends CI_Model {

    public function get_user()
    {
        $query = "SELECT * FROM user 
                    WHERE username = " . "'" . $this->session->userdata('username') . "'";

        $result = $this->db->query($query)->row_array();
        return $result;
    }

    public function get_menu()
    {
        $query = "SELECT m.id_menu, link, nama_menu, icon FROM user u
                    INNER JOIN hak_akses h ON h.level_akses = u.level_akses
                    INNER JOIN daftar_akses d ON d.level_akses = h.level_akses
                    INNER JOIN menu m ON m.id_menu = d.id_menu
                    WHERE username = " . "'" . $this->session->userdata('username') . "'";

        $result = $this->db->query($query)->result_array();

        return $result;
    }
}