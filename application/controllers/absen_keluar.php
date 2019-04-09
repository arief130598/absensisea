<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Absen_keluar extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_absenkeluar');
	}

	function index(){
		$this->m_absenkeluar->check_session();
		$this->load->view('v_absenkeluar');
	}

	function insert()
	{
		$namaketua = $this->input->post('namaketua');
		$nama1 = $this->input->post('nama1');
		$nama2 = $this->input->post('nama2');
		$waktu2 = $this->input->post('jam2');
		$keterangan2 = $this->input->post('keterangan2');


		$nama = $this->input->post('nama');
		$nim = $this->input->post('nim');
		$waktu = $this->input->post('jam1');
		$keterangan = $this->input->post('keterangan');
		$status = 0;
		$tanggal = date("d/m/Y"); 

		if(is_null($namaketua) && $nim!=null && $nama!=null && $keterangan!=null)
		{
			$jumlahmasuk = $this->m_absenkeluar->hitungmasuk($nim);
			if($jumlahmasuk==0){
	            echo "<script>alert('Anda belum absen masuk, silahkan absen masuk');</script>";
	            redirect('absen_keluar','refresh');
	        }
	        else
	        {
				$data = array(
					'jamkeluar' => $waktu,
					'keterangan' => $keterangan
				);

				$this->m_absenkeluar->insert($data, $nim);
				redirect('absen_keluar','refresh');
			}
		}else if(is_null($nama) && $nama1!=null && $nama2!=null && $namaketua!=null && $keterangan2!=null)
		{
			$jumlahmasuk = $this->m_absenkeluar->hitungmasukkelompok($namaketua,$nama1,$nama2);
			if($jumlahmasuk==0){
	            echo "<script>alert('Kelompok anda belum absen masuk, silahkan absen masuk');</script>";
	            redirect('absen_keluar','refresh');
	        }
	        else
	        {
				$data = array(
					'jamkeluar' => $waktu2,
					'keterangan' => $keterangan2
				);

				$this->m_absenkeluar->insertkelompok($data,$namaketua,$nama1,$nama2);
				redirect('absen_keluar','refresh');
			}
		}
		else
		{
			redirect('absen_keluar', 'refresh');
		}
		
	}
}