<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model');
        $this->load->model('profil_model');
    }

    public function edit_profil($username)
    {
        $data = [
            'judul'     => 'Edit User',
            'menu'      => $this->dashboard_model->get_menu(),
            'user'      => $this->profil_model->get_user($username)
        ];
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('profil/edit_user', $data);
        $this->load->view('templates/footer');
    }

    public function save_edit($username)
    {
        $nama     = $this->input->post('nama');
        $email    = $this->input->post('email');
        $password = $this->input->post('password');

        $data = [
            'username' => $username,
            'nama'     => $nama,
            'email'    => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];

        print_r($data);

        $this->profil_model->save($data);
        redirect('dashboard');
    }

}