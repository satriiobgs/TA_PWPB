<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kartu extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('GoodsModel', 'Kartu');
        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
    }

    public function Index() {
        $data['Kartu'] = $this->db->get('kartu')->result();

        $this->load->view('templates/admin_header');
        $this->load->view('kartu/index', $data);
        $this->load->view('templates/admin_footer');
    }

    public function Create() {
        // Config form validation
        $config = array(
            array(
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'trim|required|min_length[5]'
            ),
            array(
                'field' => 'spesifikasi',
                'label' => 'Spesifikasi',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'brand',
                'label' => 'Brand',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'transmisi',
                'label' => 'Transmisi',
                'rules' => 'trim|required|min_length[5]'
            ),
            array(
                'field' => 'stok',
                'label' => 'Stok',
                'rules' => 'trim|required|min_length[1]'
            ),
            array(
                'field' => 'price',
                'label' => 'Harga',
                'rules' => 'trim|required|min_length[5]'
            )
        );

        // Set rules of form validation libraries
        $this->form_validation->set_rules($config);

        if($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin_header');
            $this->load->view('kartu/create');
            $this->load->view('templates/admin_footer');
        } else { 
            $data = array(
                'nama' => $this->input->post('nama', TRUE),
                'spesifikasi' => $this->input->post('spesifikasi', TRUE),
                'brand' => $this->input->post('brand', TRUE),
                'transmisi' => $this->input->post('transmisi', TRUE),
                'stok' => $this->input->post('stok', TRUE),
                'price' => $this->input->post('price', TRUE)
            );

            $this->Kartu->Store($data);

            redirect('kartu');
        }
    }

    public function Edit($id = NULL) {
        if($id == NULL) {
            redirect('kartu');
        }

        $kartu = $this->Kartu->Find($id);

        if($kartu) {
            // Konfigurasi form validation
            $config = array(
                array(
                    'field' => 'nama',
                    'label' => 'Nama',
                    'rules' => 'trim|required|min_length[5]'
                ),
                array(
                    'field' => 'spesifikasi',
                    'label' => 'Spesifikasi',
                    'rules' => 'trim|required|min_length[5]'
                ),
                array(
                    'field' => 'brand',
                    'label' => 'Brand',
                    'rules' => 'trim|required'
                ),
                array(
                    'field' => 'transmisi',
                    'label' => 'Transmisi',
                    'rules' => 'trim|required|min_length[5]'
                ),
                array(
                    'field' => 'stok',
                    'label' => 'Stok',
                    'rules' => 'trim|required|min_length[1]'
                ),
                array(
                    'field' => 'price',
                    'label' => 'Harga',
                    'rules' => 'trim|required|min_length[5]'
                )
            );

            // Set aturan form validation
            $this->form_validation->set_rules($config);

            if($this->form_validation->run() == FALSE) {
                $this->load->view('templates/admin_header');
                $this->load->view(
                    'kartu/edit',
                    array(
                        'data' => $kartu
                    )
                );
                $this->load->view('templates/admin_footer');
            } else { 
                $data = array(
                    'nama' => $this->input->post('nama', TRUE),
                    'spesifikasi' => $this->input->post('spesifikasi', TRUE),
                    'brand' => $this->input->post('brand', TRUE),
                    'transmisi' => $this->input->post('transmisi', TRUE),
                    'stok' => $this->input->post('stok', TRUE),
                    'price' => $this->input->post('price', TRUE)
                );

                $this->Kartu->Update($id, $data);

                redirect('kartu');
            }
        } else {

            redirect('kartu');
        }
    }

    public function Delete($id = NULL) {
        if($id == NULL) {
            redirect('kartu');
        }

        $this->Kartu->Destroy($id);

        redirect('kartu');
    }
}