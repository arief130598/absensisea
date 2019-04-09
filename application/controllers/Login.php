<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
	}

	public function index()
	{
		$this->m_login->check_session();
		$this->load->view('v_login');
	}

	function loginmulai(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
			);

		$cek = $this->m_login->cek_login($where)->num_rows();
		$data = $this->m_login->cek_login($where);
	
		if($cek==1){
			$this->session->set_userdata('username',$username);
 
			redirect(base_url('dataabsen')); 
		}
		else{
			echo "<script>alert('Username / Password Salah');</script>";
	        redirect('login','refresh');
		}
	}
}
