<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Siswas_model');
    }

    public function index()
    {
        $data['title'] = 'Data Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->Siswas_model->getAllSiswa();
        $data['kelas'] = $this->Siswas_model->getAllKelas();
        $data['iuran'] = $this->Siswas_model->getAllIuran();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/index', $data);
        $this->load->view('templates/footer', $data);
    }


    public function tambahSiswa()
    {
        $data['title'] = 'Tambah Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['kelas'] = $this->Siswas_model->getAllKelas();

        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|numeric|integer|is_unique[data_siswa.nik]', [
            'required' => 'NIK tidak Boleh Kosong!',
            'numeric'  => 'NIK harus berupa angka!',
            'integer'  => 'NIK hanya berupa bilangan bulat',
            'is_unique' => 'NIK sudah terdaftar'
        ]);
        $this->form_validation->set_rules('nok', 'NO KK', 'required|trim|numeric|integer', [
            'required' => 'No KK tidak Boleh Kosong!',
            'integer' => 'No KK hanya berupa bilangan bulat!',
            'numeric'  => 'No KK harus berupa angka!'
        ]);
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required|trim', [
            'required' => 'Nama siswa tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required', [
            'required' => 'jenis kelamin harus dipilih'
        ]);
        $this->form_validation->set_rules('kelas_id', 'Kelas', 'required', [
            'required' => 'kelas harus dipilih'
        ]);
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required|trim', [
            'required' => 'Nama ibu tidak boleh kosong'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('siswa/tambahsiswa', $data);
            $this->load->view('templates/footer', $data);
        } else {
            //insert data siswa
            $this->Siswas_model->tambahSiswa();
        }
    }

    public function tambahtransaksi()
    {
        $id = $this->input->post('id');
        $result = $this->Siswas_model->getSiswaById($id);

        if (!$result) {
            redirect('siswa');
        } else {
            $data['title'] = 'Tambah Transaksi Siswa';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['iuran'] = $this->Siswas_model->getAllIuran();
            $data['siswa'] = $result;

            $this->form_validation->set_rules('bulan_bayar', 'Untuk pembayaran bulan', 'required|trim');
            $this->form_validation->set_rules('tahun_bayar', 'Untuk pembayaran tahun', 'required|trim|integer');
            $this->form_validation->set_rules('jmlh_bayar', 'Jumlah bayar', 'required|trim|numeric|integer');

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('siswa/tambahtransaksi', $data);
                $this->load->view('templates/footer', $data);
            } else {
                    $this->Siswas_model->tambahTransaksi();
                }
            }
        }

    public function hapussiswa($nik)
    {
        $this->Siswas_model->hapusSiswa($nik);
    }

    public function transaksi()
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['transaksi'] = $this->Siswas_model->getAllTransaksi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/transaksi', $data);
        $this->load->view('templates/footer', $data);
    }

    public function editSiswa()
    {
        $nik = $this->input->post('nik');
        $result = $this->Siswas_model->getSiswaByNik($nik);

        if ($result) {
            // jika data ada

            $data['title'] = 'Edit Data Siswa';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['siswa'] = $result;
            $data['kelas'] = $this->Siswas_model->getAllKelas();

            $this->form_validation->set_rules('nok', 'NO KK', 'required|trim|numeric');
            $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required|trim');
            $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
            $this->form_validation->set_rules('kelas_id', 'Kelas', 'required|trim');
            $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required|trim');

            if ($this->form_validation->run() == false) {

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('siswa/editsiswa', $data);
                $this->load->view('templates/footer', $data);
            } else {
                // Edit Data Siswa
                $this->Siswas_model->editSiswa($nik);
            }
        } else {
            // jika data tidak ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Data Siswa gagal diupdate!, data siswa tidak ditemukan</div>
            ');
            redirect('siswa');
        }
    }
}
