<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Absen extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_absen');
	}

	function index(){
		$this->m_absen->check_session();
		$this->load->view('v_absen');
	}

	function insert()
	{
		$namaketua = $this->input->post('namaketua');
		$nama1 = $this->input->post('nama1');
		$nama2 = $this->input->post('nama2');
		$waktu2 = $this->input->post('jam2');


		$nama = $this->input->post('nama');
		$nim = $this->input->post('nim');
		$waktu = $this->input->post('jam1');
		$status = 0;
		$tanggal = date("d/m/Y"); 

		if(is_null($namaketua) && $nim!=null && $nama!=null)
		{
			$jumlahmasuk = $this->m_absen->hitungmasuk($nim);
			if($jumlahmasuk==1){
	            echo "<script>alert('Anda sudah absen masuk, silahkan absen keluar');</script>";
	            redirect('absen','refresh');
	        }
	        else
	        {
				$data = array(
					'nama' => $nama,
					'nim' => $nim,
					'jammasuk' => $waktu,
					'status' => $status,
					'tanggal' => $tanggal
				);

				$this->m_absen->insert($data);
				redirect('absen','refresh');
			}
		}else if(is_null($nama) && $nama1!=null && $nama2!=null && $namaketua!=null)
		{
			$jumlahmasuk = $this->m_absen->hitungmasukkelompok($namaketua,$nama1,$nama2);
			if($jumlahmasuk==1){
	            echo "<script>alert('Kelompok anda sudah absen masuk, silahkan absen keluar');</script>";
	            redirect('absen','refresh');
	        }
	        else
	        {
				$data = array(
					'ketua' => $namaketua,
					'anggota1' => $nama1,
					'anggota2' => $nama2,
					'jammasuk' => $waktu2,
					'status' => $status,
					'tanggal' => $tanggal
				);

				$this->m_absen->insertkelompok($data);
				redirect('absen','refresh');
			}
		}
		else
		{
			redirect('absen', 'refresh');
		}
		
	}
}