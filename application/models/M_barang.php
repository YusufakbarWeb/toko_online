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
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function find($id)
    {
        $result = $this->db->where('id_brg', $id)
            ->limit(1)
            ->get('tb_barang');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
}
