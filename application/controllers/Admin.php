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
        $data['judul']  = 'Kelola Pengguna';
        $data['user']   = $this->dashboard_model->get_user();
        $data['menu']   = $this->dashboard_model->get_menu();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kelola_pengguna');
    }

    public function kelola_koor()
    {
        $data['judul']  = 'Kelola Koor';
        $data['user']   = $this->dashboard_model->get_user();
        $data['menu']   = $this->dashboard_model->get_menu();
        $data['koor']   = $this->admin_model->get_koor();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kelola_koor', $data);
    }

    public function kelola_dosen()
    {
        $data['judul']  = 'Kelola Dosen';
        $data['user']   = $this->dashboard_model->get_user();
        $data['menu']   = $this->dashboard_model->get_menu();
        $data['dosen']  = $this->admin_model->get_dosen();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kelola_dosen', $data);
    }

    public function kelola_asisten()
    {
        $data['judul']  = 'Kelola Asisten';
        $data['user']   = $this->dashboard_model->get_user();
        $data['menu']   = $this->dashboard_model->get_menu();
        $data['asisten']= $this->admin_model->get_asisten();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kelola_asisten', $data);
    }

}
