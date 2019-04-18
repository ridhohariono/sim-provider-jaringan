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
        if ($this->form_validation->run() == true) {

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
        } else {
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
        if ($this->form_validation->run() == true) {

            $data = [
                'nm_datel' => $this->input->post('nama_datel', true),
                'lokasi' => $this->input->post('lokasi', true),
                'kakandatel' => $this->input->post('kakandatel', true),
                'status' => "Aktif"
            ];

            $this->Admin_model->addDatel($data);
            $this->session->set_flashdata('adm_action', 'Ditambahkan');
            redirect('admin/datel');
        } else {
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
        if ($this->form_validation->run() == true) {

            $data = [
                'nm_layanan' => $this->input->post('nama_layanan', true),
                'paket' => $this->input->post('paket', true),
                'nm_paket' => $this->input->post('nm_paket', true),
                'kecepatan' => $this->input->post('kecepatan', true) . " Mbps",
                'harga' => $this->input->post('harga', true)
            ];

            $this->Admin_model->addLayanan($data);
            $this->session->set_flashdata('adm_action', 'Ditambahkan');
            redirect('admin/layanan');
        } else {
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
                'kecepatan' => $this->input->post('kecepatan', true) . " Mbps",
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
    public function make_pelanggan_pdf()
    {
        $this->load->library('pdfgenerator');
        $data['title']      = 'Pelanggan';
        $email              = $this->session->userdata('email');
        $data['user']       = $this->Admin_model->getUserByMail($email);
        $data['pelanggan']  = $this->Admin_model->getPelanggan();
        $data['layanan']    = $this->Admin_model->getLayanan();
        $data['sto']        = $this->Admin_model->getSto();
        $data['datel']      = $this->Admin_model->getDatel();
        $data['layanan']    = $this->Admin_model->getLayanan();

        $html = $this->load->view('admin/pelanggan_list_pdf', $data, true);
        $filename = 'Daftar_Pelanggan_' . time();
        $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
    }

    public function pelanggan()
    {
        $data['title']      = 'Pelanggan';
        $email              = $this->session->userdata('email');
        $data['user']       = $this->Admin_model->getUserByMail($email);
        $data['pelanggan']  = $this->Admin_model->getPelanggan();
        $data['layanan']    = $this->Admin_model->getLayanan();
        $data['sto']        = $this->Admin_model->getSto();
        $data['datel']      = $this->Admin_model->getDatel();
        $data['layanan']    = $this->Admin_model->getLayanan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pelanggan', $data);
        $this->load->view('templates/footer');
    }

    public function getOdcByDatelIdJson()
    {
        $id = $this->input->get('id_datel');
        echo json_encode($this->Admin_model->getOdcByDatelId($id));
    }

    public function add_pelanggan()
    {
        $this->form_validation->set_rules('nm_pelanggan', 'Nama Pelanggan', 'required');
        $this->form_validation->set_rules('speedy', 'Speedy', 'required');
        $this->form_validation->set_rules('voice', 'Voice', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('layanan', 'Layanan', 'required');
        $this->form_validation->set_rules('sto', 'Sto', 'required');
        $this->form_validation->set_rules('id_datel', 'Datel', 'required');
        $this->form_validation->set_rules('odp', 'ODP', 'required');
        $this->form_validation->set_rules('label', 'Label', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('adm_gagal', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Pelanggan Tidak <strong>Valid</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('admin/pelanggan');
        } else {
            $nam_odp = $this->input->post('odp');
            $odp_result = $this->Admin_model->getOdpByName($nam_odp)[0];
            $port = null;
            if ($odp_result['port_1'] == 0 || $odp_result['port_2'] == 0 || $odp_result['port_3'] == 0 || $odp_result['port_4'] == 0 || $odp_result['port_5'] == 0 || $odp_result['port_6'] == 0 || $odp_result['port_7'] == 0 || $odp_result['port_8'] == 0) {
                for ($i = 1; $i <= 8; $i++) {
                    if ($odp_result['port_' . $i . ''] == 0) {
                        $col_port = 'port_' . $i . '';
                        $id_odp = $odp_result['id_odp'];
                        $port .= $i;
                        $this->Admin_model->UpdatePortOdp($col_port, $id_odp);
                        return $this->dataPelanggan($port);
                    }
                }
            } else {
                $this->session->set_flashdata('adm_gagal', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Tidak Ada <strong>PORT</strong> yang tersedia di ODP tersebut, Silahkan Create ODP Baru!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('admin/pelanggan');
            }
        }
    }

    public function dataPelanggan($port)
    {
        $data = [
            'nm_pelanggan' => $this->input->post('nm_pelanggan', true),
            'speedy' => $this->input->post('speedy', true),
            'voice' => $this->input->post('voice', true),
            'alamat' => $this->input->post('alamat', true),
            'odp' => $this->input->post('odp', true),
            'port' => $port,
            'id_layanan' => $this->input->post('layanan', true),
            'id_sto' => $this->input->post('sto', true),
            'id_datel' => $this->input->post('id_datel', true),
            'label' => $this->input->post('label'),
            'status' => "Tidak/Belum Aktif",
        ];
        $this->Admin_model->AddPelanggan($data);
        $get_id = $this->Admin_model->getIdPelanggan()[0];
        $id_sto = $this->input->post('sto', true);
        $get_lokasi_id = $this->Admin_model->getLokasiBySto($id_sto)[0];
        $id_lokasi = $get_lokasi_id['id_lokasi'];
        $id_pelanggan = $get_id['id_pelanggan'];
        $paket = $this->input->post('paket');
        if ($paket == "Indihome") {
            $dataIndihome = [
                'id_layanan' => $this->input->post('layanan', true),
                'id_pelanggan' => $id_pelanggan,
                'nm_pelanggan' => $this->input->post('nm_pelanggan', true),
                'alamat' => $this->input->post('alamat'),
                'id_lokasi' => $id_lokasi,
                'port' => $port,
                'label' => $this->input->post('label'),
                'id_sto' => $id_sto,
                'id_datel' => $this->input->post('id_datel'),
                'id_teknisi' => null,
                'status' => "Tidak/Belum Terpasang",
            ];
            $this->Admin_model->insertIndihome($dataIndihome);
        } else {
            $dataDatin = [
                'id_layanan' => $this->input->post('layanan', true),
                'id_pelanggan' => $id_pelanggan,
                'nm_pelanggan' => $this->input->post('nm_pelanggan', true),
                'alamat' => $this->input->post('alamat'),
                'id_lokasi' => $id_lokasi,
                'port' => $port,
                'label' => $this->input->post('label'),
                'id_sto' => $id_sto,
                'id_datel' => $this->input->post('id_datel'),
                'id_teknisi' => null,
                'status' => "Tidak/Belum Terpasang",
            ];
            $this->Admin_model->insertDatin($dataDatin);
        }
        $this->session->set_flashdata('adm_action', 'Di Tambahkan');
        redirect('admin/pelanggan');
    }

    public function cabut_pelanggan()
    {
        $this->form_validation->set_rules('nm_pelanggan_cabut', 'Nama Pelanggan', 'required');
        $this->form_validation->set_rules('odp_cabut', 'ODP', 'required');
        $this->form_validation->set_rules('alamat_cabut', 'Alamat Pelanggan', 'required');
        $this->form_validation->set_rules('nm_layanan_cabut', 'Layanan', 'required');
        $this->form_validation->set_rules('label_cabut', 'Label', 'required');
        $this->form_validation->set_rules('keterangan_cabut', 'Keterangan', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('adm_gagal', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Pencabutan<strong>Tidak Valid</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button></div>');
            redirect('admin/pelanggan');
        } else {
            $id_layanan = $this->input->post('id_layanan_cabut', true);
            $id_pelanggan = $this->input->post('id_pelanggan_cabut', true);
            $id_sto = $this->input->post('id_sto_cabut', true);
            $id_datel = $this->input->post('id_datel_cabut', true);
            $get_lokasi_id = $this->Admin_model->getLokasiBySto($id_sto)[0];
            $id_lokasi = $get_lokasi_id['id_lokasi'];
            $dataCabut = [
                'id_layanan'   => $id_layanan,
                'id_pelanggan' => $id_pelanggan,
                'nm_pelanggan' => $this->input->post('nm_pelanggan_cabut', true),
                'alamat'       => $this->input->post('alamat_cabut', true),
                'id_lokasi'    => $id_lokasi,
                'port'         => $this->input->post('port_cabut', true),
                'label'        => $this->input->post('label_cabut', true),
                'keterangan'   => $this->input->post('keterangan_cabut', true),
                'id_sto'       => $this->input->post('id_sto_cabut', true),
                'id_datel'     => $id_datel,
                'status'       => "Request Pencabutan",
            ];
            if ($this->input->post('paket_cabut') == "Indihome") {
                $table = "pencabutan_indihome";
            } else {
                $table = "pencabutan_datin";
            }
            $status = ['status' => "Request Pencabutan"];
            $this->Admin_model->updateStatusCabut($status, $id_pelanggan);
            $this->Admin_model->insertPencabutan($table, $dataCabut);
            $this->session->set_flashdata('adm_action', 'Di Submit');
            redirect('admin/pelanggan');
        }
    }

    public function getPelangganByIdJson()
    {
        $id_pelanggan = $this->input->post('id_pelanggan');
        echo json_encode($this->Admin_model->getPelangganById($id_pelanggan));
    }

    public function edit_pelanggan()
    {
        $this->form_validation->set_rules('nm_pelanggan', 'Nama Pelanggan', 'required');
        $this->form_validation->set_rules('speedy', 'Speedy', 'required');
        $this->form_validation->set_rules('voice', 'Voice', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('label', 'Label', 'required');
        $id_pelanggan = $this->input->post('id_pelanggan');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('adm_gagal', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Pelanggan Tidak <strong>Valid</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('admin/pelanggan');
        } else {
            $data = [
                'nm_pelanggan' => $this->input->post('nm_pelanggan', true),
                'speedy' => $this->input->post('speedy', true),
                'voice' => $this->input->post('voice', true),
                'alamat' => $this->input->post('alamat', true),
                'label' => $this->input->post('label'),
            ];
            $getLayanan = $this->Admin_model->getLayananById($this->input->post('id_layanan'))[0];
            $paket = $getLayanan['paket'];
            $id_pelanggan = $this->input->post('id_pelanggan', true);
            if ($paket == "Indihome") {
                $dataIndihome = [
                    'nm_pelanggan' => $this->input->post('nm_pelanggan', true),
                    'alamat' => $this->input->post('alamat'),
                    'label' => $this->input->post('label'),
                    'status' => "Tidak/Belum Terpasang",
                ];
                $this->Admin_model->UpdateIndihome($dataIndihome, $id_pelanggan);
            } else {
                $dataDatin = [
                    'nm_pelanggan' => $this->input->post('nm_pelanggan', true),
                    'alamat' => $this->input->post('alamat'),
                    'label' => $this->input->post('label'),
                    'status' => "Tidak/Belum Terpasang",
                ];
                $this->Admin_model->UpdateDatin($dataDatin, $id_pelanggan);
            }
            $this->Admin_model->editPelanggan($data, $id_pelanggan);
            $this->session->set_flashdata('adm_action', 'Di Ubah');
            redirect('admin/pelanggan');
        }
    }

    public function getPelangganByIdJsonJoin()
    {
        $id_pelanggan = $this->input->post('id_pelanggan');
        echo json_encode($this->Admin_model->getPByIdJsonJoin($id_pelanggan));
    }

    public function delete_pelanggan()
    {
        $id_pelanggan = $this->input->get('id');
        $this->Admin_model->deletePelanggan($id_pelanggan);
        $this->session->set_flashdata('adm_action', 'Di Hapus');
        redirect('admin/pelanggan');
    }

    // DENDA

    public function denda_pelanggan()
    {
        $this->form_validation->set_rules('id_pelanggan_denda', 'id_pelanggan_denda', 'required');
        $this->form_validation->set_rules('id_layanan_denda', 'id_layanan_denda', 'required');
        $this->form_validation->set_rules('nm_pelanggan_denda', 'Nama Pelanggan', 'required');
        $this->form_validation->set_rules('paket_denda', 'Paket', 'required');
        $this->form_validation->set_rules('layanan_denda', 'Layanan', 'required');
        $this->form_validation->set_rules('odp_denda', 'ODP', 'required');
        $this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required');
        $this->form_validation->set_rules('jmlh_denda', 'Jumlah Denda', 'required|numeric');
        $this->form_validation->set_rules('keterangan_denda', 'Keterangan', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('adm_gagal', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Denda Pelanggan Tidak <strong>Valid</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $tgl_mulai = new DateTime($this->input->post('tgl_mulai'));
            $tgl_akhir = new DateTime($this->input->post('tgl_akhir'));
            $selisih   = $tgl_mulai->diff($tgl_akhir);
            $id_pelanggan = $this->input->post('id_pelanggan_denda', true);
            $data = [
                'id_pelanggan' => $id_pelanggan,
                'nm_pelanggan' => $this->input->post('nm_pelanggan_denda', true),
                'paket'        => $this->input->post('paket_denda', true),
                'layanan'      => $this->input->post('layanan_denda', true),
                'lama_nunggak' => $selisih->days,
                'denda'        => $this->input->post('jmlh_denda', true),
                'id_layanan' => $this->input->post('id_layanan_denda', true),
                'keterangan'   => $this->input->post('keterangan_denda', true)
            ];
            $val = ['denda' => 1];
            $this->Admin_model->updatePelangganDenda($id_pelanggan, $val);
            $this->Admin_model->insertDenda($data);
            $this->session->set_flashdata('adm_action', 'Di Tambahkan');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function myprofile(){
        $data['title'] = 'My Profile';

        $email = $this->session->userdata('email');
        $data['user'] = $this->Admin_model->getUserByMail($email);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/myprofile', $data);
        $this->load->view('templates/footer');
    }

    // HALAMAN DENDA
    public function denda()
    {
        $data['title'] = 'Denda';
        $email = $this->session->userdata('email');
        $data['user'] = $this->Admin_model->getUserByMail($email);
        $data['denda'] = $this->Admin_model->getDenda();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/denda', $data);
        $this->load->view('templates/footer');
    }

    public function make_denda_pdf()
    {
        $this->load->library('pdfgenerator');
        $data['title']      = 'Denda Pelanggan';
        $email              = $this->session->userdata('email');
        $data['user']       = $this->Admin_model->getUserByMail($email);
        $data['denda']      = $this->Admin_model->getDenda();

        $html = $this->load->view('admin/denda_list_pdf', $data, true);
        $filename = 'Daftar_Denda-Pelanggan_' . time();
        $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
    }

    public function details_dendaJson()
    {
        $id_pelanggan = $this->input->post('id_pelanggan');
        echo json_encode($this->Admin_model->dendaJoinPelanggan($id_pelanggan));
    }

    public function edit_dendaJson()
    {
        $id_denda = $this->input->post('id_denda');
        echo json_encode($this->Admin_model->getDendaById($id_denda));
    }

    public function edit_dendaSubmit()
    {
        $this->form_validation->set_rules('jmlh_denda', 'Jumlah Denda', 'required|numeric');
        $this->form_validation->set_rules('keterangan_denda', 'Keterangan', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('adm_gagal', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Denda Pelanggan Tidak <strong>Valid</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $id_denda = $this->input->post('id_denda');
            $data = [
                'denda' => $this->input->post('jmlh_denda', true),
                'keterangan' => $this->input->post('keterangan_denda', true)
            ];
            $this->Admin_model->updateDenda($data, $id_denda);
            $this->session->set_flashdata('adm_action', 'Di Ubah');
            redirect('admin/denda');
        }
    }

    public function delete_denda()
    {
        $id_denda = $this->input->get('id_denda');
        $id_pelanggan = $this->input->get('id_pelanggan');
        $val = ['denda' => 0];
        $this->Admin_model->deleteDende($id_denda);
        $this->Admin_model->updatePelangganDenda($id_pelanggan, $val);
        $this->session->set_flashdata('adm_action', 'Di Hapus');
        redirect($_SERVER['HTTP_REFERER']);
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

    public function lihat_lokasi()
    {
        $config['center'] = '37.4419, -122.1419';
        $config['zoom'] = 'auto';
        $this->googlemaps->initialize($config);

        // looping lokasi untuk multi marker
        $all_lokasi = $this->Admin_model->getLokasi();

        foreach ($all_lokasi as $loc) {
            $marker = array();
            $marker['position'] = $loc->latitude . ',' . $loc->longtitude;
            $marker['infowindow_content'] = $loc->nm_odp . ' - ' . $loc->nm_odc;
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
        if ($this->form_validation->run() == true) {

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
        } else {
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
        $id = $this->input->post('id_lokasi');
        $this->form_validation->set_rules('nama_odp', 'Nama ODP', 'required');
        $this->form_validation->set_rules('nama_odc', 'Nama ODC', 'required');
        $this->form_validation->set_rules('lat', 'Latitude', 'required');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tgl_buat', 'Tanggal di Buat', 'required');
        $this->form_validation->set_rules('long', 'Longtitude', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('adm_gagal', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Lokasi Tidak <strong>Valid</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('admin/lokasi');
        } else {

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

            $this->Admin_model->updateLokasi($data, $id);
            $this->session->set_flashdata('adm_action', 'Di Ubah');
            redirect('admin/lokasi');
        }
    }

    public function lokasi_detailJson()
    {
        $id = $this->input->get('id');
        echo json_encode($this->Admin_model->getLokasiDetails($id));
    }

    public function getJsonLokasi()
    {
        $id = $this->input->get('id');
        echo json_encode($this->Admin_model->getLokasiById($id));
    }

    // PEMASANGAN INDIHOME
    public function pemasangan_indihome()
    {
        $data['title']      = 'Pemasangan Indihome';
        $email              = $this->session->userdata('email');
        $data['user']       = $this->Admin_model->getUserByMail($email);
        $data['pIndihome']  = $this->Admin_model->getPIndihome();
        // print_r($data['pIndihome']); die;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pemasangan_indihome', $data);
        $this->load->view('templates/footer');
    }

    public function lokasi_pemasangan()
    {
        $id_transaksi = $this->input->get('id');
        $from   = $this->input->get('from');
        $lok = $this->input->get('lok');
        $lokasi = $this->Admin_model->getLokasiById($lok)[0];
        $config['center'] = '37.4419, -122.1419';
        $config['zoom'] = 'auto';
        $this->googlemaps->initialize($config);
        $marker = array();
        $marker['position'] = $lokasi['latitude'] . ',' . $lokasi['longtitude'];
        $marker['infowindow_content'] = $lokasi['nm_odp'] . ' - ' . $lokasi['nm_odc'];
        $marker['draggable'] = TRUE;
        $marker['animation'] = 'DROP';
        $this->googlemaps->add_marker($marker);

        $data['title']      = 'Pemasangan Indihome';
        $email              = $this->session->userdata('email');
        $data['user']       = $this->Admin_model->getUserByMail($email);
        $data['map']       = $this->googlemaps->create_map();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/lokasi_pemasangan', $data);
        $this->load->view('templates/footer');
    }

    // PEMASANGAN DATIN
    public function pemasangan_datin()
    {
        $data['title']      = 'Pemasangan Indihome';
        $email              = $this->session->userdata('email');
        $data['user']       = $this->Admin_model->getUserByMail($email);
        $data['pDatin']  = $this->Admin_model->getPDatin();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pemasangan_datin', $data);
        $this->load->view('templates/footer');
    }

    //PENCABUTAN INDIHOME
    public function pencabutan_indihome()
    {
        $data['title']      = 'Pemasangan Indihome';
        $email              = $this->session->userdata('email');
        $data['user']       = $this->Admin_model->getUserByMail($email);
        $data['cDatin']  = $this->Admin_model->getCDatin();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pencabutan_indihome', $data);
        $this->load->view('templates/footer');
    }

    // TEKNISI PEMASANGAN ACTION
    public function proses_pemasangan()
    {
        $id_transaksi = $this->input->get('id');
        $id_pelanggan = $this->input->get('id_pelanggan');
        $id_teknisi = $this->session->userdata('id');
        $layanan = $this->input->get('layanan');
        $status = $this->input->get('status');
        $nm_teknisi = $this->session->userdata('name');
        $dataPelanggan = [
            'id_pelanggan' => $id_pelanggan,
            'id_teknisi'   => $id_teknisi,
            'nm_teknisi'   => $nm_teknisi,
            'status'       => $status,
            'tgl_psb'      => date('Y-m-d')
        ];
        if ($status == "Aktif") {
            $status = "Selesai";
        }
        if ($layanan == "indihome") {
            $dataPIndihome = [
                'id_transaksi' => $id_transaksi,
                'id_teknisi' => $id_teknisi,
                'nm_teknisi'   => $nm_teknisi,
                'status'       => $status,
                'tgl_psb'      => date('Y-m-d')
            ];
            $this->Admin_model->updateStatusPasangIndihome($dataPelanggan, $id_pelanggan, $dataPIndihome, $id_transaksi);
            $this->session->set_flashdata('teknisi_action', 'Di Update');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $dataPDatin = [
                'id_transaksi' => $id_transaksi,
                'id_teknisi' => $id_teknisi,
                'nm_teknisi'   => $nm_teknisi,
                'status'       => $status,
                'tgl_psb'      => date('Y-m-d')
            ];
            $this->Admin_model->updateStatusPasangDatin($dataPelanggan, $id_pelanggan, $dataPDatin, $id_transaksi);
            $this->session->set_flashdata('teknisi_action', 'Di Update');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function proses_pencabutan()
    {
        $id_transaksi = $this->input->get('id');
        $id_pelanggan = $this->input->get('id_pelanggan');
        $id_teknisi = $this->session->userdata('id');
        $layanan = $this->input->get('layanan');
        $status = $this->input->get('status');
        $nm_teknisi = $this->session->userdata('name');
        $dataPelanggan = [
            'id_pelanggan' => $id_pelanggan,
            'id_teknisi'   => $id_teknisi,
            'nm_teknisi'   => $nm_teknisi,
            'status'       => $status,
            'tgl_psb'      => date('Y-m-d')
        ];
        if ($status == "Di Cabut") {
            $status = "Selesai";
        }
        if ($layanan == "indihome") {
            $dataCIndihome = [
                'id_transaksi' => $id_transaksi,
                'id_teknisi' => $id_teknisi,
                'nm_teknisi'   => $nm_teknisi,
                'status'       => $status,
                'tgl_psb'      => date('Y-m-d')
            ];
            // var_dump($status);
            // die;
            $this->Admin_model->updateStatusCabutIndihome($dataPelanggan, $id_pelanggan, $dataCIndihome, $id_transaksi);
            $this->session->set_flashdata('teknisi_action', 'Di Update');
            redirect($_SERVER['HTTP_REFERER']);
        } else {
            $dataPDatin = [
                'id_transaksi' => $id_transaksi,
                'id_teknisi' => $id_teknisi,
                'nm_teknisi'   => $nm_teknisi,
                'status'       => $status,
                'tgl_psb'      => date('Y-m-d')
            ];
            $this->Admin_model->updateStatusPasangDatin($dataPelanggan, $id_pelanggan, $dataPDatin, $id_transaksi);
            $this->session->set_flashdata('teknisi_action', 'Di Update');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function delete_pemasangan()
    {
        $id_transaksi = $this->input->get('id');
        if ($this->input->get('from') == "indihome") {
            $table = "pemasangan_indihome";
        } else {
            $table = "pemasangan_datin";
        }
        $this->Admin_model->deletePemasanganSelesai($table, $id_transaksi);
        $this->session->set_flashdata('adm_action', 'Di Hapus');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function ganti_password(){
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', array('email' => $email))->row_array();
        $this->form_validation->set_rules('psw_lama', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('psw_baru', 'New Password', 'required|trim|min_length[3]|matches[psw_baru2]');
        $this->form_validation->set_rules('psw_baru2', 'New Password 2', 'required|trim|min_length[3]|matches[psw_baru]');

        if($this->form_validation->run() == false){
            $this->session->set_flashdata('adm_gagal', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data Password Tidak <strong>Valid</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('admin/myprofile');
        } else {
            $psw_lama = $this->input->post('psw_lama');
            $psw_baru = $this->input->post('psw_baru');
            $psw_baru2 = $this->input->post('psw_baru2');
            if (!password_verify($psw_lama, $data['user']['password'])) {
                $this->session->set_flashdata('adm_gagal', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Password Lama Tidak <strong>Valid</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('admin/myprofile');
            } else {
                if ($psw_lama == $psw_baru) {
                    $this->session->set_flashdata('adm_gagal', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Password baru tidak boleh sama dengan password lama !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect('admin/myprofile');
                } else {
                    $password_hash = password_hash($psw_baru, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->session->set_flashdata('adm_action', 'Di Ubah');
                    redirect('admin/myprofile');
                }
            }
        }
    }
}
