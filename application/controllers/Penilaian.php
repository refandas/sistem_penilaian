<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('penilaian_model');
        $this->load->model('dashboard_model');
    }

    public function index()
    {
        $data = array(
            'judul' => 'Daftar Nilai',
            'user'  => $this->dashboard_model->get_user(),
            'menu'  => $this->dashboard_model->get_menu(),
            'tahun' => $this->penilaian_model->get_tahun_ajar(),
            'mka'   => $this->penilaian_model->get_mka()
        );

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('penilaian');
        $this->load->view('templates/footer');
    }

    public function lihat_nilai()
    {
        $tahun_ajar = $this->input->post('tahun_ajar');
        $kode_mka   = $this->input->post('kode_mka');
        $plug       = $this->input->post('plug');

        $data = array(
            'judul'      => 'Daftar Nilai',
            'tahun_ajar' => $tahun_ajar,
            'kode_mka'   => $kode_mka,
            'plug'       => $plug,
            'user'       => $this->dashboard_model->get_user(),
            'menu'       => $this->dashboard_model->get_menu()
        );

        $data['nilai'] = $this->penilaian_model->get_nilai($data);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('daftar_nilai', $data);
        $this->load->view('templates/footer');
    }
}