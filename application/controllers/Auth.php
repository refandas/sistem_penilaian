<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model');
    }

	public function index()
	{
		$this->load->view('auth/login');
    }
    
    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = [
            'username'  => $username,
            'password'  => $password
        ];

        $this->auth_model->cek_login($data);
    }

    public function logout()
    {
        $this->auth_model->stop_session();
    }
}
