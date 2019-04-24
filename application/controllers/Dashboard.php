<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model');
    }

	public function index()
	{
        $data['judul']  = 'Dashboard';
        $data['user']   = $this->dashboard_model->get_user();
        $data['menu']   = $this->dashboard_model->get_menu();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);

        if($data['user']['level_akses'] == 1)
            $this->load->view('admin/index');
        else if($data['user']['level_akses'] == 2)
            $this->load->view('koor/index');
        else if($data['user']['level_akses'] == 3)
            $this->load->view('dosen/index');
        else
            $this->load->view('asisten/index');
        
        $this->load->view('templates/footer');
    }
}