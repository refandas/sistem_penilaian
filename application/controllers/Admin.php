<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('dashboard_model');
    }
    
    public function kelola_pengguna()
    {
        $data = [
            'judul' => 'Kelola Pengguna',
            'user'  => $this->dashboard_model->get_user(),
            'menu'  => $this->dashboard_model->get_menu()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kelola_pengguna');
        $this->load->view('templates/footer');
    }

    public function kelola_koor()
    {
        $data = [
            'judul' => 'Kelola Koor',
            'user'  => $this->dashboard_model->get_user(),
            'menu'  => $this->dashboard_model->get_menu(),
            'koor'  => $this->admin_model->get_koor()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kelola_koor', $data);
        $this->load->view('templates/footer');
    }

    public function kelola_dosen()
    {
        $data = [
            'judul' => 'Kelola Dosen',
            'user'  => $this->dashboard_model->get_user(),
            'menu'  => $this->dashboard_model->get_menu(),
            'dosen' => $this->admin_model->get_dosen()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kelola_dosen', $data);
        $this->load->view('templates/footer');
    }

    public function kelola_asisten()
    {
        $data = [
            'judul'     => 'Kelola Asisten',
            'user'      => $this->dashboard_model->get_user(),
            'menu'      => $this->dashboard_model->get_menu(),
            'asisten'   => $this->admin_model->get_asisten()
        ];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kelola_asisten', $data);
        $this->load->view('templates/footer');
    }

    public function nonaktif($level_akses, $username)
    {
        $this->admin_model->nonaktif_user($username);

        if($level_akses == 2)
            redirect('admin/kelola_koor');
        else if($level_akses == 3)
            redirect('admin/kelola_dosen');
        else if($level_akses == 4)
            redirect('admin/kelola_asisten');
    }

    public function aktifkan($level_akses, $username)
    {
        $this->admin_model->aktifkan_user($username);
        
        if($level_akses == 2)
            redirect('admin/kelola_koor');
        else if($level_akses == 3)
            redirect('admin/kelola_dosen');
        else if($level_akses == 4)
            redirect('admin/kelola_asisten');
    }
}
