<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('layouts/v_header');
		$this->load->view('pages/v_login');
	}
}
