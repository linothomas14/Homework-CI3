<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_homework extends CI_Model
{
    function read()
    {
        return $this->db->get('assignments')->result_array();
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
}
