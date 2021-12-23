<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homework extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_homework');
	}
	public function index()
	{
		if ($this->session->userdata('login') == 1) {
			$data['assignments'] = $this->M_homework->read()[0];
			$data['biodata'] = $this->M_homework->read()[1];

			// $this->db->select('kelas');
			// $data['nama'] = $this->db->get_where('biodata', ['username' => $this->session->userdata('username')]);
			$this->load->view('core/header', $data);
			$this->load->view('contents/home');
			$this->load->view('core/footer');
		} else {
			$this->session->set_flashdata('belum_login', '2');
			redirect('homework/login', 'refresh');
		}
	}

	public function login()
	{
		$this->load->view('core/header-login');
		$this->load->view('login/login');
		$this->load->view('core/footer');
		if (isset($_POST['login'])) {
			$this->M_homework->validateLogin();
		}
		if (isset($_POST['register'])) {
			$this->M_homework->register();
		}
	}

	public function member()
	{
		if ($this->session->userdata('login') == 1) {
			$data['assignments'] = $this->M_homework->read()[0];
			$data['biodata'] = $this->M_homework->read()[1];

			$this->load->view('core/header', $data);
			$this->load->view('contents/member');
			$this->load->view('core/footer');
		} else {
			$this->session->set_flashdata('belum_login', '2');
			redirect('homework/login', 'refresh');
		}
	}


	public function register()
	{

		$this->load->view('core/header-login');
		$this->load->view('login/register');
		$this->load->view('core/footer');
		if (isset($_POST['submit'])) {
			$this->M_homework->register();
		}
	}

	public function biodata()
	{
		if ($this->session->flashdata('register') == 'true') {
			$this->load->view('core/header-login');
			$this->load->view('login/fillBiodata');
			$this->load->view('core/footer');
			if (isset($_POST['submit-biodata'])) {
				$this->M_homework->fillBiodata();
			}
		} else {
			redirect('homework/register', 'refresh');
		}
	}

	public function tambah()
	{
		if ($this->session->userdata('login') == 1) {
			$this->load->view('core/header');
			$this->load->view('contents/tambah');
			$this->load->view('core/footer');
			if (isset($_POST['submit'])) {
				$this->M_homework->create();
			}
		} else {
			$this->session->set_flashdata('belum_login', '2');
			redirect('homework/login', 'refresh');
		}
	}


	public function delete($id)
	{
		if ($this->session->userdata('login') == 1) {
			$this->M_homework->hapus($id);
			redirect('homework', 'refresh');
		} else {
			$this->session->set_flashdata('belum_login', '2');
			redirect('homework/login', 'refresh');
		}
	}

	public function logout()
	{
		session_destroy();
		redirect('homework/login', 'refresh');
	}
	public function edit($id)
	{
		if ($this->session->userdata('login') == '1') {
			$data['assignments'] = $this->M_homework->get_row($id);
			$this->load->view('core/header', $data);
			$this->load->view('contents/edit');
			$this->load->view('core/footer');
			if (isset($_POST['edit'])) {
				$this->M_homework->update();
			}
		} else {
			$this->session->set_flashdata('belum_login', '2');
			redirect('homework/login', 'refresh');
		}
	}
}
