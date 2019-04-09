<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tinjauabsenkelompok extends CI_Controller {
	function __construct(){
        // Call the Model constructor
        parent::__construct(); 
        $this->load->model('m_tinjauabsenkelompok');
    }

	public function index()
	{
		$this->m_tinjauabsenkelompok->check_session();
		$this->load->helper('directory');
		$data = $this->m_tinjauabsenkelompok->ambildata();

		$this->load->view('v_tinjauabsenkelompok',['data'=>$data]);
	}

	public function terima($ketua,$anggota1,$anggota2,$jammasuk,$jamkeluar,$tanggal,$bulan,$tahun)
	{
		$tanggal = $tanggal."/".$bulan."/".$tahun;
		$this->m_tinjauabsenkelompok->updatedataterima($ketua,$anggota1,$anggota2,$jammasuk,$jamkeluar,$tanggal);
		redirect('Tinjauabsenkelompok','refresh');
	}

	public function tolak($ketua,$anggota1,$anggota2,$jammasuk,$jamkeluar,$tanggal,$bulan,$tahun)
	{
		$tanggal = $tanggal."/".$bulan."/".$tahun;
		$this->m_tinjauabsenkelompok->updatedatatolak($ketua,$anggota1,$anggota2,$jammasuk,$jamkeluar,$tanggal);
		redirect('Tinjauabsenkelompok','refresh');
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url().'');
    }
}