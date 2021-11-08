<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
	public function earningAnnual()
	{
		$tgl = date('Y');
		$query = "SELECT SUM(jmlh_bayar) as jml_byr FROM transaksi WHERE tahun_bayar = $tgl";

		return $this->db->query($query)->row_array();
	}

	public function earningMonthly()
	{

		$tgl = date('m');
		$thn = date('Y');
		$query = "SELECT SUM(jmlh_bayar) as jml_byr FROM transaksi WHERE bulan_bayar = $tgl AND tahun_bayar = $thn";

		return $this->db->query($query)->row_array();
	}

	public function tBl()
	{
		$this->db->where('tahun_bayar', date('Y'));
		$this->db->where('status','Belum Lunas');
		return $this->db->get('transaksi')->num_rows();
	}

	public function tL()
	{
		$this->db->where('tahun_bayar', date('Y'));
		$this->db->where('status','Lunas');
		return $this->db->get('transaksi')->num_rows();
	}

	public function cetakLaporanBulanan($bulan, $thn)
	{
		$this->db->where('bulan_bayar', $bulan);
		$this->db->where('tahun_bayar', $thn);
		$this->db->join('data_siswa','data_siswa.id = transaksi.id_siswa');
		return $this->db->get('transaksi')->result();
	}

	public function cetakLaporanBulananJml($bulan, $thn)
	{

		$query = "SELECT SUM(jmlh_bayar) as jml_byr FROM transaksi WHERE bulan_bayar = $bulan AND tahun_bayar = $thn";
		return $this->db->query($query)->row_array();
	}


	public function cetakLaporanBulananJmlSisa($bulan, $thn)
	{

		$query = "SELECT SUM(sisa) as tunggak FROM transaksi WHERE bulan_bayar = $bulan AND tahun_bayar = $thn";
		return $this->db->query($query)->row_array();
	}

	public function cetakLaporanTahunan($thn)
	{
		$this->db->where('tahun_bayar', $thn);
		$this->db->join('data_siswa','data_siswa.id = transaksi.id_siswa');
		return $this->db->get('transaksi')->result();
		
	}

	public function cetakLaporanTahunanJml($thn)
	{

		$query = "SELECT SUM(jmlh_bayar) as jml_byr FROM transaksi WHERE tahun_bayar = $thn";
		return $this->db->query($query)->row_array();
	}


	public function cetakLaporanTahunanJmlSisa($thn)
	{

		$query = "SELECT SUM(sisa) as tunggak FROM transaksi WHERE tahun_bayar = $thn";
		return $this->db->query($query)->row_array();
	}
}

