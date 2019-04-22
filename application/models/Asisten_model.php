<?php

class Asisten_model extends CI_Model {

    public function daftar_input_nilai()
    {
        $query = "SELECT 
                    j.kode_jadwal,
                    mka.nama AS 'nama_mka',
                    u.username,
                    plug
                  FROM jadwal j
                  INNER JOIN mka_praktikum mka ON mka.kode_mka = j.kode_mka
                  INNER JOIN kelas_prak k ON k.kode_jadwal = j.kode_jadwal
                  INNER JOIN user u ON u.username = k.asisten
                  WHERE k.asisten = " . "'" . $this->session->userdata('username') . "'";

        $result = $this->db->query($query);
        return $result;
    }

    public function daftar_mhs()
    {
        // output info mhs, nim, nilai, dsb
    }
}
