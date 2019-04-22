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

    public function daftar_mhs($kode_jadwal)
    {
        $data = [
            'judul'         => 'Input Nilai',
            'user'          => $this->dashboard_model->get_user(),
            'menu'          => $this->dashboard_model->get_menu(),
            'jadwal'        => $kode_jadwal,
            'nilai'         => $this->asisten_model->daftar_mhs($kode_jadwal)
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('asisten/daftar_mhs', $data);
        $this->load->view('templates/footer', $data);
    }

    public function input_nilai($nim)
    {
        $data = [
            'user'  => $this->dashboard_model->get_user(),
            'menu'  => $this->dashboard_model->get_menu(),
            'nim'   => $nim,
            'nilai' => $this->asisten_model->daftar_nilai($nim)
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('asisten/input_nilai', $data);
        $this->load->view('templates/footer', $data);
    }

    public function save($nim)
    {   
        $harian     = $this->input->post('harian');
        $kuis       = $this->input->post('kuis');
        $responsi   = $this->input->post('responsi');
        $project    = $this->input->post('project');
        $nilai_akhir = 
            20 / 100 * $harian +
            20 / 100 * $kuis +
            25 / 100 * $project +
            35 / 100 * $responsi;

        $data = [
            'judul'         => 'Input Nilai',
            'nim'           => $nim,
            'harian'        => $harian,
            'kuis'          => $kuis,
            'responsi'      => $responsi,
            'project'       => $project,
            'nilai_akhir'   => $nilai_akhir
        ];

        $this->asisten_model->save($data);
        $back = "asisten/input_nilai/" . $nim;
        redirect($back);
    }
}