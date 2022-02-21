<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GoodsModel extends CI_Model {
    public function Store($data) {
        $this->db->insert('kartu', $data);

        return $this->db->affected_rows();
    }

    public function Find($id) {
        return $this->db->where('id', $id)
            ->get('kartu')
            ->row();
    }

    public function Update($id, $data) {
        $this->db->where('id', $id)
            ->update('kartu', $data);

        return $this->db->affected_rows();
    }

    public function Destroy($id) {
        $this->db->where('id', $id)
            ->delete('kartu');

        return $this->db->affected_rows();
    }
   
}