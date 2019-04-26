<?php

class Auth_model extends CI_Model {

    public function cek_login($data)
    {
        $query = "SELECT * FROM user
                    WHERE username = " . "'" . $data['username'] . "'";

        $result = $this->db->query($query)->row_array();

        if($result)
        {
            if($result['aktif'] == 1)
            {
                if(password_verify($data['password'], $result['password']))
                {
                    $user = [
                        'nama'        => $result['nama'],
                        'username'    => $data['username'],
                        'level_akses' => $data['level_akses']
                    ];
                    $this->session->set_userdata($user);
                    redirect('dashboard');
                }
                else
                {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah</div>');
                    redirect('auth');
                }
            }
            else
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun belum aktif</div>');
                redirect('auth');
            }
        }
        else
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun belum terdaftar</div>');
            redirect('auth');
        }
    }

    public function stop_session()
    {
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level_akses');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Logout sukses</div>');
        redirect('auth');
    }

    public function cari_user($username)
    {
        $query = "SELECT nama FROM user
                  WHERE username = " . "'" . $username . "'";

        $result = $this->db->query($query)->row_array();
        return $result;
    }

    public function set_password($data)
    {
        if(password_verify($data['password'], $data['ulang_pass']))
        {
            $query = "UPDATE user
                      SET password = " . "'" . $data['ulang_pass'] . "'" .
                     "WHERE username = " . "'" . $data['username'] . "'";

            $this->db->query($query);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah</div>');
            redirect('/');
        }
        else {
            redirect('/');
        }
    }

    public function register($data)
    {
        $query = "INSERT INTO user VALUES(" . "'" . $data['username'] . "', '"
                                                  . $data['name'] . "', '"
                                                  . $data['email'] . "', '"
                                                  . $data['password'] . "', "
                                                  . $data['level_akses'] . ", "
                                                  . $data['aktif'] . ")";
        $this->db->query($query);
    }
}