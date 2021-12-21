<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_homework extends CI_Model
{
    function read()
    {

        // $this->db->where('kelas', $this->session->userdata('kelas'));
        return $this->db->get('assignments')->result_array();
    }

    function registration()
    {
        $username = $this->input->post('username');
        $username_exist = $this->db->get_where('users', ['username' => $username])->row_array();

        $password = $this->input->post('password');
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        if ($username_exist) {
            $this->session->set_flashdata('username', 'Exists');
            redirect('homework/registration', 'refresh');
        } else {
            $userData = [
                'username' => $username,
                'password' => $hashed_password,
            ];

            $this->db->insert('users', $userData);
            // Session data
            $this->session->set_userdata('username', $username);
            $this->session->set_flashdata('register', 'true');
            if ($this->db->affected_rows() > 0) {
                redirect('homework/biodata', 'refresh');
            }
        }
    }

    function fillBiodata()
    {
        $username = $this->session->userdata('username');
        $nama = $this->input->post('nama-lengkap');
        $npm = $this->input->post('npm');
        $kelas = $this->input->post('kelas');

        $userData = [
            'username' => $username,
            'nama' => $nama,
            'npm' => $npm,
            'kelas' => $kelas,
        ];
        $this->db->insert('biodata', $userData);
        $this->session->set_userdata('login', '1');
        if ($this->db->affected_rows() > 0) {
            redirect('homework', 'refresh');
        }
    }

    function validateLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('users', ['username' => $username])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->session->set_userdata('login', '1');
                $this->session->set_userdata('username', $user['username']);
                redirect('', 'refresh');
            }
        } else {
            $this->session->set_flashdata('salah_login', '1');
        }
    }

    function create()
    {
        $title = $this->input->post('title');
        $subject = $this->input->post('subject');
        $description = $this->input->post('description');
        $deadline = $this->input->post('deadline');

        $data = [
            'title' => $title,
            'subject' => $subject,
            'description' => $description,
            'deadline' => $deadline,
        ];

        $this->db->insert('assignments', $data);
        if ($this->db->affected_rows() > 0) {
            redirect('homework', 'refresh');
        }
    }

    function hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('assignments');
        if ($this->db->affected_rows() > 0) {
            redirect('homework', 'refresh');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('homework/login');
    }
    function test()
    {
        $this->session->sess_destroy();
        redirect('', 'refresh');
    }
}