<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_nilai extends CI_Model {

	protected $table = 'moo_nilai';

	function get_all() {
		$this->db->select('moo_nilai.id_nilai AS id, alternatif, kriteria, bobot');
		$this->db->from('moo_nilai');
		$this->db->join('moo_kriteria', 'moo_kriteria.id_kriteria = moo_nilai.id_kriteria');
		$this->db->join('moo_alternatif', 'moo_alternatif.id_alternatif = moo_nilai.id_alternatif');
		$query = $this->db->get();
		return $query;
	}	

}

/* End of file Model_nilai.php */
/* Location: ./application/models/Model_nilai.php */