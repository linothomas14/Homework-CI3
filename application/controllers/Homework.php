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
			$data['assignments'] = $this->M_homework->read();
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
	}

	public function registration()
	{
		$this->load->view('core/header-login');
		$this->load->view('login/registration');
		$this->load->view('core/footer');
		if (isset($_POST['submit'])) {
			$this->M_homework->registration();
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
			redirect('homework/registration', 'refresh');
		}
	}

	public function tambah()
	{
		$this->load->view('core/header');
		$this->load->view('contents/tambah');
		$this->load->view('core/footer');
		if (isset($_POST['submit'])) {
			$this->M_homework->create();
		}
	}

	public function test()
	{
		$this->load->view('core/header-login');
		$this->load->view('login/registration');
		$this->load->view('core/footer');
		if (isset($_POST['submit'])) {
			$this->M_homework->registration();
		}
	}

	public function delete($id)
	{
		$this->M_homework->hapus($id);
		redirect('homework', 'refresh');
	}
}
