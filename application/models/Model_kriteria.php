<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kriteria extends CI_Model {

	protected $table = 'moo_kriteria';

	function get_all() {
		return $this->db->get($this->table);
	}	

}

/* End of file Model_kriteria.php */
/* Location: ./application/models/Model_kriteria.php */