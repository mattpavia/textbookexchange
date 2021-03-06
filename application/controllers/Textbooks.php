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

use ApaiIO\Configuration\GenericConfiguration;
use ApaiIO\Operations\Search;
use ApaiIO\Operations\Lookup;
use ApaiIO\ApaiIO;

class Textbooks extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		if ($this->session->userdata('user_id')) {
			$this->load->model('textbook');
			$data['textbooks'] = $this->textbook->getTextbooks();

			$this->load->view('textbooks', $data);
		} else {
			redirect('login');
		}
	}

	public function lookup($id) {
		if ($this->session->userdata('user_id')) {
			$this->load->model('textbook');
			$data['textbook'] = $this->textbook->getTextbook($id);
			$data['listed_textbooks'] = $this->textbook->getListedTextbooks($id);

			$this->load->model('user');
			$data['user'] = $this->user->getFromTextbookId($id);

			$conf = new GenericConfiguration();
			$conf
			    ->setCountry('com')
			    ->setAccessKey('AKIAI22444MPW7634WLQ')
			    ->setSecretKey('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')
			    ->setAssociateTag('lehitextexch-20')
			    ->setRequest('\ApaiIO\Request\Soap\Request')
	    		->setResponseTransformer('\ApaiIO\ResponseTransformer\ObjectToArray');

	    	$apaiIO = new ApaiIO($conf);

	    	$isbn = $data['textbook']->isbn;

			$search = new Search();
			$search->setCategory('Books');
			$search->setKeywords($isbn);

			$response = $apaiIO->runOperation($search);

			if (!isset($response['Items']['Item']['ASIN'])) {
				$asin = $response['Items']['Item'][0]['ASIN'];
			} else {
				$asin = $response['Items']['Item']['ASIN'];
			}

			$lookup = new Lookup();
			$lookup->setItemId($asin);
			$lookup->setResponseGroup(array('Large'));

			$response = $apaiIO->runOperation($lookup);

			$data['image_url'] = $response['Items']['Item']['LargeImage']['URL'];
			$data['list_price'] = $response['Items']['Item']['ItemAttributes']['ListPrice']['FormattedPrice'];
			$data['lowest_new_price'] = $response['Items']['Item']['OfferSummary']['LowestNewPrice']['FormattedPrice'];
			$data['lowest_used_price'] = $response['Items']['Item']['OfferSummary']['LowestUsedPrice']['FormattedPrice'];

			$this->load->view('textbook', $data);
		} else {
			redirect('login');
		}
	}

	public function add() {
		if ($this->session->userdata('user_id')) {
			$this->load->view('new_textbook');
		} else {
			redirect('login');
		}
	}

	public function submit() {
		if ($this->session->userdata('user_id')) {

			$this->db->select('id');
			$this->db->from('textbooks');
			$this->db->where('isbn', $this->input->post('isbn'));
			$bookstore_textbook_id = $this->db->get()->row()->id;


			$data = array(
				'textbook_id' => $bookstore_textbook_id,
				'user_price' => $this->input->post('price')
			);

			$this->db->insert('listed_textbooks', $data);

			$textbook_id = $this->db->insert_id();

			$this->load->model('user');
			$user_id = $this->session->userdata('user_id');

			$this->db->insert('user_textbooks', array('user_id' => $user_id, 'textbook_id' => $textbook_id));

			redirect('textbooks/' . $bookstore_textbook_id);
		} else {
			redirect('login');
		}
	}

	public function delete($id) {
		$this->load->model('textbook');

		if ($this->textbook->delete($id)) {
			$this->session->set_flashdata('success_flash', 'Textbook deleted.');
		} else {
			$this->session->set_flashdata('fail_flash', 'Error deleting textbook.');
		}

		redirect('user');
	}
}
