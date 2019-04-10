<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('Googlemaps');
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
        $data['datel'] = $this->Admin_model->getDatel();
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
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[10]');
        $this->form_validation->set_rules('divisi', 'Divisi', 'required');
        $this->form_validation->set_rules('team', 'Team', 'required');
        $this->form_validation->set_rules('datel', 'Datel', 'required|numeric');
        if($this->form_validation->run() == true){

            $data = [
                'nik' => $this->input->post('nik', true),
                'email' => $this->input->post('email', true),
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
        $id = $this->input->post('id');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|min_length[10]');
        $this->form_validation->set_rules('divisi', 'Divisi', 'required');
        $this->form_validation->set_rules('team', 'Team', 'required');
        $this->form_validation->set_rules('datel', 'Datel', 'required|numeric');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('adm_gagal', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Teknisi Tidak <strong>Valid</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('admin/teknisi');
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

    public function getJsonTeknisi()
    {
        $id = $this->input->get('id');
        echo json_encode($this->Admin_model->getTeknisiById($id));
    }

    public function teknisi_detailJson()
    {
        $id = $this->input->get('id');
        echo json_encode($this->Admin_model->TeknisiJoinDatel($id));
    }

    public function delete_teknisi()
    {
        $id = $this->input->get('id');
        $this->Admin_model->DeleteTeknisi($id);
        $this->session->set_flashdata('adm_action', 'Di Hapus');
        redirect('admin/teknisi');
    }

// DATEL

    public function getJsonDatel()
    {
        $id = $this->input->get('id');
        echo json_encode($this->Admin_model->getDatelById($id));
    }

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
        $id = $this->input->post('id_datel');
        $this->form_validation->set_rules('nama_datel', 'Nama Datel', 'required|min_length[3]');
        $this->form_validation->set_rules('lokasi', 'Lokasi Datel', 'required|min_length[5]');
        $this->form_validation->set_rules('kakandatel', 'Kakan Datel', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('adm_gagal', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Datel Tidak <strong>Valid</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('admin/datel');
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

    public function datel_detailJson()
    {
        $id = $this->input->get('id');
        echo json_encode($this->Admin_model->DatelJoinTeknisi($id)->num_rows());
    }

// LAYANAN
    public function getJsonLayanan()
    {
        $id = $this->input->get('id');
        echo json_encode($this->Admin_model->getLayananById($id));
    }

    public function layanan()
    {
        $data['title'] = 'Layanan';
        $email = $this->session->userdata('email');
        $data['user'] = $this->Admin_model->getUserByMail($email);
        $data['layanan'] = $this->Admin_model->getLayanan();
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
        $id = $this->input->post('id');
        $this->form_validation->set_rules('nama_layanan', 'Nama Layanan', 'required');
        $this->form_validation->set_rules('paket', 'Paket', 'required');
        $this->form_validation->set_rules('nm_paket', 'Nama Paket', 'required');
        $this->form_validation->set_rules('kecepatan', 'Kecepatan', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('adm_gagal', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Layanan Tidak <strong>Valid</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('admin/layanan');
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
        $data['title'] = 'Layanan Details';
        $email = $this->session->userdata('email');
        $data['user'] = $this->Admin_model->getUserByMail($email);
        $data['layanan'] = $this->Admin_model->getLayananById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/layanan_detail', $data);
        $this->load->view('templates/footer');
    }

    // STO
    public function sto()
    {
        $data['title'] = 'STO';
        $email = $this->session->userdata('email');
        $data['user'] = $this->Admin_model->getUserByMail($email);
        $data['sto'] = $this->Admin_model->getStoJoinDatel();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/sto', $data);
        $this->load->view('templates/footer');
    }

    public function add_Sto()
    {
        $this->form_validation->set_rules('nama_sto', 'Nama Sto', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('datel_def', 'Datel', 'required');
        if ($this->form_validation->run() == false) {
             $this->session->set_flashdata('adm_gagal', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Sto Tidak <strong>Valid</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('admin/sto');
        } else {

            $data = [
                'nm_sto' => $this->input->post('nama_sto', true),
                'lokasi' => $this->input->post('lokasi', true),
                'id_datel' => $this->input->post('datel_def')
            ];
            $this->Admin_model->AddSto($data);
            $this->session->set_flashdata('adm_action', 'Di Tambahkan');
            redirect('admin/sto');
        }
    }

    public function getStoByIdJson()
    {
        $id = $this->input->get('id');
        echo json_encode($this->Admin_model->getStoJoinDatelById($id));
    }

    public function edit_sto()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('nama_sto', 'Nama Sto', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        if ($this->form_validation->run() == false) {
             $this->session->set_flashdata('adm_gagal', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Sto Tidak <strong>Valid</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('admin/sto');
        } else {

            $dataSto = [
                'nm_sto' => $this->input->post('nama_sto', true),
                'lokasi' => $this->input->post('lokasi', true)
            ];
            $this->Admin_model->updateSto($dataSto, $id);
            $this->session->set_flashdata('adm_action', 'Di Ubah');
            redirect('admin/sto');
        }
    }

    public function delete_sto()
    {
        $id = $this->input->get('id');
        $this->Admin_model->deleteSto($id);
        $this->session->set_flashdata('adm_action', 'Di Hapus');
        redirect('admin/sto');
    }

    // PELANGGAN
    public function pelanggan()
    {
        $data['title'] = 'Pelanggan';
        $email = $this->session->userdata('email');
        $data['user'] = $this->Admin_model->getUserByMail($email);
        $data['pelanggan'] = $this->Admin_model->getPelanggan();
        $data['layanan'] = $this->Admin_model->getLayanan();
        $data['sto'] = $this->Admin_model->getSto();
        $data['datel'] = $this->Admin_model->getDatel();
        // print_r($data['pelanggan']); die;   
        $data['layanan'] = $this->Admin_model->getLayanan();
        $data['sto'] = $this->Admin_model->getSto();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pelanggan', $data);
        $this->load->view('templates/footer'); 
    }
    
    // LOKASI
    public function lokasi()
    {
        $data['title'] = 'Lokasi';
        $email = $this->session->userdata('email');
        $data['user'] = $this->Admin_model->getUserByMail($email);
        $data['lokasi_info'] = $this->Admin_model->getLokasi();
        $data['sto_info'] = $this->Admin_model->getSto();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/lokasi', $data);
        $this->load->view('templates/footer');
    }
    
    public function lihat_lokasi(){
        
        $config['center'] = '37.4419, -122.1419';
        $config['zoom'] = 'auto';
        $this->googlemaps->initialize($config);

        // looping lokasi untuk multi marker
        $all_lokasi = $this->Admin_model->getLokasi();

        foreach ($all_lokasi as $loc) {
            $marker = array();
            $marker['position'] = $loc->latitude . ',' . $loc->longtitude;
            $marker['infowindow_content'] = $loc->nm_odp .' - '. $loc->nm_odc;
            $marker['draggable'] = TRUE;
            $marker['animation'] = 'DROP';
            $this->googlemaps->add_marker($marker);
        }
        

        $data['map'] = $this->googlemaps->create_map();

        $data['title'] = 'Lihat Lokasi';
        $email = $this->session->userdata('email');
        $data['user'] = $this->Admin_model->getUserByMail($email);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/lihat_lokasi', $data);
        $this->load->view('templates/footer');
    }

    public function add_lokasi()
    {
        $this->form_validation->set_rules('nama_odp', 'Nama ODP', 'required');
        $this->form_validation->set_rules('nama_odc', 'Nama ODC', 'required');
        $this->form_validation->set_rules('lat', 'Latitude', 'required');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tgl_buat', 'Tanggal di Buat', 'required');
        $this->form_validation->set_rules('long', 'Longtitude', 'required');
        if($this->form_validation->run() == true){

            $data = [
                'nm_odp' => $this->input->post('nama_odp', true),
                'nm_odc' => $this->input->post('nama_odc', true),
                'latitude' => $this->input->post('lat', true),
                'longtitude' => $this->input->post('long', true),
                'kapasitas' => $this->input->post('kapasitas', true),
                'alamat' => $this->input->post('alamat', true),
                'id_sto' => $this->input->post('sto', true),
                'tgl_dibuat' => $this->input->post('tgl_buat', true)
            ];

            $this->Admin_model->addLokasi($data);
            $this->session->set_flashdata('adm_action', 'Ditambahkan');
            redirect('admin/lokasi');
        }else{
            $this->session->set_flashdata('adm_gagal', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Lokasi Tidak <strong>Valid</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('admin/lokasi');
        }
    }

    public function delete_lokasi()
    {
        $id = $this->input->get('id');
        $this->Admin_model->deleteLokasi($id);
        $this->session->set_flashdata('adm_action', 'Di Hapus');
        redirect('admin/lokasi');
    }

    public function edit_lokasi()
    {
        $id = $this->input->post('id_datel');
        $this->form_validation->set_rules('nama_datel', 'Nama Datel', 'required|min_length[3]');
        $this->form_validation->set_rules('lokasi', 'Lokasi Datel', 'required|min_length[5]');
        $this->form_validation->set_rules('kakandatel', 'Kakan Datel', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('adm_gagal', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Datel Tidak <strong>Valid</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('admin/datel');
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

    public function lokasi_detailJson()
    {
        $id = $this->input->get('id');
        echo json_encode($this->Admin_model->DatelJoinTeknisi($id)->num_rows());
    }

    public function getJsonLokasi()
    {
        $id = $this->input->get('id');
        echo json_encode($this->Admin_model->getLokasiById($id));
    }
}
