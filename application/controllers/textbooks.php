<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Textbooks extends CI_Controller {

	public function index() {
		$this->load->model('textbook');
		$data['textbooks'] = $this->textbook->getTextbooks();
		$this->load->view('textbooks', $data);
	}

	public function lookup($id) {
		$this->load->model('textbook');
		$data['textbook'] = $this->textbook->getTextbook($id);
		$this->load->view('textbook', $data);
	}

	public function add() {
		$this->load->view('new_textbook');
	}

	public function submit() {
		$data = array(
			'isbn' => $this->input->post('isbn'),
			'author' => $this->input->post('author'),
			'title' => $this->input->post('title'),
			'price' => $this->input->post('price')
		);

		$this->db->insert('textbooks', $data);

		$this->load->model('textbook');
		$data['textbooks'] = $this->textbook->getTextbooks();
		$this->load->view('textbooks', $data);
	}
	
}
