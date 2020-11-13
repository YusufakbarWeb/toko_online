<?php

class Data_barang extends CI_Controller
{
    public function index()
    {
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_barang', $data);
        $this->load->view('templates_admin/footer');
    }
    public function tambah_aksi()
    {
        $nama_brg           = $this->input->post('nama_brg');
        $keterangan         = $this->input->post('keterangan');
        $kategori           = $this->input->post('kategori');
        $harga              = $this->input->post('harga');
        $stok               = $this->input->post('stok');
        $gambar             = $_FILES['gambar']['name'];

        if ($gambar) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size']             = 2048;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload($gambar)) {
                $gambar = $this->upload->data('file_name');
                $this->db->set('gambar', $gambar);
            } else {
                echo $this->upload->display_errors();
            }
        }


        $data = array(
            'nama_brg'        => $nama_brg,
            'keterangan'      => $keterangan,
            'kategori'        => $kategori,
            'harga'           => $harga,
            'stok'            => $stok,
            'gambar'          => $gambar
        );
        $this->model_barang->tambah_barang($data, 'tb_barang');
        redirect('admin/data_barang/index');
    }
    public function edit($id)
    {
        $where = array('$id_brg' => $id);
        $data['barang'] = $this->model_barang->edit_brg($where, 'tb_barang')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_brg', $data);
        $this->load->view('templates_admin/footer');
    }
    public function update()
    {
        $id                 = $this->input->post('id');
        $nama_brg           = $this->input->post('nama_brg');
        $keterangan         = $this->input->post('keterangan');
        $kategori           = $this->input->post('kategori');
        $harga              = $this->input->post('harga');
        $stok               = $this->input->post('stok');

        $data = array(
            'nama_brg'        => $nama_brg,
            'keterangan'      => $keterangan,
            'kategori'        => $kategori,
            'harga'           => $harga,
            'stok'            => $stok
        );
        $where = array(
            'id_brg' => $id
        );
        $this->model_barang->update_data($where, $data, 'tb_barang');
        redirect('admin/data_barang/index');
    }
}
