<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function getCourses() {
		$query = $this->db->get('courses');
		$courses = array();
		foreach ($query->result() as $row) {
			$courses[] = $row;
		}
		return $courses;
	}

	function getCourse($id) {
		$this->db->select('*');
		$this->db->from('courses');
		$this->db->where('id', $id);
		
		return $this->db->get()->result_object()[0];
	}

}