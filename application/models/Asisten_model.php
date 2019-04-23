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

    public function daftar_mhs($kode_jadwal)
    {
        // output info mhs, nim, nilai, dsb
        $query = "SELECT mhs.nim, mhs.nama, n.harian, n.kuis, n.responsi, n.project, n.nilai_akhir FROM manaj_nilai n
                  INNER JOIN mahasiswa mhs ON mhs.nim = n.nim
                  WHERE n.kode_jadwal = " . $kode_jadwal;
        
        $result = $this->db->query($query);
        return $result;
    }

    public function daftar_nilai($nim)
    {
        $query = "SELECT mhs.nama AS 'nama', mhs.nim AS 'nim', harian, kuis, responsi, project, nilai_akhir FROM manaj_nilai n
                  INNER JOIN mahasiswa mhs ON mhs.nim = n.nim
                  WHERE n.nim = " . "'" . $nim . "'";

        $result = $this->db->query($query)->row_array();
        return $result;
    }

    public function save($data, $kode_jadwal)
    {
        $query = "UPDATE manaj_nilai
                  SET
                    harian = " . $data['harian'] . ", " . "
                    kuis = " . $data['kuis'] . ", " . "
                    responsi = " . $data['responsi'] . ", " . "
                    project = " . $data['project'] . ", " . "
                    nilai_akhir = " . $data['nilai_akhir'] . "
                  WHERE nim = " . "'" . $data['nim'] . "' AND kode_jadwal = " . "'" . $kode_jadwal ."'";
                    
        $result = $this->db->query($query);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Input sukses</div>');

        return $result;
    }

    public function kirim_nilai($kode_jadwal)
    {
        $query = "INSERT INTO manaj_nilai
                  SET acc = 0
                  WHERE kode_jadwal = " . $kode_jadwal;

        $result = $this->db->query($query);
        return $result;
    }
}
