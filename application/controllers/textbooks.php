<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Textbooks extends CI_Controller {

	public function index() {
		if ($this->auth_ldap->is_authenticated()) {
			$this->load->model('textbook');
			$data['textbooks'] = $this->textbook->getTextbooks();
			$this->load->view('textbooks', $data);
		} else {
			redirect('login');
		}
	}

	public function lookup($id) {
		if ($this->auth_ldap->is_authenticated()) {
			$this->load->model('textbook');
			$data['textbook'] = $this->textbook->getTextbook($id);
			$this->load->view('textbook', $data);
		} else {
			redirect('login');
		}
	}

	public function add() {
		if ($this->auth_ldap->is_authenticated()) {
			$this->load->view('new_textbook');
		} else {
			redirect('login');
		}
	}

	public function submit() {
		if ($this->auth_ldap->is_authenticated()) {
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
		} else {
			redirect('login');
		}
	}
	
}
