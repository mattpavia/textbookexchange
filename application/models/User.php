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

class User extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function login($email, $password) {
		$this->db->select(array('id', 'email', 'password'));
		$this->db->from('users');
		$this->db->where('email', $email);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			$row = $query->row();
			if (crypt($password, $row->password) == $row->password) {
				return $row;
			}
		}

		return FALSE;
	}

	public function exists($username) {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username', $username);
		
		$query = $this->db->get();

		return $query->num_rows() > 0;
	}

	public function create($username, $first_name, $last_name, $role = 1) {
		$data = array(
			'username' => $username,
			'first_name' => $first_name,
			'last_name' => $last_name,
			'email' => $username . "@lehigh.edu",
			'access_level' => $role
		);

		$this->db->insert('users', $data);
	}

	public function get_info($username) {
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('username', $username);
		
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return FALSE;
		}
	}

	public function getFromTextbookId($id) {
		$this->db->select('*');
		$this->db->from('user_textbooks');
		$this->db->where('textbook_id', $id);
		
		//return $this->db->get()->result_object()[0];
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			$user_id = $query->row()->user_id;
			$this->db->select('*');
			$this->db->from('users');
			$this->db->where('id', $user_id);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				return $query->row();
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}
}
