<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masters_model extends CI_Model
{
    public function getAllIuran()
    {
        return $this->db->get('iuran')->result_array();
    }

    public function getAllKelas()
    {
        $query = "SELECT *
                    FROM `kurikulum` JOIN `kelas`
                      ON `kurikulum`.`id` = `kelas`.`id_kurikulum`
        ";

        return $this->db->query($query)->result_array();
    }

    public function getAllKurikulum()
    {
        return $this->db->get('kurikulum')->result_array();
    }

    public function tambahIuran()
    {
        $data = [
            'bulan_bayar'       => $this->input->post('bulan_bayar', true),
            'jmlh_bayar_lunas'  => $this->input->post('jmlh_bayar_lunas', true),
            'tahun'             => $this->input->post('tahun', true)
        ];

        $this->db->insert('iuran', $data);
    }

    public function tambahKurikulum()
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'tahun' => $this->input->post('tahun', true),
            'semester' => $this->input->post('semester', true)
        ];

        $this->db->insert('kurikulum', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                data kurikulum berhasil ditambah!</div>
                ');
        redirect('admin/master');
    }

    public function tambahKelas()
    {
        $data = [
            'nama_kelas' => $this->input->post('nama_kelas', true),
            'id_kurikulum' => $this->input->post('id_kurikulum', true)
        ];

        $this->db->insert('kelas', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                data kelas berhasil ditambah!</div>
                ');
        redirect('admin/master');
    }

    public function hapusIuran($id)
    {
        $result   =   $this->db->get_where('iuran', ['id' => $id])->row_array();

        if (!$result) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                data iuran gagal dihapus! data tidak ditemukan</div>
                ');
            redirect('admin/master');
        } else {
            $this->db->where('id', $id);
            $this->db->delete('iuran');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                data iuran berhasil dihapus!</div>
                ');
            redirect('admin/master');
        }
    }

    public function hapusKurikulum($id)
    {
        $result = $this->db->get_where('kurikulum', ['id' => $id]);
        if (!$result) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                data kurikulum gagal dihapus! data tidak ditemukan</div>
                ');
            redirect('admin/master');
        } else {
            $this->db->where('id', $id);
            $this->db->delete('kurikulum');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                data kurikulum berhasil dihapus!</div>
                ');
            redirect('admin/master');
        }
    }

    public function hapusKelas($id)
    {
        $result = $this->db->get_where('kelas', ['id' => $id]);
        if (!$result) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                data kelas gagal dihapus! data tidak ditemukan</div>
                ');
            redirect('admin/master');
        } else {
            $this->db->where('id', $id);
            $this->db->delete('kelas');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                data kelas berhasil dihapus!</div>
                ');
            redirect('admin/master');
        }
    }

    public function getDataIuranById($id)
    {
        return $this->db->get_where('iuran', ['id' => $id])->row_array();
    }

    public function getDataKurikulumById($id)
    {
        return $this->db->get_where('kurikulum', ['id' => $id])->row_array();
    }

    public function getDataKelasById($id)
    {
        return $this->db->get_where('kelas', ['id' => $id])->row_array();
    }

    public function editIuran($id)
    {
        $cekIuran   =   $this->db->get_where('iuran', ['id' => $id])->row_array();
        if (!$cekIuran) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                data iuran gagal diedit! data tidak ditemukan</div>
                ');
            redirect('admin/master');
        } else {
            $data = [
                'bulan_bayar'       => $this->input->post('bulan_bayar', true),
                'jmlh_bayar_lunas'  => $this->input->post('jmlh_bayar_lunas', true),
                'tahun'             => $this->input->post('tahun', true)
            ];

            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('iuran', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    data iuran berhasil diedit!</div>
                    ');
            redirect('admin/master');
        }
    }

    public function editKurikulum($id)
    {
        $cekKur =   $this->db->get_where('kurikulum', ['id' => $id]);
        if (!$cekKur) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    data kurikukum gagal diedit! data tidak ditemukan</div>
                    ');
            redirect('admin/master');
        } else {
            $data = [
                'nama'      => $this->input->post('nama', true),
                'tahun'     => $this->input->post('tahun', true),
                'semester'  => $this->input->post('semester', true)
            ];

            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('kurikulum', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    data kurikukum berhasil diedit!</div>
                    ');
            redirect('admin/master');
        }
    }

    public function editKelas($id)
    {
        $cekKelas = $this->db->get_where('kelas', ['id' => $id]);
        if (!$cekKelas) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    data kelas gagal diedit! data tidak ditemukan</div>
                    ');
            redirect('admin/master');
        } else {
            $data = [
                'nama_kelas' => $this->input->post('nama_kelas', true),
                'id_kurikulum' => $this->input->post('id_kurikulum', true)
            ];

            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update('kelas');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    data kelas berhasil diedit!</div>
                    ');
            redirect('admin/master');
        }
    }
}
