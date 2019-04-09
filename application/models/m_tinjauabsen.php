<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tinjauabsen extends CI_Model
{
	function __construct()
    {
        // Call the Model constructor
        parent::__construct(); 
    }  

    public function updatedataterima($nim,$jammasuk,$jamkeluar,$tanggal)
    {     
        $this->db->where(['nim'=>$nim,'jammasuk'=>$jammasuk,'jamkeluar'=>$jamkeluar,'tanggal'=>$tanggal]);
        $this->db->update('individu',['status'=>1]);        
    }

    public function updatedatatolak($nim,$jammasuk,$jamkeluar,$tanggal)
    {     
        $this->db->where(['nim'=>$nim,'jammasuk'=>$jammasuk,'jamkeluar'=>$jamkeluar,'tanggal'=>$tanggal]);
        $this->db->update('individu',['status'=>2]);       
    }

    public function ambildata()
    {
        $this->db->where('status',0);
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

