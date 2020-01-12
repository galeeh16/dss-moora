<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {

	private $table = "users";

	function login($username, $password) {
	    $this->db->select('*');
	    $this->db->from($this->table);
	    $this->db->where('username', $username);
	    $this->db->where('password', $password);
	    $this->db->limit(1);
	    $sql = $this->db->get();

	    if($sql->num_rows() > 0) {
	      	return $sql->row();
	    } else {
	      	return false;
	    }
	}

	function insert_data($data) {
		$this->db->insert($this->table, $data);

		if($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

}

/* End of file Model_user.php */
/* Location: ./application/models/Model_user.php */