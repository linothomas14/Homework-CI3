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
		$data['assignments'] = $this->M_homework->read();
		$this->load->view('header', $data);
		$this->load->view('home');
		$this->load->view('footer');
	}

	public function tambah()
	{
		$this->load->view('header');
		$this->load->view('tambah');
		$this->load->view('footer');
		if (isset($_POST['submit'])) {
			$this->M_homework->create();
		}
	}

	public function delete($id)
	{
		$this->M_homework->hapus($id);
		redirect('homework', 'refresh');
	}
}
