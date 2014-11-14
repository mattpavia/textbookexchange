<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function exists($username) {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username', $username);
		
		$query = $this->db->get();

		return $query->num_rows() > 0;
	}

	function create($username, $first_name, $last_name, $role = 1) {
		$data = array(
			'username' => $username,
			'first_name' => $first_name,
			'last_name' => $last_name,
			'email' => $username . "@lehigh.edu",
			'access_level' => $role
		);

		$this->db->insert('users', $data);
	}

	function get_info($username) {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username', $username);
		
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			$row = $query->row();
			return $row;
		} else {
			return FALSE;
		}
	}

}