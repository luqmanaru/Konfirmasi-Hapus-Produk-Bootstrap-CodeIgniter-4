<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tokokue_model');
        $this->load->helper(array('url', 'form'));
    }

    public function index()
    {
        $this->load->view('template/head');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('template/content');
        $this->load->view('template/footer');
    }

    public function view_data()
    {
        $data['produk'] = $this->Tokokue_model->get_all_produk();
        
        $this->load->view('template/head');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('vtable', $data);
        $this->load->view('template/footer');
    }

    public function add_product()
    {
        $this->load->view('template/head');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('tambah_produk');
        $this->load->view('template/footer');
    }

    public function save_product()
    {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
        
        if ($this->form_validation->run() == FALSE) {
            $this->add_product();
        } else {
            $data = array(
                'nama_produk' => $this->input->post('nama_produk'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
                'keterangan' => $this->input->post('keterangan')
            );
            
            $this->Tokokue_model->insert_produk($data);
            $this->session->set_flashdata('pesan', 'Data produk berhasil ditambahkan!');
            redirect('dashboard/view_data');
        }
    }

    public function delete_product($id)
    {
        $this->Tokokue_model->delete_produk($id);
        $this->session->set_flashdata('pesan', 'Data produk berhasil dihapus!');
        redirect('dashboard/view_data');
    }

    public function edit_product($id)
    {
        $data['produk'] = $this->Tokokue_model->get_produk_by_id($id);
        
        $this->load->view('template/head');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('edit_produk', $data);
        $this->load->view('template/footer');
    }

    public function update_product()
    {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric');
        
        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id_produk');
            $this->edit_product($id);
        } else {
            $id = $this->input->post('id_produk');
            $data = array(
                'nama_produk' => $this->input->post('nama_produk'),
                'harga' => $this->input->post('harga'),
                'stok' => $this->input->post('stok'),
                'keterangan' => $this->input->post('keterangan')
            );
            
            $this->Tokokue_model->update_produk($id, $data);
            $this->session->set_flashdata('pesan', 'Data produk berhasil diperbarui!');
            redirect('dashboard/view_data');
        }
    }
}
