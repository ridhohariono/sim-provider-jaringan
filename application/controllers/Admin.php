<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $email = $this->session->userdata('email');
        $data['user'] = $this->Admin_model->getUserByMail($email);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

// TEKNISI

    public function teknisi()
    {
        $data['title'] = 'Teknisi';
        $email = $this->session->userdata('email');
        $data['user'] = $this->Admin_model->getUserByMail($email);
        $data['teknisi'] = $this->Admin_model->getTeknisi();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/teknisi', $data);
        $this->load->view('templates/footer');
    }

    public function add_teknisi()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[10]');
        $this->form_validation->set_rules('divisi', 'Divisi', 'required');
        $this->form_validation->set_rules('team', 'Team', 'required');
        $this->form_validation->set_rules('datel', 'Datel', 'required|numeric');
        if($this->form_validation->run() == true){

            $data = [
                'nik' => $this->input->post('nik', true),
                'nm_teknisi' => $this->input->post('nama', true),
                'alamat' => $this->input->post('alamat', true),
                'divisi' => $this->input->post('divisi', true),
                'team' => $this->input->post('team', true),
                'id_datel' => $this->input->post('datel', true)
            ];

            $this->Admin_model->addTeknisi($data);
            $this->session->set_flashdata('adm_action', 'Ditambahkan');
            redirect('admin/teknisi');
        }else{
            $this->session->set_flashdata('adm_gagal', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Teknisi Tidak <strong>Valid</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('admin/teknisi');
        }
    }

    public function edit_teknisi()
    {
        $id = $this->input->get('id');
        $data['title'] = 'Edit Teknisi';
        $email = $this->session->userdata('email');
        $data['user'] = $this->Admin_model->getUserByMail($email);
        $data['teknisi'] = $this->Admin_model->getTeknisiById($id);
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[10]');
        $this->form_validation->set_rules('divisi', 'Divisi', 'required');
        $this->form_validation->set_rules('team', 'Team', 'required');
        $this->form_validation->set_rules('datel', 'Datel', 'required|numeric');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit_teknisi', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'nik' => $this->input->post('nik', true),
                'nm_teknisi' => $this->input->post('nama', true),
                'alamat' => $this->input->post('alamat', true),
                'divisi' => $this->input->post('divisi', true),
                'team' => $this->input->post('team', true),
                'id_datel' => $this->input->post('datel', true)
            ];

            $this->Admin_model->updateTeknisi($data, $id);
            $this->session->set_flashdata('adm_action', 'Di Ubah');
            redirect('admin/teknisi');
        }
    }

    public function teknisi_detail()
    {
        $id = $this->input->get('id');
        $data['title'] = 'Teknisi Details';
        $email = $this->session->userdata('email');
        $data['user'] = $this->Admin_model->getUserByMail($email);
        $data['teknisi'] = $this->Admin_model->TeknisiJoinDatel($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/teknisi_detail', $data);
        $this->load->view('templates/footer');
    }

    public function delete_teknisi()
    {
        $id = $this->input->get('id');
        $this->Admin_model->DeleteTeknisi($id);
        $this->session->set_flashdata('adm_action', 'Di Hapus');
        redirect('admin/teknisi');
    }

// DATEL
    public function datel()
    {
        $data['title'] = 'Datel';
        $email = $this->session->userdata('email');
        $data['user'] = $this->Admin_model->getUserByMail($email);
        $data['datel'] = $this->Admin_model->getDatel();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datel', $data);
        $this->load->view('templates/footer');
    }

    public function add_datel()
    {
        $this->form_validation->set_rules('nama_datel', 'Nama Datel', 'required|min_length[3]');
        $this->form_validation->set_rules('lokasi', 'Lokasi Datel', 'required|min_length[5]');
        $this->form_validation->set_rules('kakandatel', 'Kakan Datel', 'required');
        if($this->form_validation->run() == true){

            $data = [
                'nm_datel' => $this->input->post('nama_datel', true),
                'lokasi' => $this->input->post('lokasi', true),
                'kakandatel' => $this->input->post('kakandatel', true),
                'status' => "Aktif"
            ];

            $this->Admin_model->addDatel($data);
            $this->session->set_flashdata('adm_action', 'Ditambahkan');
            redirect('admin/datel');
        }else{
            $this->session->set_flashdata('adm_gagal', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Datel Tidak <strong>Valid</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('admin/datel');
        }
    }

    public function delete_datel()
    {
        $id = $this->input->get('id');
        $this->Admin_model->deleteDatel($id);
        $this->session->set_flashdata('adm_action', 'Di Hapus');
        redirect('admin/datel');
    }

    public function edit_datel()
    {
        $id = $this->input->get('id');
        $data['title'] = 'Edit Datel';
        $email = $this->session->userdata('email');
        $data['user'] = $this->Admin_model->getUserByMail($email);
        $data['datel'] = $this->Admin_model->getDatelById($id);
        $this->form_validation->set_rules('nama_datel', 'Nama Datel', 'required|min_length[3]');
        $this->form_validation->set_rules('lokasi', 'Lokasi Datel', 'required|min_length[5]');
        $this->form_validation->set_rules('kakandatel', 'Kakan Datel', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit_datel', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'nm_datel' => $this->input->post('nama_datel', true),
                'lokasi' => $this->input->post('lokasi', true),
                'kakandatel' => $this->input->post('kakandatel', true),
                'status' => $this->input->post('status', true)
            ];

            $this->Admin_model->updateDatel($data, $id);
            $this->session->set_flashdata('adm_action', 'Di Ubah');
            redirect('admin/datel');
        }
    }

    public function datel_detail()
    {
        $id = $this->input->get('id');
        $data['title'] = 'Datel Details';
        $email = $this->session->userdata('email');
        $data['user'] = $this->Admin_model->getUserByMail($email);
        $data['datel'] = $this->Admin_model->getDatelById($id);
        $data['datelByteknisi'] = $this->Admin_model->DatelJoinTeknisi($id)->num_rows();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datel_detail', $data);
        $this->load->view('templates/footer');
    }

// LAYANAN

    public function layanan()
    {
        $data['title'] = 'Layanan';
        $email = $this->session->userdata('email');
        $data['user'] = $this->Admin_model->getUserByMail($email);
        $data['layanan'] = $this->Admin_model->getLayanan($email);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/layanan', $data);
        $this->load->view('templates/footer');
    }

    public function add_layanan()
    {
        $this->form_validation->set_rules('nama_layanan', 'Nama Layanan', 'required');
        $this->form_validation->set_rules('paket', 'Paket', 'required');
        $this->form_validation->set_rules('nm_paket', 'Nama Paket', 'required');
        $this->form_validation->set_rules('kecepatan', 'Kecepatan', 'required|numeric');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        if($this->form_validation->run() == true){

            $data = [
                'nm_layanan' => $this->input->post('nama_layanan', true),
                'paket' => $this->input->post('paket', true),
                'nm_paket' => $this->input->post('nm_paket', true),
                'kecepatan' => $this->input->post('kecepatan', true)." Mbps",
                'harga' => $this->input->post('harga', true)
            ];

            $this->Admin_model->addLayanan($data);
            $this->session->set_flashdata('adm_action', 'Ditambahkan');
            redirect('admin/layanan');
        }else{
            $this->session->set_flashdata('adm_gagal', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Layanan Tidak <strong>Valid</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('admin/layanan');
        }
    }

    public function delete_layanan()
    {
        $id = $this->input->get('id');
        $this->Admin_model->deleteLayanan($id);
        $this->session->set_flashdata('adm_action', 'Di Hapus');
        redirect('admin/layanan');
    }

    public function edit_layanan()
    {
        $id = $this->input->get('id');
        $data['title'] = 'Edit Layanan';
        $email = $this->session->userdata('email');
        $data['user'] = $this->Admin_model->getUserByMail($email);
        $data['layanan'] = $this->Admin_model->getLayananById($id);
        $this->form_validation->set_rules('nama_layanan', 'Nama Layanan', 'required');
        $this->form_validation->set_rules('paket', 'Paket', 'required');
        $this->form_validation->set_rules('nm_paket', 'Nama Paket', 'required');
        $this->form_validation->set_rules('kecepatan', 'Kecepatan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit_layanan', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'nm_layanan' => $this->input->post('nama_layanan', true),
                'paket' => $this->input->post('paket', true),
                'nm_paket' => $this->input->post('nm_paket', true),
                'kecepatan' => $this->input->post('kecepatan', true)." Mbps",
                'harga' => $this->input->post('harga', true)
            ];

            $this->Admin_model->updateLayanan($data, $id);
            $this->session->set_flashdata('adm_action', 'Di Ubah');
            redirect('admin/layanan');
        }
    }

    public function layanan_detail()
    {
        $id = $this->input->get('id');
        $data['title'] = 'Datel Details';
        $email = $this->session->userdata('email');
        $data['user'] = $this->Admin_model->getUserByMail($email);
        $data['layanan'] = $this->Admin_model->getLayananById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/layanan_detail', $data);
        $this->load->view('templates/footer');
    }

}
