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
		if ($this->auth_ldap->is_authenticated()) {
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
