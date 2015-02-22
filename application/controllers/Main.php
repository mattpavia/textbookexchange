<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright	Copyright (c) 2014, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		if ($this->session->userdata('user_id')) {
			$this->load->model('course');
			$this->load->model('textbook');

			$data['courses'] = $this->course->getCourses(TRUE);
			$data['textbooks'] = $this->textbook->getTextbooks(TRUE);

			$this->load->view('main', $data);
		} else {
			redirect('login');
		}
	}

	public function search() {
		$this->load->model('textbook');
		$this->load->model('course');
		$name = $this->input->post('search_value');
		$data['textbooks'] = $this->textbook->searchByName($name);
		$data['courses'] = $this->course->searchByName($name);
		$this->load->view('search', $data);
	}

	public function about() {
		if ($this->session->userdata('user_id')) {
			$this->load->view('about');
		} else {
			redirect('login');
		}
	}

	public function login() {
		if ($this->session->userdata('user_id')) {
			redirect(site_url());
		} else {
			$this->load->view('login');
		}
	}

	public function auth() {
		$this->load->library('Form_validation');
		$this->load->model('user');

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run()) {
			$user = $this->user->login($this->form_validation->set_value('email'), $this->form_validation->set_value('password'));
			if ($user) {
				$this->session->set_userdata(array(
					'user_id' => $user->id,
					'email' => $user->email
				));
				redirect(site_url());
			} else {
				$this->load->view('login', array("login_error" => "Incorrect email and password combination."));
			}
		} else {
			$this->load->view('login');
		}
	}

	public function register() {
		$this->load->view('register');
	}

	public function create() {
		$this->load->model('user');

		$this->load->library('email');

		$email = $this->input->post('email');

		//if (!$this->user->exists($email)) {

			$key = $this->user->create($email);

			$this->email->from('register@textbookexchange.com', 'Textbook Exchange');
			$this->email->to($email);

			$this->email->subject('Registratrion verification');
			$this->email->message('<a href="' . site_url('register/' . $key) . '">Click here</a> to finish registering.');

			if ($this->email->send()) {
				echo "email sent to " . $email;
			} else {
				echo $this->email->print_debugger();
			}
		// } else {
		// 	echo "email exists";
		// }
	}

	public function logout() {
		$this->session->unset_userdata(array(
			'user_id' => $user->id,
			'email' => $user->email
		));
		$this->session->sess_destroy();

        redirect('login');
    }
}
