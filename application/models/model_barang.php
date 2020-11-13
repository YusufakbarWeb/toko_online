<?php
class model_barang extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tb_barang');
    }
    public function tambah_barang($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function edit_brg($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
