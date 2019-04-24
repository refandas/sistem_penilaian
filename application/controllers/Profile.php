<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

    public function edit_user($username)
    {
        $data = [
            'judul'     => 'Edit User',
            'menu'      => $this->dashboard_model->get_menu(),
            'user'      => $this->admin_model->get_user($username)
        ];
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/edit_user', $data);
        $this->load->view('templates/footer');
    }

}