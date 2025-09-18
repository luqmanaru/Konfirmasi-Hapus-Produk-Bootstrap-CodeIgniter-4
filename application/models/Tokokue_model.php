<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tokokue_model extends CI_Model {

    public function get_all_produk()
    {
        return $this->db->get('produk')->result();
    }

    public function get_produk_by_id($id)
    {
        return $this->db->get_where('produk', array('id_produk' => $id))->row();
    }

    public function insert_produk($data)
    {
        return $this->db->insert('produk', $data);
    }

    public function update_produk($id, $data)
    {
        $this->db->where('id_produk', $id);
        return $this->db->update('produk', $data);
    }

    public function delete_produk($id)
    {
        $this->db->where('id_produk', $id);
        return $this->db->delete('produk');
    }
}
