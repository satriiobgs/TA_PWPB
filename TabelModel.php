<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TabelModel extends CI_Model {
    public function Store($data) {
        $hp = $this->db->where('id', $data['id'])->get('goods')->row();

        if(empty($hp)) {
            $this->db->insert('goods', array(
                'id' => $data['id'],
                'nama' => $data['nama']
            ));
        }

        return $this->db->affected_rows();
    }
}