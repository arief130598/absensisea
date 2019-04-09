<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dataabsenkelompok extends CI_Model
{
	function __construct()
    {
        // Call the Model constructor
        parent::__construct(); 
    }  

    public function ambildata()
    {
        $this->db->select(['ketua','anggota1','anggota2']);
        $this->db->distinct();
        $this->db->where('status',1);
        $query = $this->db->get('kelompok');
        return $query->result();
    }

    public function ambildatafix($ketuas,$anggota1s,$anggota2s)
    {
        $this->db->where(['ketua'=>$ketuas,'anggota1'=>$anggota1s,'anggota2'=>$anggota2s,'status'=>1]);
        $query = $this->db->get('kelompok');
        return $query->result();
    }

    public function ambilnama()
    {
        $this->db->select('nama');
        $this->db->distinct();
        $this->db->where('status',1);
        $query = $this->db->get('individu');
        return $query->result();
    }
    public function check_session()
    {
        if($this->session->userdata('username')==null)
        {
            redirect(base_url(''));
        }
    }
}

