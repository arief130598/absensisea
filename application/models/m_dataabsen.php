<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dataabsen extends CI_Model
{
	function __construct()
    {
        // Call the Model constructor
        parent::__construct(); 
    }  

    public function ambildata()
    {
        $this->db->select('nim');
        $this->db->distinct();
        $this->db->where('status',1);
        $query = $this->db->get('individu');
        return $query->result();
    }

    public function ambildatafix($nim)
    {
        $this->db->where(['nim'=>$nim,'status'=>1]);
        $query = $this->db->get('individu');
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

