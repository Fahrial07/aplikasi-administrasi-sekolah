<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CetakLaporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('Transaksi_model');
        // is_logged_in();
        $this->load->library(array('session','form_validation'));
    }

    public function LaporanBulanan()
    {   
        $bulan = $this->input->post('bulan');
        $thn = $this->input->post('tahun');

        // $this->form_validation->set_rules('bulan','required');
        // $this->form_validation->set_rules('tahun','required');

        if($bulan == null){
            $this->session->set_flashdata('message','<div class="alert alert-warning text-center" role="alert">Form bulan / tahun harus di pilih !</div>');
            redirect('admin');
        } else if($thn == null) {
        $this->session->set_flashdata('message','<div class="alert alert-warning text-center" role="alert">Form bulan / tahun harus di pilih !</div>');
            redirect('admin');
        } else{

        $data = array(
            'title' => 'Laporan Bulanan, ' . $bulan . '-' . $thn . ' SDIT Al Islamiyah',
            'laporan_bulanan' => $this->Transaksi_model->cetakLaporanBulanan($bulan, $thn),
            'jmll' => $this->Transaksi_model->cetakLaporanBulananJml($bulan, $thn),
            'tgk' => $this->Transaksi_model->cetakLaporanBulananJmlSisa($bulan, $thn)
            );

        $this->load->library('Pdf');
        $this->pdf->setPaper('A4','potrait');
        $this->pdf->filename = $bulan . '-' . $thn . "-laporan_bulanan_SDIT_Al_Islamiyah.pdf";
        return $this->pdf->load_view('laporan/laporan_bulanan', $data);


        }
    }

    public function LaporanTahunan()
    {
        $thn = $this->input->post('tahun');

        // $this->form_validation->set_rules('bulan','required');
        // $this->form_validation->set_rules('tahun','required');

     if($thn == null) {
        $this->session->set_flashdata('message','<div class="alert alert-warning text-center" role="alert">Form tahun harus di pilih !</div>');
            redirect('admin');
        } else{

        $data = array(
            'title' => 'Laporan Tahunan, ' . $thn . ' SDIT Al Islamiyah',
            'laporan_tahunan' => $this->Transaksi_model->cetakLaporanTahunan($thn),
            'jmll' => $this->Transaksi_model->cetakLaporanTahunanJml($thn),
            'tgk' => $this->Transaksi_model->cetakLaporanTahunanJmlSisa($thn)
            );

        $this->load->library('Pdf');
        $this->pdf->setPaper('A4','potrait');
        $this->pdf->filename = $thn . "-laporan_tahunan_SDIT_Al_Islamiyah.pdf";
        return $this->pdf->load_view('laporan/laporan_tahunan', $data);
        }
    }
}