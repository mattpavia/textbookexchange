<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends CI_Controller {

	public function index() {
		$this->load->model('course');
		$data['courses'] = $this->course->getCourses();
		$this->load->view('courses', $data);
	}

	public function lookup($id) {
		$this->load->model('course');
		$data['course'] = $this->course->getCourse($id);
		$this->load->view('course', $data);
	}
	
}
