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

    public function teknisi()
    {
        $data['title'] = 'Teknisi Details';
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
    }

    public function edit_teknisi()
    {
        $id = $this->input->get('id');
        // var_dump($id);
        // die;
        $data['title'] = 'Teknisi Details';
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

    public function getUbah()
    {
        echo json_encode($this->Admin_model->getTeknisiById($_POST['id']));
    }

    public function teknisi_detail()
    {
        $id = $this->input->get('id');
        $data['title'] = 'Teknisi Details';
        $email = $this->session->userdata('email');
        $data['user'] = $this->Admin_model->getUserByMail($email);
        $data['teknisi'] = $this->Admin_model->TeknisiJoin($id);
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
}
