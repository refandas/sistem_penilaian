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
        $data['judul']  = 'Daftar Nilai';
        $data['user']   = $this->dashboard_model->get_user();
        $data['menu']   = $this->dashboard_model->get_menu();
        $data['tahun']  = $this->penilaian_model->get_tahun_ajar();
        $data['mka']    = $this->penilaian_model->get_mka();

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

        $data = [
            'tahun_ajar' => $tahun_ajar,
            'kode_mka'   => $kode_mka,
            'plug'       => $plug
        ];

        $data['nilai'] = $this->penilaian_model->get_nilai($data);

        $data['judul']  = 'Daftar Nilai';
        $data['user']   = $this->dashboard_model->get_user();
        $data['menu']   = $this->dashboard_model->get_menu();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('daftar_nilai', $data);
    }
}