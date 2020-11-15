<?php

class Data_barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_barang', 'model_barang');
        if ($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Anda Belum Login......Silahkan Login Dulu!!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
            redirect('auth/login');
        }
    }
    public function index()
    {
        $data['barang'] = $this->model_barang->tampil_data();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/data_barang', $data);
        $this->load->view('templates_admin/footer');
    }

    public function create()
    {

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $error = array('error' => $this->upload->display_errors());
            echo $error['error'];
        } else {
            if (isset($_FILES['gambar'])) {
                $data = array('upload_data' => $this->upload->data());
                $this->vars = [
                    'nama_brg'           => $this->input->post('nama_brg'),
                    'nama_brg'           => $this->input->post('nama_brg'),
                    'kategori'           => $this->input->post('kategori'),
                    'keterangan'         => $this->input->post('keterangan'),
                    'harga'              => $this->input->post('harga'),
                    'stok'               => $this->input->post('stok'),
                    'gambar'             => $_FILES['gambar']['name']
                ];
            }
            $this->db->insert('tb_barang', $this->vars);
            redirect('site/admin/data_barang');
        }
    }


    public function edit($id)
    {
        $data = [
            'barang' => $this->model_barang->edit_brg($id)
        ];
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/edit_barang', $data);
        $this->load->view('templates_admin/footer');
    }
    public function update()
    {
        $data = [
            'nama_brg'        => $this->input->post('nama_brg'),
            'keterangan'      => $this->input->post('keterangan'),
            'kategori'        => $this->input->post('kategori'),
            'harga'           => $this->input->post('harga'),
            'stok'            => $this->input->post('stok'),
        ];
        $this->model_barang->update($data);
        redirect('admin/data_barang/index');
    }
    public function hapus($id)
    {
        $where = array('id_brg' => $id);
        $this->model_barang->hapus_data($where, 'tb_barang');
        redirect('admin/data_barang/index');
    }
}
