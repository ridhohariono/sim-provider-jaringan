<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Admin_model');
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Page';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			// validasi nya sukses
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		//usernya ada
		if ($user) {
			//jika usernya aktif
			if ($user['is_active'] == 1) {
				// cek password
				if (password_verify($password, $user['password'])) {
					$data = [
						'id' => $user['id'],
						'name' => $user['name'],
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 1) {
						redirect('admin');
					} elseif ($user['role_id'] == 2) {
						redirect('user/');
					} else {
						redirect('user/');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" 
						role="alert">Password Salah!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" 
					role="alert">Email ini belum diaktivasi!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" 
				role="alert">Email belum pernah terdaftar!</div>');
			redirect('auth');
		}
	}

	public function registration()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'Email ini sudah pernah teregistrasi!'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'password dont match!',
			'min_length' => 'Password too Short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'WPU User Registration';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		} else {
			// CEK EMAIL ADA ATAU TIDAK DI TABLE TEKNISI
			$email = $this->input->post('email', true);
			$cekEmail = $this->Admin_model->getTeknisiByEmail($email);
			if ($cekEmail > 0) {
				$data = [
					'name' => htmlspecialchars($this->input->post('name', true)),
					'email' => htmlspecialchars($this->input->post('email', true)),
					'image' => 'default.jpg',
					'password' => password_hash(
						$this->input->post('password1'),
						PASSWORD_DEFAULT
					),
					'role_id' => 2,
					'is_active' => 1,
					'date_created' => time()
				];
				$this->db->insert('user', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success" 
					role="alert">Selamat! Akun anda telah dibuat. Silahkan Masuk!</div>');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" 
					role="alert">Email anda belum terdaftar sebagai Teknisi, Silahkan Hubungi Admin!</div>');
			}
			redirect('auth');
		}
	}


	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message', '<div class="alert alert-success" 
			role="alert">Anda telah keluar!</div>');
		redirect('auth');
	}
}
