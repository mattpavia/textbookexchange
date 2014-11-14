<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Courses extends CI_Controller {

	public function index() {
		if ($this->auth_ldap->is_authenticated()) {
			$this->load->model('course');
			$data['courses'] = $this->course->getCourses();
			$this->load->view('courses', $data);
		} else {
			redirect('login');
		}
	}

	public function lookup($id) {
		if ($this->auth_ldap->is_authenticated()) {
			$this->load->model('course');
			$data['course'] = $this->course->getCourse($id);
			$this->load->view('course', $data);
		} else {
			redirect('login');
		}
	}
	
}
