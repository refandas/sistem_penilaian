<?php

class Koor_model extends CI_Model {

    public function get_nilai_masuk()
    {
        $query = "SELECT DISTINCT
                m.nama AS " . "'nama_mka'" . ",
                j.kode_jadwal,
                plug,
                acc
                FROM jadwal j
                INNER JOIN mka_praktikum m ON m.kode_mka = j.kode_mka
                INNER JOIN kelas_prak k ON k.kode_jadwal = j.kode_jadwal
                INNER JOIN user u ON u.username = k.asisten
                INNER JOIN manaj_nilai n ON n.kode_jadwal = j.kode_jadwal
                ORDER BY nama_mka, plug";

        $result = $this->db->query($query);
        return $result;
    }

    public function get_detail_kelas($kode_jadwal)
    {
        $query = "SELECT 
                    mhs.nama AS 'nama_mhs', 
                    mhs.nim,
                    harian, 
                    kuis, 
                    responsi, 
                    project, 
                    nilai_akhir
                   FROM manaj_nilai n
                   INNER JOIN mahasiswa mhs ON mhs.nim = n.nim
                   INNER JOIN jadwal j ON j.kode_jadwal = n.kode_jadwal
                   INNER JOIN mka_praktikum mka ON mka.kode_mka = j.kode_mka
                   WHERE n.kode_jadwal = " . $kode_jadwal;

        $result = $this->db->query($query);
        return $result;
    }

    public function get_mka($kode_jadwal)
    {
        $query = "SELECT mka.nama AS 'nama' FROM jadwal j
                  INNER JOIN mka_praktikum mka ON mka.kode_mka = j.kode_mka
                  WHERE j.kode_jadwal = " . $kode_jadwal;

        $result = $this->db->query($query)->row_array();
        return $result;
    }

    public function get_asisten($kode_jadwal)
    {
        $query = "SELECT u.nama FROM jadwal j
                  INNER JOIN kelas_prak k ON k.kode_jadwal = j.kode_jadwal
                  INNER JOIN user u ON u.username = k.asisten
                  WHERE j.kode_jadwal = " . $kode_jadwal;

        $result = $this->db->query($query);
        return $result;
    }

    public function get_plug($kode_jadwal)
    {
        $query = "SELECT plug FROM jadwal
                  WHERE kode_jadwal = " . $kode_jadwal;

        $result = $this->db->query($query)->row_array();
        return $result;
    }

    public function acc($data)
    {
        $query = "UPDATE manaj_nilai
                  SET acc = 1
                  WHERE kode_jadwal = " . "'" . $data['kode_jadwal'] . "'";
        
        $result = $this->db->query($query);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Acc sukses</div>');

        return $result;
    }
}