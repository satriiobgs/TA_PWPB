<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Aksesoris extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('TabelModelA', 'TabelA');
    }

    public function index() {
        $data['DataBarang1'] = $this->db
            ->get('aksesoris')
            ->result();

        $this->load->view('templates/admin_header');
        $this->load->view('admin1/index', $data);
        $this->load->view('templates/admin_footer');
    }

    public function Tabel() {
        
    }
}