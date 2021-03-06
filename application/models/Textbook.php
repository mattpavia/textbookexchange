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

class Textbook extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function getTextbooks($limit = FALSE) {
		$query = $this->db->get('textbooks');
		if ($limit) {
			$query = $this->db->get('textbooks', 10);
		}
		$textbooks = array();
		foreach ($query->result() as $row) {
			$textbooks[] = $row;
		}
		return $textbooks;
	}

	public function getTextbook($id) {
		$this->db->select('*');
		$this->db->from('textbooks');
		$this->db->where('id', $id);
		
		//return $this->db->get()->result_object()[0];
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return FALSE;
		}
	}

	public function getListedTextbooks($id) {
		$query = $this->db->query("SELECT * FROM listed_textbooks LEFT JOIN textbooks ON textbooks.id = listed_textbooks.textbook_id LEFT JOIN user_textbooks ON listed_textbooks.id = user_textbooks.textbook_id LEFT JOIN users ON user_textbooks.user_id = users.id WHERE listed_textbooks.textbook_id = " . $id);
		return $query->result();
	}

	public function getListedTextbooksForId($user_id) {
		$query = $this->db->query("SELECT *, listed_textbooks.id AS listed_id FROM listed_textbooks LEFT JOIN textbooks ON textbooks.id = listed_textbooks.textbook_id LEFT JOIN user_textbooks ON listed_textbooks.id = user_textbooks.textbook_id LEFT JOIN users ON user_textbooks.user_id = users.id WHERE user_textbooks.user_id = " . $user_id);
		return $query->result();
	}

	public function getTextbookFromIsbn($isbn) {
		$this->db->select('*');
		$this->db->from('textbooks');
		$this->db->where('isbn', $isbn);
		
		//return $this->db->get()->result_object()[0];
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return FALSE;
		}
	}

	public function searchByName($name) {
		$this->db->select('*');
		$this->db->from('textbooks');
		$this->db->like('title', $name);
		$this->db->or_like('isbn', $name);
		$this->db->or_like('author', $name);

		$query = $this->db->get();

		return $query->result();
	}

	public function delete($listed_id) {
		$this->db->select('*');
		$this->db->from('user_textbooks');
		$this->db->where('textbook_id', $listed_id);

		$query = $this->db->get();

		if ($query->result()[0]->user_id == $this->session->userdata('user_id')) {
			$this->db->delete('user_textbooks', array('textbook_id' => $listed_id));
			$this->db->delete('listed_textbooks', array('id' => $listed_id));
			return true;
		} else {
			return false;
		}
	}
}
