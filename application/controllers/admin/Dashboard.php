<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->cek_session();
	}

	public function index()
	{
		$this->load->view('layouts/v_app');
		$this->load->view('layouts/v_footer');
	}

	public function cek_session()	{
		if(!$this->session->userdata('level') == 'Admin') {
			$this->session->set_flashdata('err', '<div class="alert alert-danger" role="alert" style="border:0.5px solid #D95E5E"><center>Silahkan login terlebih dahulu! <i class="fa fa-exclamation-triangle"></i></center></div>');
			
			return redirect('/','refresh');
			// http_response_code(403);
			// die;
		}
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */