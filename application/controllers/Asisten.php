<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asisten extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model');
        $this->load->model('asisten_model');
    }

    public function tampil_daftar_kelas()
    {
        $data = [
            'judul'         => 'Input Nilai',
            'user'          => $this->dashboard_model->get_user(),
            'menu'          => $this->dashboard_model->get_menu(),
            'daftar_input'  => $this->asisten_model->daftar_input_nilai()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('asisten/daftar_kelas', $data);
        $this->load->view('templates/footer', $data);
    }

    public function input_nilai()
    {
        $data = [
            'judul'         => 'Input Nilai',
            'user'          => $this->dashboard_model->get_user(),
            'menu'          => $this->dashboard_model->get_menu(),
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('asisten/daftar_mhs', $data);
        $this->load->view('templates/footer', $data);
    }
}