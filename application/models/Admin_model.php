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

    public function get_dosen_pengganti_koor()
    {
        $query = "SELECT * FROM user
                  WHERE level_akses = 3 AND aktif = 1
                  ORDER BY nama";

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
        if(strcmp($data['koor_baru'], "null") != 0)
        {
            $query = "UPDATE user
            SET level_akses = 3
            WHERE username = " . "'" . $data['koor_lama'] . "'";
            $this->db->query($query);

            $query = "UPDATE user
                        SET level_akses = 2
                        WHERE username = " . "'" . $data['koor_baru'] . "'";
            $this->db->query($query);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Koordinator berhasil diganti</div>');
        }
        else
        {
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Pilih pengganti koordinator terlebih dahulu</div>');
        }

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

    public function get_jadwal()
    {
        $query = "SELECT  j.kode_jadwal, m.nama, j.plug, j.hari, j.waktu, j.tempat, j.tahun_ajar FROM jadwal j
                  INNER JOIN mka_praktikum m ON m.kode_mka = j.kode_mka
                  ORDER BY j.tahun_ajar, m.nama";

        $result = $this->db->query($query);
        return $result; 
    }

    public function set_jadwal_asisten($data)
    {
        $query = "INSERT INTO kelas_prak
                  VALUES (" . "'" . $data['username'] . "', " . $data['kode_jadwal'] . ")";

        $this->db->query($query);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil diaktifkan</div>');
    }
}