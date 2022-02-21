<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index() {
        // Validasi Input
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        // Jika Validasi Gagal
        if($this->form_validation->run() == false) {
            $data['title'] = 'Bahagia Putra Motor';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // Jika Validasinya Sukses
            $this->_login();
        }
    }

    private function _login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        // Jika User Ada
        if($user) {
            // Cek Password
            if(password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username']
                ];
                $this->session->set_userdata($data);
                redirect('Meteor');
            } else { // Jika Password Salah
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
                redirect('auth');
            }
        } else { // Jika User Tidak Ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This username has not been activated!</div>');
            redirect('auth');
        }
    }

    public function registration() {
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]', [
            'is_unique' => 'This username has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if($this->form_validation->run() == false) {
            $data['title'] = 'Bahagia Putra Motor ';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT)
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulations! your account has been created. Please activate your account.</div>');
            redirect('auth', 'refresh');
        }
    }

    public function logout() {
        // Menghapus Session
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }
}