<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit extends CI_Controller {
	function __construct(){
		parent::__construct();

		$this->pustaka->auth($this->session->level, ['a']);
	}

	function index() {
		$data['isi'] = 'unit/index';
		$data['js'] = 'unit/index_js';
		$data['nav'] = 'unit/nav';

		$this->load->view('template/template', $data);
	}

	function tambah() {
		$data['isi'] = 'unit/tambah';
		$data['nav'] = 'unit/nav';

		$this->load->view('template/template', $data);
	}

	function ubah($id) {
		$data['isi'] = 'unit/ubah';
		$data['nav'] = 'unit/nav';
		$data['data']['unit'] = $this->db->get_where('unit', ['id_unit' => $id])->row();

		$this->load->view('template/template', $data);
	}

	function aksi_tambah() {
		foreach ($this->input->post('data') as $key => $value) {
			switch ($key) {
				default:
					$data[$key] = $value;
					break;
			}
		}

		$this->db->insert('unit', $data);

		redirect(base_url('unit'));
	}

	function aksi_ubah() {
		foreach ($this->input->post('data') as $key => $value) {
			switch ($key) {
				default:
					$data[$key] = $value;
					break;
			}
		}

		foreach ($this->input->post('where') as $key => $value) {
			switch ($key) {
				default:
					$where[$key] = $value;
					break;
			}
		}

		$this->db->update('unit', $data, $where);

		redirect(base_url('unit'));
	}

	function aksi_hapus($id) {
		$this->db->delete('unit', ['id_unit' => $id]);

		redirect(base_url('unit'));
	}

}