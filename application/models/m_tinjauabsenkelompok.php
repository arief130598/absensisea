<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tinjauabsenkelompok extends CI_Model
{
	function __construct()
    {
        // Call the Model constructor
        parent::__construct(); 
    }  

    public function updatedataterima($ketua,$anggota1,$anggota2,$jammasuk,$jamkeluar,$tanggal)
    {     
        $this->db->where(['ketua'=>$ketua,'anggota1'=>$anggota1, 'anggota2'=>$anggota2,'jammasuk'=>$jammasuk,'jamkeluar'=>$jamkeluar,'tanggal'=>$tanggal]);
        $this->db->update('kelompok',['status'=>1]);        
    }

    public function updatedatatolak($ketua,$anggota1,$anggota2,$jammasuk,$jamkeluar,$tanggal)
    {     
        $this->db->where(['ketua'=>$ketua,'anggota1'=>$anggota1, 'anggota2'=>$anggota2,'jammasuk'=>$jammasuk,'jamkeluar'=>$jamkeluar,'tanggal'=>$tanggal]);
        $this->db->update('kelompok',['status'=>2]);       
    }

    public function ambildata()
    {
        $this->db->where('status',0);
        $query = $this->db->get('kelompok'); 
        
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

