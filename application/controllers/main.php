<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index() {
		$this->load->model('course');
		$this->load->model('textbook');

		$data['courses'] = $this->course->getCourses();
		$data['textbooks'] = $this->textbook->getTextbooks();

		$this->load->view('main', $data);
	}

	public function about() {
		$this->load->view('about');
	}
}
