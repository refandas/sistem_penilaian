<?php

class Admin_model extends CI_Model {

    public function get_koor()
    {
        $query = "SELECT * FROM user 
                  WHERE level_akses = 2
                  ORDER BY aktif, nama";

        $result = $this->db->query($query);
        return $result;
    }

    public function get_dosen()
    {
        $query = "SELECT * FROM user 
                  WHERE level_akses = 3
                  ORDER BY aktif, nama";

        $result = $this->db->query($query);
        return $result;
    }

    public function get_asisten()
    {
        $query = "SELECT * FROM user
                  WHERE level_akses = 4
                  ORDER BY aktif, nama";

        $result = $this->db->query($query);
        return $result;
    }

    public function get_user($username)
    {
        $query = "SELECT * FROM user
                  WHERE username = " . "'" . $username . "'";

        $result = $this->db->query($query)->row_array();
        return $result;
    }

    public function ganti_koor($data)
    {
        $query = "UPDATE user
                  SET level_akses = 3
                  WHERE username = " . "'" . $data['koor_lama'] . "'";
        $this->db->query($query);

        $query = "UPDATE user
                  SET level_akses = 2
                  WHERE username = " . "'" . $data['koor_baru'] . "'";
        $this->db->query($query);

        redirect('admin/kelola_koor');
    }

    public function nonaktif_user($username)
    {
        $query = "UPDATE user
                  SET aktif = 0
                  WHERE username = " . "'" . $username . "'";

        $this->db->query($query);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil dinonaktifkan</div>');
    }

    public function aktifkan_user($username)
    {
        $query = "UPDATE user
                  SET aktif = 1
                  WHERE username = " . "'" . $username . "'";

        $this->db->query($query);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil diaktifkan</div>');
    }
}