<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Masters_model');
        $this->load->model('Transaksi_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jml'] = $this->Transaksi_model->earningAnnual();
        $data['bln'] = $this->Transaksi_model->earningMonthly();
        $data['bl'] = $this->Transaksi_model->tBl();
        $data['lns'] = $this->Transaksi_model->tL();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function master()
    {
        $data['title']  = 'Master';
        $data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['iuran']  = $this->Masters_model->getAllIuran();
        $data['kurikulum']  = $this->Masters_model->getAllKurikulum();
        $data['kelas']  = $this->Masters_model->getAllKelas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/master', $data);
        $this->load->view('templates/footer');
    }

    public function tambahiuran()
    {
        $data['title']  = 'Tambah Data Iuran';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('bulan_bayar', 'Bulan Bayar', 'required|trim', [
            'required' => 'bulan bayar harus dipilih'
        ]);
        $this->form_validation->set_rules('jmlh_bayar_lunas', 'Jumlah Bayar Lunas', 'required|trim|numeric|integer', [
            'required' => 'jumlah bayar lunas harus isi',
            'numeric'  => 'Jumlah harus berupa angka bilangan bulat',
            'integer'  => 'Angka harus berupa bilangan bulat, tanpa karakter lainya'
        ]);
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim|min_length[4]|integer', [
            'required' => 'tahun harus diisi',
            'integer' => 'tahun harus berupa bilangan bulat'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambahiuran', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Masters_model->tambahIuran();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            data iuran berhasil disimpan!</div>
            ');
            redirect('admin/master');
        }
    }

    public function tambahkurikulum()
    {
        $data['title']  = 'Tambah Data Kurikulum';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Kurikulum', 'required|trim', [
            'required' => 'Nama kurikulum harus dipilih'
        ]);
        $this->form_validation->set_rules('semester', 'Semester', 'required|trim', [
            'required' => 'Semester harus dipilih'
        ]);
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim|min_length[4]|integer', [
            'required' => 'tahun harus diisi',
            'integer' => 'tahun harus berupa bilangan bulat'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambahkurikulum', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->Masters_model->tambahKurikulum();
        }
    }

    public function tambahkelas()
    {
        $data['title']  = 'Tambah Data Kelas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['kurikulums'] = $this->Masters_model->getAllKurikulum();

        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required|trim', [
            'required' => 'Nama kelas harus diisi'
        ]);

        $this->form_validation->set_rules('id_kurikulum', 'Kurikulum Kelas', 'required|trim', [
            'required' => 'Kurikulum kelas harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/tambahkelas', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Masters_model->tambahKelas();
        }
    }

    public function hapusiuran($id)
    {
        $this->Masters_model->hapusIuran($id);
    }

    public function hapuskurikulum($id)
    {
        $this->Masters_model->hapusKurikulum($id);
    }

    public function hapuskelas($id)
    {
        $this->Masters_model->hapusKelas($id);
    }

    public function editiuran()
    {
        $id = $this->input->post('id');
        $result   =   $this->Masters_model->getDataIuranById($id);
        if (!$result) {
            redirect('admin/master');
        } else {
            $data['title']  = 'Edit Data Iuran';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['editiuran'] = $result;

            $this->form_validation->set_rules('jmlh_bayar_lunas', 'Jumlah Bayar Lunas', 'required|trim|numeric|integer', [
                'required' => 'jumlah bayar lunas harus isi',
                'numeric'  => 'Jumlah harus berupa angka bilangan bulat',
                'integer'  => 'Angka harus berupa bilangan bulat, tanpa karakter lainya'
            ]);

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('admin/editiuran', $data);
                $this->load->view('templates/footer', $data);
            } else {
                $this->Masters_model->editIuran($id);
            }
        }
    }

    public function editkurikulum()
    {
        $id = $this->input->post('id');
        $result   =   $this->Masters_model->getDataKurikulumById($id);
        if (!$result) {
            redirect('admin/master');
        } else {
            $data['title']  = 'Edit Data Kurikulum';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['editkurikulum'] = $result;

            $this->form_validation->set_rules('nama', 'Nama Kurikulum', 'required|trim');
            $this->form_validation->set_rules('semester', 'Semester', 'required|trim');

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('admin/editkurikulum', $data);
                $this->load->view('templates/footer', $data);
            } else {
                $this->Masters_model->editKurikulum($id);
            }
        }
    }

    public function editkelas()
    {
        $id = $this->input->post('id');
        $result = $this->Masters_model->getDataKelasById($id);

        if (!$result) {
            redirect('admin/master');
        } else {

            $data['title']  = 'Edit Data Kelas';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['k'] = $result;


            $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required|trim', [
                'required' => 'Nama kelas harus diisi'
            ]);

            $this->form_validation->set_rules('id_kurikulum', 'Kurikulum Kelas', 'required|trim', [
                'required' => 'Kurikulum kelas harus diisi'
            ]);

            if ($this->form_validation->run() == false) {
                $data['kurikulums'] = $this->Masters_model->getAllKurikulum();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('admin/editkelas', $data);
                $this->load->view('templates/footer');
            } else {
                $this->Masters_model->editKelas($id);
            }
        }
    }
}
