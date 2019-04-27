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

        $data = array(
            'username'  => $username,
            'password'  => $password
        );

        $this->auth_model->cek_login($data);
    }

    public function logout()
    {
        $this->auth_model->stop_session();
    }

    public function lupa_password()
    {
        $this->load->view('auth/lupa_password');
    }

    public function set_password_baru()
    {
        $data['username'] = $this->input->post('username');

        $this->load->view('auth/set_password_baru', $data);
    }

    public function save_password_baru($username)
    {
        $password_baru  = $this->input->post('password1');
        $ulang_password = $this->input->post('password2');

        $data = array(
            'username'   => $username,
            'password'   => $password_baru,
            'ulang_pass' => password_hash($ulang_password, PASSWORD_DEFAULT)
        );

        $this->auth_model->set_password($data);
    }

    public function registrasi()
    {
        $this->load->view('auth/registrasi');
    }

    public function input_registrasi()
    {
        $username = $this->input->post('username');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $level_akses = $this->input->post('level_akses');

        $data = array(
            'username' => $username,
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'level_akses' => $level_akses,
            'aktif' => 1
        );
        
        $this->auth_model->register($data);
        redirect('/');
    }
}
