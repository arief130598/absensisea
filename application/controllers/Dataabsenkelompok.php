<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataabsenkelompok extends CI_Controller {
	function __construct(){
        // Call the Model constructor
        parent::__construct(); 
        $this->load->model('m_dataabsenkelompok');
    }

	public function index()
	{
		$this->m_dataabsenkelompok->check_session();
		$data = $this->m_dataabsenkelompok->ambildata();
		$i=0;
		foreach ($data as $key) {
			$ketua[$i]=$key->ketua;
			$anggota1[$i]=$key->anggota1;
			$anggota2[$i]=$key->anggota2;
			$i++;
		}
		$i = 0;
		$jambener=array(0=>0);
		$menitbener=array(0=>0);
		$newcoro = $ketua[0].$anggota1[0].$anggota2[0];

		foreach ($data as $values) {
			$ketuas = $values->ketua;
			$anggota1s = $values->anggota1;
			$anggota2s = $values->anggota2;
			$coro = $ketuas.$anggota1s.$anggota2s;

			if($coro!=$newcoro)
			{
				$i++;
			}
			$datafix = $this->m_dataabsenkelompok->ambildatafix($ketuas,$anggota1s,$anggota2s);
			
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
			$newketua=$ketuas;
			$newanggota1=$anggota1s;
			$newanggota2=$anggota2s;
			$newcoro = $newketua.$newanggota1.$newanggota2;
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
		$this->load->view('v_dataabsenkelompok',['setketua'=>$ketua,'setanggota1'=>$anggota1,'setanggota2'=>$anggota2,'jam'=>$setjam]);
	}

	public function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url().'');
    }
}