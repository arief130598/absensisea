<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataabsen extends CI_Controller {
	function __construct(){
        // Call the Model constructor
        parent::__construct(); 
        $this->load->model('m_dataabsen');
    }

	public function index()
	{
		$this->m_dataabsen->check_session();
		$data = $this->m_dataabsen->ambildata();
		$i=0;
		foreach ($data as $key) {
			$setnim[$i]=$key->nim;
			$i++;
		}
		$i = 0;
		$jambener=array(0=>0);
		$menitbener=array(0=>0);
		$newnim=$setnim[0];
		foreach ($data as $nim) {
			$nims = $nim->nim;
			if($newnim!=$nims)
			{
				$i++;
			}
			$datafix = $this->m_dataabsen->ambildatafix($nims);
			foreach ($datafix as $key) {	
				
				$jammasuk = $key->jammasuk;
				$masukjam = substr($jammasuk, 0,2);
				$masukmenit = substr($jammasuk, 3,2);

				$jamkeluar = $key->jamkeluar;
				$keluarjam = substr($jamkeluar, 0,2);
				$keluarmenit = substr($jamkeluar, 3,2);

				if($keluarmenit>=$masukmenit)
				{
					$jam = $keluarjam-$masukjam;
					$menit = $keluarmenit-$masukmenit;

					if ( !isset($jambener[$i])) {
					   $jambener[$i] = null;
					}
					$jambener[$i] = $jambener[$i] + $jam;
					if ( !isset($menitbener[$i])) {
					   $menitbener[$i] = null;
					}
					$menitbener[$i] = $menitbener[$i] + $menit;
				}
				else
				{
					$jam = $keluarjam-1-$masukjam;
					$menit = $keluarmenit+60-$masukmenit;
					if ( !isset($jambener[$i])) {
					   $jambener[$i] = null;
					}
					$jambener[$i] = $jambener[$i] + $jam;
					if ( !isset($menitbener[$i])) {
					   $menitbener[$i] = null;
					}
					$menitbener[$i] = $menitbener[$i] + $menit;
				}
			}
			$newnim=$nims;
		}

		for($i=0;$i<count($jambener);$i++)
		{
			$jam = $jambener[$i];
			$menit = $menitbener[$i];
			while($menit>=60)
			{
				$menit = $menit-60;
				$jam++;
			}
			$setjam[$i] = $jam .":". $menit;
		}

		$nama = $this->m_dataabsen->ambilnama();
		$k=0;
		foreach ($nama as $namas) {
			$setnama[$k]=$namas->nama;
			$k++;
		}

		$this->load->view('v_dataabsen',['nim'=>$setnim,'nama'=>$setnama,'jam'=>$setjam]);
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url().'');
    }
}