<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Homework extends CI_Controller
{
	public function index()
	{
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}

	public function tambah()
	{
		$this->load->view('header');
		$this->load->view('tambah');
		$this->load->view('footer');
	}
}
