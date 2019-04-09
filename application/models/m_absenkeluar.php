<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class M_absenkeluar extends CI_Model
	{

		public function insert($data,$nim)
		{
			$this->db->where(['nim'=>$nim,'jamkeluar'=>null]);
			$this->db->update("individu",$data);
		}
		public function insertkelompok($data,$namaketua,$nama1,$nama2)
		{
			$this->db->where(['ketua'=>$namaketua,'anggota1'=>$nama1,'anggota2'=>$nama2,'jamkeluar'=>null]);
			$this->db->update("kelompok",$data);
		}


	    public function hitungmasuk($nim)
	    {
	    	$this->db->where(['nim'=>$nim,'jamkeluar'=>null]);
			$this->db->from("individu");
			return $this->db->count_all_results();
	    }

	    public function hitungmasukkelompok($namaketua,$anggota1,$anggota2)
	    {
	    	$this->db->where(['ketua'=>$namaketua,'anggota1'=>$anggota1,'anggota2'=>$anggota2,'jamkeluar'=>null]);
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