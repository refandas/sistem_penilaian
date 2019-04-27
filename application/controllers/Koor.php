<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Koor extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model');
        $this->load->model('koor_model');
    }

    public function nilai_masuk()
    {
        $data = array(
            'judul' => 'Nilai Masuk',
            'user'  => $this->dashboard_model->get_user(),
            'menu'  => $this->dashboard_model->get_menu(),
            'nilai' => $this->koor_model->get_nilai_masuk()
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('koor/nilai_masuk', $data);
        $this->load->view('templates/footer');
    }

    public function nilai_telah_acc()
    {
        $data = array(
            'judul' => 'Nilai Telah Acc',
            'user'  => $this->dashboard_model->get_user(),
            'menu'  => $this->dashboard_model->get_menu(),
            'nilai' => $this->koor_model->get_nilai_masuk()
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('koor/nilai_telah_acc', $data);
        $this->load->view('templates/footer');
    }       

    public function acc_nilai($kode_jadwal)
    {
        $data = array(
            'judul'         => 'Acc Nilai',
            'user'          => $this->dashboard_model->get_user(),
            'menu'          => $this->dashboard_model->get_menu(),
            'kode_jadwal'   => $kode_jadwal,
            'nama_mka'      => $this->koor_model->get_mka($kode_jadwal),
            'asisten'       => $this->koor_model->get_asisten($kode_jadwal),
            'plug'          => $this->koor_model->get_plug($kode_jadwal),
            'daftar_nilai'  => $this->koor_model->get_detail_kelas($kode_jadwal)
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('koor/acc_nilai', $data);
        $this->load->view('templates/footer', $data);
    }

    public function save($kode_jadwal)
    {
        $data = array(
            'kode_jadwal'   => $kode_jadwal
        );

        $this->koor_model->acc($data);

        redirect('koor/nilai_masuk');
    }
}
