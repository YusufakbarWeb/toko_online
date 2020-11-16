<?php

class Model_invoice extends CI_Model
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');

        $invoice = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'tgl_pesan' => date('d-m-Y H:i:s'),
            'batas_byr' => date('d-m-Y H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 3, date('Y')))
        );
        $this->db->insert('tb_invoice', $invoice);
        $id_invoice = $this->db->insert_id();

        foreach ($this->cart->contens() as $item) {
            $data = array(
                'id_invoice' => $id_invoice,
                'id_brg' => $item['id'],
                'nama_brg' => $item['name'],
                'jumlah' => $item['qty'],
                'harga' => $item['price']

            );
            $this->db->insert('tb_pesan', $data);
            return TRUE;
        }
    }
    public function tampil_data()
    {
        $result = $this->db->get('tb_invoice');
        if ($result->num_row() > 0) {
            return $result->result();
        } else {
            return FALSE;
        }
    }
}
