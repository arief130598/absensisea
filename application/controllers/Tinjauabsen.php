<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tinjauabsen extends CI_Controller {
	function __construct(){
        // Call the Model constructor
        parent::__construct(); 
        $this->load->model('m_tinjauabsen');
    }

	public function index()
	{
		$this->m_tinjauabsen->check_session();
		$this->load->helper('directory');
		$data = $this->m_tinjauabsen->ambildata();

		$this->load->view('v_tinjauabsen',['data'=>$data]);
	}

	public function terima($nim,$jammasuk,$jamkeluar,$tanggal,$bulan,$tahun)
	{
		$tanggal = $tanggal."/".$bulan."/".$tahun;
		$this->m_tinjauabsen->updatedataterima($nim,$jammasuk,$jamkeluar,$tanggal);
		redirect('Tinjauabsen','refresh');
	}

	public function tolak($nim,$jammasuk,$jamkeluar,$tanggal,$bulan,$tahun)
	{
		$tanggal = $tanggal."/".$bulan."/".$tahun;
		$this->m_tinjauabsen->updatedatatolak($nim,$jammasuk,$jamkeluar,$tanggal);
		redirect('Tinjauabsen','refresh');
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url().'');
    }
}