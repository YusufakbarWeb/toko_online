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
    public function edit_brg($id)
    {
        return $this->db->get_where('tb_barang', ['id_brg' => $id])->row_array();;
    }
    public function update($data)
    {
        $this->db->where(['id_brg' => $this->input->post('id_brg')]);
        $this->db->update('tb_barang', $data);
    }
   
}
