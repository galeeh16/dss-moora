<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cek_session();
	}

	public function index()
	{
		
	}

	public function cek_session()	{
		if(!$this->session->userdata('level') == 'Member') {
			$this->session->set_flashdata('err', '<div class="alert alert-danger" role="alert" style="border:0.5px solid #D95E5E"><center>Silahkan login terlebih dahulu! <i class="fa fa-exclamation-triangle"></i></center></div>');
			
			return redirect('/','refresh');
		}
	}

}

/* End of file Member.php */
/* Location: ./application/controllers/Member.php */