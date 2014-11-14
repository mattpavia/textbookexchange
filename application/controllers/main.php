<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		if ($this->auth_ldap->is_authenticated()) {
			$this->load->model('course');
			$this->load->model('textbook');

			$data['courses'] = $this->course->getCourses();
			$data['textbooks'] = $this->textbook->getTextbooks();

			$this->load->view('main', $data);
		} else {
			redirect('login');
		}
	}

	public function about() {
		if ($this->auth_ldap->is_authenticated()) {
			$this->load->view('about');
		} else {
			redirect('login');
		}
	}

	public function login() {
		if ($this->auth_ldap->is_authenticated()) {
			redirect(site_url());
		} else {
			$this->load->view('login');
		}
	}

	public function auth() {
		$this->load->library('Form_validation');

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run()) {
			if ($this->auth_ldap->login($this->form_validation->set_value('username'), $this->form_validation->set_value('password'))) {
				redirect(site_url());
			} else {
				$this->load->view('login', array("login_error" => "Incorrect username and password combination."));
			}
		} else {
			$this->load->view('login');
		}
	}

	public function logout() {
        if ($this->auth_ldap->is_authenticated()) {
            $this->auth_ldap->logout();
        }

        redirect('login');
    }
}
