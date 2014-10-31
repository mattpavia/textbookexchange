<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Textbook extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function getTextbooks() {
		$query = $this->db->get('textbooks');
		$textbooks = array();
		foreach ($query->result() as $row) {
			$textbooks[] = $row;
		}
		return $textbooks;
	}

	function getTextbook($id) {
		$this->db->select('*');
		$this->db->from('textbooks');
		$this->db->where('id', $id);
		
		return $this->db->get()->result_object()[0];
	}

}