<?php

class Penilaian_model extends CI_Model {

    public function get_tahun_ajar()
    {
        $query = "SELECT DISTINCT tahun_ajar FROM jadwal";

        $result = $this->db->query($query);
        return $result;
    }

    public function get_mka()
    {
        $query = "SELECT * FROM mka_praktikum
                    ORDER BY nama";

        $result = $this->db->query($query);
        return $result;
    }

    public function get_nilai($data)
    {
        $query = "SELECT j.kode_mka, m.nama, n.nim, mhs.nama, n.harian, n.kuis, n.responsi, n.project, n.nilai_akhir FROM jadwal j
                    INNER JOIN mka_praktikum m ON m.kode_mka = j.kode_mka
                    INNER JOIN manaj_nilai n ON n.kode_jadwal = j.kode_jadwal
                    INNER JOIN mahasiswa mhs ON mhs.nim = n.nim
                    WHERE j.kode_mka = " . "'" . $data['kode_mka'] . "'" . " AND j.tahun_ajar = " . "'" . $data['tahun_ajar'] . "'" . " AND acc = 1";

        if(strcmp($data['plug'], "null") != 0) {
            $query .= " AND j.plug = ". "'" . $data['plug'] . "'" . " AND acc = 1";   
        }

        $result = $this->db->query($query);
        return $result;
    }
}