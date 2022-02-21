<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TabelModelA extends CI_Model {
    public function Store($data) {
        $aksesoris = $this->db->where('id', $data['id'])->get('aksesoris')->row();

        if(empty($aksesoris)) {
            $this->db->insert('aksesoris', array(
                'id_barang' => $data['id'],
                'nama1' => $data['nama']
            ));
        }

        return $this->db->affected_rows();
    }
}