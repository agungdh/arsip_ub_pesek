<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->pustaka->auth($this->session->level, ['a', 'p']);
	}

	function index() {
		$data['isi'] = "dashboard/index";
		$data['nav'] = "dashboard/nav";
		$data['js'] = "dashboard/index_js";
		
		$this->load->view("template/template", $data);
	}

}