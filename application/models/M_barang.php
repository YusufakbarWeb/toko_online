<?php
class M_barang extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('tb_barang')->result();
    }
    public function tambah_barang($data, $table)
    {
        $this->db->insert($table, $data);
    }
<<<<<<< HEAD:application/models/M_barang.php
    public function edit_brg($where)
=======
    public function edit_barang($where, $table)
>>>>>>> 5ccd9624511407c6165afb8637fa1831835f82c8:application/models/model_barang.php
    {
        return $this->db->get_where('tb_barang', $where);
    }
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
