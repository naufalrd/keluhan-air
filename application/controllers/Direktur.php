<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Direktur extends CI_Controller
{
    // call once use anywhere
    public function __construct()
    {
        parent::__construct();
        $this->load->model('direktur_model');
        if ($this->session->userdata('level') != '3') {
            redirect('auth/check_level');
        }
    }

    public function index()
    {
        $data['JaminanKualitas'] = $this->direktur_model->search_jaminankeluhan();
        $data['Pembelian'] = $this->direktur_model->search_pembelian();
        $data['Distribusi'] = $this->direktur_model->search_distribusi();

        $data['jumlahRating'] = $this->direktur_model->jumlahRating();
        $data['ratingSistem'] = $this->direktur_model->ratingSistem();
        $data['reviewSistem'] = $this->direktur_model->reviewSistem();
        // var_dump($data['jumlahRating']);
        
        $data['keluhan'] = $this->direktur_model->search_keluhan();
        $data['selesai'] = $this->direktur_model->search_selesai();
        $data['pelanggan'] = $this->direktur_model->search_pelanggan();
        $data['diteruskan'] = $this->direktur_model->search_diteruskan();
        
        $this->load->view('template/header.php');
        $this->load->view('direktur/home.php', $data);
        $this->load->view('template/footer.php');
    }

    public function details($id)
    {
        $data['feedback'] = $this->direktur_model->monitor_feedback($id);
        $data['keluhan'] = $this->direktur_model->monitor_keluhan($id);
        $this->load->view('template/header.php');
        $this->load->view('direktur/details.php', $data);
        $this->load->view('template/footer.php');
    }
}
