<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_nilai');
		$this->cek_session();
	}

	public function index()
	{
		$data['data_nilai'] = $this->Model_nilai->get_all()->result();
		$this->load->view('layouts/v_app');
		$this->load->view('nilai/v_index', $data);
		$this->load->view('layouts/v_footer');
	}

	public function cek_session()	{
		if(!$this->session->userdata('level') == 'Admin') {
			$this->session->set_flashdata('err', '<div class="alert alert-danger" role="alert" style="border:0.5px solid #D95E5E"><center>Silahkan login terlebih dahulu! <i class="fa fa-exclamation-triangle"></i></center></div>');
			
			return redirect('/','refresh');
		}
	}

}

/* End of file Nilai.php */
/* Location: ./application/controllers/admin/Nilai.php */