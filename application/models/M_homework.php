<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_homework extends CI_Model
{
    function read()
    {
        $this->db->where('kelas', $this->session->userdata('kelas'));
        $output = array(
            $this->db->order_by("deadline", "desc")->get('assignments')->result_array(),
            $this->db->get('biodata')->result_array(),
        );
        return $output;
    }
    function get_row($id)
    {
        return $this->db->get_where('assignments', ['id' => $id])->row_array();
    }
    function register()
    {
        $username = $this->input->post('username');
        $username_exist = $this->db->get_where('users', ['username' => $username])->row_array();

        $password = $this->input->post('password');
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        if ($username_exist) {
            $this->session->set_flashdata('username', 'Exists');
            redirect('homework/register', 'refresh');
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
            'kelas' => strtoupper($kelas),
        ];
        $this->db->insert('biodata', $userData);
        $this->session->sess_destroy();
        if ($this->db->affected_rows() > 0) {
            redirect('', 'refresh');
        }
    }

    function validateLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('users', ['username' => $username])->row_array();
        $kelas = $this->db->get_where('biodata', ['username' => $username])->row_array();

        if ($user && password_verify($password, $user['password'])) {

            $this->session->set_userdata('login', '1');
            $this->session->set_userdata('username', $user['username']);
            $this->session->set_userdata('kelas', $kelas['kelas']);
            redirect('', 'refresh');
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
        $username = $this->session->userdata('username');
        $poster = $this->db->get_where('biodata', ['username' => $username])->row_array();
        $data = [
            'title' => $title,
            'subject' => $subject,
            'description' => $description,
            'deadline' => $deadline,
            'kelas' => $this->session->userdata('kelas'),
            'poster' => $poster['nama'],
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

    function update()
    {
        $title = $this->input->post('title');
        $subject = $this->input->post('subject');
        $deadline = $this->input->post('deadline');
        $description = $this->input->post('description');
        $username = $this->session->userdata('username');
        $poster = $this->db->get_where('biodata', ['username' => $username])->row_array();

        $data = [
            'title' => $title,
            'subject' => $subject,
            'deadline' => $deadline,
            'description' => $description,
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('assignments', $data);
        if ($this->db->affected_rows() > 0) {

            // masih error disini, dia ga masuk ke if yang affected row

            $this->session->set_flashdata('pesan', 'Diubah');
            redirect('homework', 'refresh');
        }
    }
}
