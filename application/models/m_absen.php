<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_absen extends CI_Model
	{

		public function insert($data)
		{
			$this->db->insert("individu",$data);
		}
		public function insertkelompok($data)
		{
			$this->db->insert("kelompok",$data);
		}


	    public function hitungmasuk($nim)
	    {
	    	$this->db->where(['nim'=>$nim,'jamkeluar'=>null]);
			$this->db->from("individu");
			return $this->db->count_all_results();
	    }

	    public function hitungmasukkelompok($namaketua, $nama1, $nama2)
	    {
	    	$this->db->where(['ketua'=>$namaketua,'anggota1'=>$nama1,'anggota2'=>$nama2,'jamkeluar'=>null]);
			$this->db->from("kelompok");
			return $this->db->count_all_results();
	    }
	    public function check_session()
		{
			if($this->session->userdata('username')!=null)
			{
				redirect(base_url('dataabsen'));
			}
		}
	}