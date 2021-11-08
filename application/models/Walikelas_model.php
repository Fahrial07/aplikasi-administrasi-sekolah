<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Walikelas_model extends CI_Model
{
    public function getAllWalikelas()
    {
        $this->db->join('kelas','kelas.id = walikelas.kelas_id');
        return $this->db->get('walikelas')->result_array();
    }

    public function hapusWalikelas($email)
    {
        $this->db->where('email',$email);
        $this->db->delete('walikelas');

        $this->db->where('email',$email);
        $this->db->delete('user');
    }

    public function getKelas()
    {
    $query = "SELECT * FROM kelas WHERE id NOT IN (SELECT kelas_id FROM walikelas)";
        return $this->db->query($query)->result_array();
    }

    public function tambahWalikelas()
    {
        $name = $this->input->post('name', true);
        $email = $this->input->post('email', true);

        $data1 = [
            'name' => $name,
            'email' => $email,
            'kelas_id' => $this->input->post('kelas_id'),
            'role_id' => 3,
            'is_active' => 1,
            'image' => 'default.jpg',
            'date_created' => time()
        ];

        $data2 = [
            'name' => $name,
            'email' => $email,
            'image' => 'default.jpg',
            'password' => $email,
            'role_id' => 3,
            'is_active' => 1,
            'date_created' => time()
        ];

        $this->db->insert('walikelas', $data1);
        $this->db->insert('user', $data2);
    }

    public function cek_data($email)
    {
        $this->db->where('email', $email);
        return $this->db->get('walikelas')->result_array();
    }

    public function cek_data_user($email)
    {
        $this->db->where('email', $email);
        return $this->db->get('user')->result_array();
    }
}
